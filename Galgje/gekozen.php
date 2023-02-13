<!--pagina voor een random woord-->
<?php
session_start();
session_unset();
//woorden voor als je random heb gekozen
$_SESSION['woorden'] = [
    "pollo",
    "amogus",
    "moeder",
    "imposter",
    "hamburger",
    "doodsbedreiging",
    "woordenboek",
    "kindercarnavalsoptochtvoorbereidingswerkzaamhedencomiteleden",
    "hottentottententententoonstelling",
    "vliegtuigbandventieldopje",
    "knolpower",
    "tidepodchallenge",
    "abrikozen",
    "sus",
    "pispot"

];

//split woorden in aparte letters
$_SESSION['woord'] = str_split($_SESSION['woorden'][array_rand($_SESSION['woorden'])]);
header('Location: galgje.php');
