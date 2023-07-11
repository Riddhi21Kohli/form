<?php
$servername = "localhost";
$username = "rk";
$password = " ";
$dbname = "form";


$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$name = $_POST['name'];
$age = $_POST['age'];
$weight = $_POST['weight'];
$email = $_POST['email'];

$targetDirectory = "uploads/";
$targetFile = $targetDirectory . basename($_FILES["healthReport"]["name"]);


if (move_uploaded_file($_FILES["healthReport"]["tmp_name"], $targetFile)) {
  // Insert the user details and file path into the database
  $stmt = $pdo->prepare("INSERT INTO users (name, age, weight, email, health_report) VALUES (?, ?, ?, ?, ?)");
  $stmt->execute([$name, $age, $weight, $email, $targetFile]);

  echo "Form submitted and file uploaded successfully!";
} else {
  echo "Error uploading the file.";
}
?>
