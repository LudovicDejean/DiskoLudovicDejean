<?php
if (!isset($_SESSION['login'])) {
    echo "<div class='container'><h2>Connexion</h2><form method='POST' action='index.php?uc=VerifCo' class='col-sm-3'>
    <input class='form-control' type=text' placeholder='Login' name='log'><br>
    <input class='form-control' type='password' placeholder='Mot de passe' name='mdp'><br>
    <input class='btn btn-default' type='submit' name='ok' value='valider'>
    </form></div>";
}else{
    header('location:index.php?uc=Deco');
}
