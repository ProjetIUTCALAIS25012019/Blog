<?php
function cryptPassword($mdp){
    $mdp_crypt = sha1($mdp);
    return $mdp_crypt;
}

function sid($email){
    $sid = md5($email . time());
    return $sid;
}

function indexPagination($page_courante, $nb_article_par_page) {
    $index = ($page_courante - 1) * $nb_article_par_page;
    return $index;
}

function nb_total_article_publie($bdd){
    $sql = "SELECT COUNT(*) as nb_total_article_publie "
            . "FROM article "
            . "WHERE publie = 1 ";

    $sth = $bdd->prepare($sql);
    $sth->execute();
    $tab_result = $sth->fetch(PDO::FETCH_ASSOC);

    return $tab_result['nb_total_article_publie'];
}

function nb_total_article($bdd){
    $sql = "SELECT COUNT(*) as nb_total_article "
            . "FROM article ";

    $sth = $bdd->prepare($sql);
    $sth->execute();
    $tab_result = $sth->fetch(PDO::FETCH_ASSOC);

    return $tab_result['nb_total_article'];
}

function searchArticle($bdd, $req) {
    $sql =
    "SELECT id, titre, texte, publie, DATE_FORMAT(date, '%d/%m/%Y') as date_fr
     FROM article
     WHERE titre LIKE :req OR texte LIKE :req ";

     $sth = $bdd->prepare($sql);
     $sth->bindValue(':req',$req, PDO::PARAM_STR);
     $sth->execute();

     $tab_articles = $sth->fetchAll(PDO::FETCH_ASSOC);

    return $tab_articles;
}
