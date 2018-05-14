<?php
$servername = "209.54.49.59";
$username = "evento";
$password = "ceu123!@#";
$dbname = "villgma57095com28607_";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 ?>
