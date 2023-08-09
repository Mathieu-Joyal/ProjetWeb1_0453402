<?php

namespace Model;

use Base\Model;

class Utilisateur extends Model {

    protected $table = "utilisateurs";

    /**
     * Modèle qui va rechercher toutes les informations des utilisateurs
     *
     * @return mixed|false
     */    
    public function getUtilisateurs() {
        $sql = "SELECT utilisateurs.*
                FROM utilisateurs";

        $requete = $this->pdo()->prepare($sql);

        $requete->execute();

        return $requete->fetchAll();    
    }

    /**
     * Modèle pour ajouter un nouvel utilisateur
     *
     * @param string $prenom
     * @param string $nom
     * @param string $courriel
     * @param string $mot_de_passe
     * 
     * @return bool
     */
    public function ajouter(
                            string $prenom,
                            string $nom,  
                            string $courriel, 
                            string $mot_de_passe) {
        
        $sql = "INSERT INTO $this->table (prenom_utilisateur, 
                                          nom_utilisateur, 
                                          courriel, 
                                          mdp) 
                VALUES (:prenom_utilisateur, 
                        :nom_utilisateur, 
                        :courriel, 
                        :mdp)";
        
        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":prenom_utilisateur" => $prenom,
            ":nom_utilisateur" => $nom,
            ":courriel" => $courriel,
            ":mdp" => password_hash($mot_de_passe, PASSWORD_DEFAULT)
        ]);
    }

    /**
     * Modèle pour récupérer l'utilisateur selon le courriel donné
     *
     * @param string $courriel
     * 
     * @return mixed|false
     */
    public function parCourriel(string $courriel) {
        $sql = "SELECT id, mdp
                FROM $this->table
                WHERE courriel = :courriel";

        $requete = $this->pdo()->prepare($sql);

        $requete->execute([
            ":courriel" => $courriel 
        ]);

        return $requete->fetch();
    }

    /**
     * Modèle pour supprimer un utilisateur
     *
     * @param int $id
     * 
     * @return bool
     */
    public function supprimer(int $id) {

        $sql = "DELETE FROM utilisateurs
                WHERE id = :id";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":id" => $id
        ]);
    }

    /**
     * Modèle pour modifier un utilisateur
     *
     * @param int $id
     * @param string $prenom
     * @param string $nom
     * @param string $courriel
     * 
     * @return bool
     */
    public function modifier(int $id,
                             string $prenom, 
                             string $nom,
                             string $courriel){
        $sql = "UPDATE utilisateurs
                SET id = :id,
                    prenom_utilisateur = :prenom_utilisateur,
                    nom_utilisateur = :nom_utilisateur,
                    courriel = :courriel
                WHERE id = :id";
    
        $requete = $this->pdo()->prepare($sql);    
        
        $requete->bindParam(':id', $id);
        $requete->bindParam(':prenom_utilisateur', $prenom);
        $requete->bindParam(':nom_utilisateur', $nom);
        $requete->bindParam(':courriel', $courriel);

        $requete->execute();
    }

    /**
     * Modèle pour modifier le mot de passe d'un utilisateur
     *
     * @param int $id
     * @param string $m
     * 
     * @return bool
     */
    public function modifierMDP(int $id,
                                string $mot_de_passe){

        $sql = "UPDATE utilisateurs
                SET id = :id,
                    mdp = :mdp
                WHERE id = :id";
    
        $requete = $this->pdo()->prepare($sql);    
        
        $requete->bindParam(':id', $id);
        $requete->bindParam(':mdp', password_hash($mot_de_passe, PASSWORD_DEFAULT));

        $requete->execute();
    }

}