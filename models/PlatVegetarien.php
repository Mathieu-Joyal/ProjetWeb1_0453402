<?php

namespace Model;

use Base\Model;

class PlatVegetarien extends Model {
    protected $table = "vegetariens";

    /**
     * Modèle pour aller rechercher l'id et le nom des options végétariens
     *
     * @return mixed|false
     */
    public function getVegetariens() {

        $sql = "SELECT vegetariens.id,
                       vegetariens.bool
                FROM vegetariens";

        $requete = $this->pdo()->prepare($sql);

        $requete->execute();

        return $requete->fetchAll();
    }
}