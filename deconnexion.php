<?php
// active la session
 session_start();
// Chargement des fichiers de configuration
  require_once('config/init.conf.php');
  require_once('config/bdd.conf.php');
  require_once('include/fonction.inc.php');

setcookie('sid','',-1);
//Redirection vers l'index (Page d'accueil)
header('Location: index.php');
  ?>
