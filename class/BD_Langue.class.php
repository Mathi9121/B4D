<?php
class BD_Langue{
	private $idBD = "id_BD";
    private $idL = "id_Langue";
    private $table = "BD_Langue";

    public function getIdBD(){ return $this->idBD; }
    public function getIdL(){ return $this->idL; }

    public function ajouter($unIdBD, $unIdL){
		//if (is_int($unIdL) && is_int($unIdBD)) 
			SQL::insert(array($this->idBD, $this->idL), array((int)$unIdBD, (int)$unIdL), $this->table);
	}

	public function supprimerById($unId, $type){
		//if (is_int($unId)) {
			if ($type == "Langue") { SQL::delete(array($this->idL), array((int)$unId), $this->table); }
			if ($type == "BD"){ SQL::delete(array($this->idBD), array((int)$unId), $this->table); }
		//}
	}

	public function getById($unId, $type){
		//if (is_int($unId)) {
			if ($type == "Langue")
				return SQL::getSelect(array($this->idL, $this->idBD), array($this->idL), array((int)$unId), array("="), array(), array(), $this->table);
			if ($type == "BD") 
				return SQL::getSelect(array($this->idL, $this->idBD), array($this->idBD), array((int)$unId), array("="), array(), array(), $this->table);
		//}
	}
}
?>