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
    <!-- Inclusion des erreurs -->
    <?php include("views/parts/index.inc.php"); ?>
</head>
<body>

    <div id="app">

        <div class="interface">

            <?php include("views/parts/header.inc.php"); ?>

            <main>

                <h1 style="display:none;">Accueil</h1>

                <?php include("views/parts/banniere.inc.php"); ?>

                <section class="infolettre">

                    <img class="infolettre" src="public/img/image_infolettre.jpg" alt="Pub G4" style="max-width: 788px">

                    <div class="conteneur_infolettre">

                        <h2>infolettre</h2>

                        <p>entrer votre nom et courriel pour garder le contact!</p>

                        <div class="formulaire">

                            <form action="client-enregistrer" method="POST" enctype="multipart/form-data">
                                <input class="input_formulaire" type="text" name="nom" placeholder="Nom" required> <br> 
                                <input class="input_formulaire" type="text" name="courriel" placeholder="Courriel" required> <br>
                                <input class="bouton_soumettre" type="submit" value="S'inscrire">
                            </form>
                        </div>
                    </div>
                </section>

                <section class="menu" id="menu">

                    <div class="conteneur_titre">

                        <h2>le menu</h2>
                        <hr>
                    </div>

                    <div class="banniere_menu entree">

                        <h3 id="entree">les 

                            <?php foreach($categories as $categorie) : ?>
                                <?php if($categorie->id == "1") : ?>
                                    <?= $categorie->nom_categorie?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </h3>
                    </div>

                    <div class="le_menu">
                    
                        <?php foreach($plats as $plat) : ?>

                            <?php if($plat->categorie_id == "1") : ?>

                                <article class="article_menu">

                                    <div class="repas_prix">

                                        <div>

                                            <h4><?= $plat->nom_plat ?></h4>

                                            <?php if($plat->vegetarien_id == "1") : ?>
                                                <img src="public/img/vegetarien.png" alt="logo végétarien" style="max-height: 20px">
                                            <?php endif; ?>
                                        </div>

                                        <p><?= $plat->prix?></p>
                                    </div>

                                    <p><?= $plat->description ?></p>

                                </article>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="banniere_menu repas">

                        <h3 id="repas">les

                            <?php foreach($categories as $categorie) : ?>
                                <?php if($categorie->id == "2") : ?>
                                    <?= $categorie->nom_categorie ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </h3>
                    </div>

                    <div class="le_menu">
                    
                        <?php foreach($plats as $plat) : ?>

                            <?php if($plat->categorie_id == "2") : ?>

                                <article class="article_menu">

                                    <div class="repas_prix">

                                        <div>

                                            <h4><?= $plat->nom_plat ?></h4>

                                            <?php if($plat->vegetarien_id == "1") : ?>
                                                <img src="public/img/vegetarien.png" alt="logo végétarien" style="max-height: 20px">
                                            <?php endif; ?>
                                        </div>

                                        <p><?= $plat->prix?></p>

                                    </div>

                                    <p><?= $plat->description ?></p>
                                </article>
                            <?php endif; ?>    
                        <?php endforeach; ?>
                    </div>

                    <div class="banniere_menu dessert">

                        <h3 id="dessert">les

                            <?php foreach($categories as $categorie) : ?>
                                <?php if($categorie->id == "3") : ?>
                                    <?= $categorie->nom_categorie ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </h3>
                    </div>

                    <div class="le_menu">
                    
                        <?php foreach($plats as $plat) : ?>

                            <?php if($plat->categorie_id == "3") : ?>

                                <article class="article_menu">

                                    <div class="repas_prix">

                                        <div>

                                            <h4><?= $plat->nom_plat ?></h4>

                                            <?php if($plat->vegetarien_id == "1") : ?>
                                                <img src="public/img/vegetarien.png" alt="logo végétarien" style="max-height: 20px">
                                            <?php endif; ?>
                                        </div>

                                        <p><?= $plat->prix?></p>

                                    </div>

                                    <p><?= $plat->description ?></p>

                                </article>
                            <?php endif; ?>       
                        <?php endforeach; ?>
                    </div>
                </section>

                <?php include("views/parts/commentaires.inc.php"); ?>

                <?php include("views/parts/nousjoindre.inc.php"); ?>

            </main>

            <?php include("views/parts/footer.inc.php"); ?>
            
        </div>
    </div>

    <script src="public/js/main.js" type="module"></script>
    
</body>
</html>