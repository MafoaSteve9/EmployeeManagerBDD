<?php
include('./connectDB.php');

$message = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
   $nom = isset($_POST["nom"]) ? trim($_POST["nom"]) : "";
   $prenom = isset($_POST["prenom"]) ? trim($_POST["prenom"]) : "";
   $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
   $num = isset($_POST["num"]) ? trim($_POST["num"]) : "";


   if(!empty($nom) && !empty($prenom) && !empty($email) && !empty($num)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO employe (nom, prenom, email, telephone) VALUES (:nom, :prenom, :email, :telephone)");
            $stmt->execute([
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':email' => $email,
                ':telephone' => $num
            ]);
            $message = "✔";
        } catch (PDOException $e) {
            $message = "❌" . $e->getMessage();
        }

   } else {
    $message = "Remplir le formulaire";
   }
}

?>


