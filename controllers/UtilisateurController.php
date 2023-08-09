<?php

namespace Controller;

use Base\Controller;
use Model\Utilisateur;

class UtilisateurController extends Controller {

    /**
     * Fonction pour enregistrer un utilisateur
     * Redirection
     */
    public function enregistrer() {

        // Protection de la route pour l'administrateur seulement
        if(empty($_SESSION["utilisateur_id"]) == "1") {
            header("location: connexion");
            exit();
        }
        
        // Validation des paramètres POST
        if(empty($_POST["prenom"])){
            header("location: administration?prenom_manquant");
            exit();
        }
        if(strlen($_POST["prenom"]) > 150){
            header("location: administration?150");
            exit();
        }
        if(empty($_POST["nom"])){
            header("location: administration?nom_manquant");
            exit();
        }
        if(strlen($_POST["nom"]) > 150){
            header("location: administration?150");
            exit();
        }
        if(empty($_POST["courriel"])){
            header("location: administration?courriel_manquant");
            exit();
        }
        if(strlen($_POST["courriel"]) > 255){
            header("location: administration?255");
            exit();
        }
        if(empty($_POST["mot_de_passe"])){
            header("location: administration?mot_de_passe_manquant");
            exit();
        }
        if(strlen($_POST["mot_de_passe"]) > 255){
            header("location: administration?255");
            exit();
        }
        if(empty($_POST["confirmer_mdp"])){
            header("location: administration?confirmer_mdp_manquant");
            exit();
        }

        // Vérification si le mot de passe et sa confirmation sont identique
        if($_POST["mot_de_passe"] != $_POST["confirmer_mdp"]){

            header("location: administration?mdp_incorrect");
            exit();
        }

        // Ajouter le nouvel utilisateur à la table utilisateurs
        $modele = new Utilisateur;
        $succes = $modele->ajouter($_POST["prenom"],
                                   $_POST["nom"],
                                   $_POST["courriel"],
                                   $_POST["mot_de_passe"]);

        // Rediriger l'utilisateur selon le résultat de l'ajout
        if($succes){
            header("location: administration?succes_creation_compte");
            exit();
        }

        header("location: administration?echec_creation_compte");
        exit();
    }

    /**
     * Fonction pour connecter un utilisateur
     * Redirection
     */
    public function connecter() {

        // Validation des paramètres POST
        if(empty($_POST["courriel"])){
            header("location: connexion?courriel_manquant");
            exit();
        }
        if(empty($_POST["mot_de_passe"])){
            header("location: connexion?mot_de_passe_manquant");
            exit();
        }

        // Récupérer l'utilisateur par son courriel
        $modele = new Utilisateur;
        $utilisateur = $modele->parCourriel($_POST["courriel"]);

        // Valider que l'utilisateur existe et que sont mot de passe est valide
        if(!$utilisateur || 
           !password_verify($_POST["mot_de_passe"], $utilisateur->mdp)) {
            header("location: connexion?infos_invalides");
            exit();
        } 

        // Enregistrer l'utilisateur dans la session
        $_SESSION["utilisateur_id"] = $utilisateur->id;
        $_SESSION["est_connecte"] = true;

        // Rediriger l'utilisateur
        header("location: administration?succes_connexion");
        exit();
    }

    /**
     * Fonction pour modifier un utilisateur
     * Redirection
     */
    public function modifier() {
        
        // Protection de la route pour l'administrateur seulement
        if(empty($_SESSION["utilisateur_id"]) == "1") {
            header("location: connexion");
            exit();
        }

        // Validation des paramètres POST
        if(empty($_POST["id"])){
            header("location: administration");
            exit();
        }
        if(empty($_POST["prenom"])){
            header("location: administration?prenom_manquant");
            exit();
        }
        if(strlen($_POST["prenom"]) > 150){
            header("location: administration?150");
            exit();
        }
        if(empty($_POST["nom"])){
            header("location: administration?nom_manquant");
            exit();
        }
        if(strlen($_POST["nom"]) > 150){
            header("location: administration?150");
            exit();
        }
        if(empty($_POST["courriel"])){
            header("location: administration?courriel_manquant");
            exit();
        }
        if(strlen($_POST["courriel"]) > 255){
            header("location: administration?255");
            exit();
        }

        // Modifier l'utilisateur à la table utilisateurs
        $modele = new Utilisateur;
        $succes = $modele->modifier($_POST["id"], 
                                    $_POST["prenom"], 
                                    $_POST["nom"],
                                    $_POST["courriel"]);
        
        // Rediriger l'utilisateur selon le résultat de la modification
        if($succes) {
            header("location: administration?echec_modification_compte");
            exit();
        }
        header("location: administration?succes_modification_compte");
        exit();
    }

    /**
     * Fonction pour modifier le mot de passe d'un utilisateur
     * Redirection
     */
    public function modifierMDP() {
        
        // Protection de la route pour l'administrateur seulement
        if(empty($_SESSION["utilisateur_id"]) == "1") {
            header("location: connexion");
            exit();
        }

        // Validation des paramètres POST
        if(empty($_POST["id"])){
            header("location: administration");
            exit();
        }
        if(empty($_POST["mot_de_passe"])){
            header("location: administration?mot_de_passe_manquant");
            exit();
        }
        if(strlen($_POST["mot_de_passe"]) > 255){
            header("location: administration?255");
            exit();
        }
        if(empty($_POST["confirmer_mdp"])){
            header("location: administration?confirmer_mdp_manquant");
            exit();
        }
        
        // Vérification si le mot de passe et sa confirmation sont identique
        if($_POST["mot_de_passe"] != $_POST["confirmer_mdp"]){
            
            header("location: administration?mdp_incorrect");
            exit();
        }
        
        // Modifier le mot de passe de l'utilisateur à la table utilisateurs
        $modele = new Utilisateur;
        $succes = $modele->modifierMDP($_POST["id"],
                                       $_POST["mot_de_passe"]);
        
        // Rediriger l'utilisateur selon le résultat de la modification
        if($succes) {
            header("location: administration?echec_modification_compte");
            exit();
        }
        header("location: administration?succes_modification_compte");
        exit();   
    }

    /**
     * Fonction pour supprimer un utilisateur
     * Redirection
     */
    public function supprimer() {
    
        // Protection de la route pour l'administrateur seulement
        if(empty($_SESSION["utilisateur_id"]) == "1") {
            header("location: connexion");
            exit();
        }
    
        // Validation du paramètre GET
        if(empty($_GET["id"])){
            header("location: connexion");
            exit();
        }
    
        // Supprimer l'utilisateur à la table utilisateurs
        $modele = new Utilisateur;
        $succes = $modele->supprimer($_GET["id"]);
    
        // Rediriger l'utilisateur selon le résultat de la suppression
        if(!$succes) {
            header("location: administration?echec_suppression_compte");
            exit();
        }
        header("location: administration?succes_suppression_compte");
        exit();
    }

    /**
     * Fonction pour déconnecter un utilisateur
     * Redirection
     */
    public function deconnecter() {

        session_destroy();
        
        header("location: connexion?succes_deconnexion_compte");
        exit();
    }
}