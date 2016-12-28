<?php

   // configuration
    require("../includes/config.php");
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // calculate cash
        $rows = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        
        // render form
        render("buy_form.php", ["cash" => $rows[0]["cash"], "title" => "Buy"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // lookup player info
        $player = CS50::query("SELECT * FROM data WHERE firstname = ? AND lastname = ?", $_POST["firstname"], $_POST["lastname"]);
        
        // make sure player exists
        if (empty($player))
        {
            apologize("Player not found");
        }
        
        // make sure user enters a formation
        if (empty($_POST["position"]))
        {
            apologize("Please give your player a position");
        }
        
        // can't buy a player you already have
        if (CS50::query("SELECT * FROM players WHERE user_id = ? AND player_id = ?", $_SESSION["id"], $player[0]["player_id"]))
        {
            apologize("You can't buy players you already own");
        }
        
        // update players
        CS50::query("INSERT INTO players (user_id, player_id, position, overall, value) VALUES (?, ?, ?, ?, ?)",
        $_SESSION["id"], $player[0]["player_id"], $_POST["position"], $player[0]["overall"], $player[0]["cost"]);
        
        // take cash from user and update squad size
        CS50::query("UPDATE users SET cash = cash - ?, squad_size = squad_size + 1 WHERE id = ?", $player[0]["cost"], $_SESSION["id"]);
        
        // log in history
        CS50::query("INSERT INTO history (user_id, transaction, time, player_id, price, overall, position) VALUES 
        (?, 'BUY', NOW(), ?, ?, ?, ?)", $_SESSION["id"], $player[0]["player_id"], -$player[0]["cost"], $player[0]["overall"], $_POST["position"]);
        
        redirect("squad.php");
    }
