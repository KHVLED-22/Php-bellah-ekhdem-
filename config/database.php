<?php
$host = "localhost";
$db_name = "projetphp";
$username = "root"; // Replace with your actual database username
$password = ""; // Replace with your actual database password

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>


