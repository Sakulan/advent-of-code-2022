<?php

class RockPaperScissors
{
    public function winnerOfRockPaperScissors($input)
    {
        /*
         * shape you selected (1 for Rock, 2 for Paper, and 3 for Scissors)
         * plus the score for the outcome of the round (0 if you lost, 3 if the round was a draw, and 6 if you won).
         */

        // we do an array with the values and the empty values
        $inputIntoArray = preg_split("/[\n]+/", $input);

        //trim values
        array_map('trim', $inputIntoArray);

        // we do an array for each "games"
        $parts = [];
        foreach($inputIntoArray as $key => $values) {
            $parts[$key] = explode(' ', trim($values));
        }

        $score = 0;

        foreach ($parts as $key => $choices) {
            $opponentChoice = $choices[0];
            $myChoice = $choices[1];

            // ROCK A / X
            // PAPER B / Y
            // SCISSOR C / Z
            switch ($myChoice) {
                case 'X':
                    if ($opponentChoice == 'C') {
                        $score += 6;
                    }
                    if ($opponentChoice == 'A') {
                        $score += 3;
                    }
                    $score += 1;
                    break;
                case 'Y':
                    if ($opponentChoice == 'A') {
                        $score += 6;
                    }
                    if ($opponentChoice == 'B') {
                        $score += 3;
                    }
                    $score += 2;
                    break;
                case 'Z':
                    if ($opponentChoice == 'B') {
                        $score += 6;
                    }
                    if ($opponentChoice == 'C') {
                        $score += 3;
                    }
                    $score += 3;
                    break;
            }
        }

        // => first star = 12458
    }
}