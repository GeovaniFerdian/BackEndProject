<?php
$servername = "tomohon";
$username = "nazz7425_ila";
$password = "kirisaki435";
$dbname = "nazz7425_ila";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}

// Get data from Android
$username = $_POST['post_username'];
$email = $_POST['post_email'];
$password = $_POST['post_password'];


// Insert data into MySQL
$sql = "INSERT INTO user (username, email , password) VALUES ('$username','$email','$password')";

if ($conn->query($sql) === TRUE) {
 echo "New record created successfully";

} else {
 echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>