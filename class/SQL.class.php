<?php
class SQL{
	//INSERT INTO nom_table(champs) VALUES(valeurs);
	public static function insert(array $champs, array $valeur, $table){
		$request = "INSERT INTO ".$table."(";
		for ($i=0; $i < sizeof($champs); $i++) {
			$request .= $champs[$i];
			if($i != sizeof($champs)-1){
				$request .= ", ";
			}
		}	
		$request .= ") VALUES(";
		for ($i=0; $i < sizeof($valeur); $i++) { 
			$request .= $valeur[$i];
			//$request .= (is_string($valeur[$i])) ? "'".$valeur[$i]."'" : $valeur[$i];
			if($i != sizeof($valeur)-1){
				$request .= ", ";
			}
		}
		$request .= ");";
		//echo $request;
		$bdd = new connexion();
		$ins = $bdd->uid($request);
	}

	//DELETE FROM nom_table WHERE champs = valeur;
	public static function delete(array $champs, array $valeur, $table){
		$request = "DELETE FROM ".$table." WHERE ";
		for ($i=0; $i < sizeof($champs); $i++) {
			$request .= $champs[$i]." = ";
			$request .= $valeur[$i];
			//$request .= (is_string($valeur[$i])) ? "'".$valeur[$i]."'" : $valeur[$i];
			if ($i != sizeof($champs)-1) {
				$request .= " AND ";
			}
		}
		$request .= ";";
		//echo $request;
		$bdd = new connexion();
		$del = $bdd->uid($request);
	}

	//UPDATE nom_table SET champs = valeur WHERE champs = valeur;
	public static function update(array $champs, array $valeur, array $conditionChamps, array $conditionValeur, $table){
		$request = "UPDATE ".$table." SET ";
		for ($i=0; $i < sizeof($champs); $i++) { 
			$request .= $champs[$i]." = ";
			//$request .= (is_string($valeur[$i])) ? "'".$valeur[$i]."'" : $valeur[$i];
			$request .= $valeur[$i];
			if ($i != sizeof($champs)-1) {
				$request .= ", ";
			}
		}
		if (!empty($conditionChamps)) {
			$request .= " WHERE ";
			for ($i=0; $i < sizeof($conditionChamps); $i++) { 
			$request .= $conditionChamps[$i]." = ";
			//$request .= (is_string($conditionValeur[$i])) ? "'".$conditionValeur[$i]."'" : $conditionValeur[$i];
			$request .= $conditionValeur[$i];
				if ($i != sizeof($conditionChamps)-1) {
					$request .= " AND ";
				}
			}
		}
		$request .= ";";
		//echo $request;
		$bdd = new connexion();
		$upd = $bdd->uid($request);
	}

	public static function getSelect(array $champs, array $conditionChamps, array $conditionValeur, array $signe, array $operation, array $order, $table){
		$request = "SELECT ";
		for ($i=0; $i < sizeof($champs); $i++) { 
			$request .= $champs[$i];
			if ($i != sizeof($champs)-1) {
				$request .= ", ";
			}
		}
		$request .= " FROM ".$table;
		if (!empty($conditionChamps)) {
			$request .= " WHERE ";
			for ($i=0; $i < sizeof($conditionChamps); $i++) { 
				$request .= $conditionChamps[$i]." ";
				if (!empty($signe)) {
					$request .= $signe[$i]." ";
				}
				$request .= $conditionValeur[$i];
				//$request .= (is_string($conditionValeur[$i])) ? "'".$conditionValeur[$i]."'" : $conditionValeur[$i];
				if ($i != sizeof($conditionChamps)-1) {
					if ($operation[$i] == "AND") {
						$request .= " AND ";
					}
					if ($operation[$i] == "OR") {
						$request .= " OR ";
					}
				}
			}
		}
		if (!empty($order)) {
			$request .= " ORDER BY ";
			for ($i=0; $i < sizeof($order); $i++) { 
				$request .= $order[$i];
				if ($i != sizeof($order)-1) {
					$request .= ", ";
				}
			}
		}
		$request .= ";";
		//echo $request;
		$bdd = new connexion();
		return $bdd->query($request);
	}

	//SELECT champs FROM table, table WHERE id_champs = valeurs AND titre = "BB";
	public static function getSelectJointure(array $champs, array $conditionChamps, array $conditionValeur, array $signe, array $operation, array $order, array $table){
		$request = "SELECT ";
		for ($i=0; $i < sizeof($champs); $i++) { 
			$request .= $champs[$i];
			if ($i != sizeof($champs)-1) {
				$request .= ", ";
			}
		}
		$request .= " FROM ";
		for ($i=0; $i < sizeof($table); $i++) { 
			$request .= $table[$i];
			if ($i != sizeof($table)-1) {
				$request .= ", ";
			}
		}
		if (!empty($conditionChamps) || sizeof($table)>1) {
			$request .= " WHERE ";
			if (sizeof($table)>1) {
				for ($i=0; $i < sizeof($table)-1; $i++) { 
					$request .= $table[$i].".id_".$table[$i]." = ".$table[$i+1].".id_".$table[$i+1];
					if ($i != sizeof($table)-1) {
						$request .= " AND ";
					}
				}
			}
			if (!empty($conditionChamps)) {
				for ($i=0; $i < sizeof($conditionChamps); $i++) { 
					$request .= $conditionChamps[$i]." ";
					if (!empty($signe)) {
						$request .= $signe[$i]." ";
					}
					$request .= $conditionValeur[$i];
					//$request .= (is_string($conditionValeur[$i])) ? "'".$conditionValeur[$i]."'" : $conditionValeur[$i];
					if ($i != sizeof($conditionChamps)-1) {
						if ($operation[$i] == "AND") {
							$request .= " AND ";
						}
						if ($operation[$i] == "OR") {
							$request .= " OR ";
						}
					}
				}
			}
		}
		if (!empty($order)) {
			$request .= " ORDER BY ";
			for ($i=0; $i < sizeof($order); $i++) { 
				$request .= $order[$i];
				if ($i != sizeof($order)-1) {
					$request .= ", ";
				}
			}
		}
		$request .= ";";
		//echo $request;
		$bdd = new connexion();
		return $bdd->query($request);
	}
}
?>