<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title>15 Puzzle</title>
	</head>
	<body>
        <header>
            <a href="index.php?state=home">Back</a>
            <h1>Welcome to 15 Puzzle</h1>
        </header>
     

        <table style="width:30px; height:30px; margin:30px auto;">
            <tr>
                <td><a href="index.php?row=0&col=0"> <img src="images/puzzle15/<?php echo $_SESSION['puzzle15']->getTileAtIndex(array(0,0))->getIndex();?>.png"> </a></td>
                <td><a href="index.php?row=0&col=1"> <img src="images/puzzle15/<?php echo $_SESSION['puzzle15']->getTileAtIndex(array(0,1))->getIndex();?>.png"> </a></td>
                <td><a href="index.php?row=0&col=2"> <img src="images/puzzle15/<?php echo $_SESSION['puzzle15']->getTileAtIndex(array(0,2))->getIndex();?>.png"> </a></td>
                <td><a href="index.php?row=0&col=3"> <img src="images/puzzle15/<?php echo $_SESSION['puzzle15']->getTileAtIndex(array(0,3))->getIndex();?>.png"> </a></td>
            </tr>
            <tr>
                <td><a href="index.php?row=1&col=0"> <img src="images/puzzle15/<?php echo $_SESSION['puzzle15']->getTileAtIndex(array(1,0))->getIndex();?>.png"> </a></td>
                <td><a href="index.php?row=1&col=1"> <img src="images/puzzle15/<?php echo $_SESSION['puzzle15']->getTileAtIndex(array(1,1))->getIndex();?>.png"> </a></td>
                <td><a href="index.php?row=1&col=2"> <img src="images/puzzle15/<?php echo $_SESSION['puzzle15']->getTileAtIndex(array(1,2))->getIndex();?>.png"> </a></td>
                <td><a href="index.php?row=1&col=3"> <img src="images/puzzle15/<?php echo $_SESSION['puzzle15']->getTileAtIndex(array(1,3))->getIndex();?>.png"> </a></td>
            </tr>
            <tr>
                <td><a href="index.php?row=2&col=0"> <img src="images/puzzle15/<?php echo $_SESSION['puzzle15']->getTileAtIndex(array(2,0))->getIndex();?>.png"> </a></td>
                <td><a href="index.php?row=2&col=1"> <img src="images/puzzle15/<?php echo $_SESSION['puzzle15']->getTileAtIndex(array(2,1))->getIndex();?>.png"> </a></td>
                <td><a href="index.php?row=2&col=2"> <img src="images/puzzle15/<?php echo $_SESSION['puzzle15']->getTileAtIndex(array(2,2))->getIndex();?>.png"> </a></td>
                <td><a href="index.php?row=2&col=3"> <img src="images/puzzle15/<?php echo $_SESSION['puzzle15']->getTileAtIndex(array(2,3))->getIndex();?>.png"> </a></td>
            </tr>
            <tr>
                <td><a href="index.php?row=3&col=0"> <img src="images/puzzle15/<?php echo $_SESSION['puzzle15']->getTileAtIndex(array(3,0))->getIndex();?>.png"> </a></td>
                <td><a href="index.php?row=3&col=1"> <img src="images/puzzle15/<?php echo $_SESSION['puzzle15']->getTileAtIndex(array(3,1))->getIndex();?>.png"> </a></td>
                <td><a href="index.php?row=3&col=2"> <img src="images/puzzle15/<?php echo $_SESSION['puzzle15']->getTileAtIndex(array(3,2))->getIndex();?>.png"> </a></td>
                <td><a href="index.php?row=3&col=3"> <img src="images/puzzle15/<?php echo $_SESSION['puzzle15']->getTileAtIndex(array(3,3))->getIndex();?>.png"> </a></td>
            </tr>
            
        </table>
        <?php 
            if($_SESSION['puzzle15']->getIsSolved()) {?>
                <center>Congrats, you won!</center>
                <br>
                <form method="post">
                    <center><input type="submit" name="submit" value="Start Again?"/></center>
                </form>
            <?php
            }
        ?>
	</body>
</html>

