<?php
include('connect.php');

function displayByAgence($bdd,$agence,$speed){
    if ($agence){
    $resultats=$bdd->prepare("SELECT * FROM  immo_mandats AS M, immo_agences AS A WHERE MAN_WEB = 1  AND M.AGE_ID = ".$agence." AND M.AGE_ID = A.AGE_ID");
    $resultats->execute();
    $result = $resultats->fetchAll();
    // Code pour compter le nombre d'annonces par agence
    $count = $bdd->prepare("SELECT COUNT(MAN_ID) FROM immo_mandats AS M, immo_agences AS A WHERE MAN_WEB = 1  AND M.AGE_ID = ".$agence." AND M.AGE_ID = A.AGE_ID");
    $count ->execute();
    $counter = $count->fetch(PDO::FETCH_COLUMN);
    
	 global $total_time;
    $total_time = $counter * $speed;
	$count->closeCursor();

    // Total en ms
  
    foreach($result as $key => $value){
        
        $id = $value['MAN_ID'];
        // Requête permettant de selectionner les photos de l'annonce
        $photo=$bdd->prepare("SELECT PHO_SRC FROM immo_photos WHERE MAN_ID = ".$id);
        $photo->execute();
        $picture = $photo->fetchAll();
        
        echo "<li>";
        echo "<h1>".$value['MAN_TITRE']."</h1>";
        echo $value['MAN_DESCR']."<br/><br/>";
        if(($value['MAN_VEN_LOC']) == "0"){echo "<h2>A VENDRE</h2>";}else{echo "<h2>A LOUER</h2>";}
        echo "<br/><br/>";
        echo "<b>".$value['MAN_REG_LIB']." ".$value['MAN_VILLE']." ".$value['MAN_CP']."</b><br/>";
        echo $value['MAN_ADR1']."<br/><br/>";
        echo "<b>Tarif</b> : ".$value['MAN_TARIF']." euros";
        if(($value['MAN_VEN_LOC']) == "1"){echo" par mois";}
        echo "<br/><br/>";
		 echo "<div class='bloc_img'>";
        echo "<div class='bloc_img_big'>";
		if (isset($picture[0]['PHO_SRC'])){ echo "<img src='http://ns366377.ovh.net/~giraud/immo/photos/Z".$picture[0]['PHO_SRC']."' alt='photo0'/> ";}else{}
        if (isset($picture[1]['PHO_SRC'])){ echo "<img src='http://ns366377.ovh.net/~giraud/immo/photos/Z".$picture[1]['PHO_SRC']."' alt='photo1'/> ";}else{}
        if (isset($picture[2]['PHO_SRC'])){ echo "<img src='http://ns366377.ovh.net/~giraud/immo/photos/Z".$picture[2]['PHO_SRC']."' alt='photo2'/> ";}else{}
        if (isset($picture[3]['PHO_SRC'])){ echo "<img src='http://ns366377.ovh.net/~giraud/immo/photos/Z".$picture[3]['PHO_SRC']."' alt='photo3'/> ";}else{}
        if (isset($picture[4]['PHO_SRC'])){ echo "<img src='http://ns366377.ovh.net/~giraud/immo/photos/Z".$picture[4]['PHO_SRC']."' alt='photo4'/> ";}else{}
         echo"</div>";
        echo "</div>";
     echo "</li>";
    };
    $resultats->closeCursor();

}else{
        $resultats=$bdd->prepare("SELECT * FROM  immo_mandats AS M WHERE MAN_WEB = 1");
    $resultats->execute();
    $result = $resultats->fetchAll();
    // Code pour compter le nombre d'annonces par agence
    $count = $bdd->prepare("SELECT COUNT(MAN_ID) FROM immo_mandats AS M WHERE MAN_WEB = 1");
    $count ->execute();
	$counter = $count->fetch(PDO::FETCH_COLUMN);
    
    global $total_time;
	$total_time = $counter * $speed;

	$count->closeCursor();
    

    foreach($result as $key => $value){
        
        $id = $value['MAN_ID'];
        // Requête permettant de selectionner les photos de l'annonce
        $photo=$bdd->prepare("SELECT PHO_SRC FROM immo_photos WHERE MAN_ID = ".$id);
        $photo->execute();
        $picture = $photo->fetchAll();
        //resultats en ms
        echo "<li>";
        echo "<h1>".$value['MAN_TITRE']."</h1>";
        echo $value['MAN_DESCR']."<br/><br/>";
        if(($value['MAN_VEN_LOC']) == "0"){echo "<h2>A VENDRE</h2>";}else{echo "<h2>A LOUER</h2>";}
        echo "<br/><br/>";
        echo "<b>".$value['MAN_REG_LIB']." ".$value['MAN_VILLE']." ".$value['MAN_CP']."</b><br/>";
        echo $value['MAN_ADR1']."<br/><br/>";
        echo "<b>Tarif</b> : ".$value['MAN_TARIF']." euros";
        if(($value['MAN_VEN_LOC']) == "1"){echo" par mois";}
        echo "<br/><br/>";
        echo "<div class='bloc_img'>";
        echo "<div class='bloc_img_big'>";
        if (isset($picture[0]['PHO_SRC'])){ echo "<img src='http://ns366377.ovh.net/~giraud/immo/photos/Z".$picture[0]['PHO_SRC']."' alt='photo0'/> ";}else{}
        if (isset($picture[1]['PHO_SRC'])){ echo "<img src='http://ns366377.ovh.net/~giraud/immo/photos/Z".$picture[1]['PHO_SRC']."' alt='photo1'/> ";}else{}
        if (isset($picture[2]['PHO_SRC'])){ echo "<img src='http://ns366377.ovh.net/~giraud/immo/photos/Z".$picture[2]['PHO_SRC']."' alt='photo2'/> ";}else{}
        if (isset($picture[3]['PHO_SRC'])){ echo "<img src='http://ns366377.ovh.net/~giraud/immo/photos/Z".$picture[3]['PHO_SRC']."' alt='photo3'/> ";}else{}
        if (isset($picture[4]['PHO_SRC'])){ echo "<img src='http://ns366377.ovh.net/~giraud/immo/photos/Z".$picture[4]['PHO_SRC']."' alt='photo4'/> ";}else{}
         echo"</div>";
        echo "</div>";
     echo "</li>";
    };

    $resultats->closeCursor();
        }
}

?>