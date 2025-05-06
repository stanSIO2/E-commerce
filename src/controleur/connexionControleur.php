<?php
function connexionControleur($twig, $db){
    $form = array();
 
 if (isset($_POST['btConnecter'])){
    $form['valide'] = true;
    $inputEmail = $_POST['email'];
    $inputPassword = $_POST['password'];
    $utilisateur = new Utilisateur($db);
    $unUtilisateur = $utilisateur->connect($inputEmail);
    if ($unUtilisateur!=null){
        if(!password_verify($inputPassword,$unUtilisateur['mdp'])){
            $form['valide'] = false;
            $form['message'] = 'Login ou mot de passe incorrect';
        }
        else{
            $_SESSION['login'] = $inputEmail; 
            $_SESSION['role'] = $unUtilisateur['idRole']; header("Location:index.php");
        }
    }
    else{
        $form['valide'] = false;
        $form['message'] = 'Login ou mot de passe incorrect';
       }
    }
    echo $twig->render('connexion.html.twig', array('form'=>$form));
}