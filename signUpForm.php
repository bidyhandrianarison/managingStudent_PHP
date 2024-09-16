<?php
    include './php/database.php';
?>
<!-- <link rel="stylesheet" href="./css/login.css"> -->
<link rel="stylesheet" href="./output.css">
<div class="form-container w-screen h-screen flex justify-center items-center !bg-[url('assets/images/bg.jpg')]">
<form action="./php/signUp.php" class="bg-[#f2f8fc] rounded-2xl p-5 flex flex-col gap-5" method="post">
    <div class="font-bold">INSCRIPTION</div>    
<div>
        <label for="username">Pseudo</label>
        <input type="text" name="username">
    </div>
    <div>
        <label for="email">Email: </label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label for="password">Mot de passe: </label>
        <input type="password" name="password">
    </div>
    <div>
                <label>
                    <input type="radio" name="role" value="admin">Administrateur                </label>
                <label>
                    <input type="radio" name="role" value="user">Utilisateur simple
                </label>
            </div>
    <div class="!bg-red-500 !text-extrabold w-max p-2 rounded-lg ">
        <input type="submit" value="S'inscrire" class="cursor-pointer">
    </div>
    <div>Vous avez déjà un compte ? <a href="./php/loginForm.php" class="!font-extrabold" >Connectez-vous</a></div>
</form>
</div>