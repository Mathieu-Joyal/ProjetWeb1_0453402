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
</head>
<body>

    <div id="app">

        <div class="interface">

            <?php include("views/parts/header.inc.php"); ?>

            <main>

                <h1 style="display:none;">à propos</h1>

                <?php include("views/parts/banniere.inc.php"); ?>

                <section class="presentation">

                    <div class="conteneur_titre">

                        <h2>présentation de l'entreprise</h2>
                        <hr>
                    </div>

                    <div class="banniere_menu presentation"> 

                    </div>

                    <div class="conteneur_texte">

                        <p>Bienvenue au Pub G4 - votre destination ultime pour une expérience culinaire inoubliable dans une ambiance chaleureuse et conviviale. Situé au cœur de la ville, notre restaurant pub vous offre une variété de délices gastronomiques qui satisferont tous les palais. Que vous soyez un amateur de salades, de nachos, de poutines, de burgers, de frites, de brownies ou bien d'autres mets appétissants, notre menu diversifié saura combler toutes vos envies. Lorsque vous franchissez les portes du Pub G4, vous serez immédiatement accueilli par une atmosphère vibrante et animée. Nos clients réguliers et notre personnel chaleureux créent une ambiance familiale où vous vous sentirez instantanément à l'aise. Que vous soyez seul, en couple ou en groupe d'amis, vous trouverez toujours une place qui vous convient, que ce soit au bar animé ou dans l'une de nos tables confortables. Notre personnel dévoué est l'une des clés de notre succès. Nos serveurs et serveuses attentionnés se feront un plaisir de vous guider à travers notre menu et de vous recommander les plats qui correspondent le mieux à vos goûts et à vos préférences. Leur connaissance approfondie des ingrédients et leur passion pour la cuisine vous garantissent une expérience culinaire exceptionnelle à chaque visite.</p>
                        <p>Notre menu est une véritable célébration de la cuisine pub. Commencez votre repas en savourant nos délicieuses salades, fraîches et croquantes, garnies d'une variété d'ingrédients savoureux. Puis, laissez-vous tenter par nos nachos croustillants et généreusement garnis de fromage fondu, de salsa et de guacamole. Si vous recherchez une expérience culinaire typiquement québécoise, ne manquez pas notre poutine traditionnelle, qui associe des frites dorées, du fromage en grains fondant et une délicieuse sauce brune. Pour les amateurs de burgers, nous avons une sélection variée de créations uniques, préparées avec des ingrédients frais et de qualité. Que vous optiez pour un burger classique avec tous les accompagnements traditionnels, ou pour une option plus audacieuse avec des ingrédients gourmands, nous avons ce qu'il vous faut. Accompagnez votre repas de nos frites croustillantes, parfaitement assaisonnées, et préparez-vous à une explosion de saveurs. Et bien sûr, comment pourrions-nous oublier le dessert ? Nos brownies fondants et riches en chocolat sont une véritable tentation pour les amateurs de sucreries. Accompagnés d'une boule de glace à la vanille, ils sont la conclusion parfaite pour un repas mémorable. Au Pub G4, nous croyons fermement que l'ambiance et le personnel sont des éléments essentiels pour offrir une expérience culinaire exceptionnelle. Nous nous efforçons de créer un environnement accueillant et amical où vous pourrez profiter de délicieux plats, tout en vous sentant comme chez vous. Venez nous rendre visite et découvrez par vous-même pourquoi le Pub G4 est le lieu de rendez-vous incontournable pour les amoureux de la bonne nourriture et de la convivialité</p>
                    </div>

                    <div class="centrer_bouton">

                        <a href="a-propos#nousjoindre">nous joindre</a>

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