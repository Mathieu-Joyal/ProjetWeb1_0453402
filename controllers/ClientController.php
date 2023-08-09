<?php

namespace Controller;

use Base\Controller;
use Model\Client;

class ClientController extends Controller {

     /**
     * Fonction pour enregistrer un client à l'infolettre
     * Redirection
     */
    public function enregistrer() {

        // Validation des paramètres POST
        if(empty($_POST["nom"])){
            header("location: index?nom_manquant_client");
            exit();
        }
        if(empty($_POST["courriel"])){
            header("location: index?courriel_manquant");
            exit();
        }

        // Ajouter le nouveau client à la table clients
        $modele = new Client;
        $succes = $modele->ajouter($_POST["nom"], 
                                    $_POST["courriel"]);


        // Rediriger l'utilisateur selon le résultat de l'ajout
        if(!$succes) {
            header("location: index?echec_ajout_client");
            exit();
        }
        header("location: index?succes_ajout_client");
        exit();
    }
}