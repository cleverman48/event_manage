<?php
class UserModel
{
    private $db;

    public function __construct()
    {
        global $event_db;
        $this->db = $event_db;
        // $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $createTableQuery = "CREATE TABLE IF NOT EXISTS users (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            userID VARCHAR(5) UNIQUE,
            lastname VARCHAR(255),
            firstname VARCHAR(255),
            email VARCHAR(255),
            password VARCHAR(255),
            role INT(11) DEFAULT 0,
            beforeNoti INT(1) DEFAULT 1,
            offerNoti INT(1) DEFAULT 1,
            avatar VARCHAR(255) DEFAULT 'public/image/upload/user.png',
            top_image VARCHAR(255) DEFAULT 'public/image/upload/top_about.jpg',
            company VARCHAR(255) DEFAULT '非回答',
            gender VARCHAR(255) DEFAULT '非回答',
            years VARCHAR(255) DEFAULT '非回答',
            area VARCHAR(255) DEFAULT '非回答',
            sector VARCHAR(255) DEFAULT '非回答',
            employee_size VARCHAR(255) DEFAULT '非回答',
            depart VARCHAR(255) DEFAULT '非回答',
            position VARCHAR(255) DEFAULT '非回答',
            homepage VARCHAR(255)  DEFAULT '',
            sns VARCHAR(255)  DEFAULT '',
            attender_profile TEXT  DEFAULT '',
            organizer_profile TEXT  DEFAULT '',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        if ($this->db->query($createTableQuery) === FALSE) {
            echo "Error creating table: " . $this->db->error;
            $this->db->close();
            exit();
        }

    }

    public function register($lastName, $firstName, $email, $password)
    {
        try {
            $password = hashPassword($password);

            $uniqueId = $this->generateUniqueId(5);

            while ($this->isUserIdExists($uniqueId)) {
                $uniqueId = $this->generateUniqueId(5);
            }

            if ($this->isEmailExists($email)) {
                return 'exist_email';
            }

            $stmt = $this->db->prepare('INSERT INTO users (userID, lastName, firstName, email, password) VALUES (?, ?, ?, ?, ?)');
            $stmt->execute([$uniqueId, $lastName, $firstName, $email, $password]);
            return true;
        } catch (PDOException $e) {
            error_log('ユーザーの挿入エラー: ' . $e->getMessage());
            return false;
        }
    }
    public function get($userID)
    {
        $sql = "SELECT * FROM users WHERE userID = :userID";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();

        // Fetch all the data
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data[0];
    }
    public function update()
    {
        $userID = $_SESSION['login_userID'];
        $user = $this->get($userID);

        $stmt = $this->db->prepare('UPDATE users SET 
            lastname = :lastname, 
            firstname = :firstname, 
            beforeNoti = :beforeNoti, 
            offerNoti = :offerNoti, 
            avatar = :avatar, 
            top_image = :top_image, 
            company = :company, 
            gender = :gender, 
            years = :years, 
            area = :area, 
            sector = :sector, 
            employee_size = :employee_size, 
            depart = :depart, 
            position = :position, 
            homepage = :homepage, 
            sns = :sns, 
            attender_profile = :attender_profile, 
            organizer_profile = :organizer_profile, 
            updated_at = :updated_at 
            WHERE userID = :userID');
        
        if( isset($_POST['user_name']) ){
            $fullName = $_POST['user_name'];
            $nameParts = explode(' ', $fullName);
            $lastname = $nameParts[0];
            $firstname = $nameParts[1] ?? '';
        }else{
            $lastname = $user['lastname'];
            $firstname = $user['firstname'];
        }

        $beforeNoti = (isset($_POST['beforeNoti']) ? $_POST['beforeNoti'] : $user['beforeNoti']);
        $offerNoti = (isset($_POST['offerNoti']) ? $_POST['offerNoti'] : $user['offerNoti']);
        if ($_FILES['avatar']['error'] == 0) {
            $avatarFile = $_FILES['avatar'];
            $avatar = uploadImage($avatarFile);
        } else {
            $avatar = (isset($_POST['avatar'])) ? $_POST['avatar'] : $user['avatar'];
        }
        if ($_FILES['top_image']['error'] == 0) {
            $top_imageFile = $_FILES['top_image'];
            $top_image = uploadImage($top_imageFile);
        } else {
            $top_image = (isset($_POST['top_image'])) ? $_POST['top_image'] : $user['top_image'];
        }
        $company = (isset($_POST['company']) ? $_POST['company'] : $user['company']);
        $gender = (isset($_POST['gender']) ? $_POST['gender'] : $user['gender']);
        $years = (isset($_POST['years']) ? $_POST['years'] : $user['years']);
        $area = (isset($_POST['area']) ? $_POST['area'] : $user['area']);
        $sector = (isset($_POST['sector']) ? $_POST['sector'] : $user['sector']);
        $employee_size = (isset($_POST['employee_size']) ? $_POST['employee_size'] : $user['employee_size']);
        $depart = (isset($_POST['depart']) ? $_POST['depart'] : $user['depart']);
        $position = (isset($_POST['position']) ? $_POST['position'] : $user['position']);
        $homepage = (isset($_POST['homepage']) ? $_POST['homepage'] : $user['homepage']);
        $sns = (isset($_POST['sns']) ? $_POST['sns'] : $user['sns']);
        $attender_profile = (isset($_POST['attender_profile']) ? $_POST['attender_profile'] : $user['attender_profile']);
        $organizer_profile = (isset($_POST['organizer_profile']) ? $_POST['organizer_profile'] : $user['organizer_profile']);
        $updated_at = date('Y-m-d H:i:s');

        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':beforeNoti', $beforeNoti);
        $stmt->bindParam(':offerNoti', $offerNoti);
        $stmt->bindParam(':avatar', $avatar);
        $stmt->bindParam(':top_image', $top_image);
        $stmt->bindParam(':company', $company);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':years', $years);
        $stmt->bindParam(':area', $area);
        $stmt->bindParam(':sector', $sector);
        $stmt->bindParam(':employee_size', $employee_size);
        $stmt->bindParam(':depart', $depart);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':homepage', $homepage);
        $stmt->bindParam(':sns', $sns);
        $stmt->bindParam(':attender_profile', $attender_profile);
        $stmt->bindParam(':organizer_profile', $organizer_profile);
        $stmt->bindParam(':updated_at', $updated_at);
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();
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