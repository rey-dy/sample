<?php
// Include the database and person class files
include_once 'Database.php';
include_once 'Person.php';

// Create a new database connection
$database = new Database();
$db = $database->getConnection();

// Create a new person
$person = new Person($db);
$person->firstname = "John";
$person->lastname = "Doe";
$person->birthdate = "1990-01-01";
$person->gender = "Male";

// Create the person record
if ($person->create()) {
    echo "Person created successfully.";
} else {
    echo "Unable to create person.";
}

// Update the person record (assuming the ID is known)
$person->firstname = "Jane";
$person->lastname = "Doe";
if ($person->update(1)) {
    echo "Person updated successfully.";
} else {
    echo "Unable to update person.";
}

// Delete the person record
if ($person->delete(1)) {
    echo "Person deleted successfully.";
} else {
    echo "Unable to delete person.";
}
?>
