<?php

class Board {

	public $pegs;
    public $hints;

	// create one (1) board for mastermind (guess & hints)
    public function __construct() {
        $this->pegs = array(0,0,0,0);
        $this->hints = array(0,0,0,0);
	}
	
	// set the pegs for this board
	public function setPegs($newPegs) {
		$this->pegs = $newPegs;
	}

	// get the pegs for this board
    public function getPegs() {
        return $this->pegs;
	}

	// get the peg at the given index for this board
	public function getPegAtIndex($index) {
        return $this->pegs[$index];
	}

	// set the hints for this board
	public function setHints($newHints) {
		$this->hints = $newHints;
	}

	// get the hints for this board
    public function getHints() {
        return $this->hints;
	}

	// get the hint at the given index
	public function getHintAtIndex($index) {
        return $this->hints[$index];
	}
}

class Mastermind {

	// construct a new mastermind game
	public function __construct() {

		// Game logic
		$this->isSolved = False;
		$this->isDone = False;

		// Set secret sequence
		$this->secret = array(rand(1,6),rand(1,6),rand(1,6),rand(1,6));

		// Set default guess
		$this->guessIndex = 0;
		$this->guess = array(0,0,0,0);

		// Set "history" boards
		$this->boardIndex = 0;
		$this->boards = array();
		for ($i = 0 ;  $i < 10 ; $i++) {
			array_push($this->boards, new Board);
		}
	}

	// get all 10 "history" boards
	public function getBoards() {
		return $this->boards;
	}

	// get the board at the given index
	public function getBoardAtIndex($index) {
		return $this->boards[$index];
	}

	// get number of guesses (index of the current board + 1)
	public function getNumGuesses() {
		return $this->boardIndex + 1;
	}

	// Return Guess Sequence
	public function getGuess() {
		return $this->guess;
	}

	// Return Guess Sequence
	public function getGuessAtIndex($index) {
		return $this->guess[$index];
	}
		
	// Add Peg to Guess Sequence (if room)
	public function addToGuess($peg) {
		if ($this->guessIndex < 4) {
			$this->guess[$this->guessIndex] = $peg;
			$this->guessIndex++;
		}
	}

	// Clear all Pegs from Guess Sequence
	public function clearGuess() {
		$this->guess = array(0,0,0,0);
		$this->guessIndex = 0;
	}

	// Return if game is won or not
	public function isWon($guess) {
		return ($guess === $this->secret);
	}

	// Return hints for a given Guess
	public function makeHints($guess) {
		$hints = array();

		// Check each guess to give hints
		for ($i = 0; $i < 4; $i++) {

			// Check if right colour right position (BLACK PEG)
			if ($guess[$i] == $this->secret[$i]) {
				array_push($hints, 3);
			}

			// Check if right colour wrong position (WHITE PEG)
			else if (in_array ($guess[$i], $this->secret)) {
				array_push($hints, 2);
			}

			// if wrong colour wrong position (NO PEG)
			else {
				array_push($hints, 1);
			}
		}

		return $hints;
	}
	
	// Submit Guess Sequence as Guess
	public function makeGuess(){

		if (!$this->isDone) {

			if ($this->guessIndex == 4) {
				$guess = $this->getGuess();

				$this->getBoardAtIndex($this->boardIndex)->setPegs($guess);
				$hints = $this->makeHints($guess);
				$this->getBoardAtIndex($this->boardIndex)->setHints($hints);

				if ($hints === array(3,3,3,3)) {
					$this->isSolved = True;
					$this->isDone = True;
				}


				$this->boardIndex++;
				$this->clearGuess();

				// If 10 guesses, game over
				if ($this->boardIndex == 10) {
					$this->isSolved = False;
					$this->isDone = True;
				}	
			}
		}
	}

	// Check if Secret Sequence was solved
	public function getIsSolved(){
		return $this->isSolved;
	}

	// Check if game is done 
	// (>10 Guesses)
	public function getIsDone(){
		return $this->isDone;
	}

	// return the secret peg sequence
	public function getSolution() {
		return $this->secret;
	}
}

?>