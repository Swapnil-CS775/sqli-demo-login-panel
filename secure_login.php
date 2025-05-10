<?php
require "db.php";
$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Redirect to result.php with a success message
    header("Location: result.php?msg=✅ Login successful (secure)");
} else {
    // Redirect to result.php with an error message
    header("Location: result.php?msg=❌ Invalid credentials (secure)");
}
?>
