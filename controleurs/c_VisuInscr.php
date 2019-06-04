<?php

if (!isset($_REQUEST['action'])) {
    $action = 'VoirInscrits';
} else {
    $action = $_REQUEST['action'];
}
switch ($action) {
    case 'VoirInscrits':
        $LesInscrits = PdoDisko::getLesPersonnes();
        include 'vues/v_inscrits.php';
        break;
    case'VoirUnInscrit': {
            if (preg_match('#r#', $_SESSION['droit'])) {
                include 'vues/v_VoirUnInscrit.php';
                break;
            } else {
                header('location:index.php');
            }
        }
    case'SuppUnInscrit':
        $id = $_GET['id'];
        $suppInscrit = PdoDisko::SuppInscript($id);
        include'./vues/v_Accueil.php';
        break;
    case 'modifierUnInscrit':
        if (preg_match('#w#', $_SESSION['droit'])) {
            include './vues/v_modifierUnInscrit.php';
            break;
        } else {
            header('location:index.php');
        }
    /* case'chercher':
      if(isset($_POST['paiement'])){
      $paiement=$_POST['paiement'];
      }else{
      $paiement="";
      }
      if(isset($_POST['adhesion'])){
      $adhesion=$_POST['adhesion'];
      }else{
      $adhesion="";
      }
      $LesInscrits= PdoDisko::RechercherPersonne($_POST['Champ'], strtolower($_POST['value']),$adhesion,$paiement,$_POST['year']);
      $year=$_POST['year'];
      include 'vues/v_inscrits.php'; */
}
