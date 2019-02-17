<?php
// active la session
 session_start();
// Chargement des fichiers de configuration
require_once('config/init.conf.php');
require_once('config/bdd.conf.php'); //Fichier de configuration pour la base de donnée
require_once('include/connexion.inc.php'); //Fichier config de la connexion
require_once('include/fonction.inc.php');//Fichier avec différentes fonctions
require_once("libs/Smarty.class.php"); //appel de smarty

// Insertion header et menu HTML

include_once('include/header.inc.php'); //Fichier qui comprend le Header
include_once('include/nav.inc.php'); //Fichier qui comprend

//print_r2($_COOKIE['sid']); //Affiche le SID actuel
//print_r2($_GET['page']); //Affiche le SID actuel

//affichage de la notification
if (isset($_SESSION["notifications"]))
  {
    $color_notification = $_SESSION["notifications"]["result"] == TRUE ? 'success': 'danger';
    $_SESSION['notifications']['color'] = $color_notification;
  }

$page_courante = !empty($_GET['page']) ? $_GET['page'] : 1;
$index_depart_MySQL = indexPagination($page_courante, _nb_art_par_page);

//Appel fonction nb_art_total_publie pour calculer nb pages max -> art publiés
$nb_total_article_publie = nb_total_article_publie($bdd);
//Appel fonction nb_total_article pour calculer nb pages max -> art
$nb_total_article = nb_total_article($bdd);
//Calcul du nombre de pages en fonction du nombre d'articles publiés
$nb_pages = ceil($nb_total_article_publie / _nb_art_par_page);
//Calcul du nombre de pages en fonction du nombre total d'article
$nb_pages_total = ceil($nb_total_article / _nb_art_par_page);

//MODE CONNECTE
if(isset($_COOKIE['sid'])){ //Si SID existant alors affichage de TOUS les articles + ajout boutons modifier et supprimer

    // Recherche les élément dans la base
    $sql_select =
    "SELECT id,titre,texte,publie,
    DATE_FORMAT(date, '%d/%m/%Y') AS date_fr
    FROM article
    ORDER BY date
    LIMIT :index_depart, :nb_limit";


    $sth = $bdd->prepare($sql_select);

    $sth->bindValue(':index_depart', $index_depart_MySQL, PDO::PARAM_INT);
    $sth->bindValue(':nb_limit', _nb_art_par_page, PDO::PARAM_INT);

    $sth->execute();


    $tab_articles = $sth->fetchAll(PDO::FETCH_ASSOC);

    /*** Smarty ***/
    //Déclaration et configuration de smarty
    $smarty = new Smarty();
    $smarty->setTemplateDir('tpl');
    $smarty->setCompileDir('template_c/');

    //Envoie des variables à smarty
    $smarty->assign('tab_articles',$tab_articles);
    $smarty->assign('is_connect',$is_connect);
    $smarty->assign('session_var',$_SESSION);
    $smarty->assign('nb_pages_total',$nb_pages_total);

    unset($_SESSION['notifications']);

    include_once "include/header.inc.php";
    include_once "include/nav.inc.php";

    $smarty->display('tpl/index.tpl');

    include_once "include/footer.inc.php";

} //MODE DECONNECTE
else if(!isset($_COOKIE['sid'])){ //Sinon si pas SID alors affichage articles publiés

    // Recherche les élément dans la base
    $sql_select =
    "SELECT id,titre,texte,publie,
    DATE_FORMAT(date, '%d/%m/%Y') AS date_fr
    FROM article
    WHERE publie = :publie
    ORDER BY date
    LIMIT :index_depart, :nb_limit";

    $sth = $bdd->prepare($sql_select);
    $sth->bindValue(':publie',1, PDO::PARAM_BOOL);
    $sth->bindValue(':index_depart', $index_depart_MySQL, PDO::PARAM_INT);
    $sth->bindValue(':nb_limit', _nb_art_par_page, PDO::PARAM_INT);

    $sth->execute();

    $tab_articles = $sth->fetchAll(PDO::FETCH_ASSOC);

    /*** Smarty ***/
    //Déclaration et configuration de smarty
    $smarty = new Smarty();
    $smarty->setTemplateDir('tpl');
    $smarty->setCompileDir('template_c/');

    //Envoie des variables à smarty
    $smarty->assign('tab_articles',$tab_articles);
    $smarty->assign('is_connect',$is_connect);
    $smarty->assign('session_var',$_SESSION);
    $smarty->assign('nb_pages_publie',$nb_pages);

    unset($_SESSION['notifications']);

    include_once "include/header.inc.php";
    include_once "include/nav.inc.php";

    $smarty->display('tpl/index.tpl');

    include_once "include/footer.inc.php";

}

// Insertion du footer HTML
include_once('include/footer.inc.php');
?>
