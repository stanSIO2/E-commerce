<?php
    function accueilControleur($twig){ 
        echo $twig->render('accueil.html.twig');
    }
    function contactControleur(){
        echo 'Contact';
    }
    function mentionControleur(){
        echo 'Mentions légales';
    }
    function proposControleur(){
        echo 'A propos';
    }
    function maintenanceControleur(){
        echo 'maintenance';
    }
?>