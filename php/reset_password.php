<?php
include './database.php';
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Vérifier le token
    $sql = 'SELECT * FROM password_reset WHERE token = ? AND expires >= ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$token, date("U")]);
    $row = $stmt->fetch();

    if ($row) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];

            if ($new_password === $confirm_password) {
                // Mettre à jour le mot de passe de l'utilisateur
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $sql = 'UPDATE login SET mdp = ? WHERE email = ?';
                $stmt = $conn->prepare($sql);
                $stmt->execute([$hashed_password, $row['email']]);

                // Supprimer le token après utilisation
                $sql = 'DELETE FROM password_reset WHERE email = ?';
                $stmt = $conn->prepare($sql);
                $stmt->execute([$row['email']]);

                echo "<p>Votre mot de passe a été réinitialisé avec succès.</p>";
                header('Location: loginForm.php');
                exit();
            } else {
                echo "<p>Les mots de passe ne correspondent pas.</p>";
            }
        }
    } else {
        echo "<p>Le lien de réinitialisation a expiré ou est invalide.</p>";
    }
} else {
    echo "<p>Token non fourni.</p>";
}
?>