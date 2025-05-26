<?php
$config['serveur']='10.50.0.80';
$config['login'] = 'antoine';
$config['mdp'] ='050405Ag';
$config['db'] = 'maillots2foot';

try {
        $db = new PDO('mysql:host=' . $config['serveur'] . ';dbname=' . $config['db'], 
                      $config['login'], 
                      $config['mdp']);
        echo'connexion réussi!';
    }
    catch(Exception $e) {
        // Affiche l'erreur pour diagnostiquer le problème de connexion
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }