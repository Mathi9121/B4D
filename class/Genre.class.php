<?php
class Genre{
	private $id = "id_Genre";
	private $libelle = "libelle_Genre";
	private $table = "Genre";

	public function getId(){ return $this->id; }
	public function getLibelle(){ return $this->libelle; }

	public function ajouter($unLibelle){
		//if (is_string($unLibelle))
			SQL::insert(array($this->libelle), array("'".$unLibelle."'"), $this->table);
	}

	public function supprimer($unId){
		//if (is_int($unId))
			SQL::delete(array($this->id), array((int)$unId), $this->table);
	}

	public function maj($unLibelle, $unId){
		SQL::update($this->libelle, "'".$unLibelle."'", array($this->id), array((int)$unId), $this->table);
	}

	public function getById($unId){
		//if (is_int($unId))
			return SQL::getSelect(array($this->id, $this->libelle), array($this->id), array((int)$unId), array("="), array(), array(), $this->table);
	}

	public function getList(){
		return SQL::getSelect(array($this->id, $this->libelle), array(), array(), array(), array(), array($this->libelle), $this->table);	
	}
	
}
?>