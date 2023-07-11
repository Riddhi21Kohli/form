<?php
$servername = "localhost";
$username = "rk";
$password = " ";
$dbname = "form";


$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$email = $_GET['email'];


$stmt = $pdo->prepare("SELECT health_report FROM users WHERE email = ?");
$stmt->execute([$email]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
  $filePath = $result['health_report'];
  
  // Set the appropriate headers to force the browser to download the file
  header('Content-Description: File Transfer');
  header('Content-Type: application/octet-stream');
  header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
  header('Expires: 0');
  header('Cache-Control: must-revalidate');
  header('Pragma: public');
  header('Content-Length: ' . filesize($filePath));
  readfile($filePath);
  exit;
} else {
  echo "No health report found for the provided email.";
}
?>
