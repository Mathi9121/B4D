<?php
class BD_Genre{
	private $idG = "id_Genre";
    private $idBD = "id_BD";
    private $table = "BD_Genre";

    public function getIdG(){ return $this->idG; }
    public function getIdBD(){ return $this->idBD; }

    public function ajouter($unIdBD, $unIdG){
		//if (is_int($unIdG) && is_int($unIdBD))
			SQL::insert(array($this->idBD, $this->idG), array((int)$unIdBD, (int)$unIdG), $this->table);
	}

	public function supprimerById($unId, $type){
		//if (is_int($unId)) {
			if ($type == "Genre") { SQL::delete(array($this->idG), array((int)$unId), $this->table); }
			if ($type == "BD"){ SQL::delete(array($this->idBD), array((int)$unId), $this->table); }
		//}
	}

	public function getById($unId, $type){
		//if (is_int($unId)) {
			if ($type == "Genre")
				return SQL::getSelect(array($this->idG, $this->idBD), array($this->idG), array((int)$unId), array("="), array(), array(), $this->table);
			if ($type == "BD") 
				return SQL::getSelect(array($this->idG, $this->idBD), array($this->idBD), array((int)$unId), array("="), array(), array(), $this->table);
		//}
	}

	public function getByBdEtGenre($unIdBD, $idG){
				return SQL::getSelect(array($this->idG, $this->idBD), array($this->idG, $this->idBD), array((int)$unIdBD, (int)$unIdG), array("=", "="), array("AND"), array(), $this->table);
	}
}
?>