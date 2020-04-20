<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>Games</title>
	</head>
	<body>
		<header><h1>Home Page</h1></header>
		<nav>
			<ul>
			<li> <a href="index.php?state=guessgame">Guess Game</a>
			<li> <a href="index.php?state=puzzle15">15 Puzzle</a>
			<li> <a href="index.php?state=pegsolitaire">Peg Solitaire</a>
			<li> <a href="index.php?state=mastermind">Mastermind</a>
			<li> <a href="index.php?state=gamestats">Game Stats</a>
			<li> <a href="index.php?state=profile">Profile</a>
			<li> <a href="index.php?state=logout">Logout</a>
            </ul>
		</nav>
			<center><h1><?php echo "Welcome back, " . $_SESSION['user']->getUsername()?></h1></center>
		<footer>
		</footer>
	</body>
</html>

