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
            // first star
            $scoreForTheFirstStar = $this->computeScore($myChoice, $opponentChoice, $score);
            // end of first star

            //second star
            $howTheRoundsEnd = $this->howTheRoundsEnd($myChoice);

            switch ($howTheRoundsEnd) {
                case 'lose':
                    $myChoice = $this->lose($opponentChoice);
                    break;
                case 'win':
                    $myChoice = $this->win($opponentChoice);
                    break;
                case 'draw':
                    $myChoice = $this->draw($opponentChoice);
                    break;
            }

            $scoreForTheSecondStar = $this->computeScore($myChoice, $opponentChoice, $score = 0);
        }

        // => first star = 12458
        // => second star = 12683
    }

    public function howTheRoundsEnd($playerChoice)
    {
        switch ($playerChoice) {
            case 'X':
                return 'lose';
            case 'Y':
                return 'draw';
            case 'Z':
                return 'win';
        }
        return null;
    }

    public function win($opponentChoice) {
        switch ($opponentChoice) {
            case 'A':
                return 'Y';
            case 'B':
                return 'Z';
            case 'C':
                return 'X';
        }
        return null;
    }

    public function lose($opponentChoice) {
        switch ($opponentChoice) {
            case 'A':
                return 'Z';
            case 'B':
                return 'X';
            case 'C':
                return 'Y';
        }
        return null;
    }

    public function draw($opponentChoice)
    {
        switch ($opponentChoice) {
            case 'A':
                return 'X';
            case 'B':
                return 'Y';
            case 'C':
                return 'Z';
        }

        return null;
    }

    public function computeScore($myChoice, $opponentChoice, $score)
    {
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

        return $score;
    }
}