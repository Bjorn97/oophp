<?php

namespace bjan\Dice100;

use bjan\Dice100\DicePlayers;

use bjan\Dice100\DiceComputer;
/**
* Showing message Hello World, rendered within the standard page layout.
 */
 
$app->router->any(["get", "post"], "dice100", function () use ($app) {
    $_SESSION["player1"] ?? $_SESSION["player1"] = new DicePlayers();
    $_SESSION["player2"] ?? $_SESSION["player2"] = new DiceComputer();
    $title = "Dice100";
    $res = 0;
    $wins = "";
    
    if (isset($_POST["doTurn"])) {
        $res = $_SESSION["player1"]->roll();
        if ($res == 1) {
            $res = $_SESSION["player2"]->turn();
            if ($res == 3) {
                $wins = "computer wins";
            }
        } elseif ($res == 2 || $_SESSION["player1"]->getplayerscore() >= 100) {
            $wins = "player wins!!";
        }
    }
    if (isset($_POST["doReset"])) {
        $_SESSION["player1"]->reset();
        $_SESSION["player2"]->reset();
    }

    if (isset($_POST["stop"])) {
        $_SESSION["player1"]->stop();
        $res = $_SESSION["player2"]->turn();
        if ($res == 3) {
            $wins = "computer wins";
        }
    }

    $data = [
        "pRoll" => $_SESSION["player1"]->getplayerroll(),
        "cRoll" => $_SESSION["player2"]->getplayerroll(),
        "pPoints" => $_SESSION["player1"]->gettotal(),
        "cPoints" => $_SESSION["player2"]->gettotal(),
        "pscore" => $_SESSION["player1"]->getplayerscore(),
        "cscore" => $_SESSION["player2"]->getplayerscore(),
        "wins" => $wins,
    ];

    $app->page->add("diceGame100/DiceIndex", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});
