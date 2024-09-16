<?php
include './database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Vérifiez si l'email existe dans la base de données
    $sql = 'SELECT * FROM login WHERE email = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Générer un token sécurisé pour la réinitialisation
        $token = bin2hex(random_bytes(50));
        $expires = date("U") + 1800; // Token expire dans 30 minutes

        // Insérer le token dans la base de données
        $sql = 'INSERT INTO password_reset (email, token, expires) VALUES (?, ?, ?)';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email, $token, $expires]);

        // Envoyer un email avec le lien de réinitialisation
        $resetLink = "http://www.studentlist.mg/php/resetMdp.php?token=" . $token;
        $subject = "Réinitialisation de votre mot de passe";
        $message = "Cliquez sur ce lien pour réinitialiser votre mot de passe : " . $resetLink;
        $headers = 'From: noreply@studentlist.mg' . "\r\n";
        mail($email, $subject, $message, $headers);

        echo "<p>Un email de réinitialisation a été envoyé à votre adresse.</p>";
    } else {
        echo "<p>Adresse email introuvable.</p>";
    }
}
?>
