<?php
class produit{ 
    private $db;
    private $insert;
    private $select;
    public function __construct($db){
        $this->db = $db;
        $this->insert = $this->db->prepare("insert into produit(designation, description, prix, idType) values (:designation, :description, :prix, :idType)");
        $this->select = $db->prepare("select u.id, email, idRole, nom, prenom, r.libelle as libellerole from utilisateur u, rôle r where u.idRole = r.id order by nom");
    }

    public function insert($designation, $description, $prix, $idType){ // Étape 3
        $r = true;
        $this->insert->execute(array(':designation'=>$designation, ':description'=>$description, ':prix'=>$prix, ':idType'=>$idType));
        if ($this->insert->errorCode()!=0){
            print_r($this->insert->errorInfo()); 
            $r=false;
        }
        return $r;
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