<?php
class Traduire{
	private $idU = "id_Utilisateur";
    private $idBD = "id_BD";
    private $dateD = "date_Debut_Traduire";
    private $dateF = "date_Fin_Traduire";
    private $table = "Traduire";

    public function getIdU(){ return $this->idU; }
    public function getIdBD(){ return $this->idBD; }
    public function getDateD(){ return $this->dateD; }
    public function getDateF(){ return $this->dateF; }

    public function ajouter($unIdU, $unIdBD, $uneDateD, $uneDateF){
		//if (is_int($unIdU) && is_int($unIdBD) && is_string($uneDateD) && is_string($uneDateF))
			SQL::insert(array($this->idU, $this->idBD, $this->dateD, $this->dateF), array((int)$unIdU, (int)$unIdBD, "'".$uneDateD."'", "'".$uneDateF."'"), $this->table);
	}

	public function supprimerById($unId, $type){
		//if (is_int($unId)) {
			if ($type == "Utilisateur") { SQL::delete(array($this->idU), array((int)$unId), $this->table); }
			if ($type == "BD"){ SQL::delete(array($this->idBD), array((int)$unId), $this->table); }
		//}
	}

	public function getById($unId, $type){
		//if (is_int($unId)) {
			if ($type == "Utilisateur")
				return SQL::getSelect(array($this->idU, $this->idBD, $this->dateD, $this->dateF), array($this->idU), array((int)$unId), array("="), array(), array(), $this->table);
			if ($type == "BD")
				return SQL::getSelect(array($this->idU, $this->idBD, $this->dateD, $this->dateF), array($this->idBD), array((int)$unId), array("="), array(), array(), $this->table);
		//}
	}
}
?>