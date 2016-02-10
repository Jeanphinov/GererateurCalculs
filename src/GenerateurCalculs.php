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
        for ($i = 0; $i < $n; $i++) {
            $o = $this->getOperateurs();
            $this->$o();

        }
    }

    private function getOperateurs()
    {
        return $this->operateurs[array_rand($this->operateurs)];

    }


    private function addition()
    {
        $a = rand(0, self::MAX);
        $b = rand(0, self::MAX);
        $a_b = $a . " + " . $b;
        $soluce = $a + $b;
        $this->setOperations($a_b, $soluce);
    }

    private function soustraction()
    {
        $a = rand(0, self::MAX);
        $b = rand(0, $a);
        $a_b = $a . " - " . $b;
        $soluce = $a - $b;
        $this->setOperations($a_b, $soluce);
    }

    private function division()
    {
        $a = rand(0, self::MAX);
        $test = false;
        while ($test == false) {

            $b = rand(1, $a);
            if ($a % $b == 0) $test = true;
        }

        $a_b = $a . " / " . $b;
        $soluce = $a / $b;
        $this->setOperations($a_b, $soluce);
    }

    private function multiplication()
    {
        $a = rand(0, self::MAX);
        $b = rand(0, self::MAX / 4);
        $a_b = $a . " X " . $b;
        $soluce = $a * $b;
        $this->setOperations($a_b, $soluce);
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