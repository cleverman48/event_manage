<?php

class UserModel
{
    private $db;

    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function register($lastName, $firstName, $email, $password)
    {
        try {
            $password = hashPassword($password);

            $tableName = 'users';

            if (!$this->tableExists($tableName)) {
                $this->createUsersTable();
            }

            $uniqueId = $this->generateUniqueId(5);

            while ($this->isUserIdExists($uniqueId)) {
                $uniqueId = $this->generateUniqueId(5);
            }

            if ($this->isEmailExists($email)) {
                return 'exist_email';
            }

            $stmt = $this->db->prepare('INSERT INTO users (userID, lastName, firstName, email, password) VALUES (?, ?, ?, ?, ?)');
            $stmt->execute([$uniqueId, $lastName, $firstName, $email, $password]);

            if ($stmt->rowCount() > 0) {
                $tableName = 'attenders';

                if (!$this->tableExists($tableName)) {
                    $this->createAttendersTable();
                }

                $stmt = $this->db->prepare('INSERT INTO attenders (userID) VALUES (?)');
                $stmt->execute([$uniqueId]);

                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log('ユーザーの挿入エラー: ' . $e->getMessage());
            return false;
        }
    }

    public function authentication($email, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['login_user'] = $user['id'];
            $_SESSION['login_userID'] = $user['userID'];
            return true;
        }

        return false;
    }

    public function reset($email)
    {
        return false;
    }

    public function updateAttender()
    {
        $userID = $_SESSION['login_userID'];
        $fullName = $_POST['user_name'];
        $nameParts = explode(' ', $fullName);
        $lastname = $nameParts[0];
        $firstname = $nameParts[1] ?? '';
        $updated_at = date('Y-m-d H:i:s');

        $stmt = $this->db->prepare('UPDATE users SET lastname = :lastname, firstname = :firstname, updated_at = :updated_at WHERE userID = :userID');
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':updated_at', $updated_at);
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();

        if ($_FILES['avatar']['error'] == 0) {
            $avatarFile = $_FILES['avatar'];
            $targetDirectory = 'public/image/avatar/';
            $originalFilename = basename($avatarFile['name']);
            $extension = pathinfo($originalFilename, PATHINFO_EXTENSION);
            $targetFilename = uniqid() . '_' . $userID . '.' . $extension;
            $targetPath = $targetDirectory . $targetFilename;
            
            if (move_uploaded_file($avatarFile['tmp_name'], $targetPath)) {
                $stmt = $this->db->prepare('UPDATE attenders SET avatar = :avatar, company = :company, gender = :gender, years = :years, area = :area, sector = :sector, employee_size = :employee_size, depart = :depart, position = :position, homepage = :homepage, sns = :sns, profile = :profile, updated_at = :updated_at WHERE userID = :userID');
                $stmt->bindParam(':avatar', $targetPath);
            } else {
            }
        } else {
            $stmt = $this->db->prepare('UPDATE attenders SET company = :company, gender = :gender, years = :years, area = :area, sector = :sector, employee_size = :employee_size, depart = :depart, position = :position, homepage = :homepage, sns = :sns, profile = :profile, updated_at = :updated_at WHERE userID = :userID');
        }
        $stmt->bindParam(':company', $_POST['company']);
        $stmt->bindParam(':gender', $_POST['gender']);
        $stmt->bindParam(':years', $_POST['years']);
        $stmt->bindParam(':area', $_POST['area']);
        $stmt->bindParam(':sector', $_POST['sector']);
        $stmt->bindParam(':employee_size', $_POST['employee_size']);
        $stmt->bindParam(':depart', $_POST['depart']);
        $stmt->bindParam(':position', $_POST['position']);
        $stmt->bindParam(':homepage', $_POST['homepage']);
        $stmt->bindParam(':sns', $_POST['sns']);
        $stmt->bindParam(':profile', $_POST['profile']);
        $stmt->bindParam(':updated_at', $updated_at);
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();
    }


    private function tableExists($tableName)
    {
        $stmt = $this->db->query("SHOW TABLES LIKE '$tableName'");
        return $stmt->rowCount() > 0;
    }

    private function createUsersTable()
    {
        $migration = new CreateUsersTable($this->db);
        $migration->up();
    }

    private function createAttendersTable()
    {
        $migration = new CreateAttendersTable($this->db);
        $migration->up();
    }

    private function isUserIdExists($userId)
    {
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM users WHERE userID = ?');
        $stmt->execute([$userId]);
        $count = $stmt->fetchColumn();
        return $count > 0;
    }

    private function isEmailExists($email)
    {
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $count = $stmt->fetchColumn();
        return $count > 0;
    }

    private function generateUniqueId($length)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $uniqueId = '';

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = mt_rand(0, strlen($characters) - 1);
            $uniqueId .= $characters[$randomIndex];
        }

        return $uniqueId;
    }
}

?>
