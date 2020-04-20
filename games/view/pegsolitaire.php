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
		<title>Peg Solitaire</title>
	</head>

	<body>
    
		<header>
        <a href="index.php?state=home">Back</a>
        <h1>Welcome to Peg Solitaire</h1>
        </header>
    
        <table style="width:25px; height:25px; margin:15px auto; border-style: solid; background-color:white">

            <tr>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(0,0);?>row=0&<?php echo $_SESSION['pegsolitaire']->getTileType(0,0);?>col=0"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(0,0);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(0,1);?>row=0&<?php echo $_SESSION['pegsolitaire']->getTileType(0,1);?>col=1"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(0,1);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(0,2);?>row=0&<?php echo $_SESSION['pegsolitaire']->getTileType(0,2);?>col=2"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(0,2);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(0,3);?>row=0&<?php echo $_SESSION['pegsolitaire']->getTileType(0,3);?>col=3"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(0,3);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(0,4);?>row=0&<?php echo $_SESSION['pegsolitaire']->getTileType(0,4);?>col=4"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(0,4);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(0,5);?>row=0&<?php echo $_SESSION['pegsolitaire']->getTileType(0,5);?>col=5"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(0,5);?>.png"> </a></td>
            </tr>

            <tr>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(1,0);?>row=1&<?php echo $_SESSION['pegsolitaire']->getTileType(1,0);?>col=0"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(1,0);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(1,1);?>row=1&<?php echo $_SESSION['pegsolitaire']->getTileType(1,1);?>col=1"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(1,1);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(1,2);?>row=1&<?php echo $_SESSION['pegsolitaire']->getTileType(1,2);?>col=2"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(1,2);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(1,3);?>row=1&<?php echo $_SESSION['pegsolitaire']->getTileType(1,3);?>col=3"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(1,3);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(1,4);?>row=1&<?php echo $_SESSION['pegsolitaire']->getTileType(1,4);?>col=4"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(1,4);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(1,5);?>row=1&<?php echo $_SESSION['pegsolitaire']->getTileType(1,5);?>col=5"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(1,5);?>.png"> </a></td>
            </tr>

            <tr>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(2,0);?>row=2&<?php echo $_SESSION['pegsolitaire']->getTileType(2,0);?>col=0"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(2,0);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(2,1);?>row=2&<?php echo $_SESSION['pegsolitaire']->getTileType(2,1);?>col=1"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(2,1);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(2,2);?>row=2&<?php echo $_SESSION['pegsolitaire']->getTileType(2,2);?>col=2"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(2,2);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(2,3);?>row=2&<?php echo $_SESSION['pegsolitaire']->getTileType(2,3);?>col=3"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(2,3);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(2,4);?>row=2&<?php echo $_SESSION['pegsolitaire']->getTileType(2,4);?>col=4"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(2,4);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(2,5);?>row=2&<?php echo $_SESSION['pegsolitaire']->getTileType(2,5);?>col=5"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(2,5);?>.png"> </a></td>
            </tr>

            <tr>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(3,0);?>row=3&<?php echo $_SESSION['pegsolitaire']->getTileType(3,0);?>col=0"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(3,0);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(3,1);?>row=3&<?php echo $_SESSION['pegsolitaire']->getTileType(3,1);?>col=1"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(3,1);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(3,2);?>row=3&<?php echo $_SESSION['pegsolitaire']->getTileType(3,2);?>col=2"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(3,2);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(3,3);?>row=3&<?php echo $_SESSION['pegsolitaire']->getTileType(3,3);?>col=3"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(3,3);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(3,4);?>row=3&<?php echo $_SESSION['pegsolitaire']->getTileType(3,4);?>col=4"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(3,4);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(3,5);?>row=3&<?php echo $_SESSION['pegsolitaire']->getTileType(3,5);?>col=5"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(3,5);?>.png"> </a></td>
            </tr>

            <tr>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(4,0);?>row=4&<?php echo $_SESSION['pegsolitaire']->getTileType(4,0);?>col=0"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(4,0);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(4,1);?>row=4&<?php echo $_SESSION['pegsolitaire']->getTileType(4,1);?>col=1"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(4,1);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(4,2);?>row=4&<?php echo $_SESSION['pegsolitaire']->getTileType(4,2);?>col=2"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(4,2);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(4,3);?>row=4&<?php echo $_SESSION['pegsolitaire']->getTileType(4,3);?>col=3"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(4,3);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(4,4);?>row=4&<?php echo $_SESSION['pegsolitaire']->getTileType(4,4);?>col=4"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(4,4);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(4,5);?>row=4&<?php echo $_SESSION['pegsolitaire']->getTileType(4,5);?>col=5"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(4,5);?>.png"> </a></td>
            </tr>

            <tr>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(5,0);?>row=5&<?php echo $_SESSION['pegsolitaire']->getTileType(5,0);?>col=0"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(5,0);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(5,1);?>row=5&<?php echo $_SESSION['pegsolitaire']->getTileType(5,1);?>col=1"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(5,1);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(5,2);?>row=5&<?php echo $_SESSION['pegsolitaire']->getTileType(5,2);?>col=2"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(5,2);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(5,3);?>row=5&<?php echo $_SESSION['pegsolitaire']->getTileType(5,3);?>col=3"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(5,3);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(5,4);?>row=5&<?php echo $_SESSION['pegsolitaire']->getTileType(5,4);?>col=4"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(5,4);?>.png"> </a></td>
                <td><a href="index.php?<?php echo $_SESSION['pegsolitaire']->getTileType(5,5);?>row=5&<?php echo $_SESSION['pegsolitaire']->getTileType(5,5);?>col=5"> <img src="images/pegsolitaire/<?php echo $_SESSION['pegsolitaire']->getTileType(5,5);?>.png"> </a></td>
            </tr>
            
        </table>

        <br>

        <form method="post">
        
        <!-- Disable stuck when game is done -->
        <center>
        <input type="submit" name="stuck" value="Stuck?"
                    <?php if ($_SESSION['pegsolitaire']->getIsDone())
                    { ?> disabled <?php } ?> 
        />
        </center>

        </form>

        <br>

        <?php if($_SESSION['pegsolitaire']->getIsDone()) { ?>

            <?php if($_SESSION['pegsolitaire']->getIsSolved()) { ?>
                <center>Congratulations, you won in <?php echo $_SESSION['mastermind']->getNumGuesses();?> guesses!</center>
            <?php } ?>

            <?php if(!$_SESSION['pegsolitaire']->getIsSolved()) { ?>
                <center>Game Over</center>
            <?php } ?>

            <br>

            <form method="post">
            <center><input type="submit" name="restart" value="Play Again?"/></center>
            </form>

        <?php } ?>

        <br>

	</body>
</html>
