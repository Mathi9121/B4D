<?php
class Commentaire{
	private $id = "id_Commentaire";
    private $commentaire = "commentaire_Comm";
    private $dateD = "date_Comm";
    private $idC = "id_Chapitre";
    private $idU = "id_Utilisateur";
    private $table = "Commentaire";

    public function getId(){ return $this->id; }
    public function getCommentaire(){ return $this->commentaire; }
    public function getDateD(){ return $this->dateD; }
    public function getIdC(){ return $this->idC; }
    public function getIdU(){ return $this->idU; }

    public function ajouter($unCommentaire, $unIdC, $unIdU){
		//if (is_string($unCommentaire) && is_string($uneDateD) && is_int($unIdC) && is_int($unIdU))
			SQL::insert(array($this->commentaire, $this->dateD, $this->idC, $this->idU), array("'".$unCommentaire."'", "NOW()", (int)$unIdC, (int)$unIdU), $this->table);
	}

	public function supprimerById($unId, $type){
		//if (is_int($unId)) {
			if ($type == "Commentaire") { SQL::delete(array($this->id), array((int)$unId), $this->table); }
			if ($type == "Chapitre") { SQL::delete(array($this->idC), array((int)$unId), $this->table); }
			if ($type == "Utilisateur") { SQL::delete(array($this->idU), array((int)$unId), $this->table); }
		//}
	}

	public function getById($unId){
		//if (is_int($unId)) {
			return SQL::getSelect(array($this->id, $this->commentaire, $this->dateD, $this->idC, $this->idU), array($this->id), array((int)$unId), array("="), array(), array(), $this->table);
		//}
	}

	public function getByUtilisateur($unId){
		//if (is_int($unId)) {
			return SQL::getSelect(array($this->id, $this->commentaire, $this->dateD, $this->idC, $this->idU), array($this->idU), array((int)$unId), array("="), array(), array($this->dateD), $this->table);
		//}
	}

	public function getByChapitre($unId){
		//if (is_int($unId)) {
			return SQL::getSelect(array($this->id, $this->commentaire, $this->dateD, $this->idC, $this->idU), array($this->idC), array((int)$unId), array("="), array(), array($this->dateD), $this->table);
		//}
	}
}
?>