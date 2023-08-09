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
    <?php include("views/parts/administration.inc.php"); ?>
</head>
<body>
    
    <div id="app">

        <div class="deconnexion">
            <a href="deconnecter">Déconnexion</a>
        </div>

        <img class="logo" src="public/img/logo.png" alt="pub g4" style="max-width: 250px">

        <h1>Section administrative</h1>

        <?php if($_SESSION["utilisateur_id"] == "1") : ?>

            <h2>Création d'un nouveau compte employé</h2>

            <section class="conteneurmodification">

                <form action="compte-enregistrer" method="POST" enctype="multipart/form-data" class="conteneur administrateur">
                    <p>Prénom:</p>
                    <p style="font-size: 10px; color: red;">Le prénom ne peut contenir que 150 caractères</p>
                    <input type="text" name="prenom" placeholder="Prénom" required>
                    <p>Nom:</p>
                    <p style="font-size: 10px; color: red;">Le nom ne peut contenir que 150 caractères</p>
                    <input type="text" name="nom" placeholder="Nom" required>
                    <p>Courriel:</p>
                    <p style="font-size: 10px; color: red;">Le courriel ne peut contenir que 255 caractères</p>
                    <input type="email" name="courriel" size="30" placeholder="Courriel" required>
                    <p>Mot de passe:</p>
                    <p style="font-size: 10px; color: red;">Le mot de passe ne peut contenir que 255 caractères</p>
                    <input type="password" name="mot_de_passe" size="35" placeholder="Mot de passe" required>
                    <p>Confirmation du mot de passe</p>
                    <input type="password" name="confirmer_mdp" size="35" placeholder="Confirmer le mot de passe" required><br>
                    <input class="btn" type="submit" value="Créer votre compte">
                </form>
            </section>

            <h2>Modification des employés</h2>

            <section class="conteneurmodification">

                <button @click="btCliqueUtilisateur()" class="btn">Voir les employés</button>

                <div v-if="utilisateur">     

                    <?php foreach($utilisateurs as $utilisateur) : ?>

                        <form action="utilisateur-modifier" method="POST" class="conteneur administrateur">

                            <div>
                                <input type="hidden" value="<?= $utilisateur->id ?>" name="id">
                                <label>Prénom de l'employé:</label><br>
                                <p style="font-size: 10px; color: red;">Le prénom ne peut contenir que 150 caractères</p>
                                <input type="text" name="prenom" value="<?= $utilisateur->prenom_utilisateur ?>" required>
                            </div>

                            <div>
                                <label>Nom de l'employé:</label><br>
                                <p style="font-size: 10px; color: red;">Le nom ne peut contenir que 150 caractères</p>
                                <input type="text" name="nom" value="<?= $utilisateur->nom_utilisateur ?>" required>
                            </div>

                            <div>
                                <label>Courriel:</label> <br>
                                <input type="courriel" name="courriel" size="30" value="<?= $utilisateur->courriel ?>" required>
                                <p style="font-size: 10px; color: red;">Le courriel ne peut contenir que 255 caractères</p>
                            </div>

                            <input type="submit" value="Modifier" class="btn">

                            <?php if($utilisateur->id !== "1") : ?>
                                <a class="suppression" href="utilisateur-supprimer?id=<?= $utilisateur->id ?>">Supprimer l'employé</a>
                            <?php endif; ?>
                        </form>

                        <form action="utilisateur-modifier-mdp" method="POST" class="conteneur administrateur modificationutilisateur">

                            <div>
                                <input type="hidden" value="<?= $utilisateur->id ?>" name="id">
                                <label>Mot de passe:</label> <br>
                                <p style="font-size: 10px; color: red;">Le mot de passe ne peut contenir que 255 caractères</p>
                                <input type="text" name="mot_de_passe" size="35" value="" required>
                            </div>

                            <div>
                                <label>Confirmation du mot de passe:</label> <br>
                                <input type="text" name="confirmer_mdp" size="35">
                            </div>

                            <input type="submit" value="Modifier" class="btn">
                        </form>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

        <h2>Ajoutez un item au menu</h2>
        
        <div class="conteneurmodification">

            <form action="plat-enregistrer" method="POST" enctype="multipart/form-data" class="conteneur employes">

                <label>
                    <p>Nom de l'item du menu:</p>
                    <p style="font-size: 10px; color: red;">Le titre ne peut contenir que 255 caractères</p>
                    <input type="text" name="nom_plat" class="titre" required>
                </label>

                <label>
                    <p>Description:</p>
                    <textarea name="description" cols="40" rows="5" required></textarea>
                </label>

                <label>
                    <p>Prix:</p>
                    <input type="text" name="prix" size="10" class="prix" required>$
                </label>

                <p>
                    <label for="categorie_id">Catégories:</label>
                </p>

                <select name="categorie_id">
                    <?php foreach($categories as $categorie) : ?>
                        <option value="<?= $categorie->id ?>"><?= $categorie->nom_categorie ?></option>
                    <?php endforeach; ?>
                </select>

                <p>
                    <label for="vegetarien_id">Es-ce un repas végétarien?:</label>
                </p>

                <select name="vegetarien_id">
                    <?php foreach($vegetariens as $vegetarien) : ?>
                        <option value="<?= $vegetarien->id ?>"><?= $vegetarien->bool ?></option>
                    <?php endforeach; ?>
                </select>

                <div class="conteneur_bouton">

                    <input type="submit" value="Soumettre la publication" class="btn">
                </div>
            </form>
        </div>

        <h2>Modifier un item au menu</h2>

        <div class="conteneurmodification">

            <h3>Les entrées</h3>

            <button @click="btCliqueEntree()" class="btn">Voir les entrées</button>

            <div v-if="menu_entree">

                <?php foreach($plats as $plat) : ?>

                    <?php if($plat->categorie_id == "1") : ?>

                        <form action="plat-modifier" method="POST" class="conteneur employes">

                            <div>
                                <input type="hidden" value="<?= $plat->id ?>" name="plat_id">
                                <label>Nom de l'item du menu:</label><br>
                                <p style="font-size: 10px; color: red;">Le titre ne peut contenir que 255 caractères</p>
                                <input type="text" name="nom_plat" value="<?= $plat->nom_plat ?>" required>
                            </div>

                            <div>
                                <label><div>Description:</div>
                                    <textarea name="description" cols="40" rows="5" required><?= $plat->description ?></textarea>
                                </label>
                            </div>

                            <div>
                                <label>Prix:</label> <br>
                                <input type="text" name="prix" value="<?= $plat->prix ?>" required>
                            </div>

                            <div>
                                <label for="nom_categorie">Catégories:</label> <br>

                                <select name="categorie_id">
                                    <?php foreach($categories as $categorie) : ?>
                                        <option value="<?= $categorie->id ?>"
                                        <?php if($categorie->id == $plat->categorie_id){
                                            echo "SELECTED";
                                        } ?>
                                        ><?= $categorie->nom_categorie ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div>
                                <label for="vegetarien_id">Es-ce un repas Végétarien?:</label> <br>

                                <select name="vegetarien_id">
                                    <?php foreach($vegetariens as $vegetarien) : ?>
                                        <option value="<?= $vegetarien->id ?>"
                                        <?php if($vegetarien->id == $plat->vegetarien_id){
                                            echo "SELECTED";
                                        } ?>
                                        ><?= $vegetarien->bool ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <input type="submit" value="Modifier" class="btn">
                            
                            <a class="suppression" href="plat-supprimer?id=<?= $plat->id ?>">Supprimer l'item du menu</a>

                        </form>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="conteneurmodification">

            <h3>Les repas</h3>

            <button @click="btCliqueRepas()" class="btn">Voir les repas</button>

            <div v-if="menu_repas">

                <?php foreach($plats as $plat) : ?>

                    <?php if($plat->categorie_id == "2") : ?>

                        <form action="plat-modifier" method="POST" class="conteneur employes">

                            <div>
                                <input type="hidden" value="<?= $plat->id ?>" name="plat_id">
                                <label>Nom de l'item du menu:</label><br>
                                <p style="font-size: 10px; color: red;">Le titre ne peut contenir que 255 caractères</p>
                                <input type="text" name="nom_plat" value="<?= $plat->nom_plat ?>" required>
                            </div>

                            <div>
                                <label><div>Description:</div>
                                    <textarea name="description" cols="40" rows="5" required><?= $plat->description ?></textarea>
                                </label>
                            </div>

                            <div>
                                <label>Prix:</label> <br>
                                <input type="text" name="prix" value="<?= $plat->prix ?>" required>
                            </div>

                            <div>
                                <label for="nom_categorie">Catégories:</label> <br>

                                <select name="categorie_id">
                                    <?php foreach($categories as $categorie) : ?>
                                        <option value="<?= $categorie->id ?>"
                    
                                        <?php if($categorie->id == $plat->categorie_id){
                                            echo "SELECTED";
                                        } ?>
                    
                                        ><?= $categorie->nom_categorie ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div>
                                <label for="vegetarien_id">Es-ce un repas Végétarien?:</label> <br>

                                <select name="vegetarien_id">
                                    <?php foreach($vegetariens as $vegetarien) : ?>
                                        <option value="<?= $vegetarien->id ?>"
                    
                                        <?php if($vegetarien->id == $plat->vegetarien_id){
                                            echo "SELECTED";
                                        } ?>
                    
                                        ><?= $vegetarien->bool ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <input type="submit" value="Modifier" class="btn">

                            <a class="suppression" href="plat-supprimer?id=<?= $plat->id ?>">Supprimer l'item du menu</a>

                        </form>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="conteneurmodification">

            <h3>Les desserts</h3>

            <button @click="btCliqueDessert()" class="btn">Voir les desserts</button>

            <div v-if="menu_dessert">

                <?php foreach($plats as $plat) : ?>

                    <?php if($plat->categorie_id == "3") : ?>

                        <form action="plat-modifier" method="POST" class="conteneur employes">

                            <div>
                                <input type="hidden" value="<?= $plat->id ?>" name="plat_id">
                                <label>Nom de l'item du menu:</label><br>
                                <p style="font-size: 10px; color: red;">Le titre ne peut contenir que 255 caractères</p>
                                <input type="text" name="nom_plat" value="<?= $plat->nom_plat ?>" required>
                            </div>

                            <div>
                                <label><div>Description:</div>
                                    <textarea name="description" cols="40" rows="5" required><?= $plat->description ?></textarea>
                                </label>
                            </div>

                            <div>
                                <label>Prix:</label> <br>
                                <input type="text" name="prix" value="<?= $plat->prix ?>" required>
                            </div>

                            <div>
                                <label for="nom_categorie">Catégories:</label> <br>

                                <select name="categorie_id">
                                    <?php foreach($categories as $categorie) : ?>
                                        <option value="<?= $categorie->id ?>"
                    
                                        <?php if($categorie->id == $plat->categorie_id){
                                            echo "SELECTED";
                                        } ?>
                    
                                        ><?= $categorie->nom_categorie ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div>
                                <label for="vegetarien_id">Es-ce un repas Végétarien?:</label> <br>

                                <select name="vegetarien_id">
                                    <?php foreach($vegetariens as $vegetarien) : ?>
                                        <option value="<?= $vegetarien->id ?>"
                    
                                        <?php if($vegetarien->id == $plat->vegetarien_id){
                                            echo "SELECTED";
                                        } ?>
                    
                                        ><?= $vegetarien->bool ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <input type="submit" value="Modifier" class="btn">

                            <a class="suppression" href="plat-supprimer?id=<?= $plat->id ?>">Supprimer l'item du menu</a>

                        </form>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <h2>Section des catégories</h2>

        <h3>Ajouter une catégorie</h3>

        <div class="conteneurmodification">

            <form action="categorie-enregistrer" method="POST" enctype="multipart/form-data" class="conteneur employes">

                <label>
                    <p>Nom de la nouvelle catégorie:</p>
                    <p style="font-size: 10px; color: red;">Le nom de la catégorie ne peut contenir que 150 caractères</p>
                    <input type="text" name="nom_categorie" class="titre" required>
                </label><br>

                <input type="submit" value="Soumettre la nouvelle catégorie" class="btn">
            </form>
        </div>

        <h3>Modifier une catégorie</h3>

        <button @click="btCliqueCategorie()" class="btn">Voir les catégories</button>

        <div v-if="categorie">

            <div class="conteneurmodification">

                <?php foreach($categories as $categorie) : ?>

                    <form action="categorie-modifier" method="POST" class="conteneur employes">

                        <div>
                            <input type="hidden" value="<?= $categorie->id ?>" name="id">

                            <label>Nom de la catégorie:</label><br>
                            <p style="font-size: 10px; color: red;">Le nom de la catégorie ne peut contenir que 150 caractères</p>
                            <input type="text" name="nom_categorie" value="<?= $categorie->nom_categorie ?>" required>
                        </div>

                        <input type="submit" value="Modifier" class="btn">

                        <?php if($categorie->id !== "1" && $categorie->id !== "2" && $categorie->id !== "3") : ?>

                            <a class="suppression" href="categorie-supprimer?id=<?= $categorie->id ?>">Supprimer la catégorie</a>

                        <?php endif; ?>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="deconnexion">
            
            <a href="deconnecter">Déconnexion</a>
        </div>

    </div>

    <script src="public/js/main.js" type="module"></script>
</body>
