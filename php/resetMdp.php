<?php
if (isset($_GET['token'])) {
    $token = $_GET['token'];
} else {
    echo "<p>Token non fourni.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialiser le mot de passe</title>
</head>
<body>
    <h2>Nouveau mot de passe</h2>
    <form action="reset_password.php?token=<?php echo $token; ?>" method="post">
        <label for="new_password">Nouveau mot de passe:</label>
        <input type="password" name="new_password" required>
        <label for="confirm_password">Confirmer le mot de passe:</label>
        <input type="password" name="confirm_password" required>
        <input type="submit" value="Réinitialiser le mot de passe">
    </form>
</body>
</html>