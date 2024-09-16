<?php
include 'database.php'; // Inclure le fichier de connexion à la base de données
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mot de passe oublié</title>
    <link rel="stylesheet" href="../output.css">
</head>
<body>
    <h2 class="font-medium text-2xl">Réinitialiser votre mot de passe</h2>
    <form action="mdpForgotten.php" class="flex flex-col gap-2" method="post">
       <div>
       <label for="email" >Email :</label>
       <input type="email" name="email" class="!bg-slate-400" required>
       </div>
        <button type="submit" class="bg-red-500 p-2 font-bold w-max rounded-lg">Envoyer</button>
    </form>
</body>
</html>