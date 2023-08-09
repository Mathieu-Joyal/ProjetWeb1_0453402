<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pub G4</title>
    <!-- Reset de mon css -->
    <link rel="stylesheet" href="public/css/reset.css">
    <!-- Les polices de caractères ADOBE -->
    <link rel="stylesheet" href="https://use.typekit.net/cba0dsj.css">
    <!-- Les polices de caractères GOOGLE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,700;1,600&family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Style css -->
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/style_admin.css">
    <!-- Inclusion des erreurs -->
    <?php include("views/parts/connexion.inc.php"); ?>
</head>
<body>

    <img class="logo" src="public/img/logo.png" alt="pub g4" style="max-width: 250px">

    <h1>Veuillez vous connecter</h1>
        
    <section class="conteneurmodification">

        <form action="connecter" method="POST" class="conteneur employes">

            <p>Courriel:</p>
            <input type="email" name="courriel" placeholder="Courriel" autofocus>
            <p>Mot de passe:</p>
            <input type="password" name="mot_de_passe" placeholder="Mot de passe">
            <input class="bouton_soumettre" type="submit" value="Envoyer"> 
        </form>
    </section>

    <div class="admin">

        <a href="index">Retour à Pub G4</a>

    </div>
</body>