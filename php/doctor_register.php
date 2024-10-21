<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $specialty = $_POST['specialty'];
  $contact = $_POST['contact'];

  $sql = "INSERT INTO doctors (name, specialty, contactInfo) VALUES ('$name', '$specialty', '$contact')";
  
  if ($conn->query($sql) === TRUE) {
    echo "New Doctor registered successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
