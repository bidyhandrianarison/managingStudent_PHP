<?php
    include './database.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $lastName=$_POST['lastName'];
        $firstName=$_POST['firstName'];
        $dob=$_POST['dob'];
        $address=$_POST['address'];
        $sex=$_POST['sex'];
        $parcours=$_POST['parcours'];

        $response = $conn->prepare('INSERT INTO etudiant(nom,prenom,id_parcours) VALUES(?,?,?)');
        $response->execute([$lastName,$firstName,$parcours]);
    }
?>