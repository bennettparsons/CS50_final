<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $rows = CS50::query("SELECT * FROM players LEFT OUTER JOIN data ON players.player_id=data.player_id WHERE players.user_id = ? ", $_SESSION["id"]);
        
        if (empty($rows))
        {
            apologize("No one to sell");
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
        
        // render form
        render("sell_form.php", ["infos" => $infos, "title" => "Sell"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // lookup row being sold
        $rows = CS50::query("SELECT * FROM players WHERE user_id = ? AND player_id = ?", $_SESSION["id"], $_POST["name"]);
        
        // first (and only) row
        $row = $rows[0];
        
        // delete row being sold in players
        CS50::query("DELETE FROM players WHERE id = ?", $row["id"]);
        
        // update cash in users
        CS50::query("UPDATE users SET cash = cash + ?, squad_size = squad_size - 1 WHERE id = ?", $row["value"], $_SESSION["id"]);
        
        // log in history
        CS50::query("INSERT INTO history (user_id, transaction, time, player_id, price, overall, position) VALUES 
        (?, 'SELL', NOW(), ?, ?, ?, ?)", $_SESSION["id"], $row["player_id"], $row["value"], $row["overall"], $row["value"]);
        
        // redirect
        redirect("squad.php");
    }
    
?>