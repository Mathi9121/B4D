<?php
class Type_Utilisateur{
	private $id = "id_Type";
    private $libelle = "libelle_Type";
    private $table = "Type_Utilisateur";
    
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
		SQL::update($this->libelle, $unLibelle, array($this->id), array((int)$unId), $this->table);
	}

	public function getById($unId){
		//if (is_int($unId)) 
			return SQL::getSelect(array($this->id, $this->libelle), array($this->id), array((int)$unId), array("="), array(), array(), $this->table);
	}

	public function getByLibelle($unLibelle){
		//if (is_int($unId)) 
			return SQL::getSelect(array($this->id, $this->libelle), array($this->libelle), array("'".$unLibelle."'"), array("="), array(), array(), $this->table);
	}

	public function getList(){
		return SQL::getSelect(array($this->id, $this->libelle), array(), array(), array(), array(), array($this->libelle), $this->table);
	}
}
?>