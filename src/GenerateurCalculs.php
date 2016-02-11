<?php

/**
 * Created by PhpStorm.
 * User: Jeanphi
 * Date: 05-02-16
 * Time: 11:56
 */
class GenerateurCalculs
{
    private $operateurs = array("addition", "soustraction", "division", "multiplication");
    private $operations = array();


    CONST MAX = 100;

    public function __construct($n)
    {
        $this->genererOperations($n);
    }

    public function genererOperations($n){
        for ($i = 0; $i < $n; $i++) {

           $o='add'.ucfirst($this->getOperateurs());
            $this->$o();

        }
    }

    private function getOperateurs()
    {
        return $this->operateurs[array_rand($this->operateurs)];

    }

    private function calculResultat($ab){
        $this->setOperations($ab, eval('return '.$ab.';'));
    }

    private function addAddition()
    {
        $a = rand(0, self::MAX);
        $b = rand(0, self::MAX);
        $a_b = $a . "+" . $b;

       // $soluce=eval('return '.$a_b.';');
       // $this->setOperations($a_b, $soluce);
       // $this->setOperations($a_b, eval('return '.$a_b.';'));
        $this->calculResultat($a_b);
    }

    private function addSoustraction()
    {
        $a = rand(0, self::MAX);
        $b = rand(0, $a);
        $a_b = $a . "-" . $b;
        $this->calculResultat($a_b);
    }

    private function addDivision()
    {
        $a = rand(0, self::MAX);
        $test = false;
        while ($test == false) {

            $b = rand(1, $a);
            if ($a % $b == 0) $test = true;
        }

        $a_b = $a . "/" . $b;
        $this->calculResultat($a_b);
    }

    private function addMultiplication()
    {
        $a = rand(0, self::MAX);
        $b = rand(0, self::MAX / 4);
        $a_b = $a . "*" . $b;
        $this->calculResultat($a_b);
    }

    /**
     * @param array $operations
     */
    private function setOperations($a_b, $soluce)
    {
        $this->operations[$a_b] = ["soluce" => $soluce, "reponse" => null, "classe" => "rouge", "score" => 0];

    }


    /**
     * @return array
     */
    public function getOperations()
    {
        return $this->operations;
    }

    public function setReponses($reponses)
    {
        foreach ($reponses as $r => $valeur) {

            $this->operations[$r]['reponse'] = $reponses[$r];

        }
    }

    public function compare()
    {
        foreach ($this->operations as $o => $comparaison) {

            if ($comparaison['soluce'] == $comparaison['reponse']) {
                $this->operations[$o]["score"] = 1;
                $this->operations[$o]["classe"] = "success";
            } else {
                $this->operations[$o]['score'] = 0;
                $this->operations[$o]["classe"] = "danger";
            }
        }
    }

    public function getScore()
    {
        $monScore = 0;
        foreach ($this->operations as $o => $comparaison) {

            $monScore += $this->operations[$o]["score"];
        }
        return $monScore;

    }


}