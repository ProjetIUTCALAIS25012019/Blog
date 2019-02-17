<?php

try {

	$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
	$bdd->exec("set names utf8");
	// Attention ne pas faire ça en prod
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $e) {

	die('Erreur : ' . $e->getMessage());
}

?>