<?php
class Utilisateur{
 
    private $db;
    private $insert;
    private $connect;
 
    public function __construct($db){
        $this->db = $db;
        $this->insert = $this->db->prepare("insert into utilisateur(email, mdp, nom, prenom,idRole) values (:email, :mdp, :nom, :prenom, :role)");
        $this->connect = $this->db->prepare("select email, idRole, mdp from utilisateur where email=:email");
    }
        public function insert($email, $mdp, $role, $nom, $prenom){
            $r = true;
            $this->insert->execute(array(':email'=>$email, ':mdp'=>$mdp, ':role'=>$role,':nom'=>$nom, ':prenom'=>$prenom));
            if ($this->insert->errorCode()!=0){ print_r($this->insert->errorInfo());
                $r=false;
            }
        return $r;
}
 
        public function connect($email){
            $unUtilisateur = $this->connect->execute(array(':email'=>$email));
            if ($this->connect->errorCode()!=0){
                print_r($this->connect->errorInfo());
            }
            return $this->connect->fetch();
        }
}

class maillots2foot {
 
    private $db;
    private $insert;
    private $select;
 
    public function __construct($db) {
        if (!$db instanceof PDO) {
            die("Erreur : l'objet passé n'est pas une instance de PDO");
        }

        $this->db = $db;

        $this->select = $db->prepare("
            SELECT 
                maillots.id_maillot,
                maillots.nom_equipe,
                championnats.nom AS nom_championnat,
                pays.nom AS nom_pays,
                pays.continent,
                maillots.prix,
                maillots.taille_disponible,
                maillots.lien_image,
                maillots.stock
            FROM 
                maillots
            LEFT JOIN 
                championnats ON maillots.id_championnat = championnats.id_championnat
            LEFT JOIN 
                pays ON maillots.id_pays = pays.id_pays
        ");

        $this->insert = $db->prepare("
            INSERT INTO utilisateurs (email, mdp, role, nom, prenom) 
            VALUES (:email, :mdp, :role, :nom, :prenom)
        ");
    }

    public function insert($email, $mdp, $role, $nom, $prenom) {
        $r = true;
        try {
            $this->insert->execute(array(
                ':email' => $email, 
                ':mdp' => $mdp, 
                ':role' => $role, 
                ':nom' => $nom, 
                ':prenom' => $prenom
            ));
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion : " . $e->getMessage();
            $r = false;
        }
        return $r;
    }

    public function select() {
        try {
            $this->select->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de la sélection : " . $e->getMessage();
            return [];
        }
        return $this->select->fetchAll();
    }
}
?>