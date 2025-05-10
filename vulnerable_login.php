<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require "db.php";
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Prepare result data if UNION injection is detected
    $data = [];
    if (stripos($username, 'union') !== false) {
        while ($row = $result->fetch_assoc()) {
            $data[] = [
                'username' => $row['username'],
                'password' => $row['password']
            ];
        }
        $_SESSION['sqli_data'] = $data;
        header("Location: result.php?msg=✅ Login successful (vulnerable)&type=union");
    } else {
        header("Location: result.php?msg=✅ Login successful (vulnerable)&type=classic");
    }
} else {
    header("Location: result.php?msg=❌ Invalid credentials (vulnerable)&type=error");
}
?>
