<body style="margin-bottom: 10px">
    <div class="container">
        <div class="container-fluid">
    <h1>Contact</h1>
    <script type="text/javascript" src="utilitaire/fonctionsJS.js"></script>
    
        <form method="POST" action="index.php?uc=valider&action=VerifForm" onsubmit="return verifForm(this);">
            <label class="form-group">Nom
                <input type="text" name="nom" placeholder="nom" onblur="verifNom(this)" class="form-control">
            </label>
            <label class="form-group">Prenom
                <input type="text" name="prenom" placeholder="prenom" class="form-control" onblur="verifNom(this)">
            </label>
            <p>Date de Naissance :<br>
                <?php
                echo $_SESSION['JBD'] . '-' . $_SESSION['MBD'] . '-' . $_SESSION['ABD'];
                ?></p>
            <div class="form-group"><label class="form-group">Sujet
                    <input type="text" name="sujet" class="form-control" placeholder="Sujet" onblur="verifSaisie(this)">
                </label>
            </div>
                <label class="form-group">Message
                    <textarea type="text" name="message" placeholder="Message" class="form-control"onblur="verifSaisie(this)"></textarea>
                </label>
            <div class="form-group">
                <label>Mail
                    <input class="form-control" placeholder="Email" type="text" name="mail" onblur="VerifMail(this)">
                </label>
            </div>
            <div class="form-group">
                <label class="form-group">Téléphone
                    <input class="form-control" placeholder="0011223344"type="text" name="tel" onblur="VerifTel(this)">
                </label>
            </div>

            <!--<p>Type d'adhésion</p>
            <div class="container-fluid">
            <?php
            /*$lesCateg = PdoDisko::getLesTypesAdhesion();
            foreach ($lesCateg as $categ) {
                if($categ['Id']!=3){
                echo '<label class="radio-inline"><input id="adh" type="radio" name="adhesion" value="'.$categ['Id'].'">'.$categ['libelle'].'</label>';}
            }*/
            ?>
            </div>-->
            <p>Le fait de cocher cette case a valeur de signature <input id="signature" type="checkbox" name="valid"></p>
            <p>Le <?php echo date('d/m/Y') ?></p>
            <input class="btn btn-default"type="submit" name="check" value="Accepter">
        </form>
        </div>
    </div>
</body>