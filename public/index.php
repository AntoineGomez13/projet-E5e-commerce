<?php
// index.php
session_start();
require_once '../lib/vendor/autoload.php';
require_once '../config/parametres.php'; 
require_once '../config/connexion.php';
require_once '../src/controleur/_controleurs.php';
require_once '../config/routes.php';
require_once '../src/modele/_classes.php';

// Initialisation de Twig
$loader = new \Twig\Loader\FilesystemLoader('../src/vue/');
$twig = new \Twig\Environment($loader, []);

// Appel du contrôleur avec $twig
$db= connect($config);
$twig->addGlobal('session', $_SESSION);
$contenu = getPage($db);  // Appelle la fonction qui retourne le contrôleur à charger
$contenu($twig,$db);  // Charge le contrôleur et passe Twig à la fonction

?>

