<?php
include('./connectDB.php');

function getInfos($nom, $prenom, $mail, $num) {
    $fichier = "employe.txt";
    $handle = fopen($fichier, 'a');

    if($handle) {
        fwrite($handle, "INSERT INTO employe (nom, prenom, mail, telephone) VALUES ('$nom', '$prenom', '$mail', '$num');\n");
        fclose($handle);
    }
}


