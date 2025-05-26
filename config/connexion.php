<?php
function connect($config){
    try {
        $db = new PDO('mysql:host=' . $config['serveur'] . ';dbname=' . $config['db'], 
                      $config['login'], 
                      $config['mdp']);
        // Active la gestion des erreurs PDO
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e) {
        // Affiche l'erreur pour diagnostiquer le problème de connexion
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
        $db = NULL;
    }
    return $db;
}

?>