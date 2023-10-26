<?php

class AttenderModel
{
    private $db;

    public function __construct()
    {
        global $event_db;
        $this->db = $event_db;
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $createTableQuery = "CREATE TABLE IF NOT EXISTS attenders (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            userID VARCHAR(5) UNIQUE,
            avatar VARCHAR(255) DEFAULT 'public/image/upload/user.png',
            company VARCHAR(255),
            gender VARCHAR(255),
            years VARCHAR(255),
            area VARCHAR(255),
            sector VARCHAR(255),
            employee_size VARCHAR(255),
            depart VARCHAR(255),
            position VARCHAR(255),
            homepage VARCHAR(255),
            sns VARCHAR(255),
            profile TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        if ($this->db->query($createTableQuery) === FALSE) {
            echo "Error creating table: " . $this->db->error;
            $this->db->close();
            exit();
        }
    }

    public function register($uniqueId)
    {
        try {
            $stmt = $this->db->prepare('INSERT INTO attenders (userID) VALUES (?)');
            $stmt->execute([$uniqueId]);

            return true;
        } catch (PDOException $e) {
            error_log('ユーザーの挿入エラー: ' . $e->getMessage());
            return false;
        }
    }
    public function get($userID)
    {
        $sql = "SELECT a.*, u.firstname, u.lastname, u.email
                FROM attenders AS a
                JOIN users AS u ON a.userID = u.userID
                WHERE a.userID = :userID";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();

        // Fetch all the data
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data[0];
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
}
?>