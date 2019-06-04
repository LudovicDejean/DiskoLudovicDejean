<div class="container-fluid">
    <p>Veuillez saisir votre date de Naissance</p><br>
    <form action="index.php?uc=valider&action=VerifAge" method="post" class="form-inline">
        <div class="form-group">
            <label for="jours">Jour</label>
            <select class="form-control" name="JBD" id="jours">
                <?php
                $j = 0;
                for ($j = 01; $j < 32; $j++) {
                    echo '<option value="' . $j . '">' . $j . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="mois">Mois</label>
            <select class="form-control"name="MBD" id="mois">
                <?php
                $m = 0;
                for ($m = 01; $m < 13; $m++) {
                    echo '<option value="' . $m . '">' . $m . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="année">Année</label>
            <select class="form-control"name="ABD" id="année">
                <?php
                $y = 0;
                for ($y = date('Y'); $y > date('Y') - 120; $y--) {
                    echo '<option value="' . $y . '">' . $y . '</option>';
                }
                ?>
            </select>
        </div>
        <input class="btn btn-default" type="submit" value="Valider">
    </form>
</div>