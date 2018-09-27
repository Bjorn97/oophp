<?php
require "autoload.php";
require "config.php";

$title = "Guess";

$number = $_GET["number"] ?? -1;
$tries = $_GET["tries"] ?? 6;
$guess = $_GET["guess"] ?? null;
$result = "welcome";


$game = new Guess($number, $tries);

if (isset($_GET["doReset"])) {
    $game->random();
}

if (isset($_GET["doGuess"])) {
    try {
        $result = $game->makeGuess((int)$guess);
    } catch (IsOutOfRange $e) {
        $result = $e->getMessage();
    }
}

if (isset($_GET["cheat"])) {
    echo $game->number();
}
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <title>Min Sida</title>
</head>
<body>
    <form method="GET">
  Make guess: <br>
  <input type="hidden" name="tries" value="<?=$game->tries();?>"><br>
  <input type="hidden" name="number" value="<?=$game->number();?>"><br>
  <input type="number" value="" autofocus="" name="guess">
  <input type="submit" value="Guess" name="doGuess">
  <input type="submit" value="Reset" name="doReset">
  <input type="submit" value="Cheat" name="cheat">
</form><br>
<p><?=$result?></p>
</body>
</html>
