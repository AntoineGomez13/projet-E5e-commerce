<?php
function getPage($db) {
    $lesPages = [
        'accueil' => "accueilControleur",
        'connexion' => "connexionControleur",
        'contact' => "contactControleur",
        'maillots' => "maillotsControleur",
        'déconnexion' => "deconnexionControleur",
        'maintenance' => "maintenanceControleur",
    ];
    if ($db!=null){
    if (isset($_GET['page'])){
        $page = $_GET['page'];
        } else {
        $page = 'accueil';
        }
        if (isset($lesPages[$page])){
        $contenu = $lesPages[$page];
        } else {
        $contenu = $lesPages['accueil'];
        }
    }
    else{
        $contenu = $lesPages['maintenance'];
    }
        return $contenu;
       }
?>
