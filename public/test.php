<?php
    $config['serveur']='localhost';
    $config['login'] = 'root';
    $config['mdp'] ='';
    $config['db'] = 'Avventura';


try{
    new PDO('mysql:host='.$config['serveur'].';dbname='.$config['db'],$config['login'],$config['mdp']);
    echo'connection réussie sur '. $config['db'];
}
    catch(Exception $rrt){
        echo $rrt;
}



