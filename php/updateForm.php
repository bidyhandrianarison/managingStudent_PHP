<?php
    // Traitement du formulaire si tous les champs sont remplis
    include './database.php';

    // Vérifiez si les clés POST existent avant de les assigner
    $previousName = isset($_POST['previousLastName']) ? $_POST['previousLastName'] : '';
    $previousFirstName = isset($_POST['previousFirstName']) ? $_POST['previousFirstName'] : '';
    $previousSex = isset($_POST['previousSex']) ? $_POST['previousSex'] : '';
    $previousParcours = isset($_POST['previousParcours']) ? $_POST['previousParcours'] : '';
    $previousAddress = isset($_POST['previousAddress']) ? $_POST['previousAddress'] : ''; // Ajoutez cette ligne si l'adresse est utilisée
    $idStudent= isset($_POST['idStudent']) ? $_POST['idStudent'] : ''; // Ajoutez cette ligne si l'adresse est utilisée
    $req='SELECT * FROM etudiant JOIN parcours ON id_parcours=parcours.id  WHERE etudiant.id=?';
    $rep=$conn->prepare($req);
    $rep->execute([$idStudent]);
    $res=$rep->fetch();
?>
<form action="./update.php" method="post">
    <div>
        <label for="lastName">Nom:</label>
        <input type="text" name="lastName" value='<?php echo $res['nom'] ; ?>'>
    </div>
    <div>
        <label for="firstName">Prénom(s):</label>
        <input type="text" name="firstName" value='<?php echo $res['prenom']; ?>'>
    </div>
    <div>
        <label for="dob">Date de naissance</label>
        <input type="date" name="dob" value='<?php echo $res['dob']; ?>'>
    </div>
    <div>
        <label for="address">Adresse: </label>
        <input type="text" name="address" value='<?php echo $res['adresse']; ?>'>
    </div>
    
    <label>
        <input type="radio" name="sex" value="masculin" <?php if ($previousSex == 'masculin') echo 'checked'; ?>>Masculin
    </label>
    <label>
        <input type="radio" name="sex" value="feminin" <?php if ($previousSex == 'feminin') echo 'checked'; ?>>Féminin
    </label>
    <input type="text" hidden name="idStudent" value="<?php echo $idStudent; ?>">
    
    <div>
        <label for="parcours">Parcours</label>
        <select name="parcours">
            <option value="">Sélectionnez un parcours</option>
            <?php
            $sql = 'SELECT * FROM parcours';
            $result = $conn->query($sql);
            $data = $result->fetchAll();

            if (isset($data)) {
                foreach ($data as $row) {
                    echo '<option value="' . $row['id'] . '" ' . ($row['libelle'] == $previousParcours ? 'selected' : '') . '>' . $row['libelle'] . '</option>';
                }
            }
            ?>    
        </select>
    </div>
    <input type="submit" value="Modifier">
    <form action="back.php">
        <input type="submit" value="Retour">
    </form>
</form>
