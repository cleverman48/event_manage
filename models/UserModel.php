<?php
require_once 'models/AttenderModel.php';

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

            if ($stmt->rowCount() > 0) {
                $attender = new AttenderModel();
                $attender->register($uniqueId);
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