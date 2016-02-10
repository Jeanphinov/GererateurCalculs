<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Generateur de calculs</title>
    <link rel="stylesheet" type="text/css" href="css/cerulean-bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <span class="navbar-brand">
                Un générateur de calculs
            </span>
        </div>
    </div>
</nav>

<div class="container">
    <form action="index.php" method="POST" class="form form-horizontal col-lg-6">
        <fieldset>
            <legend>Quelques calculs...</legend>
            <div class="form-group">
            <?php

            foreach ($operations as $oper => $valeurs) {
                ?>

                    <label for='reponses[<?php echo $oper ?>]'
                           class="col-lg-2 control-label"> <?php echo $oper . " = " ?> </label>
                    <div class="col-lg-2"><input type='text' size='2' name='reponses[<?php echo $oper ?>]'
                                                 id='reponses[<?php echo $oper ?>]' value='' class="form-control"></div>

                <?php
            }
            ?>
            </div>
            <div class="form-group">
                <div class="col-lg-5"></div>
                <input type="hidden" name="calcul" value='<?php echo base64_encode(serialize($calcul)) ?>'>
                <input type="submit" name="envoi" class="col-lg-offset-2 btn btn-primary">
            </div>

        </fieldset>
    </form>
</div>
</body>
</html>