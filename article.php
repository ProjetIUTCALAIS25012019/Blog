<?php
// active la session
session_start();

// Chargement des fichiers de configuration
require_once('config/init.conf.php');
require_once('config/bdd.conf.php');
require_once('include/connexion.inc.php');
require_once("libs/Smarty.class.php"); //appel de smarty
// Insertion header et menu HTML
include_once('include/header.inc.php');
include_once('include/nav.inc.php');

//Initialisation de la variable type - si n'existe pas = defaut
$type = isset($_GET['type']) ? $_GET['type'] : 'defaut' ;

//affichage de la notification
if (isset($_SESSION["notifications"]))
  {
    $color_notification = $_SESSION["notifications"]["result"] == TRUE ? 'success': 'danger';
    $_SESSION['notifications']['color'] = $color_notification;
  }



/*************************************************************************************************************************************/
/*                                          AFFICHAGE PAGE PAR DEFAUT (AJOUT D'ARTICLE)                                              */
/*************************************************************************************************************************************/

//Si type = afficherplus alors affichage page par défaut
if($type == "defaut"){

   /*** Smarty ***/
   //Déclaration et configuration de smarty
   $smarty = new Smarty();
   $smarty->setTemplateDir('tpl');
   $smarty->setCompileDir('template_c/');

   //Envoie des variables à smarty
   $smarty->assign('type',$type);

   include_once "include/header.inc.php";
   include_once "include/nav.inc.php";

   $smarty->display('tpl/article.tpl');

   include_once "include/footer.inc.php";

}


/*************************************************************************************************************************************/
/*                                                   FONCTION AJOUT DE L'ARTICLE                                                     */
/*************************************************************************************************************************************/
// IF pour l'ajout d'un article
if (isset($_POST['ajouter'])) {

//affiche le tableau données en brut
print_r2($_POST);
//affiche le tableau info image
print_r2($_FILES);

      $publie = isset($_POST["publie"])? $_POST["publie"]:0;
      $date = date("Y-m-d");

      /* @var $bdd PDO */
      $sql_insert = "INSERT INTO article(titre, texte, publie, date) VALUES (:titre, :texte, :publie, :date)";

      $sth = $bdd->prepare($sql_insert);

      //securisation des variable
      $sth->bindValue(':titre',$_POST['titre'],PDO::PARAM_STR);
      $sth->bindValue(':texte',$_POST['texte'],PDO::PARAM_STR);
      $sth->bindValue(':publie',$publie,PDO::PARAM_BOOL);
      $sth->bindValue(':date',$date,PDO::PARAM_STR);

      $result = $sth->execute();
      var_dump($result);

      //Traitement de l'image
      $id_article=$bdd->lastInsertId();

      if ($_FILES["image"]["error"]==0){
          $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
          $extension = strtolower($extension);

          $result_img = move_uploaded_file($_FILES["image"]["tmp_name"], 'images/'. $id_article.'.'.$extension);
      }
     //type de notification affiché selon l'action
      $notification = "<b>Felicitation</b> votre article a été créé !";
      $result_notification = TRUE; // Si TRUE Affichage d'une notification OK

      $_SESSION["notifications"]["message"] = $notification;
      $_SESSION["notifications"]["result"] = $result_notification;

      echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
      exit();

  }



/*************************************************************************************************************************************/
/*                                                    AFFICHAGE DE L'ARTICLE                                                         */
/*************************************************************************************************************************************/
//Si type = afficherplus alors affichage page par défaut
if($type == "afficherplus"){

  /* Recherche de l'article à afficher
  $sql_select =
  "SELECT id,titre,texte,publie,
   DATE_FORMAT(date, '%d/%m/%Y') AS date_fr
   FROM article
   WHERE id = :id";*/

   $sql_select =
   "SELECT art.id,art.titre,art.texte,
    DATE_FORMAT(art.date, '%d/%m/%Y') AS date_fr, com.pseudo, com.email, com.commentaire
    FROM article art
    LEFT JOIN commentaires AS com
    ON art.id = com.id_article
    WHERE art.id = :id";

   $sth = $bdd->prepare($sql_select);
   $sth->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
   $sth->execute();

   $tab_article = $sth->fetchAll(PDO::FETCH_ASSOC);

   /*** Smarty ***/
   //Déclaration et configuration de smarty
   $smarty = new Smarty();
   $smarty->setTemplateDir('tpl');
   $smarty->setCompileDir('template_c/');
   $smarty->assign('session_var',$_SESSION);

   //Envoie des variables à smarty
   $smarty->assign('type',$type);
   $smarty->assign('tab_article',$tab_article);

   unset($_SESSION['notifications']);

   include_once "include/header.inc.php";
   include_once "include/nav.inc.php";

   $smarty->display('tpl/article.tpl');

   include_once "include/footer.inc.php";
}

