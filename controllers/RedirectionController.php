<?php

namespace Controller;

use Base\Controller;
use Model\Plat;
use Model\PlatCategorie;
use Model\PlatVegetarien;
use Model\Utilisateur;

class RedirectionController extends Controller {

    /**
     * Fonction pour rediriger à la page index
     * Fonction pour aller rechercher tous les plats et toutes les catégories
     * Inclure la vue 
     * 
     * @return void
     */
    public function index() {

    // Appeler le modèle pour aller rechercher les informations de tous les plats
    $modele = new Plat;
    $plats = $modele->getPlats();  
        
    // Appeler le modèle pour aller rechercher les informations de toutes les catégories
    $modele = new PlatCategorie;
    $categories = $modele->getCategories();  

    include("views/index.view.php");

    }

    /**
     * Fonction pour rediriger à la page de présentation
     * Inclure la vue
     * 
     * @return void
     */
    public function aPropos() {

    include("views/presentation.view.php");

    }

    /**
     * Fonction pour rediriger à la page de connexion
     * Inclure la vue
     * 
     * @return void
     */
    public function connexion() {

    include("views/connexion.view.php");

    }

    /**
     * Fonction pour rediriger à la page d'administration
     * Fonction pour aller rechercher tous les plats, toutes les catégories, si un plat est végétarien et tous les utilisateurs
     * Inclure la vue
     * 
     * @return void
     */
    public function administration() {

    // Protection de la route /publications
    if(empty($_SESSION["utilisateur_id"]) == true) {
        header("location: connexion");
        exit();
    }

    // Appeler le modèle pour aller rechercher les informations de tous les repas
    $modele = new Plat;
    $plats = $modele->getPlats();   

    // Appeler le modèle pour aller rechercher toutes les catégories
    $modele = new PlatCategorie;
    $categories = $modele->getCategories();

    // Appeler le modèle pour savoir si un plat est végétarien
    $modele = new PlatVegetarien;
    $vegetariens = $modele->getVegetariens();

    // Appeler le modèle pour aller rechercher tous les utilisateurs
    $modele = new Utilisateur;
    $utilisateurs = $modele->getUtilisateurs();

    include("views/administration.view.php");

    }
}