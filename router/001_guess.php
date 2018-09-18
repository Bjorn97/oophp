<?php


/**
* Showing message Hello World, rendered within the standard page layout.
 */
 
$app->router->any(["get", "post"], "guess", function () use ($app) {
    include '../src/guess/Guess.php';
    $title = "Hello World as a page";
    
    session_destroy();
    session_name("guess_Session");
    session_start();

    $title = "Guess";

    $_SESSION["number"] = $_POST["number"] ?? -1;
    $_SESSION["tries"] = $_POST["tries"] ?? 6;
    $_SESSION["guess"] = $_POST["guess"] ?? null;
    $_SESSION["result"] = "welcome";


    $game = new Guess($_SESSION["number"], $_SESSION["tries"]);

    if (isset($_POST["doReset"])) {
        $_SESSION["tries"] = 6;
        $game->random();
    }

    if (isset($_POST["doGuess"])) {
        if ($_SESSION["tries"] > 0) {
            try {
                $_SESSION["result"] = $game->makeGuess((int)$_SESSION["guess"]);
                $_SESSION["tries"] --;
            } catch (IsOutOfRange $e) {
                $_SESSION["result"] = $e->getMessage();
            }
        } elseif ($_SESSION["tries"] <=0) {
            $_SESSION["result"] = "out of guesses";
        }
    }

    if (isset($_POST["cheat"])) {
        echo $game->number();
    }
    
    $data = [
        "game" => $game,
    ];

    $app->page->add("guess/index_session", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any(["get", "post"], "guess/post", function () use ($app) {
    include '../src/guess/Guess.php';
    $title = "Hello World as a page";
    $title = "Guess";

    $number = $_POST["number"] ?? -1;
    $tries = $_POST["tries"] ?? 6;
    $guess = $_POST["guess"] ?? null;
    $result = "welcome";


    $game = new Guess($number, $tries);

    if (isset($_POST["doReset"])) {
        $game->random();
    }

    if (isset($_POST["doGuess"])) {
        try {
            $result = $game->makeGuess((int)$guess);
        } catch (IsOutOfRange $e) {
            $result = $e->getMessage();
        }
    }

    if (isset($_POST["cheat"])) {
        echo $game->number();
    }
    $data = [
        "game" => $game,
        "result" => $result,
        
    ];

    $app->page->add("guess/index_post", $data);

    return $app->page->render($data);
});

$app->router->get("guess/get", function () use ($app) {
    include '../src/guess/Guess.php';
    $title = "Guess my number";
    $title = "Guess";

    $number = $_GET["number"] ?? -1;
    $tries = $_GET["tries"] ?? 6;
    $guess = $_GET["guess"] ?? null;

    $result = "welcome";
    $game = new Guess($number, $tries);

    if (isset($_GET["doReset"])) {
        $game->random();
        var_dump($_POST);
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
    
    $data = [
        "game" => $game,
        "result" => $result,
        
    ];
    

    $app->page->add("guess/index_get", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});
