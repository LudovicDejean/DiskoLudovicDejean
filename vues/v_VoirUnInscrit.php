<?php
$LInscrit = PdoDisko::getUnePersonne($_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['bd']);
$Inscription = PdoDisko::getUneInscription($LInscrit['Id']);
/*$type = PdoDisko::getUnType($Inscription['IdTypeInscr']);*/
$dateN= explode(' ', $LInscrit['Date_Naissance']);
$formN= explode('-', $dateN[0]);
echo '<div class="container"> <b>'.strtoupper($LInscrit['Nom']) . ' ' . $LInscrit['Prenom'] . '</b><br>'
 . 'Date de naissance ' . $formN[2].'/'.$formN[1].'/'.$formN[0]. '<br>'
 . 'Sujet : ' . $LInscrit['Sujet'] . '<br>'
 . 'Message : ' . $LInscrit['Message'] . '<br>'
 . 'Téléphone : ' . $LInscrit['Num_tel'] . '<br>'
 . 'Mail : ' . $LInscrit['Mail'] . '<br>'
 . '<td><a href="index.php?uc=SuppInscrits&action=SuppUnInscrit&nom=' . $LInscrit['Nom'] . '&prenom=' . $LInscrit['Prenom'] . '&bd=' . $LInscrit['Date_Naissance'] . '&id=' . $LInscrit['Id'] . '">Supprimer</a></td>';


