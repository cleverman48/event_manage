<?php

class CreateAttendersTable
{
    private $db;
    public function __construct($db){
        $this->db = $db;
    }
    public function up()
    {
        // Define the database schema changes to be applied when migrating up
        try {
            // Define the database schema changes to be applied when migrating up
            $sql = "CREATE TABLE attenders (
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

            $this->db->exec($sql);
        } catch (PDOException $e) {
            // Exception handling and error logging
            error_log('CreateUsersTable migration error: ' . $e->getMessage());
        }
    }

    public function down()
    {
        // Define the database schema changes to be applied when migrating down (rollback)
        $sql = "DROP TABLE users";

        $this->db->exec($sql);
    }
}
