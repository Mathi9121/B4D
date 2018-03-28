<?php
class Forum{
	private $id = "id_Forum";
    private $dateC = "date_Creation_Forum";
    private $titre = "titre_Forum";
    private $idBD = "id_BD";
    private $table = "Forum";

    public function getId(){ return $this->id; }
    public function getDateC(){ return $this->dateC; }
    public function getTitre(){ return $this->titre; }
    public function getIdBD(){ return $this->idBD; }

    public function ajouter($unTitre, $unIdBD){
		//if (is_string($unTitre) && is_int($unIdBD))
			SQL::insert(array($this->dateC, $this->titre, $this->idBD), array("NOW()", "'".$unTitre."'", (int)$unIdBD), $this->table);
	}

	public function supprimerById($unId, $type){
		//if (is_int($unId)) {
			if ($type == "Forum") { SQL::delete(array($this->id), array((int)$unId), $this->table); }
			if ($type == "BD") { SQL::delete(array($this->idBD), array((int)$unId), $this->table); }
		//}
	}

	public function maj($unTitre = "", $unId){
		SQL::update(array($this->titre), array("'".$unTitre."'"), array($this->id), array((int)$unId), $this->table);
	}

	public function getById($unId){
		//if (is_int($unId))
			return SQL::getSelect(array($this->id, $this->titre, $this->dateC, $this->idBD), array($this->id), array((int)$unId), array("="), array(), array(), $this->table);
	}

	public function getByBD($unId){
		//if (is_int($unId)) {
			return SQL::getSelect(array($this->id, $this->titre, $this->dateC, $this->idBD), array($this->idBD), array((int)$unId), array("="), array(), array($this->dateC), $this->table);
		//}
	}

	public function getByTitreAndBD($unTitre, $unId){
		//if (is_int($unId)) {
			return SQL::getSelect(array($this->id, $this->titre, $this->dateC, $this->idBD), array($this->titre, $this->idBD), array("'".$unTitre."'", (int)$unId), array("=", "="), array("AND"), array($this->dateC), $this->table);
		//}
	}

	public function getList(){
		return SQL::getSelect(array($this->id, $this->titre, $this->dateC, $this->idBD), array(), array(), array(), array(), array($this->dateC), $this->table);
	}
}
?>