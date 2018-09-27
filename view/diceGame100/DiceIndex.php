<?php
namespace bjan\Dice100;

?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <title>Min Sida</title>
</head>
<body>
    <form method="POST">
        <p>roll       :<?=$pRoll;?></p><br>
        <p>total      :<?=$pPoints;?></p><br>
        <p>playerscore:<?=$pscore;?></p><br>
        <p>botscore   :<?=$cscore;?></p><br>
        <input type="submit" value="Roll" name="doTurn">
        <input type="submit" value="Reset" name="doReset">
        <input type="submit" value="stop" name="stop">
        <p><?=$wins;?></p><br>
    </form><br>


</body>
</html>
