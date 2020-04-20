<?php

class GuessGame {
	public $secretNumber = 5;
	public $numGuesses = 0;
	public $history = array();
	public $state = "";

	// create object
	public function __construct() {
        	$this->secretNumber = rand(1,10);
    	}
	
	// make the guess and add feedback
	public function makeGuess($guess){
		$this->numGuesses++;
		if($guess>$this->secretNumber){
			$this->state="too high";
		} else if($guess<$this->secretNumber){
			$this->state="too low";
		} else {
			$this->state="correct";
		}
		$this->history[] = "Guess #$this->numGuesses was $guess and was $this->state.";
	}

	// return too high, low or correct
	public function getState(){
		return $this->state;
	}

	// return number of guesses
	public function getNumGuesses(){
		return $this->numGuesses;
	}
}
?>