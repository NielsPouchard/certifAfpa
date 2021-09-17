<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/user.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
<!-- HEADER START -->
<?php
include __DIR__."/part/header.php";
?>
<!-- HEADER END -->

<!-- Formulaire d'inscription -->

<div class="main">
    <div class="register">
        <div class="connected_people">
            <p>Avec Fakebook, partagez et restez en contact avec votre entourage.</p>
            <img src="https://pngimage.net/wp-content/uploads/2018/05/connecting-people-png-8.png" alt="">
        </div>

        <div class="inscritpion">
            <h1>Inscription</h1>
            <p>C'est gratuit (et ça le restera toujours)</p>
            <form action="/register" method="POST">
                <input type="text" name="name" placeholder="prénom*" autocomplete="">
                <input type="text" name="surname" placeholder="Nom*" autocomplete="">
                <input type="email" name="email" placeholder="email*" autocomplete="">
                <input type="password" name="mdp" placeholder="Mot de passe*">
                <input type="password" name="confirmMdp" placeholder="Confirmation mot de passe*">
                <input type="text" name="pseudo" placeholder="pseudo*" autocomplete="">
                <input type="submit" name="submit" placeholder="Inscription" id="inscription">
            </form>
        </div>
    </div>
</div>

</body>
</html>