/*************************************************************************************************************************************/
/*                                                FONCTION D'AJOUT DE COMMENTAIRE                                                    */
/*************************************************************************************************************************************/
// IF/SI pour la modification d'un article
if (isset($_POST['ajoutCommentaire'])) {

/* @var $bdd PDO */
//Requete SQL pour la mise à jour de la base avec la commande (Update)
$sql_insert = "INSERT INTO commentaires (pseudo,email,commentaire,id_article) VALUES (:pseudo,:email,:commentaire,:id_article)";
//Traduction : Ajout de

$sth = $bdd->prepare($sql_insert);

//securisation des variable
$sth->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
$sth->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$sth->bindValue(':commentaire', $_POST['commentaire'], PDO::PARAM_STR);
$sth->bindValue(':id_article', $_POST['id_article'], PDO::PARAM_INT);
$result = $sth->execute();

//type de notification affiché selon l'action
$notification = "<b>Felicitation</b> votre commentaire a été ajouté !";
$result_notification = TRUE;

$_SESSION["notifications"]["message"] = $notification;
$_SESSION["notifications"]["result"] = $result_notification;

//Ajout de la classe couleur dans $color_notification
$_SESSION['notifications']['color'] = $color_notification;

//On met l'url de l'article dans une variable pour la redirection
$page_article = "article.php?type=afficherplus&id=".$_POST['id_article'] ;

//Redirection vers la page de l'article en récupérant son ID
echo "<script type='text/javascript'>document.location.replace('$page_article');</script>";
exit();
}

/*************************************************************************************************************************************/
/*                                                     MODIFICATION DE L'ARTICLE                                                     */
/*************************************************************************************************************************************/
//Si type = modifier alors affichage page modifier
if($type == "modifier"){

  // Recherche de l'article à modifier
  $sql_select =
  "SELECT id,titre,texte,publie,
  DATE_FORMAT(date, '%d/%m/%Y') AS date_fr
  FROM article
  WHERE id = :id";
  //Traitement
  $sth = $bdd->prepare($sql_select);
  $sth->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
  $sth->execute();

  $tab_article = $sth->fetchAll(PDO::FETCH_ASSOC);

  /*** Smarty ***/
  //Déclaration et configuration de smarty
  $smarty = new Smarty();
  $smarty->setTemplateDir('tpl');
  $smarty->setCompileDir('template_c/');

  //Envoie des variables à smarty
  $smarty->assign('type',$type);
  $smarty->assign('tab_article',$tab_article);
  //Inclue la navbar / Menu et le Header
  include_once "include/header.inc.php";
  include_once "include/nav.inc.php";
  //Lien du Smarty
  $smarty->display('tpl/article.tpl');
  //Inclue le footer (Bas de page)
  include_once "include/footer.inc.php";

}


/*************************************************************************************************************************************/
/*                                              FONCTION MODIFICATION DE L'ARTICLE                                                   */
/*************************************************************************************************************************************/
// IF/SI pour la modification d'un article
if (isset($_POST['modifier'])) {

//var_dump($_POST);
$publie = isset($_POST['publie']) ? $_POST['publie'] : '0' ;

$date = date("Y-m-d"); //Insert de la date dans une variable

/* @var $bdd PDO */
//Requete SQL pour la mise à jour de la base avec la commande (Update)
$sql_update = "UPDATE article SET titre=:titre, texte=:texte, publie=:publie WHERE id=:id";
//Traduction : Mise à jour du titre, texte, publie de la table article avec comme reference l'ID.
$sth = $bdd->prepare($sql_update);

//securisation des variable
$sth->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
$sth->bindValue(':texte', $_POST['texte'], PDO::PARAM_STR);
$sth->bindValue(':publie', $publie, PDO::PARAM_INT);
$sth->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
$result = $sth->execute();

//Traitement de l'image
$id_article= $_POST['id'];

if ($_FILES["image"]["error"]==0){
    $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $extension = strtolower($extension);

    //Suppression d'image existance pour remplacement
    unlink('images/'.$id_article.'.'.$extension);

    //Rajout de la nouvelle image
    $result_img = move_uploaded_file($_FILES["image"]["tmp_name"], 'images/'. $id_article.'.'.$extension);
}

//type de notification affiché selon l'action
$notification = "<b>Felicitation</b> votre article a été modifié !";
$result_notification = TRUE;

$_SESSION["notifications"]["message"] = $notification;
$_SESSION["notifications"]["result"] = $result_notification;

echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
exit();
}




/*************************************************************************************************************************************/
/*                                             AFFICHAGE PAGE DE SUPPRESSION D'ARTICLE                                               */
/*************************************************************************************************************************************/

//Si type = afficherplus alors affichage page par défaut
if($type == "supprimer"){

   /*** Smarty ***/
   //Déclaration et configuration de smarty
   $smarty = new Smarty();
   $smarty->setTemplateDir('tpl');
   $smarty->setCompileDir('template_c/');

   //Envoie des variables à smarty
   $smarty->assign('type',$type);
   $smarty->assign('id_art',$_GET['id']);

   include_once "include/header.inc.php";
   include_once "include/nav.inc.php";

   $smarty->display('tpl/article.tpl');

   include_once "include/footer.inc.php";

}


/*************************************************************************************************************************************/
/*                                                    SUPPRESSION DE L'ARTICLE                                                       */
/*************************************************************************************************************************************/

if (isset($_POST['supprimer'])) {

    /* @var $bdd PDO */
    $sql_supp = "DELETE FROM article WHERE id=:id";
    $sql_supp_coms = "DELETE FROM commentaires WHERE id_article=:id";
    $sth = $bdd->prepare($sql_supp);
    $sth_2 = $bdd->prepare($sql_supp_coms);

      //securisation des variable
      $sth->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
      $sth_2->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
      $result = $sth->execute();
      $result2 = $sth_2->execute();

      //Suppression de l'image
      $id_art= $_POST['id'];

      //Suppression d'image
      unlink('images/'.$id_art.'.jpg');

      //type de notification affiché selon l'action
      $notification = "<b>Felicitation</b> votre article a été supprimé !";
      $result_notification = TRUE;

      $_SESSION["notifications"]["message"] = $notification;
      $_SESSION["notifications"]["result"] = $result_notification;

      echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
      exit();
  }
?>
