<?php

namespace Controller;

use Base\Controller;
use Model\Plat;

class PlatController extends Controller {

    /**
     * Fonction pour enregistrer un plat
     * Redirection
     */
    public function enregistrer() {

        // Protection de la route
        if(empty($_SESSION["utilisateur_id"]) == true) {
            header("location: connexion");
            exit();
        }

        // Validation des paramètres POST
        if(empty($_POST["nom_plat"])){
            header("location: administration?nom_plat_manquant");
            exit();
        }
        if(strlen($_POST["nom_plat"]) > 255){
            header("location: administration?255");
            exit();
        }
        if(empty($_POST["description"])){
            header("location: administration?description_manquant");
            exit();
        }
        if(empty($_POST["prix"])){
            header("location: administration?prix_manquant");
            exit();
        }
        if(empty($_POST["categorie_id"])){
            header("location: administration");
            exit();
        }
        if(empty($_POST["vegetarien_id"])){
            header("location: administration");
            exit();
        }

        // Validation que le prix soit des chiffre, point ou virgule seulement
        if (!preg_match("/^[0-9.,]*$/", $_POST["prix"])) {
            header("location: administration?prix_manquant");
            exit();
        }

        // Ajouter le nouveau plat à la table plats
        $modele = new Plat;
        $succes = $modele->ajouter($_POST["nom_plat"], 
                                    $_POST["description"],
                                    $_POST["prix"],
                                    $_POST["categorie_id"],
                                    $_POST["vegetarien_id"]);


        // Rediriger l'utilisateur selon le résultat de l'ajout
        if(!$succes) {
            header("location: administration?echec_creation_plat");
            exit();
        }
        header("location: administration?succes_creation_plat");
        exit();
    }

    /**
     * Fonction pour modifier un plat
     * Redirection
     */
    public function modifier() {

        // Protection de la route
        if(empty($_SESSION["utilisateur_id"]) == true) {
            header("location: connexion");
            exit();
        }

        // Validation des paramètres POST
        if(empty($_POST["plat_id"])){
            header("location: administration");
            exit();
        }
        if(empty($_POST["nom_plat"])){
            header("location: administration?nom_plat_manquant");
            exit();
        }
        if(strlen($_POST["nom_plat"]) > 255){
            header("location: administration?255");
            exit();
        }
        if(empty($_POST["description"])){
            header("location: administration?description_manquant");
            exit();
        }
        if(empty($_POST["prix"])){
            header("location: administration?prix_manquant");
            exit();
        }
        if(empty($_POST["categorie_id"])){
            header("location: administration");
            exit();
        }
        if(empty($_POST["vegetarien_id"])){
            header("location: administration");
            exit();
        }

        // Validation que le prix soit des chiffre, point ou virgule seulement
        if (!preg_match("/^[0-9.,]*$/", $_POST["prix"])) {
            header("location: administration?prix_manquant");
            exit();
        }

        // Modifier le plat à la table plats
        $modele = new Plat;
        $succes = $modele->modifier($_POST["plat_id"], 
                                    $_POST["nom_plat"], 
                                    $_POST["description"],
                                    $_POST["prix"],
                                    $_POST["categorie_id"],
                                    $_POST["vegetarien_id"]);

        // Rediriger l'utilisateur selon le résultat de la modification
        if($succes) {
            header("location: administration?echec_modification_plat");
            exit();
        }
        header("location: administration?succes_modification_plat");
        exit();
    }

    /**
     * Fonction pour supprimer un plat
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

        // Supprimer le plat à la table plats
        $modele = new Plat;
        $succes = $modele->supprimer($_GET["id"]);

        // Rediriger l'utilisateur selon le résultat de la suppression
        if(!$succes) {
            header("location: administration?echec_suppression_plat");
            exit();
        }
        header("location: administration?succes_suppression_plat");
        exit();
    }
}