<?php
    function maillotsControleur($twig, $db){
        $form = array();
        $maillots2foot = new maillots2foot($db);
        $liste = $maillots2foot->select();
        echo $twig->render('maillots.html.twig', array('form'=>$form,'liste'=>$liste));
       }
?>