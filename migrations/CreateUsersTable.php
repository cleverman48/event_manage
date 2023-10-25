<?php

class CreateUsersTable
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
            $sql = "CREATE TABLE users (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                lastname VARCHAR(255),
                firstname VARCHAR(255),
                email VARCHAR(255),
                password VARCHAR(255),
                role INT(11) DEFAULT 0,
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
