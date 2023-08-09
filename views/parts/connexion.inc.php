<!-- ---===================================================================--- -->

<!-- function connecter -->
<?php if(isset($_GET["courriel_manquant"])) : ?>
    <p class="erreur">Veuillez inscrire votre courriel</p>
<?php endif; ?>
<?php if(isset($_GET["mot_de_passe_manquant"])) : ?>
    <p class="erreur">Veuillez inscrire votre mot de passe</p>
<?php endif; ?>
<?php if(isset($_GET["infos_invalides"])) : ?>
    <p class="erreur">Les informations fournies sont invalides</p>
<?php endif; ?>

<!-- function déconnecter -->
<?php if(isset($_GET["succes_deconnexion_compte"])) : ?>
    <p class="succes">Succes de la déconnexion du compte</p>
<?php endif; ?>


<!-- ---===================================================================--- -->