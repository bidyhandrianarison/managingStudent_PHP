<?php
session_start();
include './database.php';

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste étudiant</title>
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="./../output.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<body>
<?php if(isset($_SESSION['login'])) {
    echo '<h1 class="font-bold text-4xl text-center">Bonjour mon ami '.$_SESSION['pseudo'].'!</h1>';
    ?>
    
    <div class="form-container !flex justify-center" >
        <form action="./add.php" class="bg-[#f2f8fc] w-1/2 rounded-2xl p-5 flex flex-col gap-5" method="post">
            <div class="name flex flex-col gap-5">
                <div>
                    <label for="lastName">Nom:</label>
                    <input type="text" name="lastName">
                </div>
                <div>
                    <label for="firstName">Prénom(s):</label>
                    <input type="text" name="firstName">
                </div>
            </div>
            <div>
                <label for="dob">Date de naissance</label>
                <input type="date" name="dob">
            </div>
            <div>
                <label for="address">Adresse</label>
                <input type="text" name="address">
            </div>

            <div>
                <label>
                    <input type="radio" name="sex" value="masculin">Masculin
                </label>
                <label>
                    <input type="radio" name="sex" value="feminin">Féminin
                </label>
            </div>
            <div>
                <label for="">Parcours</label>
                <select name="parcours" id="">
                    <option value="">Sélectionnez un parcours</option>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $lastName = $_POST['lastName'];
                        $firstName = $_POST['firstName'];
                        $dob = $_POST['dob'];
                        $address = $_POST['address'];
                        $sex = $_POST['sex'];
                        $parcours = $_POST['parcours'];
                    }
                    $sql = 'SELECT *FROM parcours ';
                    $result = $conn->query($sql);
                    $data = $result->fetchAll();

                    if (isset($data)) {
                        foreach ($data as $row) {
                            echo ' <option value="' . $row['id'] . '">' . $row['libelle'] . '</option>';
                        }
                    }
                    ?>

                </select>
            </div>
         
                <?php
                    if($_SESSION['role']=="admin")
                    { ?>
                    <div><input type="checkbox" value="admin" name="role">Marquer comme Administrateur</div>
        
                    <?php }
                    
                ?>
           
            <div class="!bg-green-300 w-max font-bold p-2 rounded-sm">
            <input type="submit" value="Ajouter">
            </div>
    </div>
    </form>
    <div>
    <?php
    include 'list.php'
    ?>
    
    </div>
</div>
  
    <form action="logout.php" method="post">
        <button type="submit" class=" !bg-red-400 p-2 rounded-lg" name="logout">Se deconnecter</button>
    </form>

</body>

</html>
<?php }
    else {
        header('Location: loginForm.php');
        exit();
    }
?>
