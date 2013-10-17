<?php 
require ('../Model/requete.php');

if (isset($_POST['action']) && $_POST['action'] == 'end_loop_data')
{
	if(isset($GET['agence'])){
	$datas = agence($_GET['agence']);
	$agence = $_GET['agence'];}
	else{
	$datas = displayByAgence($bdd, $agence,$speed);
	}
	
	if(isset($_POST['speed']) && $_POST['speed'] != '') $speed = $_POST['speed'];
	else $speed = 3000;

	require ('../View/view.php');

}
?>