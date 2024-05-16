<?php
// MySQL database connection parameters
$servername = "localhost";
$username = "sourabhTirthani";
$password = "sourabhTirthani";
$dbname = "novarealchain";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>