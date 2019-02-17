<?php
// active la session
session_start();

// Chargement des fichiers de configuration
require_once('config/init.conf.php');
require_once('config/bdd.conf.php');
require_once('include/fonction.inc.php');
require_once('include/connexion.inc.php');
// Insertion header et menu HTML
include_once('include/header.inc.php');
include_once('include/nav.inc.php');
require_once('libs/Smarty.class.php');

// Insertion dans la base de données
    if (isset($_POST['inscription_usr'])) {


      /* @var $bdd PDO */
      $sql_insert = "INSERT INTO utilisateurs (nom, prenom, email, mdp) VALUES (:nom, :prenom, :email, :mdp)";

      $sth = $bdd->prepare($sql_insert);
      //securisation des variable
      $sth->bindValue(':nom',$_POST['nom'],PDO::PARAM_STR);
      $sth->bindValue(':prenom',$_POST['prenom'],PDO::PARAM_STR);
      $sth->bindValue(':email',$_POST['email'],PDO::PARAM_STR);
      $sth->bindValue(':mdp', cryptPassword($_POST['mdp']), PDO::PARAM_STR);

      $result = $sth->execute();


      //type de notification affiché selon l'action
      $notification = "<b>Felicitation</b> votre compte a été créé!";

      $_SESSION["notifications"]["message"] = $notification;
      $_SESSION["notifications"]["result"] = TRUE;

      header("Location:index.php"); //Redirection vers la page "index.php" page d'accueil
      exit();

    } else{

        $smarty = new Smarty();
        $smarty->setTemplateDir('tpl/');
        $smarty->setCompileDir('templates_c/');
        include_once('include/header.inc.php');
        include_once('include/nav.inc.php');
        $smarty->display('inscription.tpl');
    }

// Insertion footer HTML
  include_once('include/footer.inc.php');
?>
