<?php
$grain = '3QW4XE5RTV687Y8U9?I0O';
    $admin= PdoDisko::getUnAdminlog($_POST['log']);
    if($admin!=0){
        //echo hash('sha256', $_POST['mdp'].$grain);
        if($admin['Mdp']==$_POST['mdp']){
            $_SESSION['login']=$_POST['log'];
            $_SESSION['droit']=$admin['Droit'];
            header('location:./index.php');
        }else{
            echo 'Erreur mot de passe';
            header('location:./index.php');
        }
    }else{
        echo 'Erreur de login';
        header('location:./index.php');
    }

