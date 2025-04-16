<?php
include('./connectDB.php');

echo '<pre>';
print_r($_GET);
echo '</pre>';


if (isset($_GET['delete_id'])) {
    $id = (int) $_GET['delete_id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM employe WHERE id = :id");
        $stmt->execute([':id' => $id]);
        header("Location: index.php?message=Employé supprimé avec succès");
        exit();
    } catch (PDOException $e) {
        echo "Erreur de suppression : " . $e->getMessage();
    }
} else {
    echo "Aucun identifiant fourni.";
}
