<?php
require_once 'Lagemass.php';

$data = [1,3,4,6,9,8,7,15,27,10,186,3,9];
$lage = new Lagemass();
try {
    echo "Das vorliegende Skript berechnet anhang ihrer numerischen Eingaben den Medianwert, Modalwert und das arithmetisches Mittel.<br><br>";
    echo $lage->getMedian($data)."<br>";
    echo $lage->getModal($data)."<br>";
    echo $lage->getArtMittel($data);
} catch (Exception $exception) {
    echo $exception->getMessage();
}
