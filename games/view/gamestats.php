<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>Games Stats</title>
	</head>
	<body>
		<header>
			<a href="index.php?state=home">Back</a>
			<h1>Game Stats</h1>
		</header>

		<h3>Guess Game:</h3>
		1. Times you have tried this puzzle: <?php echo $_SESSION['user']->getTimesTried($dbconn, 'guessgamestats');?><br>
		2. Best record: <?php 
			$tries = $_SESSION['user']->getGGBestTries($dbconn);
			if ($tries == -1) {
				echo "You have not won yet.";
			}
			else {
				echo $tries;
			}
		
		?>
		<br>

		<h3>15-Puzzle:</h3>
		1. Times you have tried this puzzle: <?php echo $_SESSION['user']->getTimesTried($dbconn, 'puzzle15stats');?><br>
		2. Times you have won: <?php echo $_SESSION['user']->getTimesWon($dbconn, 'puzzle15stats');?>
		<br>

		<h3>Peg Solitaire:</h3>
		1. Times you have tried this puzzle: <?php echo $_SESSION['user']->getTimesTried($dbconn, 'pegsolitairestats');?><br>
		2. Times you have won: <?php echo $_SESSION['user']->getTimesWon($dbconn, 'pegsolitairestats');?>
		<br>

		<h3>Mastermind:</h3>
		1. Times you have tried this puzzle: <?php echo $_SESSION['user']->getTimesTried($dbconn, 'mastermindstats');?><br>
		2. Times you have won: <?php echo $_SESSION['user']->getTimesWon($dbconn, 'mastermindstats');?>
		<br>
		<footer>
		</footer>
	</body>
</html>