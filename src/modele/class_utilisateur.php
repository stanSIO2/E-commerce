<?php
class Utilisateur{ 
    private $db;
    private $insert;
    private $connect;
    private $select;
    public function __construct($db){
        $this->db = $db;
        $this->insert = $this->db->prepare("insert into utilisateur(email, mdp, nom, prenom, idRole) values (:email, :mdp, :nom, :prenom, :role)");
        $this->connect = $this->db->prepare("select email, idRole, mdp from utilisateur where email=:email");
        $this->select = $db->prepare("select u.id, email, idRole, nom, prenom, r.libelle as libellerole from utilisateur u, rôle r where u.idRole = r.id order by nom");
    }
    public function insert($email, $mdp, $role, $nom, $prenom){ // Étape 3
        $r = true;
        $this->insert->execute(array(':email'=>$email, ':mdp'=>$mdp, ':role'=>$role, ':nom'=>$nom, ':prenom'=>$prenom));
        if ($this->insert->errorCode()!=0){
            print_r($this->insert->errorInfo()); 
            $r=false;
        }
        return $r;
       }

    public function connect($email){
        $this->connect->execute(array(':email'=>$email));
        if ($this->connect->errorCode()!=0){ 
        print_r($this->connect->errorInfo());
        }
        return $this->connect->fetch();
       }

    public function select(){
        $this->select->execute();
        if ($this->select->errorCode()!=0){
        print_r($this->select->errorInfo());
        }
        return $this->select->fetchAll();
       }
    }
?>