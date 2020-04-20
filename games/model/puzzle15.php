<?php

class Tile {

    public $index;
    public $position;

    // create object
    public function __construct($index, $position) {
        $this->index = $index;
        $this->position = $position;
    }

    // return the number the tile represents
    public function getIndex(){
        return $this->index;
    }

    // return the position of the tile
    public function getPosition(){
        return $this->position;
    }
}

class Puzzle15 {

    public $tiles;
    public $isSolved;

    // create object and randomly initialise the tiles
    public function __construct() {
        $this->tiles = array();
        $this->isSolved = False;

        $listValues = array();
        $counter = 0;

        for ($i = 0; $i < 4; $i++) {
            for ($j = 0; $j < 4; $j++) {
                $num = rand(0,15);

                while (in_array($num, $listValues)) {
                    $num = rand(0,15);
                }

                $this->tiles[$counter] = new Tile($num, array($i, $j));
                $listValues[$counter] = $num;
                $counter++;
            }
        }
    }

    // return if puzzle is solved
    public function getIsSolved() {
        return $this->isSolved;
    }

    // return the tile at a position
    public function getTileAtIndex($position) {

        foreach($this->tiles as $tile) {
            $tile_position = $tile->getPosition();
            if ($tile_position[0]==$position[0] && $tile_position[1]==$position[1]) {
                return $tile;
            }
        }
        return NULL;
    }

    // return the number that the tile represents
    public function getIndexOfTile($tile) {
        $tile_position = $tile->getPosition();
        for ($i = 0; $i < 16; $i++) {
            $temp_tile_position = $this->tiles[$i]->getPosition();
            if ($temp_tile_position[0]==$tile_position[0] && $temp_tile_position[1]==$tile_position[1]) {
                return $i;
            }
        }
        return NULL;
    }

    // swap two tiles
    public function swapTiles($tile1, $tile2){
        //storing temp
        $pos_tile1 = $tile1->position;
        $pos_tile2 = $tile2->position;
        $index_tile1 = $this->getIndexOfTile($tile1);
        $index_tile2 = $this->getIndexOfTile($tile2);

        //swapping 
        $tile1->position = $pos_tile2;
        $tile2->position = $pos_tile1;
        $this->tiles[$index_tile1] = $tile2;
        $this->tiles[$index_tile2] = $tile1;
    }

    // return if a tile has a space it can move to
    public function nextToEmpty($tile) {
        $tile_position = $tile->getPosition();
        $row = $tile_position[0];
        $col = $tile_position[1];

        $arr = array();
        array_push($arr, array($row-1, $col)); //top
        array_push($arr, array($row+1, $col)); //bottom
        array_push($arr, array($row, $col-1)); //left 
        array_push($arr, array($row, $col+1)); //right

        $count = 0;
        foreach($arr as $pos) {
            if ($pos[0] >= 0 && $pos[0] <=3 && $pos[1] >= 0 && $pos[1] <=3) {
                $tile = $this->getTileAtIndex($pos);
                if ($tile!=NULL && $tile->getIndex()==0) {
                    return $tile;
                }
            }
            $count++;
        }
        return NULL;
    }

    // change state of game if solved
    public function isSolved() {
        echo "<br>";
        $count = 0;
        for ($i = 0 ; $i < 15 ; $i++) {
            $j = $i + 1;
            if ($this->tiles[$i]->getIndex()==$i+1) {
                $count++;
            }
        }
        if ($count==15) $this->isSolved = True;
    }

    // print puzzle (used for testing)
    public function printPuzzle() {
        echo "<br>";
        foreach($this->tiles as $tile) {
            $pos = $tile->getPosition();
            echo $tile->getIndex() . ": " . $pos[0] . ", " . $pos[1] . "<br>";
        }
    }

}
?>