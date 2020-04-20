<?php
	// So I don't have to deal with uninitialized $_REQUEST['guess']
	$_REQUEST['guess']=!empty($_REQUEST['guess']) ? $_REQUEST['guess'] : '';
?>
<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>Guess Game</title>

	</head>

	<body>
	
		<header>
		
		<a href="index.php?state=home">Back</a>
		<h1>Welcome to Guess Game</h1>
		</header>


		<?php if($_SESSION["guessgame"]->getState()!="correct"){ ?>
			<br>
			<form method="post">
				<center><input type="text" name="guess" value="<?php echo($_REQUEST['guess']); ?>" /> <input type="submit" name="submit" value="guess" /></center>
			</form>
			<br>
		<?php } ?>
	
		<!-- <?php echo(view_errors($errors)); ?>  -->

		<?php foreach($_SESSION['guessgame']->history as $key=>$value){
				echo("<br/> $value");
			}

			if($_SESSION["guessgame"]->getState()=="correct"){ ?>
				<center>Congrats, you won!</center>
				<br>
				<form method="post">
					<center><input type="submit" name="submit" value="Start Again?"/></center>
				</form>

		<?php } ?>

	</body>
</html>