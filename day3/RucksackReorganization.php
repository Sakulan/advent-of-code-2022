<?php

class RucksackReorganization
{
    public function calculateRucksackReorganization($input)
    {
        // we do an array with the values and the empty values with better regex
        $inputIntoArray = preg_split("/(\r\n|\n|\r)/", $input);

        $parts = [];
        foreach($inputIntoArray as $key => $values) {
            $strLength = mb_strlen($values) / 2;
            $parts[$key] = str_split($values, $strLength);
        }

        $score = 0;
        foreach ($parts as $key => $values) {
            $firstSplit = str_split($values[0]);
            $secondSplit = str_split($values[1]);

            $samesValues = array_intersect($firstSplit, $secondSplit);
            $letter = current($samesValues);

            if (ctype_upper($letter)) {
                $score += $this->getPositionUppercase($letter);
            } else {
                $score += $this->getPositionLowercase($letter);
            }
        }
    }

    public function getPositionLowercase($letter)
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyz';
        return strpos($alphabet, $letter) + 1;
    }

    public function getPositionUppercase($letter)
    {
        $positions = [
            'A' => 27,
            'B' => 28,
            'C' => 29,
            'D' => 30,
            'E' => 31,
            'F' => 32,
            'G' => 33,
            'H' => 34,
            'I' => 35,
            'J' => 36,
            'K' => 37,
            'L' => 38,
            'M' => 39,
            'N' => 40,
            'O' => 41,
            'P' => 42,
            'Q' => 43,
            'R' => 44,
            'S' => 45,
            'T' => 46,
            'U' => 47,
            'V' => 48,
            'W' => 49,
            'X' => 50,
            'Y' => 51,
            'Z' => 52,
        ];

        return $positions[$letter];
    }
}