<?php

//echo "<h1>Hello PHP 8</h1>";

$servername = "mysql";
$username = "docker";
$password = "password";
$dbname = "docker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$q = "INSERT INTO users (name, email)
VALUES ('Andrew', 'test@gmail.com')";

if ($conn->query($q) === TRUE) {
    echo "Inserted successfully";
} else {
    echo "Error inserting: " . $conn->error;
}

$conn->close();