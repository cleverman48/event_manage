<?php

class EventModel {
    // Properties
    private $db; // Database connection or ORM instance

    // Constructor
    public function __construct() 
    {
        global $event_db;
        $this->db = $event_db;
        // Check if the "events" table exists, if not, create it
        $createTableQuery = "CREATE TABLE IF NOT EXISTS events (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            event_id VARCHAR(255) NOT NULL,
            event_state VARCHAR(255) NOT NULL,
            event_oganizer VARCHAR(255) NOT NULL,
            event_name VARCHAR(255) NOT NULL,
            event_date DATE NOT NULL,
            event_time TIME NOT NULL,
            event_venue VARCHAR(255) NOT NULL,
            event_address VARCHAR(255) NOT NULL,
            event_url VARCHAR(255) NOT NULL,
            participation_fee INT(11) NOT NULL,
            num_participants INT(11) NOT NULL,
            matching_restrictions TEXT ,
            tags VARCHAR(255) ,
            image_path VARCHAR(255) ,
            content TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        )";

        if ($this->db->query($createTableQuery) === FALSE) {
            echo "Error creating table: " . $this->db->error;
            $this->db->close();
            exit();
        }
    }
    public function getAllEvents() 
    {
        // Implement your logic to fetch events from the database or any other data source
        // Example code using PDO:
        $query = "SELECT * FROM events ORDER BY event_date DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $events;
    }
    public function createEvent($eventData) 
    {
        // Implement your logic to create a new event in the database or any other data source
        // Example code using PDO:
        $query = "INSERT INTO events (event_id,event_state,event_oganizer,event_name, event_date, event_time,event_venue,event_address,event_url,participation_fee,num_participants,matching_restrictions,tags,image_path,content)".
        " VALUES (:event_id,:event_state,:event_oganizer,:event_name, :event_date, :event_time,:event_venue,:event_address,:event_url,:participation_fee,:num_participants,:matching_restrictions,:tags,:image_path,:content)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":event_id", $eventData['event_id']);
        $stmt->bindParam(":event_state", $eventData['event_state']);
        $stmt->bindParam(":event_oganizer", $eventData['event_oganizer']);
        $stmt->bindParam(":event_name", $eventData['event_name']);
        $stmt->bindParam(":event_date", $eventData['event_date']);
        $stmt->bindParam(":event_time", $eventData['event_time']);
        $stmt->bindParam(":event_venue", $eventData['event_venue']);
        $stmt->bindParam(":event_address", $eventData['event_address']);
        $stmt->bindParam(":event_url", $eventData['event_url']);
        $stmt->bindParam(":participation_fee", $eventData['participation_fee']);
        $stmt->bindParam(":num_participants", $eventData['num_participants']);
        $stmt->bindParam(":matching_restrictions", $eventData['matching_restrictions']);
        $stmt->bindParam(":tags", $eventData['tags']);
        $stmt->bindParam(":image_path", $eventData['image_path']);
        $stmt->bindParam(":content", $eventData['content']);
        $stmt->execute();
        $eventId = $this->db->lastInsertId();
        return $eventId;
    }
    public function getEventById($eventId) {
        // Implement your logic to fetch a specific event from the database or any other data source
        // Example code using PDO:
        $query = "SELECT * FROM events WHERE event_id = :eventId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":eventId", $eventId);
        $stmt->execute();
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
        return $event;
    }
    public function updateEvent($eventData) {
        $query = "UPDATE events SET ". 
            "event_oganizer = :event_oganizer, ".
            "event_name = :event_name, ".
            "event_date = :event_date, ".
            "event_time = :event_time, ".
            "event_venue = :event_venue, ".
            "event_address = :event_address, ".
            "event_url = :event_url, ".
            "participation_fee = :participation_fee, ".
            "num_participants = :num_participants, ".
            "matching_restrictions = :matching_restrictions, ".
            "tags = :tags, ";
        if($eventData['image_path'] != "") {
            $query .= "image_path = :image_path, ";
        }
        $query .= "content = :content WHERE event_id = :eventId"; 
       
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":event_oganizer", $eventData['event_oganizer']);
        $stmt->bindParam(":event_name", $eventData['event_name']);
        $stmt->bindParam(":event_date", $eventData['event_date']);
        $stmt->bindParam(":event_time", $eventData['event_time']);
        $stmt->bindParam(":event_venue", $eventData['event_venue']);
        $stmt->bindParam(":event_address", $eventData['event_address']);
        $stmt->bindParam(":event_url", $eventData['event_url']);
        $stmt->bindParam(":participation_fee", $eventData['participation_fee']);
        $stmt->bindParam(":num_participants", $eventData['num_participants']);
        $stmt->bindParam(":matching_restrictions", $eventData['matching_restrictions']);
        $stmt->bindParam(":tags", $eventData['tags']);
        if($eventData['image_path'] != "") {
            $stmt->bindParam(":image_path", $eventData['image_path']);
        }
        $stmt->bindParam(":content", $eventData['content']);
        $stmt->bindParam(":eventId", $eventData['event_id']);
        try {
            $stmt->execute();
            return "success";
        } catch (PDOException $e) {
            echo "Update failed: " . $e->getMessage();
            return false;
        }
    }
    public function deleteEvent($eventId) {
        // Implement your logic to delete an event from the database or any other data source
        // Example code using PDO:
        $query = "DELETE FROM events WHERE id = :eventId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":eventId", $eventId);
        $stmt->execute();
        return true;
    }
}
?>