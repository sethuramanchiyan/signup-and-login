<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE TABLE user (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(300) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table user created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>