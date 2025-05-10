<?php
$conn = new mysqli("localhost", "root", "", "demo");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
