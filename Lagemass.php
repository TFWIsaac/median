<?php

class Lagemass
{
    private function checkInput($input)
    {
        if (count($input) == 0) {
            throw new Exception('Es sind keine Werte vorhanden!');
        }
        if (count($input) > 1000) {
            throw new Exception('Es sind maximal 1000 Messwerte möglich. Sie haben: '.count($input));
        }
        foreach ($input as $key=>$item) {
            if (!is_numeric($item)) {
                throw new Exception('Das Element "'.$item.'" an Index '.$key.' ist nicht numerisch!');
            }
        }
    }

    public function getModal($data)
    {
        $this->checkInput($data);
        $counts = array_count_values($data);
        arsort($counts);
        $modes  = array_keys($counts, current($counts), TRUE);
        if (count($data) === count($counts)) {
            return "Jeder Wert ist einzigartig, daher gibt es kein Modalwert.";
        }
        if (count($modes) === 1) {
            return "Der Modalwert der eingegeben Zeichenfolge lautet: ".$modes[0];
        }
        $message = "Es wurden mehrere Modalwerte gefunden, diese sind: ";
        foreach ($modes as $mode) {
            $message .= $mode.", ";
        }
        return $message;
    }

    public function getMedian($data)
    {
        echo "1<br>";
        sort($data);
        echo "2<br>";
        $count = count($data);
        echo "3<br>";
        $middleval = floor(($count-1)/2);
        echo "4<br>";
        echo "5<br>";
        if($count % 2) {
            $median = $data[$middleval];
            echo "6<br>";
        } else {
            $low = $data[$middleval];
            $high = $data[$middleval+1];
            $median = (($low+$high)/2);
            echo "7<br>";
        }
        echo "8<br><br><br>";
        return "Der Median für die eingegebene Zahlenfolge lautet: ".$median;
    }

    public function getArtMittel($data)
    {
        $this->checkInput($data);
        $counter = 0;
        $sum     = 0;
        foreach ($data as $item) {
            $sum = $sum + $item;
            $counter++;
        }
        $mittel = $sum / $counter;
        $mittel = number_format((float)$mittel, 2, '.', '');
        return "Das arithmetisches Mittel ist: ".$mittel;
    }
}
