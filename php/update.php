<?php
    include './database.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Récupérer les données envoyées via POST
        $idStudent = $_POST['idStudent'];
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $sex = $_POST['sex'];
        $parcours = $_POST['parcours'];

        // Préparer la requête UPDATE
        $sql = 'UPDATE etudiant SET nom = ?, prenom = ?, adresse = ?, sexe = ?, id_parcours = ?, dob= ? WHERE id = ?';

        $response = $conn->prepare($sql);

        // Exécuter la requête avec les données
        $response->execute([$lastName, $firstName, $address, $sex, $parcours, $dob, $idStudent]);
    }

    // Rediriger vers l'index après la mise à jour
    header('Location: index.php');
    exit();
?>
