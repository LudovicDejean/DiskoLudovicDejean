<?php

/**
 * Vérification des saisie du formulaire de création d'administrateur retourne un tableau de chaines contenant les textes d'erreurs
 * 
 * @param String $nom $psw1 $psw2 $droit
 * @return String $lesErreurs[]
 */
function getErreursAdmin($nom, $psw1, $psw2, $droit) {
    $lesErreurs = array();
    if ($nom == '') {
        $lesErreurs[] = "Il faut saisir le champ nom";
    } elseif (!estUnNom($nom)) {
        $lesErreurs[] = "Erreur nom";
    }
    if($psw1==''){
        $lesErreurs[]='Il faut entrer un mot de passe';
    }elseif(!estUnPassword($psw1)){
        $lesErreurs[]='Format du mot de passe Incorrect';
    }elseif($psw1!=$psw2){
        $lesErreurs[]='Les mots de passes ne sont pas identiques';
    }
    if($droit==''){
        $lesErreurs[]='Vous devez accorder au moins un droit à l\'utilisateur';
    }
    if(PdoDisko::getUnAdmin($nom) != FALSE){
        $lesErreurs[]='Cet Administrateur existe déjà';
    }
    return $lesErreurs;
}

function getErreursAdmin2($nom, $psw1, $psw2, $droit) {
    $lesErreurs = array();
    if ($nom == '') {
        $lesErreurs[] = "Il faut saisir le champ nom";
    } elseif (!estUnNom($nom)) {
        $lesErreurs[] = "Erreur nom";
    }
    if($psw1==''){
        $lesErreurs[]='Il faut entrer un mot de passe';
    }elseif(!estUnPassword($psw1)){
        $lesErreurs[]='Format du mot de passe Incorrect';
    }elseif($psw1!=$psw2){
        $lesErreurs[]='Les mots de passes ne sont pas identiques';
    }
    if($droit==''){
        $lesErreurs[]='Vous devez accorder au moins un droit à l\'utilisateur';
    }
    return $lesErreurs;
}
/**
 * Controle les saisie du formulaire d'inscription renvoie un tableau de chaines contenant les erreurs
 * @param String $nom $prenom $addr $CP $ville $mail $tel
 * @return String $lesErreurs[]
 */
function getErreursSaisie($nom, $prenom, $sujet, $message, $mail, $tel) {
    $lesErreurs = array();
    if ($nom == '') {
        $lesErreurs[] = "Il faut saisir le champ nom";
    } elseif (!estUnNom($nom)) {
        $lesErreurs[] = "Erreur nom";
    }
    if ($prenom == '') {
        $lesErreurs[] = 'Il faut saisir le champ prenom';
    } elseif (!estUnNom($prenom)) {
        $lesErreurs[] = 'Erreur Prenom';
    }
    if ($sujet == '') {
        $lesErreurs[] = 'Il faut saisir un Sujet';
    }elseif(!estUnSujet($sujet)){
        $lesErreurs[]='Erreur Sujet';
    }
    if ($message == '') {
        $lesErreurs[] = 'Il faut saisir un Message';
    } elseif (!estUnMessage($message)) {
        $lesErreurs[] = 'Erreur Message';
    }
    if ($mail == '') {
        $lesErreurs[] = 'Il faut saisir une adresse mail';
    } elseif (!estUnMail($mail)) {
        $lesErreurs[] = 'Erreur mail';
    }
    if ($tel == '') {
        $lesErreurs[] = 'Il faut saisir un numéro de téléphone';
    } elseif (!estUnTel($tel)) {
        $lesErreurs[] = 'Erreur téléphone';
    }
    return $lesErreurs;
}
/**
 * Vérification de la saisie par un regex
 * 
 * @param String $mail
 * @return boolean
 */
function estUnMail($mail) {
    return preg_match('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#', $mail);
}

/**
 * Vérification d'une saisie par longueur de la chaine
 * @param String $nom
 * @return boolean
 */
function estUnNom($nom) {
    return strlen($nom) <= 15 && strlen($nom) >= 2;
}
/**
 * Vérification d'une saisie par longueur de la chaine
 * @param String $sujet
 * @return boolean
 */
function estUnSujet($sujet) {
    return strlen($sujet) <= 20 && strlen($sujet) >= 2;
}
/**
 * Vérification sur une saisie d'entier
 * @param Int $JBD
 * @return boolean
 */
function estUnJour($JBD) {
    return $JBD > 31 || $JBD < 1;
}
/**
 * Vérification d'une saisie d'entier
 * @param int $MBD
 * @return boolean
 */
function estUnMois($MBD) {
    return $MBD > 12 || $MBD < 1;
}

/**
 * Vérification d'une saisie d'année destinée à un calcul d'âge la saisie bloque si l'année donnée est vieille de 100 ans ou plus
 * 
 * @param int $ABD
 * @return boolean
 */
function anneeValide($ABD) {
    return $ABD >= date('Y') or $ABD < date('Y') - 100;
}

/**
 * Vérification d'un champ de saisie de message
 * 
 * @param String $message
 * @return boolean
 */
function estUnMessage($message) {

    return strlen($message) <= 200 && strlen($message)>=5;
}

/**
 * Teste si la chaîne ne contient que des chiffres
 * @param $valeur : la chaîne testée
 * @return : vrai ou faux
 */
function estEntier($valeur) {
    return preg_match("/[^0-9]/", $valeur) == 0;
}

/**
 * Vérifie une saisie de numéro de téléphone par regex
 * @param String $tel
 * @return boolean
 */
function estUnTel($tel) {
    return preg_match("/^[0-9]{10}$/", $tel);
}

/**
 * Vérifie une saisie de mot de passe avec un regex et une taille
 * @param String $password
 * @return boolean
 */
function estUnPassword($password) {
    return (strlen($password)>=6)&&preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $password);
}
/**
 * Génére le contenu d'un mail de validation
 * @param String $nom $prenom $dateInscr
 * @return string
 */
function genMail($nom, $prenom,$dateInscr){
    $txt='Merci '.$nom.' '.$prenom.'!/r/'
            . 'Votre message a bien été envoyé ce jour le '.$dateInscr.' à la socité disko/r/';
    return $txt;
}