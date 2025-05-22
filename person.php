<?php

class Person {
    private $conn;
    private $table_name = "persons";

    public $firstname;
    public $lastname;
    public $birthdate;
    public $gender;

    // Constructor to initialize the database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // Create a new person record
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (firstname, lastname, birthdate, gender) VALUES (:firstname, :lastname, :birthdate, :gender)";
        
        $stmt = $this->conn->prepare($query);
        
        // Bind parameters
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':birthdate', $this->birthdate);
        $stmt->bindParam(':gender', $this->gender);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Update an existing person record
    public function update($id) {
        $query = "UPDATE " . $this->table_name . " SET firstname = :firstname, lastname = :lastname, birthdate = :birthdate, gender = :gender WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        
        // Bind parameters
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':birthdate', $this->birthdate);
        $stmt->bindParam(':gender', $this->gender);
        $stmt->bindParam(':id', $id);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Delete a person record
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        
        // Bind parameter
        $stmt->bindParam(':id', $id);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
