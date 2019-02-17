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




if(isset($_GET['search'])) {

  $recherche = "%".$_GET['search']."%";
  $tab_articles = searchArticle($bdd,$recherche);

  /*** Smarty ***/
  //Déclaration et configuration de smarty
  $smarty = new Smarty();
  $smarty->setTemplateDir('tpl');
  $smarty->setCompileDir('template_c/');

  //Envoie des variables à smarty
  $smarty->assign('tab_articles',$tab_articles);

  include_once "include/header.inc.php";
  include_once "include/nav.inc.php";

  $smarty->display('tpl/recherche.tpl');

  include_once "include/footer.inc.php";

}

  // Insertion footer HTML
  include_once('include/footer.inc.php');
?>
