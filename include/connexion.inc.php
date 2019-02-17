<?php


  $is_connect = FALSE;
  //verification si cookie existe et non nul
if (isset($_COOKIE['sid']) AND !empty($_COOKIE['sid'])){
    /* @var $bdd PDO */
    $select = "SELECT * FROM utilisateurs WHERE sid = :sid";
    
    $sth = $bdd->prepare($select);
    //securisation des données 
    $sth->bindValue(':sid', $_COOKIE['sid'], PDO::PARAM_STR); 
    
    $sth->execute();
    
    if($sth->rowCount() > 0 ){
        $tab_result_connexion = $sth->fetch(PDO::FETCH_ASSOC);
        
        $is_connect = TRUE; 
        $nom_connect = $tab_result_connexion['nom'];
        $prenom_connect = $tab_result_connexion['prenom'];
    }
}
/*var_dump($is_connect);

            $article = '<li class="nav-item"> <a class="nav-link" href="article.php">Article</a></li>';
            $connexion = '<li class="nav-item"> <a class="nav-link" href="connexion.php">Connexion</a> </li>';
if ($is_connect == FALSE){
    echo $connexion;
    
} else{
    echo $article; 
}       */
?>