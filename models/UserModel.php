<?php

class UserModel
{
    private $db;

    public function __construct()
    {
        global $db;
        // データベースに接続する
        $this->db = $db;
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function register($lastName, $firstName, $email, $password)
    {
        try {
            $password = hashPassword($password);

            $tableName = 'users';

            // Check if the table exists
            $stmt = $this->db->query("SHOW TABLES LIKE '$tableName'");
            $tableExists = $stmt->rowCount() > 0;

            if (!$tableExists) {
                $migration = new CreateUsersTable($this->db);
                $migration->up();
            }
            // メールアドレスが既に存在するかチェックする
            $stmt = $this->db->prepare('SELECT COUNT(*) FROM users WHERE email = ?');
            $stmt->bindParam(1, $email);
            $stmt->execute();
            $count = $stmt->fetchColumn();
        
            if ($count > 0) {
                return 'exist_email'; // メールアドレスが既に存在する場合はエラーを返す
            }

            // SQL文を準備する
            $stmt = $this->db->prepare('INSERT INTO users (lastName, firstName, email, password) VALUES (?, ?, ?, ?)');
            // パラメータをバインドする
            $stmt->bindParam(1, $lastName);
            $stmt->bindParam(2, $firstName);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $password);
    
            // ステートメントを実行する
            $stmt->execute();
    
            // 挿入が成功したかチェックする
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            // 例外を処理するか、エラーをログに記録する
            error_log('ユーザーの挿入エラー: ' . $e->getMessage());
            return false;
        }
    }

    public function authentication( $email, $password ){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify the password
        if ($user && password_verify($password, $user['password'])) {
            // Successful login
            $_SESSION['userId'] = $user['id'];
            return true;
        }

        // Invalid credentials
        return false;

    }

    public function reset($email){
        return false;
    }
}

?>
