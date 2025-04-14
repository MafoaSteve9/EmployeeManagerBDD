<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "employedb";

try {

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie ! <br>";
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());

}