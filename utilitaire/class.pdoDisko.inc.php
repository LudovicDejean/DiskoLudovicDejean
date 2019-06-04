<?php

/**
 * Classe d'accès aux données. 

 * Utilise les services de la classe PDO
 * pour l'application Disko

 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 *
 * @package default
 * @author DEJEAN Ludovic
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */
class PdoDisko {

    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=disko';
    private static $user = 'root';
    private static $mdp = '';
    private static $monPdo;
    private static $monPdoDisko = null;

    /**
     * Constructeur privé, crée l'instance de PDO qui sera sollicitée
     * pour toutes les méthodes de la classe
     */
    private function __construct() {
        PdoDisko::$monPdo = new PDO(PdoDisko::$serveur . ';' . PdoDisko::$bdd, PdoDisko::$user, PdoDisko::$mdp);
        PdoDisko::$monPdo->query("SET CHARACTER SET utf8");
    }

    public function _destruct() {
        PdoDisko::$monPdo = null;
    }

    /**
     * Fonction statique qui crée l'unique instance de la classe
     *
     * Appel : $instancePdoDisko
      = PdoDisko
      ::getPdoDisko
      ();
     * @return l'unique objet de la classe PdoDisko

     */
    public static function getPdoDisko
    () {
        if (PdoDisko::$monPdoDisko == null) {
            PdoDisko::$monPdoDisko = new PdoDisko();
        }
        return PdoDisko::$monPdoDisko
        ;
    }

    /**
     * Retourne sous forme d'un tableau associatif une personne  sélectionnée par son nom prénom et date de naissance
     * $BD: date de naissance sous forme de chaine de caractère
     * 
     * @param String $nom, $prenom, $BD
     * @return un tableau associatif  
     */
    public static function getUnePersonne($nom, $prenom, $BD) {
        $nomlow = strtolower($nom);
        $prenomlow = strtolower($prenom);
        $req = "select * from personnes where Nom = '$nomlow' && Prenom='$prenomlow'&& Date_Naissance='$BD';";
        $res = PdoDisko::$monPdo->query($req);
        if ($res != FALSE) {
            $unInscrit = $res->fetch();
            return $unInscrit;
        } else {
            return False;
        }
    }

    /**
     * Retourne sous forme de tableau la demande de contact de la personne la plus récente dont l'ID est passée en paramètre
     *  
     * @param int $id
     * @return tableau associatif
     */
    public static function getUneInscription($id) {
        $req = "select * from personnes where Id= $id";
        $res = PdoDisko::$monPdo->query($req);
        $Inscription = $res->fetch();
        return $Inscription;
    }

    /**
     * Retourne sous la forme d'un tableau les informations d'un administrateur selon son login.
     * le tableau contient le mot de passe, le login et les droits de l'administrateur
     * 
     * @param String $id
     * @return tableau associatif
     */
    public static function getUnAdmin($id) {
        $req = "SELECT * FROM `Administration` where Id='$id';";
        $res = PdoDisko::$monPdo->query($req);
        $admin = $res->fetch();
        return $admin;
    }
    public static function getUnAdminlog($id) {
        $req = "SELECT * FROM `Administration` where Login='$id';";
        $res = PdoDisko::$monPdo->query($req);
        $admin = $res->fetch();
        return $admin;
    }

    /**
     * Retourne un tableau associatif contenant toutes les personnes présentes dans la base de donnée,
     * Les informations d'une personnes sont: son nom, son prenom, sa date de naissance
     * Les paramètres permettent de gérer le tri des données
     * 
     * @param String $champ $sens
     * @return Tableau associatif
     */
    public static function getLesPersonnes($champ = 'Nom', $sens = 'ASC') {
        $req = "select * from personnes order by $champ $sens ";
        $res = PdoDisko::$monPdo->query($req);
        $LesInscrits = $res->fetchAll();
        if (count($LesInscrits) > 0) {
            return $LesInscrits;
        } else {
            echo '';
        }
    }



    /**
     * Ajoute une entrée à la table Personne
     * 
     * @param String $sujet $mail $nom $prenom $bd $tel $message 
     */
    public static function creerPersonne($sujet,$mail,$nom, $prenom, $bd, $tel,$message) {
        $nomlow = strtolower($nom);
        $prenomlow = strtolower($prenom);
        $req = "INSERT INTO `personnes` (`Id`,`Sujet`, `Mail`, `Nom`, `Prenom`, `Date_Naissance`, `Num_Tel`, `Message`) "
                . "VALUES (NULL,'$sujet', '$mail', '$nomlow', '$prenomlow', '$bd', '$tel', '$message')";
        //echo $req."<br>";   
        $res = PdoDisko::$monPdo->exec($req);
    }


    /**
     * Ajoute un administrateur à la base de donnée
     * @param String $login $psw $droit
     */
    public static function creerAdmin($login, $psw, $droit) {
        $req = "INSERT INTO `Administration` (`Id`, `Login`, `Password`, `Droit`) "
                . "VALUES (NULL, '$login', '$psw', '$droit');";
        $res = PdoDisko::$monPdo->exec($req);
        // debug
//            echo $req;
    }

    /**
     * Retourne un tableau associatifs des administrateurs
     * @return tableau associatif
     */
    public static function getAdmin() {
        $req = "SELECT `Id`,`Login`,`Droit` FROM `Administration` order by Login";
        $res = PdoDisko::$monPdo->query($req);
        $admins = $res->fetchAll();
        return $admins;
    }

    /**
     * Modifie un enregistrement de la table administration
     * $id sers de référence pour l'enregistrement
     * $psw est déjà encodé au moment de l'enregistrement
     * 
     * @param String $Login $psw $droit
     * @param Boolean $actif
     * @param Int $id
     */
    public static function ModifierAdmin($login, $psw, $droit, $id) {
        $req = " UPDATE `administration` SET `Login` = '$login',`Password`='$psw',`Droit`='$droit' WHERE `Id` =$id";
        $res = PdoDisko::$monPdo->prepare($req);
        $res = PdoDisko::$monPdo->exec($req);
    }


    public static function SuppAdmin($id) {
        $req = "Delete from Administration where Id=$id";
        PdoDisko::$monPdo->query($req);
    }
    public static function SuppInscript($id) {
        $req = "Delete from Personnes where Id=$id";
        PdoDisko::$monPdo->query($req);
    }

}
?>