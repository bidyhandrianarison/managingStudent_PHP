<?php
include './database.php';
$idStudent = $_POST['idStudent'];
$sql = 'SELECT nom, prenom,etudiant.id,sexe,libelle,adresse,dob FROM etudiant JOIN parcours ON etudiant.id_parcours= parcours.id WHERE etudiant.id=?';
$response = $conn->prepare($sql);
$response->execute([$idStudent]);
$result = $response->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $result['prenom']; ?></title>
    <link rel="stylesheet" href="./../output.css">
</head>

<body class="form-container w-screen h-screen flex justify-center items-center !bg-[url('assets/images/bg.jpg')]">
    <div class="w-max bg-[#f2f8fc] rounded-2xl p-5">
        <div>Nom complet: <strong><?php echo $result['nom'] . ' ' . $result['prenom']; ?></strong></div>
        <div>Date de naissance: <strong><?php echo $result['dob'] ?></strong></div>
        <div>Adresse: <strong><?php echo $result['adresse'] ?></strong></div>
        <div>Sexe: <strong><?php echo $result['sexe'] ?></strong></div>
        <div>Parcours: <strong><?php echo $result['libelle'] ?></strong></div>

        <form action="back.php">
            <input type="submit" class="cursor-pointer rounded-lg p-2 bg-red-500" value="Retour">
        </form>
    </div>
</body>

</html>