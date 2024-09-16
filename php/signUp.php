<?php
    include 'database.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $username=$_POST['username'];
        $email = $_POST['email'];
        $password=$_POST['password'];
        $role=$_POST['role'];
    }
    $sql='INSERT INTO login(pseudo,email,mdp,fonction) VALUES(?,?,?,?)';
    $reponse= $conn->prepare($sql);
    $reponse->execute([$username,$email,$password,$role]);

    header('Location: loginForm.php');
    exit();
?>