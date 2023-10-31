<?php

class Event2UserModel {
    // Properties
    private $db; // Database connection or ORM instance

    // Constructor
    public function __construct() 
    {
        global $event_db;
        $this->db = $event_db;
        // Check if the "events" table exists, if not, create it
        $sql = "CREATE TABLE IF NOT EXISTS event2users (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            event_id INT(11),
            user_id INT(11),
            favorite BOOLEAN,
            part_in BOOLEAN,
            matched_user text DEFAULT '',
            bematched_user text DEFAULT '',
            FOREIGN KEY (event_id) REFERENCES events(id),
            FOREIGN KEY (user_id) REFERENCES users(id),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        
        if ($this->db->query($sql) === FALSE) {
            echo "Error creating table: " . $this->db->error;
            $this->db->close();
            exit();
        }
    }
    public function all() 
    {
        $query = "SELECT * FROM event2users";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $events;
    }
    public function user2events($user)
    {
        $query = "SELECT e.* FROM event2users eu
                  JOIN events e ON eu.event_id = e.id
                  WHERE eu.user_id = :user AND eu.part_in = 1 ORDER BY e.event_date";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user', $user, PDO::PARAM_INT);
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $events;
    }
    public function add_favorite()
    {
        $user_id = $_POST['user_id'];
        $event_id = $_POST['event_id'];
        $this->isRowExists($user_id, $event_id);
        $favorite = $_POST['favorite'];
        $stmt = $this->db->prepare('UPDATE event2users SET 
            favorite = :favorite 
            WHERE user_id = :user_id
            AND event_id = :event_id');
        $stmt->bindParam(':favorite', $favorite);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':event_id', $event_id);
        $stmt->execute();
        return;
    }
    public function attendEvent()
    {
        $event_id = $_GET['event'];
        $user_id = $_SESSION['login_user'];
        $this->isRowExists($user_id, $event_id);
        $stmt = $this->db->prepare("UPDATE event2users SET
            part_in = 1
            WHERE user_id = '$user_id'
            AND event_id = '$event_id'");
        $stmt->execute();
        return;
    }
    public function getAttenderList($event_id)
    {
        $query = "SELECT u.*, eu.* FROM event2users eu
                  JOIN users u ON eu.user_id = u.id
                  WHERE eu.event_id = '$event_id' AND eu.part_in = 1 ORDER BY eu.created_at";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    private function isRowExists($user_id, $event_id)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM event2users WHERE user_id = '$user_id' AND event_id = '$event_id' ");
        $stmt->execute([]);
        $count = $stmt->fetchColumn();
        if($count > 0){
            return;
        }else{
            $stmt = $this->db->prepare('INSERT INTO event2users (user_id, event_id) VALUES (?, ?)');
            $stmt->execute([$user_id, $event_id]);
        }
    }
}
?>