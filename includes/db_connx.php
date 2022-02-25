<?php
//connection using MySQLi Object-Oriented
$conn = new mysqli("localhost", "root", "", "EREVIVE");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>