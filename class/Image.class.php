<?php
class Image{
	private $id = "id_Image";
    private $source = "source_Image";
    private $numero = "numero_Image";
    private $idC = "id_Chapitre";
    private $table = "Image";

    public function getId(){ return $this->id; }
    public function getSource(){ return $this->source; }
    public function getNumero(){ return $this->numero; }
    public function getIdC(){ return $this->idC; }

    public function ajouter($uneSource, $unNumero, $unIdC){
		//if (is_string($uneSource) && is_int($unNumero) && is_int($unIdC))
			SQL::insert(array($this->source, $this->numero, $this->idC), array("'".$uneSource."'", (int)$unNumero, (int)$unIdC), $this->table);
	}

	public function supprimerById($unId, $type){
		//if (is_int($unId)) {
			if ($type == "Image") { SQL::delete(array($this->id), array((int)$unId), $this->table); }
			if ($type == "Chapitre") { SQL::delete(array($this->idC), array((int)$unId), $this->table); }
		//}
	}

	public function maj($uneSource = "", $unNumero = NULL, $unId){
		$tab_Champs = array(); $tab_Valeurs = array();
		$cpt = 0;
		if ($uneSource != "") {
			$tab_Champs[$cpt] = $this->source;
			$tab_Valeurs[$cpt] = "'".$uneSource."'";
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
			return SQL::getSelect(array($this->id, $this->source, $this->numero, $this->idC), array($this->id), array((int)$unId), array("="), array(), array(), $this->table);
	}

	public function getByChapitre($unId){
		//if (is_int($unId))
			return SQL::getSelect(array($this->id, $this->source, $this->numero, $this->idC), array($this->idC), array((int)$unId), array("="), array(), array(), $this->table);
	}
}
?>