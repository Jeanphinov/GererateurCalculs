<?php
/**
 * Created by PhpStorm.
 * User: Jeanphi
 * Date: 05-02-16
 * Time: 12:06
 */
require_once("src/GenerateurCalculs.php");

if (isset($_POST['envoi'])) {

    if (isset($_POST['calcul'])) {
        $calcul = unserialize(base64_decode($_POST['calcul']));
        $reponses = $_POST['reponses'];

    $calcul->setReponses($reponses);
    $calcul->compare();
    $resultats = $calcul->getOperations();
    $score = $calcul->getScore();
    require_once("view/vue-resultat.php");
    }
} else {
    $calcul = new GenerateurCalculs(10);
    $operations = $calcul->getOperations();

    require_once("view/vue-form.php");
}