<?php
if(!isset($_REQUEST['action'])){
    $action='Voir_admin';
}else{
    $action=$_REQUEST['action'];
    $id=$_GET['id'];
}
switch ($action){
    case'Voir_admin':
        include'./vues/v_GestionCompte.php';
        break;
    case'ModifierAdmin':
        include'./vues/v_modifierAdmin.php';
        break;
    case'ValiderModifAdmin':
        $id=$_GET['id'];
        /*$activ=1;
        if(isset($_POST['actif'])){
            $activ=0;
        }*/
        /*if(isset($_POST['supp'])){
            PdoDisko::SuppAdmin($ref['Id']);
            include'./vues/v_GestionCompte.php';
        }else{*/
        $login=$_POST['Login'];
        $psw1 = $_POST['psw'];
        $VerifPsw = $_POST['psw2'];
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
        }
        $msgErreurs = getErreursAdmin2($login, $psw1, $VerifPsw, $droit);
        if (count($msgErreurs) != 0) {
            include 'vues/v_modifierAdmin.php';
            include 'vues/v_erreurs.php';
        } else {
            $grain = '3QW4XE5RTV687Y8U9?I0O';
            $psw = hash('sha256', $psw1 . $grain);
            $intId=(int)$id;
            PdoDisko::ModifierAdmin($login,$psw,$droit,$intId);
            include'./vues/v_GestionCompte.php';
        }
        /*}*/
        break;
        case'SuppAdmin':
            $suppAdmin = PdoDisko::SuppAdmin($id);
            include'./vues/v_GestionCompte.php';
        break;
}