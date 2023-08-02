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
            echo "Tu es connectée ma belle! ";

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }

    }

    public function select($table,$colonne){
        try {
            $requete = "SELECT $colonne FROM $table";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat ->fetchAll(PDO::FETCH_ASSOC);
            
            return $resultat;
            
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }

    }

    public function selectOptions($table,$quoi,$colonne,$operateur,$condition){
        try {
            $requete = "SELECT $quoi FROM $table WHERE $colonne $operateur $condition";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat ->fetchAll(PDO::FETCH_ASSOC);
            
            return $resultat;
            

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    public function selectCleEtrangere($table1,$quoi,$table2,$colonne){
        try {
            $requete = "SELECT $quoi FROM $table1 INNER JOIN $table2 ON $table1.$colonne = $table2.$colonne";
            $resultat = $this->connexionPDO->query($requete);
            $resultat = $resultat ->fetchAll(PDO::FETCH_ASSOC);
            
            return $resultat;
            
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        } 
    }

    public function insert($table, $colonnes, $interrogation, $valeurs){
        try {
            $requete = "INSERT INTO $table ($colonnes) VALUES ($interrogation)";
            $resultat = $this->connexionPDO->prepare($requete);
            $resultat->execute([$valeurs]);

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    /* la facton que Marc a faite
    public function insertmarco($Table, $Values){
    try {
        $ToString = '"' . join('","', $Values) . '"';
        $ToString = str_replace('""', "NULL", $ToString); //bad - NULL est transformé en "" (empty string)

        //INSERT INTO `utilisateur`(`NameLast`, `NameFirst`, `Email`, `Birthday`, `idUser`, `Image`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')
        $SQLQueryString = "INSERT INTO $Table (NameLast, NameFirst, Email, Birthday, idUser, Image) VALUES ($ToString)";

        $Result = $this->connexionPDO->query($SQLQueryString);
        return true;

    }catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();

        return false;
  }
}
//NULL devrait être "NULL", but idc enough
$Result = $connexion->insertmarco("utilisateur", array("Doe", "Jane", "email@domain", "20230101", NULL, "path/to/image.jpg"));
*/

    /*fonction sécurisée grâce au prepare eu au bindParam/value*/
    public function insertionProduit($Nom, $Prix, $Description){
        try {
            $requete = "INSERT INTO produit (Nom, Prix, Description) VALUES(:nom, :prix, :description)";
            $requete_prepare = $this->connexionPDO->prepare($requete);

            $requete_prepare->bindParam(':nom',$Nom,PDO::PARAM_STR, 25);
            $requete_prepare->bindParam(':prix',$Prix,PDO::PARAM_INT, 25);
            $requete_prepare->bindParam(':description',$Description,PDO::PARAM_STR);

            $requete_prepare->execute();
            return $requete_prepare;
            echo 'insertion reussie';
        }catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    public function insertionClient($nom, $adresse, $email){
        try {
            $requete = "INSERT INTO client (Nom, Adresse, AdresseEmail) VALUES(:nom, :adresse, :adresseEmail)";
            $requete_prepare = $this->connexionPDO->prepare($requete);

            $requete_prepare->bindParam(':nom',$nom,PDO::PARAM_STR);
            $requete_prepare->bindParam(':adresse',$adresse,PDO::PARAM_STR);
            $requete_prepare->bindParam(':adresseEmail',$email,PDO::PARAM_STR);

            $requete_prepare->execute();
            echo 'insertion reussie';

            return $requete_prepare;
            
        }catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    public function insertionCommande($date, $montantTotal, $idclient){
        try {
            $requete = "INSERT INTO commande (Date, MontantTotal, ID_Client) VALUES(:date, :montantTotal, :idclient)";
            $requete_prepare = $this->connexionPDO->prepare($requete);

            $requete_prepare->bindParam(':date',$date,PDO::PARAM_STR);
            $requete_prepare->bindParam(':montantTotal',$montantTotal,PDO::PARAM_STR);
            $requete_prepare->bindParam(':idclient',$idclient,PDO::PARAM_STR);

            $requete_prepare->execute();
            echo 'insertion reussie';

            return $requete_prepare;
            
        }catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    public function update($table, $colonne, $valeurs, $id, $numero){
        try{
            $requete = "UPDATE $table SET $colonne = '$valeurs' WHERE $id = $numero";
            $resultat = $this->connexionPDO->prepare($requete);
            $resultat->execute();

        } catch (PDOException $e) {
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
            echo 'modification reussie';
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
            echo 'modification reussie';
            return $requete_prepare;
            

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    public function updateProduit($nom, $prix, $description, $id){
        try{
            $requete = "UPDATE produit SET Nom = ?, Prix = ?, Description = ? WHERE ID_Produit = ?";
            $requete_prepare = $this->connexionPDO->prepare($requete);

            $requete_prepare->bindValue(1, $nom,PDO::PARAM_STR);
            $requete_prepare->bindValue(2, $prix,PDO::PARAM_STR);
            $requete_prepare->bindValue(3, $description,PDO::PARAM_STR);
            $requete_prepare->bindValue(4, $id,PDO::PARAM_INT);

            $requete_prepare->execute();
            echo 'modification reussie';
            return $requete_prepare;
            

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    public function deleteProduit($valeur){
        try{
            $requete = "DELETE FROM produit WHERE ID_Produit = $valeur";
            $requete_prepare = $this->connexionPDO->prepare($requete);

            $requete_prepare->execute();
            echo 'modification reussie';
            return $requete_prepare;
            

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}


$connexion = new maConnexion('ecommerce','','root','localhost');
$tableResultat = $connexion->select('produit','*');

$re = $connexion->updateProduit('laisse','60','fait pour se détendre confortablement','3');

$connect = new maConnexion('liste_utilisateurs','','root','localhost'); 
$images = $connect->select('utilisateur','*')



/*$connexion->secureUpdate('client','Nom','Alliyah', 'ID_Client','2');

echo'<h1>Select</h1><h2>A</h2>';
var_dump($connexion->select('client','*'));

echo'<h2>B</h2>';
print_r($connexion->selectOptions('produit','*','Prix','>=','50'));

echo'<h2>C</h2>';
print_r($connexion->selectCleEtrangere('client','MontantTotal,Nom','commande','ID_Client'));

echo'<h1>Insert</h1><h2>A</h2>';

//Update
//A
$connexion->secureUpdate('client','Adresse', '23 Ocean Ave, United States, Long Branch', 'ID_Client', '2');

//B
$connexion->secureUpdate('produit','Prix', '60', 'ID_Produit', '3');

//C
$connexion->secureUpdate('commande','Date', '2022-05-28', 'ID_Commande', '4');

//Insert
//A
$connexion->insertionClient('Djalil', 'Promenade des Anglais', 'djalil@gmail.com');

//B
$connexion->insertionProduit('Climatiseur','100','envoie du froid dans un salle pour reduire la température ambiante');

C
$connexion->insertionCommande('1990-12-04', '150', '5');

//Delete

$connexion->secureDelete('client', 'ID_Client', '5');*/

?>