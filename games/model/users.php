<?php

//ini_set('display_errors', 'Off');
require_once "lib/lib.php";

class User {

	public $username;

	// create object with username
	public function __construct($username, $dbconn) {
		$this->username=$username;
	}

	// return username
	public function getUsername() {
		return $this->username;
	}
	
	// add a user to the db
	public function addUser($dbconn, $password, $gender, $favegame) {

		// table appuser
		$password = hash('sha256', $this->username.$password);
		$query = "INSERT INTO appuser (username, password, gender, favegame) values($1, $2, $3, $4);"; 
		$result = pg_prepare($dbconn, "", $query);
		$result = pg_execute($dbconn, "", array($this->username, $password, $gender, $favegame));
		if ($result==False) {
			return "user already exists";
		}

		// table guessgamestats
		$query1 = "INSERT INTO guessgamestats (username, timestried, besttries) values($1, 0, -1);"; 
		$result1 = pg_prepare($dbconn, "", $query1);
		$result1 = pg_execute($dbconn, "", array($this->username));
		if ($result1==False) {
			return "user already exists";
		}

		// table puzzle15stats
		$query2 = "INSERT INTO puzzle15stats (username, timestried, timeswon) values($1, 0, 0);"; 
		$result2 = pg_prepare($dbconn, "", $query2);
		$result2 = pg_execute($dbconn, "", array($this->username));
		if ($result2==False) {
			return "user already exists";
		}

		// table pegsolitairestats
		$query3 = "INSERT INTO pegsolitairestats (username, timestried, timeswon) values($1, 0, 0);"; 
		$result3 = pg_prepare($dbconn, "", $query3);
		$result3 = pg_execute($dbconn, "", array($this->username));
		if ($result3==False) {
			return "user already exists";
		}

		// table mastermindstats
		$query4 = "INSERT INTO mastermindstats (username, timestried, timeswon) values($1, 0, 0);"; 
		$result4 = pg_prepare($dbconn, "", $query4);
		$result4 = pg_execute($dbconn, "", array($this->username));
		if ($result4==False) {
			return "user already exists";
		}

		return "done";
	} 

	// authenticate a user (used to login)
	public function authenticateUser($dbconn, $password) {
		$password = hash('sha256', $this->username.$password);
		$query = "SELECT * FROM appuser WHERE username=$1 and password=$2;";
		$result = pg_prepare($dbconn, "", $query);
		$result = pg_execute($dbconn, "", array($this->username, $password));
		if($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
			return "done";
		} else {
			return "user does not exist";
		}
	}

	// update the password of a user
	public function updatePassword($dbconn, $oldpassword, $newpassword) {
		$query = "SELECT password FROM appuser WHERE username=$1;";
		$result = pg_prepare($dbconn, "", $query);
		$result = pg_execute($dbconn, "", array($this->username));
		$arr = pg_fetch_array($result, NULL, PGSQL_NUM)[0];

		if ($arr == hash("sha256", $this->username.$oldpassword)) {
			$query1 = "UPDATE appuser SET password=$1 WHERE username=$2;";
			$result1 = pg_prepare($dbconn, "", $query1);
			$newpassword = hash("sha256", $this->username.$newpassword);
			$result1 = pg_execute($dbconn, "", array($newpassword, $this->username));
			
			if ($result1==False) {
				return "error";
			}
			return "done";
		}
		return "wrong password";
	} 

	// updates the gender of a user
	public function updateGender($dbconn, $gender) {
		$query = "UPDATE appuser SET gender=$1 WHERE username=$2;";
		$result = pg_prepare($dbconn, "", $query);
		$result = pg_execute($dbconn, "", array($gender, $this->username));
		
		if ($result==False) {
			return "error";
		}
		return "done";
	}

	// updates the favourite game of a user
	public function updateFaveGame($dbconn, $favegame) {
		$query = "UPDATE appuser SET favegame=$1 WHERE username=$2;";
		$result = pg_prepare($dbconn, "", $query);
		$result = pg_execute($dbconn, "", array($favegame, $this->username));
		
		if ($result==False) {
			return "error";
		}
		return "done";
	}

