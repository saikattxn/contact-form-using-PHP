<?php
$dbhost = 'localhost';
$dbname = 'contact';
$dbuser = 'root';
$dbpass = '';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
  die('Could not connect to the database');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $message = $_POST['message'];
  $query = "INSERT INTO contact_form (name, email, contact, message) VALUES ('$name', '$email', '$contact', '$message')";

  if (mysqli_query($conn, $query)) {
    echo "success";
  } else {
    echo "error";
  }
}
?>
