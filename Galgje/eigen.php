<!--pagina voor een eigen woord kiezen-->
<?php
session_start();
session_unset();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>eigenwoord</title>
</head>

<body>
    <h1>Galgje</h1>
    <h3>Je hebt gekozen om zelf een woord in te voeren</h3>
    <form method="POST">
        <input type="text" name="woords" id="woords">
        <input type="submit" value="speel met dit woord">
    </form>
    <?php
    if (isset($_POST['woords'])) {
        $_SESSION["woord"] = str_split($_POST['woords']);
        header('Location: galgje.php');
    }
    ?>
</body>

</html>