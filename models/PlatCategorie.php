<?php

namespace Model;

use Base\Model;

class PlatCategorie extends Model {
    protected $table = "categories";

    /**
     * Modèle pour aller rechercher l'id et le nom d'une catégorie
     *
     * @return mixed|false
     */
    public function getCategories() {

        $sql = "SELECT categories.id,
                       categories.nom_categorie
                FROM categories";

        $requete = $this->pdo()->prepare($sql);

        $requete->execute();

        return $requete->fetchAll();
    }


    /**
     * Modèle pour ajouter une catégorie
     *
     * @param string $nom_categorie
     * 
     * @return bool
     */
    public function ajouter(string $nom_categorie){

        $sql = "INSERT INTO $this->table (nom_categorie)
                VALUES (:nom_categorie)";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
        ":nom_categorie" => $nom_categorie
        ]);
    }

    /**
     * Modèle pour modifier une catégorie
     *
     * @param int $id
     * @param string $nom_categorie
     * 
     * @return bool
     */
    public function modifier(int $id,
                             string $nom_categorie){
        $sql = "UPDATE categories
                SET id = :id,
                    nom_categorie = :nom_categorie
                WHERE id = :id";
    
        $requete = $this->pdo()->prepare($sql);    
        
        $requete->bindParam(':id', $id);
        $requete->bindParam(':nom_categorie', $nom_categorie);

        $requete->execute();
    }

    /**
     * Modèle pour supprimer une catégorie
     *
     * @param int $id
     * 
     * @return bool
     */
    public function supprimer(int $id) {

        $sql = "DELETE FROM categories
                WHERE id = :id";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":id" => $id
        ]);
    }
}