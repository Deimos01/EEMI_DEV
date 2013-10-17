<?php
	try
	{
		$PARAM_hote='ns366377.ovh.net'; //le chemin vers le serveur
		$PARAM_port='3306';
		$PARAM_nom_bd ='coursdev'; 
		$PARAM_utilisateur ='coursdev'; 
		$PARAM_mot_passe ='deveemi';
		//Options de connexion
		$options = array(
					PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$bdd = new
		PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.
		';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, 
		$PARAM_mot_passe, $options);
	}
	catch ( Exception $e)
	{
		echo "Connection à Mysql impossible :", $e->getMessage();
		die();
	}
?>