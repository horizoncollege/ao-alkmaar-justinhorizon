<html>

<head>
    <title>steen papier schaar</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <p>Speler 1, kies je optie</p>

    <form action="#" method="post">
        <input type="submit" name="speler1" value="steen"><img src="img/steen.png" width="80" height="80">
        <input type="submit" name="speler1" value="Papier"><img src="img/papier.png" width="80" height="80">
        <input type="submit" name="speler1" value="Schaar"><img src="img/schaar.png" width="80" height="80">
    </form>

    <br><br>

    <?php
    if (isset($_POST['speler1'])) {
        $speler1 = $_POST['speler1'];

        echo "<p>Speler 2, kies je optie:</p>";

        echo "<form action='#' method='post'>
		<input type='hidden' name='speler1' value='$speler1'>
		<input type='submit' name='speler2' value='steen'><img src='img/steen.png' width='80' height='80'>
		<input type='submit' name='speler2' value='Papier'><img src='img/papier.png' width='80' height='80'>
		<input type='submit' name='speler2' value='Schaar'><img src='img/schaar.png' width='80' height='80'>
		</form>";
    }

    if (isset($_POST['speler2'])) {
        $speler1 = $_POST['speler1'];
        $speler2 = $_POST['speler2'];

        echo "<p>speler 1 had $speler1 gekozen </p>";
        echo "<p>speler 2 had $speler2 gekozen </p>";

        if ($speler1 == $speler2) {
            echo "<p>gelijkspel!</p>";
        } else if ($speler1 == "steen") {
            if ($speler2 == "Schaar") {
                echo "<p>speler 1 heeft gewonnen!</p>";
            } else {
                echo "<p>speler 2 heeft gewonnen!</p>";
            }
        } else if ($speler1 == "Papier") {
            if ($speler2 == "steen") {
                echo "<p>speler 1 heeft gewonnen!</p>";
            } else {
                echo "<p>speler 2 heeft gewonnen!</p>";
            }
        } else if ($speler1 == "Schaar") {
            if ($speler2 == "Papier") {
                echo "<p>speler 1 heeft gewonnen!</p>";
            } else {
                echo "<p>speler 2 heeft gewonnen!</p>";
            }
        }
    }
    ?>

<div class="buttonshome">
        <form>
            <button type="submit" formaction="speler.php">reset</button>
            <button type="submit" formaction="index.php">home</button>
            <button type="submit" formaction="game.php">eenzaam modus</button>
        </form>
    </div>

</body>

</html>