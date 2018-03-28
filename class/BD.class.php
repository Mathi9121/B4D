<?php
class BD{
	private $id = "id_BD";
	private $titre = "titre_BD";
	private $dateD = "date_Creation_BD";
	private $dateF = "date_Fin_BD";
	private $note = "note_BD";
	private $rang = "rang_BD";
	private $valide = "valide_Admin_BD";
	private $synopsis = "synopsis_BD";
	private $couverture = "couverture_BD";
	private $idU = "id_Utilisateur";
	private $table = "BD";

	public function getId(){ return $this->id; }
	public function getTitre(){	return $this->titre; }
	public function getDateD(){ return $this->dateD; }
	public function getDateF(){ return $this->dateF; }
	public function getNote(){ return $this->note; }
	public function getRang(){ return $this->rang; }
	public function getValide(){ return $this->valide; }
	public function getSynopsis(){ return $this->synopsis; }
	public function getCouverture(){ return $this->couverture; }
	public function getIdU(){ return $this->idU; }
	
	public function ajouter($unTitre, $unSynopsis, $uneCouverture, $unIdU){
		//if (is_string($unTitre) && is_string($uneValide) && is_string($unSynopsis) && is_string($uneCouverture) && is_int($unIdU)) {
			SQL::insert(array($this->titre, $this->dateD, $this->valide, $this->synopsis, $this->couverture, $this->idU), array("'".$unTitre."'", "NOW()", "false", "'".$unSynopsis."'", "'".$uneCouverture."'", (int)$unIdU), $this->table);
		//}
	}

	public function supprimerById($unId, $type){
		//if (is_int($unId)) {
			if ($type == "BD") { SQL::delete(array($this->id), array((int)$unId), $this->table); }
			if ($type == "Utilisateur") { SQL::delete(array($this->idU), array((int)$unId), $this->table); }
		//}
	}

	public function maj($unTitre = "", $uneNote = NULL, $unRang = NULL, $uneValide = "", $unSynopsis = "", $uneCouverture = "", $unId){
		$tab_Champs = array(); $tab_Valeurs = array();
		$cpt = 0;
		if ($unTitre != "") {
			$tab_Champs[$cpt] = $this->titre;
			$tab_Valeurs[$cpt] = "'".$unTitre."'";
			$cpt++;
		}
		if ($uneNote != NULL) {
			$tab_Champs[$cpt] = $this->note;
			$tab_Valeurs[$cpt] = (int)$uneNote;
			$cpt++;
		}
		if ($unRang != NULL) {
			$tab_Champs[$cpt] = $this->rang;
			$tab_Valeurs[$cpt] = (int)$unRang;
			$cpt++;
		}
		if ($uneValide != "") {
			$tab_Champs[$cpt] = $this->valide;
			$tab_Valeurs[$cpt] = "'".$uneValide."'";
			$cpt++;
		}
		if ($unSynopsis != "") {
			$tab_Champs[$cpt] = $this->synopsis;
			$tab_Valeurs[$cpt] = "'".$unSynopsis."'";
			$cpt++;
		}
		if ($uneCouverture != "") {
			$tab_Champs[$cpt] = $this->couverture;
			$tab_Valeurs[$cpt] = "'".$uneCouverture."'";
			$cpt++;
		}
		SQL::update($tab_Champs, $tab_Valeurs, array($this->id), array((int)$unId), $this->table);
	}

	public function getById($unId){
		//if (is_int($unId)) {
			return SQL::getSelect(array($this->id, $this->titre, $this->dateD, $this->dateF, $this->note, $this->rang, $this->synopsis, $this->couverture, $this->idU), array($this->id), array((int)$unId), array("="), array(), array(), $this->table);
		//}
	}

	public function getByUtilisateur($unId){
		//if (is_int($unId)) {
			return SQL::getSelect(array($this->id, $this->titre, $this->dateD, $this->dateF, $this->note, $this->rang, $this->synopsis, $this->couverture), array($this->idU), array((int)$unId), array("="), array(), array($this->titre), $this->table);
		//}
	}

	public function getByTitre($unTitre){
		//if (is_string($unTitre)) {
			return SQL::getSelect(array($this->id, $this->titre, $this->dateD, $this->dateF, $this->note, $this->rang, $this->synopsis, $this->couverture), array($this->titre), array("'%".$unTitre."%'"), array("LIKE"), array(), array(), $this->table);
		//}
	}

	public function getByUtilisateurEtTitreLike($unIdU, $unTitre){
		//if (is_string($unTitre)) {
			return SQL::getSelect(array($this->id, $this->titre, $this->dateD, $this->dateF, $this->note, $this->rang, $this->synopsis, $this->couverture), array($this->idU, $this->titre), array((int)$unIdU, "'".$unTitre."'"), array("LIKE", "LIKE"), array("AND"), array(), $this->table);
		//}
	}

	public function getByUtilisateurEtTitre($unIdU, $unTitre){
		//if (is_string($unTitre)) {
			return SQL::getSelect(array($this->id, $this->titre, $this->dateD, $this->dateF, $this->note, $this->rang, $this->synopsis, $this->couverture), array($this->idU, $this->titre), array((int)$unIdU, "'".$unTitre."'"), array("=", "="), array("AND"), array(), $this->table);
		//}
	}

	public function getByDateDebut($uneDate){
		//if (is_string($uneDate)) {
			return SQL::getSelect(array($this->id, $this->titre, $this->dateD, $this->dateF, $this->note, $this->rang, $this->synopsis, $this->couverture), array($this->dateD), array("'".$uneDate."'"), array("="), array(), array($this->titre), $this->table);
		//}
	}

	public function getByDateFin($uneDate){
		//if (is_string($uneDate)) {
			return SQL::getSelect(array($this->id, $this->titre, $this->dateD, $this->dateF, $this->note, $this->rang, $this->synopsis, $this->couverture), array($this->dateF), array("'".$uneDate."'"), array("="), array(), array($this->titre), $this->table);
		//}
	}

	public function getByNote($uneNote){
		//if (is_int($uneNote)) {
			return SQL::getSelect(array($this->id, $this->titre, $this->dateD, $this->dateF, $this->note, $this->rang, $this->synopsis, $this->couverture), array($this->note), array((int)$uneNote), array("="), array(), array($this->titre), $this->table);
		//}
	}

	public function getList(){
		return SQL::getSelect(array($this->id, $this->titre, $this->dateD, $this->dateF, $this->note, $this->rang, $this->synopsis, $this->couverture, $this->idU), array(), array(), array(), array(), array($this->titre), $this->table);
	}

	//Utilisé
	public function getListMois(){
		return SQL::getSelect(array($this->id, $this->titre, $this->dateD, $this->dateF, $this->note, $this->rang, $this->synopsis, $this->couverture, $this->idU), array("MONTH(".$this->dateD.")","MONTH(".$this->dateF.")"), array("MONTH(NOW())","MONTH(NOW())"), array("=", "="), array("OR"), array($this->titre), $this->table);
	}

	//Utilisé
	public function getListAlpha($valeur){
		return SQL::getSelect(array($this->id, $this->titre, $this->dateD, $this->dateF, $this->note, $this->rang, $this->synopsis, $this->couverture, $this->idU), array($this->titre), array("'".$valeur."%'"), array("LIKE"), array(), array($this->titre), $this->table);
	}

	//Utilisé
	public function getListAnnée(){
		return SQL::getSelect(array("DISTINCT YEAR(".$this->dateD.") AS year"), array(), array(), array(), array(), array($this->titre), $this->table);
	}
}
?>