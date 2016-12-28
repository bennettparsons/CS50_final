<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $rows = CS50::query("SELECT * FROM players LEFT OUTER JOIN data ON players.player_id=data.player_id WHERE players.user_id = ? ", $_SESSION["id"]);
        
        if (empty($rows))
        {
            apologize("No one to train");
        }
        
         $infos = [];
        foreach ($rows as $row)
        {
            $infos[] = [
                "firstname" => $row["firstname"],
                "lastname" => $row["lastname"],
                "player_id" => $row["player_id"]
            ];
        }
        
        // calculate cash
        $cash = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        
        // render form
        render("training_form.php", ["infos" => $infos, "cash" => $cash[0]["cash"], "title" => "Sell"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // lookup row being sold
        $rows = CS50::query("SELECT * FROM players WHERE user_id = ? AND player_id = ?", $_SESSION["id"], $_POST["name"]);
        
        // first (and only) row
        $row = $rows[0];
        
        // update overall and value of player
        CS50::query("UPDATE players SET overall = overall + 1, value = value + 1010 WHERE id = ?", $row["id"]);
        
        // update cash in users
        CS50::query("UPDATE users SET cash = cash - 1000 WHERE id = ?", $_SESSION["id"]);
        
        $overall = CS50::query("SELECT * FROM players WHERE user_id = ? AND player_id = ?", $_SESSION["id"], $_POST["name"]);
        
        // log in history
        CS50::query("INSERT INTO history (user_id, transaction, time, player_id, price, overall, position) VALUES 
        (?, 'TRAIN', NOW(), ?, 1000.00, ?, ?)", $_SESSION["id"], $row["player_id"], $overall[0]["overall"], $row["value"]);
        
        // redirect
        redirect("squad.php");
    }
    
?>