<?php
class Utilisateur{
	private $id = "id_Utilisateur";
	private $pseudo = "pseudo_Utilisateur";
	private $mdp = "mdp_Utilisateur";
	private $mail = "mail_Utilisateur";
	private $note = "note_Utilisateur";
	private $table = "Utilisateur";

	public function getId(){ return $this->id; }
	public function getPseudo(){ return $this->pseudo; }
	public function getMdp(){ return $this->mdp; }
	public function getMail(){ return $this->mail; }
	public function getNote(){ return $this->note; }

	public function ajouter($unPseudo, $unMdp, $unMail){
			SQL::insert(array($this->pseudo,$this->mdp,$this->mail), array("'".$unPseudo."'", "'".$unMdp."'", "'".$unMail."'"), $this->table);
	}

	public function supprimer($unId){
			SQL::delete(array($this->id), array((int)$unId), $this->table);
	}

	public function maj($unPseudo = "", $unMdp = "", $unMail = "", $uneNote = NULL, $unId){
		$tab_Champs = array(); $tab_Valeurs = array();
		$cpt = 0;
		if($unPseudo != ""){
			$tab_Champs[$cpt] = $this->pseudo;
			$tab_Valeurs[$cpt] = "'".$unPseudo."'";
			$cpt++;
		}
		if($unMdp != ""){
			$tab_Champs[$cpt] = $this->mdp;
			$tab_Valeurs[$cpt] = "'".$unMdp."'";
			$cpt++;
		}
		if($unMail != ""){
			$tab_Champs[$cpt] = $this->mail;
			$tab_Valeurs[$cpt] = "'".$unMail."'";
			$cpt++;
		}
		if($uneNote != NULL){
			$tab_Champs[$cpt] = $this->note;
			$tab_Valeurs[$cpt] = (int)$uneNote;
			$cpt++;
		}
		SQL::update($tab_Champs, $tab_Valeurs, array($this->id), array((int)$unId), $this->table);
	}

	public function getById($unId){
		//if (is_int($unId)) 
			return SQL::getSelect(array($this->id, $this->pseudo, $this->mdp, $this->mail, $this->note), array($this->id), array((int)$unId), array("="), array(), array(), $this->table);
	}

	public function getByLogin($unLogin){
		//if (is_string($unLogin) && is_string($unMdp)) 
			return SQL::getSelect(array($this->id, $this->pseudo, $this->mdp, $this->mail, $this->note), array($this->pseudo), array("'%".$unLogin."%'"), array("LIKE"), array(), array(), $this->table);
	}

	public function getByLoginEtMdp($unLogin, $unMdp){
		//if (is_string($unLogin) && is_string($unMdp)) 
			return SQL::getSelect(array($this->id, $this->pseudo, $this->mdp, $this->mail, $this->note), array($this->pseudo, $this->mdp), array("'".$unLogin."'", "'".$unMdp."'"), array("=", "="), array("AND"), array(), $this->table);
	}

	public function getList(){
		return SQL::getSelect(array($this->id, $this->pseudo, $this->mdp, $this->mail, $this->note), array(), array(), array(), array(), array($this->pseudo), $this->table);
	}
}
?>