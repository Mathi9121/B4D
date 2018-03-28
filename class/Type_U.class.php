<?php
class Type_U{
	private $idU = "id_Utilisateur";
    private $idT = "id_Type";
    private $table = "Type_U";

    public function getIdU(){ return $this->idU; }
    public function getIdT(){ return $this->idT; }

    public function ajouter($unIdU, $unIdT){
		//if (is_int($unIdU) && is_int($unIdT))
			SQL::insert(array($this->idU, $this->idT), array((int)$unIdU, (int)$unIdT), $this->table);
	}

	public function supprimer($unId, $type){
		//if (is_int($unId)) {
			if ($type == "Utilisateur") { SQL::delete(array($this->idU), array((int)$unId), $this->table); }
			if ($type == "Type_Utilisateur") { SQL::delete(array($this->idT), array((int)$unId), $this->table); }
		//}
	}

	public function getById($unId, $type){
		//if (is_int($unId)) {
			if ($type == "Utilisateur")
				return SQL::getSelect(array($this->idU, $this->idT), array($this->idU), array((int)$unId), array("="), array(), array(), $this->table);
			if ($type == "Type_Utilisateur") 
				return SQL::getSelect(array($this->idU, $this->idT), array($this->idT), array((int)$unId), array("="), array(), array(), $this->table);
		//}
	}
}
?>