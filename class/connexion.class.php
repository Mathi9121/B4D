<?php 
class connexion{
	private  $db_name;
	private  $db_user;
	private  $db_pass;
	private  $db_host;
	private  $pdo;
	
	public function __construct($db_name = "projetbd", $db_user = "root", $db_pass = "", $db_host = "localhost"){
		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_pass = $db_pass;
		$this->db_host = $db_host;
	}
	
	private function getPDO()
	{
		if($this->pdo ===null){
			
			$pdo = new PDO('mysql:dbname=projetbd;host=localhost', 'root', '');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo = $pdo;
		}
		return $this->pdo;
	}
	
	public function query($statement){
		$req = $this->getPDO()->query($statement);
		$data = $req->fetchAll(PDO::FETCH_CLASS);
		return $data;
	}
	
	public function prepare($statement, $attributes, $class_name){
		$req = $this->getPDO()->prepare($statement);
		$req->execute($attribute);
		$data = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
		return $data;
	}
	
	public function uid($statement){
		$req = $this->getPDO()->query($statement);
	}
} 
?>
