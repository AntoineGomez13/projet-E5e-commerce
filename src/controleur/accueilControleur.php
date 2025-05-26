<?php
    function accueilControleur($twig) {
        global $twig;
        echo $twig->render('accueil.html.twig');
    }
    
    function contactControleur($twig) {
        global $twig;
        echo $twig->render('contact.html.twig');
    }

    function maintenanceControleur($twig) {
        global $twig;
        echo $twig->render('maintenance.html.twig');
    }


?>