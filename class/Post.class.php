<?php
class Post{
	private $id = "id_Post";
    private $message = "message_Post";
    private $dateP = "date_Post";
    private $idU = "id_Utilisateur";
    private $idF = "id_Forum";
    private $table = "Post";

    public function getId(){ return $this->id; }
    public function getMessage(){ return $this->message; }
    public function getDate(){ return $this->dateP; }
    public function getIdU(){ return $this->idU; }
    public function getIdF(){ return $this->idF; }

    public function ajouter($unMessage, $unIdU, $unIdF){
        //if (is_string($unMessage) && is_int($unIdU) && is_int($unIdF))
            SQL::insert(array($this->message, $this->dateP, $this->idU, $this->idF), array("'".$unMessage."'", "NOW()", (int)$unIdU, (int)$unIdF), $this->table);
    }

    public function supprimerById($unId, $type){
        //if (is_int($unId)) {
            if ($type == "Post") { SQL::delete(array($this->id), array((int)$unId), $this->table); }
            if ($type == "Utilisateur") { SQL::delete(array($this->idU), array((int)$unId), $this->table); }
            if ($type == "Forum") { SQL::delete(array($this->idF), array((int)$unId), $this->table); }
        //}
    }

    public function getById($unId){
        //if (is_int($unId)) {
            return SQL::getSelect(array($this->id, $this->message, $this->dateP, $this->idU, $this->idF), array($this->id), array((int)$unId), array("="), array(), array(), $this->table);
        //}
    }

    public function getByUtilisateur($unId){
        //if (is_int($unId)) {
            return SQL::getSelect(array($this->id, $this->message, $this->dateP, $this->idU, $this->idF), array($this->idU), array((int)$unId), array("="), array(), array($this->dateP), $this->table);
        //}
    }

    public function getByForum($unId){
        //if (is_int($unId)) {
            return SQL::getSelect(array($this->id, $this->message, $this->dateP, $this->idU, $this->idF), array($this->idF), array((int)$unId), array("="), array(), array($this->dateP), $this->table);
        //}
    }
  
}
?>