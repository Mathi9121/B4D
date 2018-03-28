<?php
class Mail{
	private $id = "id_Mail";
    private $objet = "objet_Mail";
    private $message = "message_Mail";
    private $dateE = "date_Envoi_Mail";
    private $statut = "statut_Mail";
    private $idU = "id_Utilisateur";
    private $idDU = "id_Dest_Utilisateur";
    private $table = "Mail";

    public function getId(){ return $this->id; }
    public function getObjet(){ return $this->objet; }
    public function getMessage(){ return $this->message; }
    public function getDateE(){ return $this->dateE; }
    public function getStatut(){ return $this->statut; }
    public function getIdU(){ return $this->idU; }
    public function getIdDU(){ return $this->idDU; }

    public function ajouter($unObjet, $unMessage, $unIdU, $unIdDU){
        //if (is_string($unObjet) && is_string($unMessage) && is_int($unIdU) && is_int($unIdDU)) {
            SQL::insert(array($this->objet, $this->message, $this->dateE, $this->statut, $this->idU, $this->idDU), array("'".$unObjet."'", "'".$unMessage."'", "NOW()", "false", (int)$unIdU, (int)$unIdDU), $this->table);
        //}
    }

    public function supprimerById($unId, $type){
        //if (is_int($unId)) {
            if ($type == "Mail") { SQL::delete(array($this->id), array((int)$unId), $this->table); }
            if ($type == "Utilisateur") { SQL::delete(array($this->idU), array((int)$unId), $this->table); }
            if ($type == "Destinataire") { SQL::delete(array($this->idDU), array((int)$unId), $this->table); }
        //}
    }

    public function getById($unId){
        //if (is_int($unId)) {
            return SQL::getSelect(array($this->id, $this->objet, $this->message, $this->dateE, $this->statut, $this->idU, $this->idDU), array($this->id), array((int)$unId), array("="), array(), array(), $this->table);
        //}
    }

    public function getByUtilisateur($unId){
        //if (is_int($unId)) {
            return SQL::getSelect(array($this->id, $this->objet, $this->message, $this->dateE, $this->statut, $this->idU, $this->idDU), array($this->idU), array((int)$unId), array("="), array(), array($this->dateE), $this->table);
        //}
    }

    public function getByDestinataire($unId){
        //if (is_int($unId)) {
            return SQL::getSelect(array($this->id, $this->objet, $this->message, $this->dateE, $this->statut, $this->idU, $this->idDU), array($this->idDU), array((int)$unId), array("="), array(), array($this->dateE), $this->table);
        //}
    }
}
?>