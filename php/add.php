<?php
    include './database.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $lastName=$_POST['lastName'];
        $firstName=$_POST['firstName'];
        $dob=$_POST['dob'];
        $adress=$_POST['address'];
        $sex=$_POST['sex'];
        $parcours=$_POST['parcours'];
        $role=$_POST['role'];
        $response = $conn->prepare('INSERT INTO etudiant(nom,prenom,id_parcours,adresse,sexe,dob,role) VALUES(?,?,?,?,?,?)');
        $response->execute([$lastName,$firstName,$parcours,$adress,$sex,$dob]);
    }
    header('Location: index.php');
    exit();
?>