<?php
$host = 'localhost';
$dbname = 'contact';
$user = 'root';
$pass = '';

try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "
    CREATE TABLE IF NOT EXISTS `contact_form` (
      `id` INT AUTO_INCREMENT PRIMARY KEY,
      `name` VARCHAR(100) NOT NULL,
      `email` VARCHAR(100) NOT NULL,
      `contact` VARCHAR(20) NOT NULL,
      `message` TEXT NOT NULL,
      `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB;
  ";

  $conn->exec($sql);
  echo "Table 'contact_form' created successfully!\n";
} catch(PDOException $e) {
  echo "Error creating table: " . $e->getMessage() . "\n";
}
