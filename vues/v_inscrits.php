<div class="col-lg-12">
    <div class="col-sm-2"></div>
</div><div class="row"></div>
<?php
$aff = '<div class="container"><div class="table-responsive"><table class="table"><thead><tr><td>Nom</td>'
        . '<td>Date Naissance</td><td>Telephone</td><td>Sujet</td><td>Mail</td></tr>';
if (count($LesInscrits)) {
    foreach ($LesInscrits as $UnInscrit) {
        $Inscription = PdoDisko::getUneInscription($UnInscrit['0']);
        $dateN = explode('-', $UnInscrit['Date_Naissance']);
        $aff .= '<tr><td>' . ucfirst($UnInscrit['Nom']) . ' ' . ucfirst($UnInscrit['Prenom']) . '</td>'
                . '<td> ' . $dateN[2] . '/' . $dateN[1] . '/' . $dateN[0] . '</td><td> ' . $UnInscrit['Num_tel'] . '</td><td>' .$UnInscrit['Sujet'] . '</td><td>' .$UnInscrit['Mail'] . '</td>'
                . '<td><a href="index.php?uc=ConsulterInscrits&action=VoirUnInscrit&nom=' . $UnInscrit['Nom'] . '&prenom=' . $UnInscrit['Prenom'] . '&bd=' . $UnInscrit['Date_Naissance'] . '">Inspecter</a></td>'
                . '<td><a href="index.php?uc=SuppInscrits&action=SuppUnInscrit&nom=' . $UnInscrit['Nom'] . '&prenom=' . $UnInscrit['Prenom'] . '&bd=' . $UnInscrit['Date_Naissance'] . '&id=' . $UnInscrit['Id'] . '">Supprimer</a></td>';
    }
    $aff .= '</table></div></div>';
    echo $aff;
} else {
    echo '<div class="col-sm-3">Désolé, mais nous n\'avons pas trouvé de résultat</div>';
}