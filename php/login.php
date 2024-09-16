di
<?php

session_start();
    include 'database.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $user=$_POST['identifiant'];
        $password=$_POST['password'];
    }
    $sql = 'SELECT * FROM login';
    $req=$conn->query($sql);
    $res=$req->fetchAll();
    foreach ($res as $row){
        if(($user ==$row['pseudo'] || $user==$row['email']) && $password==$row['mdp'])
        {
            $_SESSION['login']=$user;
            $_SESSION['password']=$password;
            $_SESSION['role']=$row['fonction'];
            $_SESSION["pseudo"]=$row["pseudo"];
            header('Location: index.php');
            exit();
        }
        else{
            echo "<p><strong>Votre mot de passe ou votre identifiant est invalide</strong></p>";
        }
    }

?>