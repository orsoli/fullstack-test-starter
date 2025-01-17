<?php

class CreatAttributesTable {

     private $conn;

    
    /**
     * 
     * @param $conn
     */
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    /**
     * Run the migrations
     */
    public function up() {

        // Check if the table already exists
        $sql = "SHOW TABLES LIKE 'attributes'";
        $result = $this->conn->query($sql);
        // Check if result is not empty
        if($result->rowCount() > 0) {
            echo "\033[33m - attributes table already exists\033[0m\n";
            return;
        }
        // Create the table
        $sql = "CREATE TABLE attributes (
            id VARCHAR(255) NOT NULL PRIMARY KEY,
            name VARCHAR(255) NOT NULL UNIQUE KEY,
            type VARCHAR(255) NOT NULL,
            __typename VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $this->conn->exec($sql);
        echo " - Table attributes created successfully          \033[32mDONE\033[0m\n";
    }

    /**
     * Reverse the migrations
     */
    public function down() {
        
        $sql = "DROP TABLE attributes";
        $this->conn->exec($sql);
        echo "Table attributes dropped successfully         \033[31mDONE\033[0m\n";
    }
}