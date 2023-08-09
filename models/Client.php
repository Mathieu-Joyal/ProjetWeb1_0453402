<?php

namespace Model;

use Base\Model;

class Client extends Model {

    protected $table = "clients";

    /**
     * Modèle pour ajouter un nouveau client
     *
     * @param string $nom_client
     * @param string $courriel
     * 
     * @return bool
     */
    public function ajouter(
                            string $nom_client,
                            string $courriel) {
        
        $sql = "INSERT INTO $this->table (nom_client, 
                                          courriel) 
                VALUES (:nom_client, 
                        :courriel)";
        
        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":nom_client" => $nom_client,
            ":courriel" => $courriel
        ]);
    }
}