<?php

if (!isset($_REQUEST['action'])) {
    $action = 'DateNaissance';
} else {
    $action = $_REQUEST['action'];
}

switch ($action) {
    case 'VerifForm':
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $JBD = $_SESSION['JBD'];
        $MBD = $_SESSION['MBD'];
        $ABD = $_SESSION['ABD'];
        $sujet = $_POST['sujet'];
        $message = $_POST['message'];
        $tel = $_POST['tel'];
        $msgErreurs = getErreursSaisie($nom, $prenom, $sujet, $message , $mail, $tel);
        if (!isset($_POST['valid'])) {
            $msgErreurs[] = 'Veuillez cocher la case';
        }
        if (count($msgErreurs) > 0) {
            include 'vues/v_Formulaire.php';
            include 'vues/v_erreurs.php';
            }
            if ($JBD < 10) {
                $JBD += '0';
            }
            if ($MBD < 10) {
                $MBD += '0';
            }
            if(count($msgErreurs)==0){
            $cotis=1;
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            if (PdoDisko::getUnePersonne($nom, $prenom, $bd) == FALSE) {
                PdoDisko::creerPersonne($sujet,$mail,$nom, $prenom, $bd, $tel, $message);
            }
            $ref = PdoDisko::getUnePersonne($nom, $prenom, $bd);

            include 'vues/v_Recap.php';
            }

        break;
    case 'VerifAge':
        $bd = $_POST['ABD'] . '-' . $_POST['MBD'] . '-' . $_POST['JBD'];
        $auj = new DateTime(date('Y-m-d'));
        $age = new DateTime($bd);
        $diff = $age->diff($auj);
        $_SESSION['ABD'] = $_POST['ABD'];
        $_SESSION['MBD'] = $_POST['MBD'];
        $_SESSION['JBD'] = $_POST['JBD'];
        if ($diff->format('%y') < 18) {
            header('location:index.php?uc=valider&action=estMineur');
        } else {
            header('location:index.php?uc=formulaire');
        }
        break;

    case 'DateNaissance':
        include 'vues/v_DateNaissance.php';
        break;
    case 'estMineur':
        if (!isset($_POST['validAdmin'])) {
            include 'vues/v_validAdmin.php';
        } else {
            $admin = PdoDisko::getUnAdminlog($_POST['login']);
            if ($admin != 0) {
                if ($admin['Mdp'] === $_POST['psw']) {
                    header('location:index.php?uc=formulaire');
                } else {
                    include'vues/v_validAdmin.php';
                    echo'erreur mot de passe';
                }
            }
        }
        break;
    case 'VerifFormMaj':

        $refI = $_REQUEST['id'];
        $bd = $_POST['ABD'] . '-' . $_POST['MBD'] . '-' . $_POST['JBD'];
        PdoDisko::ModifierInscrit($refI, $_POST['nom'], $_POST['prenom'], $bd, $_POST['addr'], $_POST['CP'], $_POST['ville']
                        , $_POST['mail'], $_POST['FB'], $_POST['tel']);
                
        header('location:index.php?uc=ConsulterInscrits&action=VoirInscrits');
        break;
}