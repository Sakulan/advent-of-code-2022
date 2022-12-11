<?php

class CampCleanup
{
    public function campCleanupRange($input)
    {
        // we do an array with the values and the empty values with better regex
        $inputIntoArray = preg_split("/(\r\n|\n|\r)/", $input);

        $parts = [];
        // create element of pairs
        foreach($inputIntoArray as $key => $values) {
            $parts[$key] = explode(',', trim($values));
        }

        $scoreForTheFirstStar = 0;
        $scoreForTheSecondStar = 0;
        // first star
        foreach ($parts as $key => $values) {
            $firstRange = $values[0];
            $secondRange = $values[1];
            $ranges1 = explode('-', $firstRange);
            $ranges2 = explode('-', $secondRange);

            $firstRange = range($ranges1[0], $ranges1[1]);
            $secondRange = range($ranges2[0], $ranges2[1]);

            //firstStar
            if ($this->arrayDiff($firstRange, $secondRange)) {
                $scoreForTheFirstStar += 1;
            }

            //secondStar
            if ($this->arrayIntersect($firstRange, $secondRange)) {
                $scoreForTheSecondStar += 1;
            }
        }
    }

    public function arrayDiff($firstRange, $secondRange)
    {
        $arrayDiff = array_diff($firstRange, $secondRange);
        $arrayDiff2 = array_diff($secondRange, $firstRange);
        if (count($arrayDiff) === 0 || count($arrayDiff2) === 0) {
            return true;
        }

        return false;
    }

    public function arrayIntersect($firstRange, $secondRange)
    {
        $arrayDiff = array_intersect($firstRange, $secondRange);
        $arrayDiff2 = array_intersect($secondRange, $firstRange);
        if (count($arrayDiff) > 0 || count($arrayDiff2) > 0) {
            return true;
        }

        return false;
    }
}