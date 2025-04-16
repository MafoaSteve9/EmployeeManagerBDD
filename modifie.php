<?php
include('./connectDB.php');
$message = "";

// Récupération de l'employé à modifier
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    try {
        $stmt = $pdo->prepare("SELECT * FROM employe WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $employe = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$employe) {
            die("Employé non trouvé.");
        }
    } catch (PDOException $e) {
        die("Erreur de récupération : " . $e->getMessage());
    }
}

// Mise à jour des données après soumission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int) $_POST['id'];
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $email = trim($_POST['email']);
    $num = trim($_POST['num']);

    if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($num)) {
        try {
            $stmt = $pdo->prepare("
                UPDATE employe 
                SET nom = :nom, prenom = :prenom, email = :email, telephone = :telephone 
                WHERE id = :id
            ");
            $stmt->execute([
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':email' => $email,
                ':telephone' => $num,
                ':id' => $id
            ]);
            $message = "✔ Modification réussie !";
            // Mettre à jour les données locales
            $employe = [
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'telephone' => $num
            ];
        } catch (PDOException $e) {
            $message = "❌ Erreur SQL : " . $e->getMessage();
        }
    } else {
        $message = "Tous les champs sont requis.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un employé</title>
</head>
<body>
<h2>Modifier un employé</h2>

<form method="post" action="modifie.php">
    <input type="hidden" name="id" value="<?= htmlspecialchars($employe['id'] ?? '') ?>">

    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($employe['nom'] ?? '') ?>" required>

    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" id="prenom" value="<?= htmlspecialchars($employe['prenom'] ?? '') ?>" required>

    <label for="email">Email :</label>
    <input type="email" name="email" id="email" value="<?= htmlspecialchars($employe['email'] ?? '') ?>" required>

    <label for="num">Téléphone :</label>
    <input type="text" name="num" id="num" value="<?= htmlspecialchars($employe['telephone'] ?? '') ?>" required>

    <button type="submit">Enregistrer</button>
</form>

<p><?= $message ?></p>

<a href="index.php">Retour</a>

</body>
</html>
