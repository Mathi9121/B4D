<?php
class Modification{
	private $idU = "id_Utilisateur";
    private $idB = "id_Bulle";
    private $dateM = "date_Modif";
    private $table = "Modification";

    public function getIdU(){ return $this->idU; }
    public function getIdB(){ return $this->idB; }
    public function getDateM(){ return $this->dateM; }

    public function ajouter($unIdU, $unIdB){
		//if (is_int($unIdU) && is_int($unIdB) && is_string($uneDateM)) 
			SQL::insert(array($this->idU, $this->idB, $this->dateM), array((int)$unIdU, (int)$unIdB, "NOW()"), $this->table);
	}

	public function supprimerById($unId, $type){
		//if (is_int($unId)) {
			if ($type == "Utilisateur") { SQL::delete(array($this->idU), array((int)$unId), $this->table); }
			if ($type == "Bulle") { SQL::delete(array($this->idB), array((int)$unId), $this->table); }
		//}
	}

	public function getById($unId, $type){
		//if (is_int($unId)) {
			if ($type == "Utilisateur")
				return SQL::getSelect(array($this->idU, $this->idB, $this->dateM), array($this->idU), array((int)$unId), array("="), array(), array(), $this->table);
			if ($type == "Bulle") 
				return SQL::getSelect(array($this->idU, $this->idB, $this->dateM), array($this->idB), array((int)$unId), array("="), array(), array(), $this->table);
		//}
	}
}
?>