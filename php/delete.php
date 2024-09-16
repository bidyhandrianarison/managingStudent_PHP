
<?php
    include './database.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        ?>
        <div>
            <div>Êtes-vous vraiment sûre de supprimer ces informations ?</div>
            <form>
                <button>OUI</button>
                <button>NON</button>
            </form>
        </div>
        <?php
        $idStudent=$_POST['idStudent'];

        $response = $conn->prepare('DELETE FROM etudiant WHERE etudiant.id= ?');
        $response->execute([$idStudent]);
    }
    header('Location: index.php');
    exit();
?>