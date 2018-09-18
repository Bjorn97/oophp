<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <title>Min Sida</title>
</head>
<body>
    <form method="POST">
  Make guess: <br>
  <input type="hidden" name="tries" value="<?= $_SESSION["tries"]; ?>"><br>
  <input type="hidden" name="number" value="<?= $_SESSION["number"]; ?>"><br>
  <input type="number" value="" autofocus="" name="guess">
  <input type="submit" value="Guess" name="doGuess">
  <input type="submit" value="Reset" name="doReset">
  <input type="submit" value="Cheat" name="cheat">
</form><br>
<p><?=$_SESSION["result"]?></p>
<br>
<a href="http://localhost/oophp/me/redovisa/htdocs/guess/get">get version</a>
<br>
<a href="http://localhost/oophp/me/redovisa/htdocs/guess/post">post version</a>
</body>
</html>
