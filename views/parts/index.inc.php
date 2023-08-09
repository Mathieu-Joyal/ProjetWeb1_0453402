<!-- ---===================================================================--- -->

<!-- MENU CONTROLLER -->
<!-- function enregistrer -->
<?php if(isset($_GET["nom_manquant"])) : ?>
    <p class="erreur">Veuillez inscrire votre nom</p>
<?php endif; ?>

<!-- CLIENT CONTROLLER -->
<!-- function enregistrer -->
<?php if(isset($_GET["nom_manquant_client"])) : ?>
    <p class="erreur">Veuillez inscrire votre nom</p>
<?php endif; ?>

<?php if(isset($_GET["courriel_manquant"])) : ?>
    <p class="erreur">Veuillez inscrire votre courriel</p>
<?php endif; ?>

<?php if(isset($_GET["echec_ajout_client"])) : ?>
    <p class="erreur">Erreur lors de votre ajour à l'infolettre. Veuillez réessayer plus tard</p>
<?php endif; ?>

<?php if(isset($_GET["succes_ajout_client"])) : ?>
    <p class="succes">Vous êtes maintenant ajouté à l'infolettre!</p>
<?php endif; ?>



<!-- ---===================================================================--- -->