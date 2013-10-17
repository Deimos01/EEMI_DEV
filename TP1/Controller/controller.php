<?php
require ('../View/head.php');
require ('../Model/requete.php');

if (isset($_GET["agence"])){
    $agence = $_GET["agence"];
}
else{
    $agence=0;
}
if(isset($_GET["speed"])){
    $speed = ($_GET["speed"]);
}
else{
    $speed="3000";
}

displayByAgence($bdd, $agence,$speed);

require ('../View/view.php');


?>