	// number of times the following games were attempted by user
	public function getTimesTried($dbconn, $table) {
		$query;
		if ($table=='guessgamestats') {
			$query = "SELECT timestried FROM guessgamestats WHERE username=$1;";
		}
		if ($table=='puzzle15stats') {
			$query = "SELECT timestried FROM puzzle15stats WHERE username=$1;";
		}
		if ($table=='pegsolitairestats') {
			$query = "SELECT timestried FROM pegsolitairestats WHERE username=$1;";
		}
		if ($table=='mastermindstats') {
			$query = "SELECT timestried FROM mastermindstats WHERE username=$1;";
		}

		$result = pg_prepare($dbconn, "", $query);
		$result = pg_execute($dbconn, "", array($this->username));
		$arr = pg_fetch_array($result, NULL, PGSQL_NUM);
		return $arr[0];
	}

	// the best record for guess game by user
	public function getGGBestTries($dbconn) {
		$query = "SELECT besttries FROM guessgamestats WHERE username=$1;";
		$result = pg_prepare($dbconn, "", $query);
		$result = pg_execute($dbconn, "", array($this->username));
		$arr = pg_fetch_array($result, 0, PGSQL_NUM);
		return $arr[0];
	}

	// set the best record if broken for guess game
	public function setGGBestTries($dbconn, $newTries) {
		$current = $this->getGGBestTries($dbconn);
		if ($newTries < $current || $current == -1) {
			$query = "UPDATE guessgamestats SET besttries=$1 WHERE username=$2;";
			$result = pg_prepare($dbconn, "", $query);
			$result = pg_execute($dbconn, "", array($newTries, $this->username));
			
			if ($result==False) {
				return "error";
			}
		}
	}

	// number of times the following games were won by user
	public function getTimesWon($dbconn, $table) {
		$query;
		if ($table=='guessgamestats') {
			$query = "SELECT timeswon FROM guessgamestats WHERE username=$1;";
		}
		if ($table=='puzzle15stats') {
			$query = "SELECT timeswon FROM puzzle15stats WHERE username=$1;";
		}
		if ($table=='pegsolitairestats') {
			$query = "SELECT timeswon FROM pegsolitairestats WHERE username=$1;";
		}
		if ($table=='mastermindstats') {
			$query = "SELECT timeswon FROM mastermindstats WHERE username=$1;";
		}

		$result = pg_prepare($dbconn, "", $query);
		$result = pg_execute($dbconn, "", array($this->username));
		$arr = pg_fetch_array($result, 0, PGSQL_NUM);
		return $arr[0];
	}

	// ADD to number of times the following games were attempted by user
	public function addTimesTried($dbconn, $table) {
		$num = $this->getTimesTried($dbconn, $table);	

		$query;
		if ($table=='guessgamestats') {
			$query = "UPDATE guessgamestats SET timestried=$1 WHERE username=$2;";
		}
		if ($table=='puzzle15stats') {
			$query = "UPDATE puzzle15stats SET timestried=$1 WHERE username=$2;";
		}
		if ($table=='pegsolitairestats') {
			$query = "UPDATE pegsolitairestats SET timestried=$1 WHERE username=$2;";
		}
		if ($table=='mastermindstats') {
			$query = "UPDATE mastermindstats SET timestried=$1 WHERE username=$2;";
		}

		$result = pg_prepare($dbconn, "", $query);
		$result = pg_execute($dbconn, "", array($num+1, $this->username));
		
		if ($result==False) {
			return "user already exists";
		}
	}
	
	// ADD to number of times the following games were won by user
	public function addTimesWon($dbconn, $table) {
		$num = $this->getTimesWon($dbconn, $table);		

		$query;
		if ($table=='guessgamestats') {
			$query = "UPDATE guessgamestats SET timeswon=$1 WHERE username=$2;";
		}
		if ($table=='puzzle15stats') {
			$query = "UPDATE puzzle15stats SET timeswon=$1 WHERE username=$2;";
		}
		if ($table=='pegsolitairestats') {
			$query = "UPDATE pegsolitairestats SET timeswon=$1 WHERE username=$2;";
		}
		if ($table=='mastermindstats') {
			$query = "UPDATE mastermindstats SET timeswon=$1 WHERE username=$2;";
		}
		$result = pg_prepare($dbconn, "", $query);
		$result = pg_execute($dbconn, "", array($num+1, $this->username));
		
		if ($result==False) {
			return "user already exists";
		}
	}

}
?>