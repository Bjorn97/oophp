<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <title>Min Sida</title>
</head>
<body>
    <form method="POST">
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
