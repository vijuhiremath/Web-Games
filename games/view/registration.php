<?php
// So I don't have to deal with unset $_REQUEST['user'] when refilling the form
// You can also take a look at the new ?? operator in PHP7

$_REQUEST['user']=!empty($_REQUEST['user']) ? $_REQUEST['user'] : '';
$_REQUEST['password']=!empty($_REQUEST['password']) ? $_REQUEST['password'] : '';
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>Games</title>
	</head>
	<body>
		<header>
			<a href="index.php?state=login">Login</a>
			<h1>Games</h1>
		</header>
		<main>
			<h1>Register</h1>
			<form action="index.php" method="post">
				<legend>Register</legend>
				<table>
					<!-- Trick below to re-fill the user form field -->
					<tr><th><label for="user">User</label></th><td><input type="text" name="user" value="<?php echo($_REQUEST['user']); ?>" /></td></tr>
					<tr><th><label for="password">Password</label></th><td> <input type="password" name="password" /></td></tr>
                    <tr><th><label for="gender">Gender</label></th>
                    <td>
                        <select name=gender>
                            <option value="select">Select</option>
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                            <option value="undefined">Prefer not to say</option>
						</select>
                    </td></tr>
					<tr>
						<th><label for="favegame">Favourite Game</label></th>
						<td><input type="radio" name="favegame" value="guessgame">Guess Game<br></td>
						<td><input type="radio" name="favegame" value="puzzle15">15 Puzzle<br></td>
						<td><input type="radio" name="favegame" value="pegsolitaire">Peg Solitaire<br></td>
						<td><input type="radio" name="favegame" value="mastermind">Mastermind<br></td>
						
					</tr>
					<tr><th>&nbsp;</th><td><input type="submit" name="submit" value="register" /></td></tr>
					<tr><th>&nbsp;</th><td><?php echo(view_errors($errors)); ?></td></tr>
				</table>
			</form>
		</main>
		<footer>
		</footer>
	</body>
</html>

