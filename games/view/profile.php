<?php
// So I don't have to deal with unset $_REQUEST['user'] when refilling the form
// You can also take a look at the new ?? operator in PHP7
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
			<a href="index.php?state=home">Back</a>
			<h1>Edit Profile</h1>
		</header>
			<form action="index.php" method="post">
				<table>
					<!-- Trick below to re-fill the user form field -->
                    <tr><th><label for="oldpassword">Old Password</label></th><td> <input type="password" name="oldpassword" /></td></tr>
					<tr><th><label for="newpassword">New Password</label></th><td> <input type="password" name="newpassword" /></td></tr>
                    <tr><th>&nbsp;</th><td><input type="submit" name="submit" value="Update Password" /></td></tr>
                    <tr><th><label for="gender">Gender</label></th>
                    <td>
                        <select name=gender>
                            <option value="select">Select</option>
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                            <option value="undefined">Prefer not to say</option>
						</select>
                    </td></tr>
                    <tr><th>&nbsp;</th><td><input type="submit" name="submit" value="Update Gender" /></td></tr>
					<tr>
						<th><label for="favegame">Favourite Game</label></th>
						<td><input type="radio" name="favegame" value="guessgame">Guess Game<br></td>
						<td><input type="radio" name="favegame" value="puzzle15">15-Puzzle<br></td>
						<td><input type="radio" name="favegame" value="pegsolitaire">Peg Solitaire<br></td>
						<td><input type="radio" name="favegame" value="mastermind">Mastermind<br></td>
					</tr>
					<tr><th>&nbsp;</th><td><input type="submit" name="submit" value="Update Favourite Game" /></td></tr>
					<tr><th>&nbsp;</th><td><?php echo(view_errors($errors)); ?></td></tr>
				</table>
			</form>
		<footer>
		</footer>
	</body>
</html>

