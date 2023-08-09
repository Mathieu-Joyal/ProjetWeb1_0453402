<?php

namespace Model;

use Base\Model;

class Plat extends Model {
    protected $table = "plats";

    /**
     * Modèle qui va rechercher tous les plats avec l'id, le nom du plat, la description
     * le prix et la catégorie
     *
     * @return mixed|false
     */ 
    public function getPlats() {
        $sql = "SELECT plats.*,
                       categories.nom_categorie,
                       vegetariens.bool
                FROM plats
                JOIN categories
                    ON plats.categorie_id = categories.id
                JOIN vegetariens
                    ON plats.vegetarien_id = vegetariens.id	";

        $requete = $this->pdo()->prepare($sql);

        $requete->execute();

        return $requete->fetchAll();    
    }

    /**
     * Modèle pour ajouter un plat
     *
     * @param string $nom_plat
     * @param string $description
     * @param string $prix
     * @param int $categorie_id
     * @param int $vegetarien_id
     * 
     * @return bool
     */
    public function ajouter(string $nom_plat, 
                            string $description,
                            string $prix,
                            int $categorie_id, 
                            int $vegetarien_id
                            ){

        $sql = "INSERT INTO $this->table (nom_plat, 
                                          description,  
                                          prix,
                                          categorie_id,
                                          vegetarien_id)
                VALUES (:nom_plat, 
                        :description, 
                        :prix, 
                        :categorie_id,
                        :vegetarien_id)";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
        ":nom_plat" => $nom_plat,
        ":description" => $description,
        ":prix" => str_replace(",", ".", $prix),
        ":categorie_id" => $categorie_id,
        ":vegetarien_id" => $vegetarien_id
        ]);
    }

    /**
     * Modèle pour modifier un plat
     *
     * @param string $plat_id
     * @param string $nom_plat
     * @param string $description
     * @param string $prix
     * @param int $categorie_id
     * @param int $vegetarien_id
     * 
     * @return bool
     */
    public function modifier(int $plat_id,
                             string $nom_plat, 
                             string $description,
                             string $prix,
                             int $categorie_id,
                             int $vegetarien_id){
        $sql = "UPDATE plats
                SET id = :plat_id,
                    nom_plat = :nom_plat,
                    description = :description,
                    prix = :prix,
                    categorie_id = :categorie_id,
                    vegetarien_id = :vegetarien_id
                WHERE id = :plat_id";
    
        $requete = $this->pdo()->prepare($sql);    
        
        $requete->bindParam(':plat_id', $plat_id);
        $requete->bindParam(':nom_plat', $nom_plat);
        $requete->bindParam(':description', $description);
        $requete->bindParam(':prix', str_replace(",", ".", $prix));
        $requete->bindParam(':categorie_id', $categorie_id);
        $requete->bindParam(':vegetarien_id', $vegetarien_id);

        $requete->execute();
    }

    /**
     * Modèle pour supprimer un plat
     *
     * @param int $id
     * 
     * @return bool
     */
    public function supprimer(int $id) {

        $sql = "DELETE FROM plats
                WHERE id = :id";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":id" => $id
        ]);
    }
}