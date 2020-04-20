<?php
	ini_set('display_errors', 'On');
	require_once "lib/lib.php";

	require_once "model/users.php";
	require_once "model/guessgame.php";
	require_once "model/puzzle15.php";
	require_once "model/pegsolitaire.php";
	require_once "model/mastermind.php";


	session_save_path("sess");
	session_start(); 

	$dbconn = db_connect();

	$errors=array();
	$view="";

	/* controller code */

	/* local actions, these are state transforms */
	if(!isset($_SESSION['state'])){
		$_SESSION['state']='login';
	}

	switch($_SESSION['state']){
		

		case "unavailable":
			$view="unavailable.php";
			break;


		case "login":
			// the view we display by default
			$view="login.php";

			if(isset($_GET['state']) && $_GET['state']=="registration"){
				$_SESSION['state']="registration";
				$view="registration.php";
				break;
			}

			// check if submit or not
			if(empty($_REQUEST['submit']) || $_REQUEST['submit']!="login"){
				break;
			}

			// validate and set errors
			if(empty($_REQUEST['user']))$errors[]='user is required';
			if(empty($_REQUEST['password']))$errors[]='password is required';

			if(!empty($errors))break;

			// perform operation, switching state and view if necessary
			if(!$dbconn){
				$errors[]="Can't connect to db";
				break;
			}

			$username = pg_escape_string($_REQUEST['user']);
			$password = pg_escape_string($_REQUEST['password']);

			$_SESSION['user']=new User($username, $dbconn);
			$authenticate = $_SESSION['user']->authenticateUser($dbconn, $password);

			if ($authenticate != "done")$errors[]='username does not exist';

			if(!empty($errors))break;

			$_SESSION['state']='home';
			$view="home.php";

			break;
		

		case "registration":
			
			$view="registration.php";

			if(isset($_GET['state']) && $_GET['state']=="login"){
				$_SESSION['state']="login";
				$view="login.php";
				break;
			}

			// check if submit or not
			if(empty($_REQUEST['submit']) || $_REQUEST['submit']!="register"){
				break;
			}

			// validate and set errors
			if(empty($_REQUEST['user']))$errors[]='user is required';
			if(empty($_REQUEST['password']))$errors[]='password is required';
			if(!isset($_REQUEST['favegame']))$errors[]='please select a favourite game';
			if($_REQUEST['gender']=='select')$errors[]='please choose a gender';
			if(!empty($errors))break;

			// perform operation, switching state and view if necessary
			if(!$dbconn){
				$errors[]="Can't connect to db";
				break;
			}

			$username = pg_escape_string($_REQUEST['user']);
			$password = pg_escape_string($_REQUEST['password']);

			$_SESSION['user']= new User($username, $dbconn);

			$add = $_SESSION['user']->addUser($dbconn, $password, $_REQUEST['gender'], $_REQUEST['favegame']);

			if ($add != "done")$errors[]='username already exists';
			if(!empty($errors))break;
			
			$_SESSION['state']='login';
			$view="login.php";

			break;
		

		case "home":

			$view="home.php";

			// link to game stats (nav)
			if(isset($_GET['state']) && $_GET['state']=="gamestats"){
				$_SESSION['state']="gamestats";
				$view="gamestats.php";
				break;
			}

			// link to guessgame (nav)
			if(isset($_GET['state']) && $_GET['state']=="guessgame"){
				$_SESSION['guessgame']=new GuessGame();
				$_SESSION['user']->addTimesTried($dbconn, 'guessgamestats');
				$_SESSION['state']="guessgame";
				$view="guessgame.php";
				break;
			}

			// link to 15puzzle game (nav)
			if(isset($_GET['state']) && $_GET['state']=="puzzle15"){
				$_SESSION['puzzle15']=new Puzzle15();
				$_SESSION['user']->addTimesTried($dbconn, 'puzzle15stats');
				$_SESSION['state']="puzzle15";
				$view="puzzle15.php";
				break;
			}

			// link to peg solitaire game (nav)
			if(isset($_GET['state']) && $_GET['state']=="pegsolitaire"){
				$_SESSION['pegsolitaire']=new PegSolitaire();
				$_SESSION['user']->addTimesTried($dbconn, 'pegsolitairestats');
				$_SESSION['state']="pegsolitaire";
				$view="pegsolitaire.php";
				break;
			}

			// link to mastermind game (nav)
			if(isset($_GET['state']) && $_GET['state']=="mastermind"){
				$_SESSION['mastermind']=new Mastermind();
				$_SESSION['user']->addTimesTried($dbconn, 'mastermindstats');
				$_SESSION['state']="mastermind";
				$view="mastermind.php";
				break;
			}

			// link to profile (nav)
			if(isset($_GET['state']) && $_GET['state']=="profile"){
				$_SESSION['state']="profile";
				$view="profile.php";
				break;
			}

			// link to logout (nav)
			if(isset($_GET['state']) && $_GET['state']=="logout"){
				$_SESSION = array();
    			session_destroy();
				session_save_path("sess");
				session_start(); 
				$_SESSION['state']="login";
				$view="login.php";
				break;
			}


		case "guessgame":

			$view="guessgame.php";

			if(!isset($_SESSION['guessgame'])){
				$_SESSION['guessgame']=new GuessGame();
			}

			// quick link to home (back button)
			if(isset($_GET['state']) && $_GET['state']=="home"){
				$_SESSION['state']="home";
				$view="home.php";
				break;
			}

			if(isset($_REQUEST['submit']) && $_REQUEST['submit']=="Start Again?"){
				$_SESSION['guessgame']=new GuessGame();
				$_SESSION['user']->addTimesTried($dbconn, 'guessgamestats');
				$errors=array();
			}

			// check if submit or not
			if(empty($_REQUEST['submit'])||$_REQUEST['submit']!="guess"){
				break;
			}

			// validate and set errors
			if(!is_numeric($_REQUEST["guess"]))$errors[]="Guess must be numeric.";
			if(!empty($errors))break;

			$guess = pg_escape_string($_REQUEST['guess']);

			// perform operation, switching state and view if necessary
			$_SESSION["guessgame"]->makeGuess($guess);

			if($_SESSION["guessgame"]->getState()=="correct"){ 
				$numGuesses = $_SESSION["guessgame"]->getNumGuesses();
				$_SESSION["user"]->setGGBestTries($dbconn, $numGuesses);
			}

			$_REQUEST['guess']="";


			break;


		case "puzzle15":

			if(!isset($_SESSION['puzzle15'])){
				$_SESSION['puzzle15']=new Puzzle15();
			}

			if(!isset($_SESSION['solved'])){
				$_SESSION['solved']=False;
			}

			if(isset($_REQUEST['submit']) && $_REQUEST['submit']=="Start Again?"){
				
				// update stats
				$_SESSION['user']->addTimesTried($dbconn, 'puzzle15stats');
				$_SESSION['user']->addTimesWon($dbconn, 'puzzle15stats');

				// start new game
				$_SESSION['puzzle15']=new Puzzle15();
				unset($_GET['row']);
				unset($_GET['col']);
			}
			
			$view="puzzle15.php";
			
			if(isset($_GET['row']) && isset($_GET['col'])){
				$tile = $_SESSION['puzzle15']->getTileAtIndex(array($_GET['row'], $_GET['col']));
				$neighbour = $_SESSION['puzzle15']->nextToEmpty($tile);
				if ($neighbour!=NULL) {
					$_SESSION['puzzle15']->swapTiles($neighbour, $tile);
				}
			}

			// quick link to home (back button)
			if(isset($_GET['state']) && $_GET['state']=="home"){
				$_SESSION['state']="home";
				$view="home.php";
				break;
			}

			break;

		case "pegsolitaire":

			if(!isset($_SESSION['pegsolitaire'])){
				$_SESSION['pegsolitaire'] = new PegSolitaire();
			}
			
			$view="pegsolitaire.php";

			// if peg is clicked, select peg for next move
			if( (isset($_GET['pegrow'])) && (isset($_GET['pegcol'])) ) {
				$_SESSION['pegsolitaire']->selectPeg($_GET['pegrow'], $_GET['pegcol']);
			}

			// if hole is clicked, check if peg is selected
			// if peg is selected, move peg to hole (if valid move)
			if( (isset($_GET['holerow'])) && (isset($_GET['holecol'])) ) {
				if ($_SESSION['pegsolitaire']->isPegSelected()) {
					$_SESSION['pegsolitaire']->movePeg($_GET['holerow'], $_GET['holecol']);
				}
			}

			// quick link to home (back button)
			if(isset($_GET['state']) && $_GET['state']=="home"){
				$_SESSION['state']="home";
				$view="home.php";
				break;
			}

			if(isset($_REQUEST['stuck'])){ // Stuck button
				// Update stats
				$_SESSION['user']->addTimesTried($dbconn, 'pegsolitairestats');

				// Start new game
				$_SESSION['pegsolitaire']=new PegSolitaire();
				unset($_GET['peg']);
			}

			if(isset($_REQUEST['restart'])){ // Play again button
				// Update stats
				$_SESSION['user']->addTimesTried($dbconn, 'pegsolitairestats');
				$_SESSION['user']->addTimesWon($dbconn, 'pegsolitairestats');

				// Start new game
				$_SESSION['pegsolitaire']=new PegSolitaire();
				unset($_GET['peg']);
			}
			
			break;

		case "mastermind":

			if(!isset($_SESSION['mastermind'])){
				$_SESSION['mastermind']=new Mastermind();
			}
			
			$view="mastermind.php";

			// quick link to home (back button)
			if(isset($_GET['state']) && $_GET['state']=="home"){
				$_SESSION['state']="home";
				$view="home.php";
				break;
			}
			
			// if peg is clicked, add peg to guess
			if(isset($_GET['peg'])) {
				$_SESSION['mastermind']->addToGuess($_GET['peg']);
			}

			// if clear button is clicked, clear guess
			if(isset($_REQUEST['clear'])) {
				$_SESSION['mastermind']->clearGuess();
			}

			// if submit button is clicked, submit guess
			if(isset($_REQUEST['submit'])){
				$_SESSION['mastermind']->makeGuess();
			}

			if(isset($_REQUEST['restart'])){

				// Update stats
				$_SESSION['user']->addTimesTried($dbconn, 'mastermindstats');
				if ($_SESSION['mastermind']->getIsSolved()) {
					$_SESSION['user']->addTimesWon($dbconn, 'mastermindstats');
				}
				
				// Start new game
				$_SESSION['mastermind']=new Mastermind();
				unset($_GET['peg']);
			}

			break;


		case "gamestats":

			$view="gamestats.php";

			// quick link to home (back button)
			if(isset($_GET['state']) && $_GET['state']=="home"){
				$_SESSION['state']="home";
				$view="home.php";
			}

			break;


		case "profile":

			$view="profile.php";

			$errors=array();

			if(isset($_REQUEST['submit']) && $_REQUEST['submit']=="Update Password"){
				if(empty($_REQUEST['oldpassword']))$errors[]='old password is required';
				if(empty($_REQUEST['newpassword']))$errors[]='new password is required';
				if(!empty($errors))break;

				$oldpassword = pg_escape_string($_REQUEST['oldpassword']);
				$newpassword = pg_escape_string($_REQUEST['newpassword']);
				$update = $_SESSION['user']->updatePassword($dbconn, $oldpassword, $newpassword);
				if ($update != "done")$errors[]='wrong password';
				if(!empty($errors))break;
			}

			if(isset($_REQUEST['submit']) && $_REQUEST['submit']=="Update Gender"){
				if($_REQUEST['gender']=='select')$errors[]='please choose a gender';
				if(!empty($errors))break;

				$gender = $_REQUEST['gender'];
				$update = $_SESSION['user']->updateGender($dbconn, $gender);
				if ($update != "done")$errors[]='error';
				if(!empty($errors))break;
			}

			if(isset($_REQUEST['submit']) && $_REQUEST['submit']=="Update Favourite Game"){
				if($_REQUEST['favegame']=='select')$errors[]='please choose a favourite game';
				if(!empty($errors))break;

				$favegame = $_REQUEST['favegame'];
				$update = $_SESSION['user']->updateFaveGame($dbconn, $favegame);
				if ($update != "done")$errors[]='error';
				if(!empty($errors))break;
			}

			// quick link to home (back button)
			if(isset($_GET['state']) && $_GET['state']=="home"){
				$_SESSION['state']="home";
				$view="home.php";
				break;
			}
	}

	require_once "view/$view";
?>
