<?php
// Database Connection Configuration
// Connects to MySQL database for robot arm control

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'robot-arm-db';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die('DB Connection failed: ' . $conn->connect_error);
}
$conn->set_charset('utf8mb4');