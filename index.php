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

$stmt = $pdo->query("SELECT * FROM employe");
$lignes = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<pre>';
print_r($lignes);
echo '</pre>';


?>
    <p><?php echo $message ?></p>


    <table border="1" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        <thead style="background-color: antiquewhite;">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lignes as $ligne): ?>
                <?php $donnees = $ligne; ?>
                <tr>
                    <td><?= htmlspecialchars($donnees['id'] ?? '') ?></td>
                    <td><?= htmlspecialchars($donnees['nom'] ?? '') ?></td>
                    <td><?= htmlspecialchars($donnees['prenom'] ?? '') ?></td>
                    <td><?= htmlspecialchars($donnees['email'] ?? '') ?></td>
                    <td><?= htmlspecialchars($donnees['telephone'] ?? '') ?></td>
                    <td>
                        <a href='modifier.php?id=<?= $donnees['id'] ?>'><button>Modifier</button></a>
                        <a href='index.php?delete_id=<?= $donnees['id'] ?>'><button>Supprimer</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>