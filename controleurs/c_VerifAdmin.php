<?php

if (!isset($_REQUEST['action'])) {
    $action = 'Creer_admin';
} else {
    $action = $_REQUEST['action'];
}

switch ($action) {
    case'Valider_Form':
        $nom = $_POST['nom'];
        $psw1 = $_POST['psw'];
        $VerifPsw = $_POST['VerifPsw'];
        $droit = '';
        if (isset($_POST['droit1'])) {
            $droit .= 'r';
        }
        if (isset($_POST['droit2'])) {
            $droit .= 'w';
        }
        if (isset($_POST['droit3'])) {
            $droit .= 'd';
        }
        if (isset($_POST['droit4']) && preg_match('#s#', $_SESSION['droit'])) {
            $droit = 'rwds';
        } else {
            echo'<script alert("Vous n\'avez pas le droit de déterminer des SuperAdmin")></script>';
            header('location:index.php');
        }
        $msgErreurs = getErreursAdmin($nom, $psw1, $VerifPsw, $droit);
        if (count($msgErreurs) != 0) {
            include 'vues/v_creaAdmin.php';
            include 'vues/v_erreurs.php';
        } else {
            $grain = '3QW4XE5RTV687Y8U9?I0O';
            $psw = hash('sha256', $psw1 . $grain);
                PdoDisko::CreerAdmin($nom, $psw, $droit);
                include 'vues/v_GestionCompte.php';
            }
        break;
    case'Creer_admin':
        include'vues/v_creaAdmin.php';
        break;
}