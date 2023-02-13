<!DOCTYPE html>
<html>

<head>
    <title>Stenen papier scharen</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="game">
        <h1>Steen papier schaar</h1>
        <div class="spelerkeus">
            <h3>Choose your weapon!</h3>
            <div>
                <a href="?speler=steen"><img src="img/steen.png" alt="steen"></a>
                <a href="?speler=papier"><img src="img/papier.png" alt="papier"></a>
                <a href="?speler=schaar"><img src="img/schaar.png" alt="schaar"></a>
            </div>
        </div>
        <?php
        if (isset($_GET['speler'])) {
            $speler = $_GET['speler'];
            $ai = rand(0, 2);
            $ai_keuze = "";
            if ($ai == 0) {
                $ai_keuze = "steen";
            } elseif ($ai == 1) {
                $ai_keuze = "papier";
            } else {
                $ai_keuze = "schaar";
            }
            echo "<div class='results'>";
            echo "<h3>Jij koos <img src='img/$speler.png' alt='$speler'> AI koos <img src='img/$ai_keuze.png' alt='$ai_keuze'>.</h3>";
            if ($speler == $ai_keuze) {
                echo "<h2>Gelijkspel loser</h2>";
            } elseif (($speler == "steen" && $ai_keuze == "schaar") || ($speler == "schaar" && $ai_keuze == "papier") || ($speler == "papier" && $ai_keuze == "steen")) {
                echo "<h2>Je heb gewonnen!</h2>";
            } else {
                echo "<h2>Verloren van AI bozo</h2>";
            }
            echo "</div>";
        }
        ?>
    </div>

    <div class="buttonshome">
        <form>
            <button type="submit" formaction="index.php">home</button>
            <button type="submit" formaction="speler.php">Vrienden modus</button>
        </form>
    </div>

</body>

</html>
