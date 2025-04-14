<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom">

        <label for="prenom">Prenom :</label>
        <input type="text" name="prenom" id="prenom">

        <label for="email">Email :</label>
        <input type="email" name="email" id="email">

        <label for="num">Numéro de téléphone</label>
        <input type="text" name="num" id="num">

        <button type="submit">send</button>
    </form>

<?php 
include("ajouter.php");
?>
    <p><?php echo $message ?></p>
</body>
</html>