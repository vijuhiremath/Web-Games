<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>Mastermind</title>
	</head>

	<body>

        <header>

			<a href="index.php?state=home">Back</a>
			<h1>Welcome to Mastermind</h1>
            
        </header>

        <!-- Controller -->
        <table style="width:25px; height:25px; margin:15px auto; border-style: solid; background-color:grey">
            <tr>
                <!-- Code Pegs -->
                <td style="border-style: solid"><a href="index.php?peg=1"> <img src="images/mastermind/p1.png"> </a></td>
                <td style="border-style: solid"><a href="index.php?peg=2"> <img src="images/mastermind/p2.png"> </a></td>
                <td style="border-style: solid"><a href="index.php?peg=3"> <img src="images/mastermind/p3.png"> </a></td>
                <td style="border-style: solid"><a href="index.php?peg=4"> <img src="images/mastermind/p4.png"> </a></td>
                <td style="border-style: solid"><a href="index.php?peg=5"> <img src="images/mastermind/p5.png"> </a></td>
                <td style="border-style: solid"><a href="index.php?peg=6"> <img src="images/mastermind/p6.png"> </a></td>
            </tr>
        </table>

        <!-- Selection -->
        <table style="width:25px; height:25px; margin:15px auto; background-color:grey">
            <tr>
                <!-- Chosen Combination -->
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getGuessAtIndex(0);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getGuessAtIndex(1);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getGuessAtIndex(2);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getGuessAtIndex(3);?>.png"> </a></td>
            </tr>
        </table>

        <form method="post">
                <center>

                <!-- Disable clear when guess is empty and when game is done -->
                <input type="submit" name="clear" value="Clear"
                    <?php if (($_SESSION['mastermind']->guessIndex == 0) || ($_SESSION['mastermind']->getIsDone()))
                    { ?> disabled <?php } ?> 
                />

                 <!-- Disable submit when guess is not full and when game is done -->
                <input type="submit" name="submit" value="Submit" 
                    <?php if (($_SESSION['mastermind']->guessIndex < 4) || ($_SESSION['mastermind']->getIsDone()))
                    { ?> disabled <?php } ?> 
                />
                
                </center>
        </form>

        <br>

        <!-- For loop? -->

        <!-- Board 1 -->
        <table style="width:25px; height:25px; margin:15px auto; background-color:brown">
            <tr>
                <!-- Combination 1 -->
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(0)->getPegAtIndex(0);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(0)->getPegAtIndex(1);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(0)->getPegAtIndex(2);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(0)->getPegAtIndex(3);?>.png"> </a></td>
                <td>
                    <!-- Hints 1 -->
                    <table>
                        <tr>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(0)->getHintAtIndex(0);?>.png"> </a></td>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(0)->getHintAtIndex(1);?>.png"> </a></td>
                        </tr>
                        <tr>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(0)->getHintAtIndex(2);?>.png"> </a></td>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(0)->getHintAtIndex(3);?>.png"> </a></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- Board 2 -->
        <table style="width:25px; height:25px; margin:15px auto; background-color:brown">
            <tr>
                <!-- Combination 2 -->
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(1)->getPegAtIndex(0);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(1)->getPegAtIndex(1);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(1)->getPegAtIndex(2);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(1)->getPegAtIndex(3);?>.png"> </a></td>
                <td>
                    <!-- Hints 2 -->
                    <table>
                        <tr>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(1)->getHintAtIndex(0);?>.png"> </a></td>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(1)->getHintAtIndex(1);?>.png"> </a></td>
                        </tr>
                        <tr>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(1)->getHintAtIndex(2);?>.png"> </a></td>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(1)->getHintAtIndex(3);?>.png"> </a></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- Board 3 -->
        <table style="width:25px; height:25px; margin:15px auto; background-color:brown">
            <tr>
                <!-- Combination 3 -->
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(2)->getPegAtIndex(0);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(2)->getPegAtIndex(1);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(2)->getPegAtIndex(2);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(2)->getPegAtIndex(3);?>.png"> </a></td>
                <td>
                    <!-- Hints 3 -->
                    <table>
                        <tr>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(2)->getHintAtIndex(0);?>.png"> </a></td>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(2)->getHintAtIndex(1);?>.png"> </a></td>
                        </tr>
                        <tr>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(2)->getHintAtIndex(2);?>.png"> </a></td>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(2)->getHintAtIndex(3);?>.png"> </a></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- Board 4 -->
        <table style="width:25px; height:25px; margin:15px auto; background-color:brown">
            <tr>
                <!-- Combination 4 -->
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(3)->getPegAtIndex(0);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(3)->getPegAtIndex(1);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(3)->getPegAtIndex(2);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(3)->getPegAtIndex(3);?>.png"> </a></td>
                <td>
                    <!-- Hints 4 -->
                    <table>
                        <tr>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(3)->getHintAtIndex(0);?>.png"> </a></td>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(3)->getHintAtIndex(1);?>.png"> </a></td>
                        </tr>
                        <tr>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(3)->getHintAtIndex(2);?>.png"> </a></td>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(3)->getHintAtIndex(3);?>.png"> </a></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- Board 5 -->
        <table style="width:25px; height:25px; margin:15px auto; background-color:brown">
            <tr>
                <!-- Combination 5 -->
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(4)->getPegAtIndex(0);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(4)->getPegAtIndex(1);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(4)->getPegAtIndex(2);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(4)->getPegAtIndex(3);?>.png"> </a></td>
                <td>
                    <!-- Hints 5 -->
                    <table>
                        <tr>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(4)->getHintAtIndex(0);?>.png"> </a></td>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(4)->getHintAtIndex(1);?>.png"> </a></td>
                        </tr>
                        <tr>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(4)->getHintAtIndex(2);?>.png"> </a></td>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(4)->getHintAtIndex(3);?>.png"> </a></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

       <!-- Board 6 -->
       <table style="width:25px; height:25px; margin:15px auto; background-color:brown">
            <tr>
                <!-- Combination 6 -->
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(5)->getPegAtIndex(0);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(5)->getPegAtIndex(1);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(5)->getPegAtIndex(2);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(5)->getPegAtIndex(3);?>.png"> </a></td>
                <td>
                    <!-- Hints 6 -->
                    <table>
                        <tr>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(5)->getHintAtIndex(0);?>.png"> </a></td>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(5)->getHintAtIndex(1);?>.png"> </a></td>
                        </tr>
                        <tr>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(5)->getHintAtIndex(2);?>.png"> </a></td>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(5)->getHintAtIndex(3);?>.png"> </a></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- Board 7 -->
        <table style="width:25px; height:25px; margin:15px auto; background-color:brown">
            <tr>
                <!-- Combination 7 -->
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(6)->getPegAtIndex(0);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(6)->getPegAtIndex(1);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(6)->getPegAtIndex(2);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(6)->getPegAtIndex(3);?>.png"> </a></td>
                <td>
                    <!-- Hints 7 -->
                    <table>
                        <tr>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(6)->getHintAtIndex(0);?>.png"> </a></td>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(6)->getHintAtIndex(1);?>.png"> </a></td>
                        </tr>
                        <tr>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(6)->getHintAtIndex(2);?>.png"> </a></td>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(6)->getHintAtIndex(3);?>.png"> </a></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- Board 8 -->
        <table style="width:25px; height:25px; margin:15px auto; background-color:brown">
            <tr>
                <!-- Combination 8 -->
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(7)->getPegAtIndex(0);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(7)->getPegAtIndex(1);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(7)->getPegAtIndex(2);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(7)->getPegAtIndex(3);?>.png"> </a></td>
                <td>
                    <!-- Hints 8 -->
                    <table>
                        <tr>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(7)->getHintAtIndex(0);?>.png"> </a></td>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(7)->getHintAtIndex(1);?>.png"> </a></td>
                        </tr>
                        <tr>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(7)->getHintAtIndex(2);?>.png"> </a></td>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(7)->getHintAtIndex(3);?>.png"> </a></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- Board 9 -->
        <table style="width:25px; height:25px; margin:15px auto; background-color:brown">
            <tr>
                <!-- Combination 9 -->
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(8)->getPegAtIndex(0);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(8)->getPegAtIndex(1);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(8)->getPegAtIndex(2);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(8)->getPegAtIndex(3);?>.png"> </a></td>
                <td>
                    <!-- Hints 9 -->
                    <table>
                        <tr>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(8)->getHintAtIndex(0);?>.png"> </a></td>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(8)->getHintAtIndex(1);?>.png"> </a></td>
                        </tr>
                        <tr>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(8)->getHintAtIndex(2);?>.png"> </a></td>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(8)->getHintAtIndex(3);?>.png"> </a></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- Board 10 -->
        <table style="width:25px; height:25px; margin:15px auto; background-color:brown">
            <tr>
                <!-- Combination 10 -->
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(9)->getPegAtIndex(0);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(9)->getPegAtIndex(1);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(9)->getPegAtIndex(2);?>.png"> </a></td>
                <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getBoardAtIndex(9)->getPegAtIndex(3);?>.png"> </a></td>
                <td>
                    <!-- Hints 10 -->
                    <table>
                        <tr>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(9)->getHintAtIndex(0);?>.png"> </a></td>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(9)->getHintAtIndex(1);?>.png"> </a></td>
                        </tr>
                        <tr>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(9)->getHintAtIndex(2);?>.png"> </a></td>
                            <td style="border-style: solid"> <img src="images/mastermind/h<?php echo $_SESSION['mastermind']->getBoardAtIndex(9)->getHintAtIndex(3);?>.png"> </a></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <?php if($_SESSION['mastermind']->getIsDone()) { ?>

                <?php if($_SESSION['mastermind']->getIsSolved()) { ?>
                    <center>Congratulations, you won in <?php echo $_SESSION['mastermind']->getNumGuesses();?> guesses!</center>
                <?php } ?>

                <?php if(!$_SESSION['mastermind']->getIsSolved()) { ?>
                    <center>Game Over</center>
                <?php } ?>

                <br>

                <center>Solution</center>
                <table style="width:25px; height:25px; margin:15px auto; background-color:brown">
                    <tr>
                        <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getSolution()[0];?>.png"> </a></td>
                        <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getSolution()[1];?>.png"> </a></td>
                        <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getSolution()[2];?>.png"> </a></td>
                        <td style="border-style: solid"> <img src="images/mastermind/p<?php echo $_SESSION['mastermind']->getSolution()[3];?>.png"> </a></td>
                    </tr>
                </table>

                <form method="post">
                <center><input type="submit" name="restart" value="Play Again?"/></center>
                </form>

        <?php } ?>

        <br>

	</body>
</html>