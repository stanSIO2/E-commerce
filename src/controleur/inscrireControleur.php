<?php
    function inscrireControleur($twig, $db){
            $form = array();
            if (isset($_POST['btInscrire'])){
                $inputEmail = $_POST['email'];
                $inputPassword = $_POST['password'];
                $inputPassword2 =$_POST['confirm_password'];
                $nom = $_POST['nom'];
                $prenom =$_POST['prenom'];
                $role = $_POST['role'];
                $form['valide'] = true;
                if ($inputPassword!=$inputPassword2){
                    $form['valide'] = false; 
                    $form['message'] = 'Les mots de passe sont différents';
                }
                else{
                    try{
                        $utilisateur = new Utilisateur($db);
                        $utilisateur->insert($inputEmail, password_hash($inputPassword, PASSWORD_DEFAULT), $role, $nom, $prenom);
                    }catch(Exception $e){
                        $form['valide'] = false; 
                        $form['message'] = 'Problème d\'insertion dans la table utilisateur '. $e;
                    }
                }
                $form['email'] = $inputEmail;
                $form['role'] = $role;
            }
        echo $twig->render('inscrire.html.twig', array('form'=>$form));
        var_dump($inputPassword, $inputPassword2);
        }
?>