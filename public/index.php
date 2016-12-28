<?php

    // configuration
    require("../includes/config.php");
    
    // calculate squad overall
    $players = CS50::query("SELECT * FROM players WHERE user_id = ?", $_SESSION["id"]);
    
    $sum = 0;
    foreach ($players as $player)
    {
        $sum = $sum + $player["overall"];
    }
    
    CS50::query("UPDATE users SET overall = ? WHERE id = ?", $sum, $_SESSION["id"]);
    
    // query database
    $rows = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
    
    // first (and only) row
    $row = $rows[0];
    
    // calculate total points
    CS50::query("UPDATE users SET points = 3*? + ? WHERE id = ?", $row["wins"], $row["draws"], $_SESSION["id"]);

    // info to be passed to page
    $info = ["username" => $row["username"], "logo" => $row["logo"], "unis" => $row["unis"], "ball" => $row["ball"], "cash" => number_format($row["cash"], 2), "wins" => $row["wins"], "loses" => $row["loses"], "draws" => $row["draws"], "points" => $row["points"]];

    // render index, passing relavant info
    render("index_form.php", ["info" => $info, "overall" => $sum, "title" => "Index"]);
?>
