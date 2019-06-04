<?php

$menu = '<div class="page-header" id="menu"><nav class="navbar nav-bar default">
    <div class="col-sm-2"></div>
            <div class="col-sm-8">
            <div class="container-fluid">
        <ul class="nav navbar-nav">
        <li><div id="logo"></div></li>
        <li><a class="navbar-brand" href="index.php?uc=accueil">Accueil</a></li>';
if (isset($_SESSION['droit'])&&preg_match('#r#', $_SESSION['droit'])) {
    $menu .= '<li><a href="index.php?uc=ConsulterInscrits">Voir Contact</a></li>';
}
$menu .= '<li><a';
if (isset($_SESSION['login'])) {
    $menu .= ' href="index.php?uc=Deco">Deconnexion</a>';
} else {
    $menu.= ' href="index.php?uc=Connexion">Connexion</a>';
}
$menu .= '</li></ul></div></nav></div></div>';
echo $menu;
