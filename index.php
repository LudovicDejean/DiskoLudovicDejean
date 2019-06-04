<?php
session_start();

// auteur: DEJEAN Ludovic
include './utilitaire/class.pdoDisko.inc.php';
include './utilitaire/fonctions.php';
$pdo = PdoDisko::getPdoDisko();
$grain = '3QW4XE5RTV687Y8U9?I0O';
if (isset($_REQUEST['uc']) && $_REQUEST['uc'] == 'valider' && (isset($_REQUEST['action']) && $_REQUEST['action'] == 'VerifForm')) {
    $bd = $_SESSION['ABD'] . '-' . $_SESSION['MBD'] . '-' . $_SESSION['JBD'];
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <title>Demande de Contact Disko</title>
        <link rel="stylesheet" href="utilitaire/css/bootstrap.css">
        <link rel="stylesheet" href="utilitaire/css/CSS.css">
        <link rel="stylesheet" href="utilitaire/css/bootstrap-theme.css">
        <script type="text/javascript"src="utilitaire/js/bootstrap.js"></script>
        <script type="text/javascript" src="utilitaire/js/DataTables-1.10.13/media/js/dataTables.bootstrap.js"></script>
        <script  type="text/javascript"src="utilitaire/js/jquery.js"></script>
        <script type="text/javascript" src="utilitaire/fonctionsJS.js"></script>
    </head>
    <?php
    include'./vues/v_Bandeau.php';
    if (!isset($_REQUEST['uc'])) {
        $uc = 'accueil';
    } else {
        $uc = $_REQUEST['uc'];
    }

    switch ($uc) {
        case'Connexion': {
                include ('./vues/v_log.php');
                break;
            }
        case 'accueil': {
                include("./vues/v_Accueil.php");
                include('./controleurs/c_formulaire.php');
                break;
            }
        case 'formulaire': {
                    include("./vues/v_Formulaire.php");
                    break;
            }
        case 'valider': {
                    include('./controleurs/c_formulaire.php');
                    break;                
            }
        case'ConsulterInscrits': {
                if (preg_match('#r#', $_SESSION['droit'])) {
                    include './controleurs/c_VisuInscr.php';
                    break;
                } else {
                    header('location:index.php');
                }
            }
        case'SuppInscrits': {
                if (preg_match('#r#', $_SESSION['droit'])) {
                    include './controleurs/c_VisuInscr.php';
                    break;
                } else {
                    header('location:index.php');
                }
            }
        case'VerifCo': {
                include './controleurs/c_log.php';
                break;
            }
        case'Deco': {
                session_destroy();
                header('location:index.php');
                break;
            }
        case'GererCompte':{
            if (preg_match('#s#', $_SESSION['droit'])) {
                    include'./controleurs/c_Administration.php';
                    break;
                } else {
                    header('location:index.php');
                }
        }
        case'SuppCompte':{
            if (preg_match('#s#', $_SESSION['droit'])) {
                    include'./controleurs/c_Administration.php';
                    break;
                } else {
                    header('location:index.php');
                }
        }
    }
    ?>
</html>
