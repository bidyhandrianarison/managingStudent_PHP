<?php
    include './database.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../style.css">
    <link rel="stylesheet" href="./../output.css">
    <!-- <link rel="stylesheet" href="tailwind.css"> -->
</head>
<body class="">
<div class="w-1/2">
    <h1 class="!font-extrabold text-4xl">Liste des étudiants</h1>
    <table >
        <thead>
            <td>Nom</td>
            <td>Prénom(s)</td>
            <td>Parcours</td>
            <td>Actions</td>
        </thead>
        <tbody>
            <?php
                $sql='SELECT nom, prenom,etudiant.id,sexe,libelle,adresse,dob FROM etudiant JOIN parcours ON etudiant.id_parcours= parcours.id ORDER BY etudiant.id';
                $result= $conn->query($sql);
                $data=$result->fetchAll();
                if(isset($data)){
                    foreach ($data as $row){
                        //DELETE
                        echo'<tr><td>'.$row['nom'].'</td><td>'.$row['prenom'].'</td><td>'.$row['libelle'].'</td>';
                        echo '<td class="action"><form action="delete.php" method="post"><div><input type="text" name="idStudent" hidden value="'.$row['id'].'"><button type="submit"><svg width="30px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">' ;
                        echo '<path d="M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M14 10V17M10 10V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>';
                        echo '</svg></button></div></form>';
                        //UPDATE
                        echo '<form action="updateForm.php" method="post"><div>';
                        echo '<input hidden type="text" value="'.$row['nom'].'" name="previousLastName">';
                        echo '<input hidden type="text" value="'.$row['prenom'].'" name="previousFirstName">';
                        echo '<input hidden type="text" value="'.$row['sexe'].'" name="previousSex">';
                       echo '<input hidden type="text" value="'.$row['adresse'].'" name="previousAddress">';
                       echo '<input hidden type="date" value="'.$row['dob'].'" name="previousDob">';
                       echo '<input hidden type="text" value="'.$row['libelle'].'" name="previousParcours">';
                        echo '<input hidden name="idStudent" type="text" value="'.$row['id'].'">';
                        echo '<button  type="submit"><svg width="30px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">';
                        echo '<path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>';
                        echo '<path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>';                        
                        echo '</svg></button></div></form></td>';
                        //MORE INFORMATION
                        echo '<td><form action="more.php" method="post"><div>';
                        echo '<input hidden name="idStudent" type="text" value="'.$row['id'].'">';
                        echo '<button type="submit"><svg width="30px" height="20px" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">';
                        echo '<path fill-rule="evenodd" clip-rule="evenodd" d="M0 8L3.07945 4.30466C4.29638 2.84434 6.09909 2 8 2C9.90091 2 11.7036 2.84434 12.9206 4.30466L16 8L12.9206 11.6953C11.7036 13.1557 9.90091 14 8 14C6.09909 14 4.29638 13.1557 3.07945 11.6953L0 8ZM8 11C9.65685 11 11 9.65685 11 8C11 6.34315 9.65685 5 8 5C6.34315 5 5 6.34315 5 8C5 9.65685 6.34315 11 8 11Z" fill="#000000"/>';
                        echo '</svg></button></div></form></td></tr>';
                    }
                }
            ?>
        </tbody>
    </table>
   </div>
    
</body>
</html>