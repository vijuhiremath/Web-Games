<?php

class PegSolitaire {

    // create a new peg solitaire with preset board
    public function __construct() {

        $this->pegSelected = False;

        $this->board = array(
            array(1,1,1,1,1,1),
            array(1,1,1,1,1,1),
            array(1,1,1,0,1,1),
            array(1,1,1,1,1,1),
            array(1,1,1,1,1,1),
            array(1,1,1,1,1,1)
        );

        $this->isDone = False;
        $this->isSolved = False;
    }

    // return if the given tile is a hole
    public function isHole($row, $col) {
        return ($this->board[$row][$col] == 0);
    }

    // return if the given tile is a peg
    public function isPeg($row, $col) {
        return ($this->board[$row][$col] == 1);
    }

    // get the tile at the given index
    public function getTile($row, $col) {
        return $this->board[$row][$col];
    }

    // get the type of the tile at the given index
    public function getTileType($row, $col) {
        if ($this->isHole($row, $col)) {
            return "hole";
        }

        if ($this->isPeg($row, $col)) {
            return "peg";
        }
    }

    // remove a peg and add a hole at the given index
    public function addHole($row, $col) {
        $this->board[$row][$col] = 0;
    }

    // remove a hole and add a peg at the given index
    public function addPeg($row, $col) {
        $this->board[$row][$col] = 1;
    }

    // select peg at the given index to move
    public function selectPeg($row, $col) {
        $this->pegrow = $row;
        $this->pegcol = $col;
        $this->pegSelected = True;
    }

    // return if a peg is currently selected for a move
    public function isPegSelected() {
        return $this->pegSelected;
    }

    // Move selected peg to board[row][col]
    public function movePeg($row, $col) {

        $pegrow = $this->pegrow;
        $pegcol = $this->pegcol;

        $match = False;

        // Fix code, loop?

        // TOP LEFT
        if (($row - 2 >= 0) && ($col - 2 >= 0) && ($row - 2 == $pegrow) && ($col - 2 == $pegcol)) {
            $match = True;
            $midrow = $row - 1;
            $midcol = $col - 1;
        }

        // TOP
        if (($row - 2 >= 0) && ($row - 2 == $pegrow) && ($col == $pegcol)) {
            $match = True;
            $midrow = $row - 1;
            $midcol = $col;
        }

        // TOP RIGHT
        if (($row - 2 >= 0) && ($col + 2 <= 5) && ($row - 2 == $pegrow) && ($col + 2 == $pegcol)) {
            $match = True;
            $midrow = $row - 1;
            $midcol = $col + 1;
        }

        // LEFT
        if (($col - 2 >= 0) && ($row == $pegrow) && ($col - 2 == $pegcol)) {
            $match = True;
            $midrow = $row;
            $midcol = $col - 1;
        }

        // RIGHT
        if (($col + 2 <= 5) && ($row == $pegrow) && ($col + 2 == $pegcol)) {
            $match = True;
            $midrow = $row;
            $midcol = $col + 1;
        }

        // BOTTOM LEFT
        if (($row + 2 <= 5) && ($col - 2 >= 0) && ($row + 2 == $pegrow) && ($col - 2 == $pegcol)) {
            $match = True;
            $midrow = $row + 1;
            $midcol = $col - 1;
        }

        // BOTTOM
        if (($row + 2 <= 5) && ($row + 2 == $pegrow) && ($col == $pegcol)) {
            $match = True;
            $midrow = $row + 1;
            $midcol = $col;
        }

        // BOTTOM RIGHT
        if (($row + 2 <= 5) && ($col + 2 <= 5) && ($row + 2 == $pegrow) && ($col + 2 == $pegcol)) {
            $match = True;
            $midrow = $row + 1;
            $midcol = $col + 1;
        }

        if ($match) {
            if ($this->isPeg($midrow, $midcol)) {
                $this->addHole($pegrow, $pegcol);
                $this->addHole($midrow, $midcol);
                $this->addPeg($row, $col);

                // Check if solved
                $numPegs = 0;
                for ($i = 0; $i < 6; $i++) {
                    for ($j = 0; $j < 6; $j++) {
                        if ($this->board[$i][$j] == 1) {
                            $numPegs++;
                        }
                    }
                }
                if ($numPegs == 1) {
                    $this->isDone = True;
                    $this->isSolved = True;
                }

                // add check to know when game is unsolvable?
                // if ($this->checkUnsolvable()) {
                //  $this->isDone = True;
                //  $this->isSolved = False;
                // }
            } 
        }
    }

    // return if game is solved
    public function getIsSolved() {
        return $this->isSolved;
    }

    // return if game is done (win/draw)
    public function getIsDone() {
        return $this->isDone;
    }
}

?>