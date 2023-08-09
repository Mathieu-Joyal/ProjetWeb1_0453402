<?php

namespace Controller;

use Base\Controller;
use Model\PlatCategorie;

class CategorieController extends Controller {

    /**
     * Fonction pour enregistrer une catégorie
     * Redirection
     */
    public function enregistrer() {

        // Protection de la route
        if(empty($_SESSION["utilisateur_id"]) == true) {
            header("location: connexion");
            exit();
        }

        // Validation des paramètres POST
        if(empty($_POST["nom_categorie"])){
            header("location: administration?nom_categorie_manquant");
            exit();
        }
        if(strlen($_POST["nom_categorie"]) > 150){
            header("location: administration?150");
            exit();
        }

        // Ajouter la nouvelle catégorie à la table categories
        $modele = new PlatCategorie;
        $succes = $modele->ajouter($_POST["nom_categorie"]);


        // Rediriger l'utilisateur selon le résultat de l'ajout
        if(!$succes) {
            header("location: administration?echec_creation_categorie");
            exit();
        }
        header("location: administration?succes_creation_categorie");
        exit();

    }

    /**
     * Fonction pour modifier une catégorie
     * Redirection
     */
    public function modifier() {

        // Protection de la route
        if(empty($_SESSION["utilisateur_id"]) == true) {
            header("location: connexion");
            exit();
        }

        // Validation des paramètres POST
        if(empty($_POST["id"])){
            header("location: administration");
            exit();
        }
        if(empty($_POST["nom_categorie"])){
            header("location: administration?nom_categorie_manquant");
            exit();
        }
        if(strlen($_POST["nom_categorie"]) > 150){
            header("location: administration?150");
            exit();
        }

        // Modifier la catégorie à la table categories
        $modele = new PlatCategorie;
        $succes = $modele->modifier($_POST["id"], 
                                    $_POST["nom_categorie"]);

        // Rediriger l'utilisateur selon le résultat de la modification
        if($succes) {
            header("location: administration?echec_modification_categorie");
            exit();
        }
        header("location: administration?succes_modification_categorie");
        exit();

    }

    /**
     * Fonction pour supprimer une catégorie
     * Redirection
     */
    public function supprimer() {

        // Protection de la route
        if(empty($_SESSION["utilisateur_id"]) == true) {
            header("location: connexion");
            exit();
        }

        // Validation du paramètre GET
        if(empty($_GET["id"])){
            header("location: connexion");
            exit();
        }

        // Supprimer la catégorie à la table categories
        $modele = new PlatCategorie;
        $succes = $modele->supprimer($_GET["id"]);

        // Rediriger l'utilisateur selon le résultat de la suppression
        if(!$succes) {
            header("location: administration?echec_suppression_categorie");
            exit();
        }
        header("location: administration?succes_suppression_categorie");
        exit();
    }
}