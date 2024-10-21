<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $dob = $_POST['dob'];
  $contact = $_POST['contact'];

  $sql = "INSERT INTO patients (name, dateOfBirth, contactInfo) VALUES ('$name', '$dob', '$contact')";
  
  if ($conn->query($sql) === TRUE) {
    echo "New patient registered successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
