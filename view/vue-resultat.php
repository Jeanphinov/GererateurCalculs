<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Generateur de calculs - Résultat</title>
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




<section class="container-fluid">

    <div class="row">
        <div class="col-md-offset-2 col-md-8 alert alert-info">
            <h4>Résultat !</h4>
            <p>Vous avez obtenu <?php echo  $score?> réponses correctes. Voici votre copie corrigée.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th></th>
                    <th>Réponse</th>
                    <th>Soluce</th>
                </tr>
                </thead>
                <?php
                foreach ($resultats as $operation => $r) {
                    ?>
                    <tr class="<?php echo $r["classe"]; ?>">
                        <td><?php echo $operation; ?></td>
                        <td><?php echo $r["reponse"]; ?> </td>
                        <td><?php echo $r["soluce"]; ?></td>
                    </tr>
                <?php } ?>
            </table>

        </div>
    </div>
    <!--
    <?php
    foreach ($resultats as $operation => $r) {
        ?>
        <div class="row">
            <div class="col-lg-offset-4 col-md-2 alert-danger <?php echo $r["classe"]; ?>">
                <?php echo $operation;  ?>
            </div>
            <div class="col-md-1 <?php echo $r["classe"]; ?>">
                <?php echo $r["reponse"]; ?>
            </div>
            <div class="col-md-1">
                <?php echo $r["soluce"]; ?>
            </div>
        </div>
    <?php } ?>-->
</section>


</body>
</html>