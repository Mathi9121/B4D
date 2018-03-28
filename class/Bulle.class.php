<?php
class Bulle{
    private $id = "id_Bulle";
    private $parole = "parole_Bulle";
    private $coordonnee = "coordonnee_Bulle";
    private $type = "type_Bulle";
    private $numero = "numero_Bulle";
    private $idI = "id_Image";
    private $idL = "id_Langue";
    private $table = "Bulle";

	public function getId(){ return $this->id; }
    public function getParole(){ return $this->parole; }
    public function getCoordonnee(){ return $this->coordonnee; }
    public function getType(){ return $this->type; }
    public function getNumero(){ return $this->numero; }
    public function getIdI(){ return $this->idI; }
    public function getIdL(){ return $this->idL; }

    public function ajouter($uneParole, $uneCoordonnee, $unType, $unNumero, $unIdI, $unIdL){
        //if (is_string($uneParole) && is_string($uneCoordonnee) && is_string($unType) && is_int($unNumero) && is_int($unIdI) && is_int($unIdL)) {
            SQL::insert(array($this->parole, $this->coordonnee, $this->type, $this->numero, $this->idI, $this->idL), array("'".$uneParole."'", "'".$uneCoordonnee."'", "'".$unType."'", (int)$unNumero, (int)$unIdI, (int)$unIdL), $this->table);
        //}
    }

    public function supprimerById($unId, $type){
        if (is_int($unId)) {
            if ($type == "Bulle") { SQL::delete(array($this->id), array((int)$unId), $this->table); }
            if ($type == "Image") { SQL::delete(array($this->idI), array((int)$unId), $this->table); }
            if ($type == "Langue") { SQL::delete(array($this->idL), array((int)$unId), $this->table); }
        }
    }

    public function maj($uneParole = "", $uneCoordonnee = "", $unType = "", $unNumero = NULL, $unId){
        $tab_Champs = array(); $tab_Valeurs = array();
        $cpt = 0;
        if ($uneParole != "") {
            $tab_Champs[$cpt] = $this->parole;
            $tab_Valeurs[$cpt] = "'".$uneParole."'";
            $cpt++;
        }
        if ($uneCoordonnee != "") {
            $tab_Champs[$cpt] = $this->coordonnee;
            $tab_Valeurs[$cpt] = "'".$uneCoordonnee."'";
            $cpt++;
        }
        if ($unType != "") {
            $tab_Champs[$cpt] = $this->type;
            $tab_Valeurs[$cpt] = "'".$unType."'";
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
        if (is_int($unId)) {
            return SQL::getSelect(array($this->id, $this->parole, $this->coordonnee, $this->type, $this->numero, $this->idI, $this->idL), array($this->id), array($unId), array("="), array(), array(), $this->table);
        }
    }

     public function getByImage($unId){
        if (is_int($unId)) {
            return SQL::getSelect(array($this->id, $this->parole, $this->coordonnee, $this->type, $this->numero, $this->idI, $this->idL), array($this->idI), array($unId), array("="), array(), array(), $this->table);
        }
    }
}
?>