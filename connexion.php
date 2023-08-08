<?php
class maConnexion{

    private $nomBaseDeDonnees/* = ""*/;
    private $motDePasse/* = ""*/;
    private $utilisateur/* = "root"*/;
    private $hote/* = "localhost"*/;
    private $connexionPDO;

    public function __construct($nomBaseDeDonnees, $motDePasse, $utilisateur, $hote){
        $this ->nomBaseDeDonnees = $nomBaseDeDonnees;
        $this ->motDePasse = $motDePasse;
        $this ->utilisateur = $utilisateur;
        $this ->hote = $hote;

        try {
            $dsn = "mysql:host=$this->hote;dbname=$this->nomBaseDeDonnees;charset=utf8mb4";
            $this->connexionPDO = new PDO($dsn, $this ->utilisateur, $this ->motDePasse);
            $this->connexionPDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }

    }

    public function select($table,$colonne, $ConditionField = 1){
        try {
            $requete = "SELECT $colonne FROM $table WHERE $ConditionField";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat ->fetchAll(PDO::FETCH_ASSOC);
            
            return $resultat;
            
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }

    }

    public function insertionProduit($Nom, $Prix, $Description){
        try {
            $requete = "INSERT INTO produit (Nom, Prix, Description) VALUES(:nom, :prix, :description)";
            $requete_prepare = $this->connexionPDO->prepare($requete);

            $requete_prepare->bindParam(':nom',$Nom,PDO::PARAM_STR, 25);
            $requete_prepare->bindParam(':prix',$Prix,PDO::PARAM_INT, 25);
            $requete_prepare->bindParam(':description',$Description,PDO::PARAM_STR);

            $requete_prepare->execute();
            return $requete_prepare;

        }catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    public function secureUpdate($table, $colonne, $valeurs, $id, $numero){
        try{
            $requete = "UPDATE $table SET $colonne = ? WHERE $id = ?";
            $requete_prepare = $this->connexionPDO->prepare($requete);

            $requete_prepare->bindValue(1, $valeurs,PDO::PARAM_STR);
            $requete_prepare->bindValue(2, $numero,PDO::PARAM_INT);

            $requete_prepare->execute();

            return $requete_prepare;
            

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    public function secureDelete($table,$id,$valeur){
        try{
            $requete = "DELETE FROM $table WHERE $id = $valeur";
            $requete_prepare = $this->connexionPDO->prepare($requete);

            $requete_prepare->execute();

            return $requete_prepare;
            

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}

$connexion = new maConnexion('immo','','root','localhost');
?>