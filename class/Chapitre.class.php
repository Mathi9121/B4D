<?php
class Chapitre{
	private $id = "id_Chapitre";
    private $titre = "titre_Chapitre";
    private $dateC = "date_Creation_Chapitre";
    private $numero = "numero_Chapitre";
    private $idBD = "id_BD";
    private $table = "Chapitre";

    public function getId(){ return $this->id; }
    public function gettitre(){ return $this->titre; }
    public function getDateC(){ return $this->dateC; }
    public function getNumero(){ return $this->numero; }
    public function getIdBD(){ return $this->idBD; }

    public function ajouter($unTitre, $unNumero, $unIdBD){
        //if (is_string($unTitre) && is_int($unNumero) && is_int($unIdBD))
            SQL::insert(array($this->titre, $this->dateC, $this->numero, $this->idBD), array("'".$unTitre."'", "NOW()", (int)$unNumero, (int)$unIdBD), $this->table);
    }

    public function supprimerById($unId, $type){
        //if (is_int($unId)) {
            if ($type == "Chapitre") { SQL::delete(array($this->id), array((int)$unId), $this->table); }
            if ($type == "BD") { SQL::delete(array($this->idBD), array((int)$unId), $this->table); }
       //}
    }

    public function maj($unTitre = "", $unNumero = NULL, $unId){
        $tab_Champs = array(); $tab_Valeurs = array();
        $cpt = 0;
        if ($unTitre != "") {
            $tab_Champs[$cpt] = $this->titre;
            $tab_Valeurs[$cpt] = "'".$unTitre."'";
            $cpt++;
        }
        if ($unNumero != NULL) {
            $tab_Champs[$cpt] = $this->numero;
            $tab_Valeurs[$cpt] = (int)$unNumero;
            $cpt++;
        }
        SQL::update($tab_Champs, $tab_Valeurs, array($this->id), array((int)$unId), $this->table);
    }

    public function getById($unId){
        //if (is_int($unId))
            return SQL::getSelect(array($this->id, $this->titre, $this->dateC, $this->numero), array($this->id), array((int)$unId), array("="), array(), array(), $this->table);
    }

    public function getByBD($unId){
        //if (is_int($unId)) {
            return SQL::getSelect(array($this->id, $this->titre, $this->dateC, $this->numero), array($this->idBD), array((int)$unId), array("="), array(), array($this->numero), $this->table);
       //}
    }

     public function getByBDEtTitre($unId, $unTitre){
        //if (is_int($unId)) {
            return SQL::getSelect(array($this->id, $this->titre, $this->dateC, $this->numero), array($this->idBD, $this->titre), array((int)$unId, "'".$unTitre."'"), array("=", "="), array("AND"), array($this->numero), $this->table);
       //}
    }

    public function getCountByBD($unId){
        //if (is_int($unId)) {
            return SQL::getSelect(array($this->id, $this->titre, $this->dateC, "COUNT(".$this->numero.") AS num"), array($this->idBD), array((int)$unId), array("="), array(), array($this->titre), $this->table);
        //}
    }

    public function getByTitre($unTitre){
        //if (is_string($unId)) 
            return SQL::getSelect(array($this->id, $this->titre, $this->dateC, $this->numero), array($this->titre), array("'".$unTitre."'"), array("="), array(), array(), $this->table);
    }
}
?>