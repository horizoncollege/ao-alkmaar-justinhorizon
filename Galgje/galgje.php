<!--pagina voor het spel galgje zelf-->
<?php
session_start();
if (!isset($_SESSION['spelActief'])) {
    $_SESSION['display'] = array();
    $_SESSION['letters'] = range('A', 'Z');
    $_SESSION['beurten'] = [];
    $_SESSION['fouten'] = 0;
    $_SESSION['spelActief'] = true;
    foreach ($_SESSION['woord'] as $check => $value) {
        array_push($_SESSION['display'], '*');
    }
}

if (isset($_POST['letter'])) {
    foreach ($_SESSION['letters'] as $b) {
        if ($_POST['letter'] == $b) {
            if (in_array(strtolower($_POST['letter']), $_SESSION['woord'])) {
                foreach ($_SESSION['woord'] as $check => $value) {
                    if ($value == strtolower($_POST['letter'])) {
                        $_SESSION['display'][$check] = $value;
                    }
                    $_SESSION['goed'] = true;
                }
            } else {
                $_SESSION['fouten']++;
                $_SESSION['goed'] = false;
            }
            array_push($_SESSION['beurten'], strtolower($_POST['letter']));
            unset($_SESSION['letters'][array_search($_POST['letter'], $_SESSION['letters'])]);
        }
    }
}

if (isset($_POST['gekozen'])) {
    header('Location: gekozen.php');
} elseif (isset($_POST['eigen'])) {
    header('Location: eigen.php');
} elseif (isset($_POST['start'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Galgje</title>
</head>

<body>
    <div>
        <?php
        //foto's
        switch ($_SESSION['fouten']) {
            case 0:
                    echo '<img src="img/galgje0.png">';
                break;
            case 1:
                    echo '<img src="img/galgje1.png">';
                break;
            case 2:
                    echo '<img src="img/galgje2.png">';
                break;
            case 3:
                    echo '<img src="img/galgje3.png">';
                break;
            case 4:
                    echo '<img src="img/galgje4.png">';
                break;
            case 5:
                    echo '<img src="img/galgje5.png">';
                break;
            case 6:
                    echo '<img src="img/galgje6.png">';
                break;
            case 7:
                    echo '<img src="img/galgje7.png">';
                break;
            case 8:
                    echo '<img src="img/galgje8.png">';
                break;
            case 9:
                    echo '<img src="img/galgje9.png">';
                break;
            case 10:
                    echo '<img src="img/galgje10.png">';
                break;
            case 11:
                    echo '<img src="img/galgje11.png">';
                    $_SESSION['verloren'] = true;
                break;
        } ?>
    </div>
    <form method="post">
        <?php
        echo "<h2>" . implode($_SESSION['display']) . "</h2>" . PHP_EOL;
        //tekst of letter in het woord zit
        if (isset($_SESSION['goed'])) {
            if ($_SESSION['goed']) {
                echo "<h3>Goed! Deze letter zit in het woord</h3>";
            } else {
                echo "<h3>Fout! Deze letter zit niet in het woord</h3>";
            }
        }
        //tekst gewonnen of verloren + knoppen voor nieuw spel
        if ($_SESSION['woord'] === $_SESSION['display']) {
            echo '<h1>Je hebt gewonnen!</h1>';
            echo '<img src="img/winaap.png">';
        } elseif (isset($_SESSION['verloren'])) {
            echo '<h1>Je hebt verloren!</h1>';
            echo '<img src="img/verloren.gif">';
        } else {
            foreach ($_SESSION['letters'] as $b) {
                echo '<input type="submit" name="letter" value="' . $b . '"></input>';
            }
        } ?>
        <input type="submit" name="gekozen" value="restart met willekeurig woord">
        <input type="submit" name="eigen" value="restart met eigen woord">
        <input type="submit" name="start" value="terug naar start">
    </form>
</body>

</html>