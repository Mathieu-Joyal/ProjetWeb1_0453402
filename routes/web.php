<?php

$routes = [
    
    // Traitement de la redirection à la page de l'index 
    "index" => ["RedirectionController", "index"],
    // Traitement de la redirection à la page présentation (à propos) 
    "a-propos" => ["RedirectionController", "aPropos"],
    // Traitement de la redirection à la page de connexion 
    "connexion" => ["RedirectionController", "connexion"],
    // Traitement de la redirection à la page d'administration 
    "administration" => ["RedirectionController", "administration"],

    // Traitement de la création d'un compte 
    "compte-enregistrer" => ["UtilisateurController", "enregistrer"],
    // Traitement de la connexion 
    "connecter" => ["UtilisateurController", "connecter"],
    // Traitement de la modification de L'utilisateur 
    "utilisateur-modifier" => ["UtilisateurController", "modifier"],
    // Traitement de la modification du mot de passe de l'utilisateur 
    "utilisateur-modifier-mdp" => ["UtilisateurController", "modifierMDP"],
    // Traitement de la suppression d'un utilisateur 
    "utilisateur-supprimer" => ["UtilisateurController", "supprimer"],
    // Traitement de la déconnexion 
    "deconnecter" => ["UtilisateurController", "deconnecter"],

    // Traitement de l'ajout d'un item du menu 
    "plat-enregistrer" => ["PlatController", "enregistrer"],
    // Traitement de la modification d'un item du menu 
    "plat-modifier" => ["PlatController", "modifier"],
    // Traitement de la suppression de l'item du menu choisit 
    "plat-supprimer" => ["PlatController", "supprimer"],

    // Traitement de l'ajout d'une catégorie 
    "categorie-enregistrer" => ["CategorieController", "enregistrer"],
    // Traitement de la modification d'une catégorie
    "categorie-modifier" => ["CategorieController", "modifier"],
    // Traitement de la supression de la catégorie choisie
    "categorie-supprimer" => ["CategorieController", "supprimer"],

    // Traitement de la création d'un compte client (infolettre)
    "client-enregistrer" => ["ClientController", "enregistrer"],

];