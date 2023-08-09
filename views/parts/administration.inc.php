<!-- ---===================================================================--- -->

<!-- UTILISATEURCONTROLLER -->
<!-- function enregistrer & modifier-->
<?php if(isset($_GET["prenom_manquant"])) : ?>
    <p class="erreur">Lors de la création ou la modification d'un compte, veuillez inscrire votre prenom</p>
<?php endif; ?>
<?php if(isset($_GET["nom_manquant"])) : ?>
    <p class="erreur">Lors de la création ou la modification d'un compte, veuillez inscrire votre nom</p>
<?php endif; ?>

<?php if(isset($_GET["courriel_manquant"])) : ?>
    <p class="erreur">Lors de la création ou la modification d'un compte, veuillez inscrire votre courriel</p>
<?php endif; ?>

<?php if(isset($_GET["mot_de_passe_manquant"])) : ?>
    <p class="erreur">Lors de la création ou la modification d'un compte, veuillez inscrire votre mot de passe</p>
<?php endif; ?>

<?php if(isset($_GET["confirmer_mdp_manquant"])) : ?>
    <p class="erreur">Lors de la création ou la modification d'un compte, veuillez confirmer votre mot de passe</p>
<?php endif; ?>

<?php if(isset($_GET["mdp_incorrect"])) : ?>
    <p class="erreur">Lors de la création ou la modification d'un compte, le mot de passe et sa confirmation ne correspondent pas</p>
<?php endif; ?>

<?php if(isset($_GET["echec_creation_compte"])) : ?>
    <p class="erreur">Erreur lors de la création du compte. Veuillez réessayer plus tard</p>
<?php endif; ?>

<?php if(isset($_GET["succes_creation_compte"])) : ?>
    <p class="succes">Le compte est crée</p>
<?php endif; ?>

<!-- function connecter -->
<?php if(isset($_GET["succes_connexion"])) : ?>
    <p class="succes">Succes de la connexion</p>
<?php endif; ?>

<!-- function modifier -->
<?php if(isset($_GET["echec_modification_compte"])) : ?>
    <p class="erreur">Erreur lors de la modification du compte. Veuillez réessayer plus tard</p>
<?php endif; ?>

<?php if(isset($_GET["succes_modification_compte"])) : ?>
    <p class="succes">Succes de la modification du compte</p>
<?php endif; ?>

<!-- function supprimer -->
<?php if(isset($_GET["echec_suppression_compte"])) : ?>
    <p class="erreur">Erreur lors de la suppression du compte. Veuillez réessayer plus tard</p>
<?php endif; ?>

<?php if(isset($_GET["succes_suppression_compte"])) : ?>
    <p class="succes">Succes de la suppression du compte</p>
<?php endif; ?>

<!-- MENUCONTROLLER -->
<!-- function enregistrer et modifier -->
<?php if(isset($_GET["nom_plat_manquant"])) : ?>
    <p class="erreur">Lors de la création ou la modification d'un plat, veuillez inscrire un nom</p>
<?php endif; ?>

<?php if(isset($_GET["description_manquant"])) : ?>
    <p class="erreur">Lors de la création ou la modification d'un plat, veuillez inscrire une description</p>
<?php endif; ?>

<?php if(isset($_GET["prix_manquant"])) : ?>
    <p class="erreur">Lors de la création ou la modification d'un plat, veuillez inscrire un prix et/ou la nomenclature demandée</p>
<?php endif; ?>

<?php if(isset($_GET["echec_creation_plat"])) : ?>
    <p class="erreur">Erreur lors de la création du plat. Veuillez réessayer plus tard</p>
<?php endif; ?>

<?php if(isset($_GET["succes_creation_plat"])) : ?>
    <p class="succes">Le plat est crée</p>
<?php endif; ?>

<!-- function modifier -->
<?php if(isset($_GET["echec_modification_plat"])) : ?>
    <p class="erreur">Erreur lors de la modification du plat. Veuillez réessayer plus tard</p>
<?php endif; ?>

<?php if(isset($_GET["succes_modification_plat"])) : ?>
    <p class="succes">Succes de la modification du plat</p>
<?php endif; ?>

<!-- function supprimer -->
<?php if(isset($_GET["echec_suppression_plat"])) : ?>
    <p class="erreur">Erreur lors de la suppression du plat. Veuillez réessayer plus tard</p>
<?php endif; ?>

<?php if(isset($_GET["succes_suppression_plat"])) : ?>
    <p class="succes">Succes de la suppression du plat</p>
<?php endif; ?>

<!-- function enregistrerCategorie & modifierCategorie -->
<?php if(isset($_GET["nom_categorie_manquant"])) : ?>
    <p class="erreur">Lors de la création ou la modification d'une catégorie, veuillez inscrire un nom</p>
<?php endif; ?>

<?php if(isset($_GET["echec_creation_categorie"])) : ?>
    <p class="erreur">Erreur lors de la création de la catégorie. Veuillez réessayer plus tard</p>
<?php endif; ?>

<?php if(isset($_GET["succes_creation_categorie"])) : ?>
    <p class="succes">La catégorie est crée</p>
<?php endif; ?>

<!-- function modifier -->
<?php if(isset($_GET["echec_modification_categorie"])) : ?>
    <p class="erreur">Erreur lors de la modification de la catégorie. Veuillez réessayer plus tard</p>
<?php endif; ?>

<?php if(isset($_GET["succes_modification_categorie"])) : ?>
    <p class="succes">La catégorie est modifié</p>
<?php endif; ?>

<!-- function supprimerCategorie -->
<?php if(isset($_GET["echec_suppression_categorie"])) : ?>
    <p class="erreur">Erreur lors de la suppression de la catégorie. Veuillez réessayer plus tard</p>
<?php endif; ?>

<?php if(isset($_GET["succes_suppression_categorie"])) : ?>
    <p class="succes">Succes de la suppression de la catégorie</p>
<?php endif; ?>

<!-- VALIDATION LONGUEUR STRING  -->
<?php if(isset($_GET["150"])) : ?>
    <p class="erreur">L'entrée doit contenir au maximum 150 caractères</p>
<?php endif; ?>

<?php if(isset($_GET["255"])) : ?>
    <p class="erreur">L'entrée doit contenir au maximum 255 caractères</p>
<?php endif; ?>


<!-- ---===================================================================--- -->