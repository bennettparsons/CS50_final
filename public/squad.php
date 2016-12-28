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
    
    // query to find the user's players and their stats, sorted by position
    $FWDS = CS50::query("SELECT data.firstname, data.lastname, players.overall, players.position, data.image FROM players LEFT OUTER JOIN data ON players.player_id=data.player_id
        WHERE players.user_id = ? AND players.position='FWD'", $_SESSION["id"] );
    $MIDS = CS50::query("SELECT data.firstname, data.lastname, players.overall, players.position, data.image FROM players LEFT OUTER JOIN data ON players.player_id=data.player_id 
        WHERE players.user_id = ? AND players.position='MID'", $_SESSION["id"] );
    $DEFS = CS50::query("SELECT data.firstname, data.lastname, players.overall, players.position, data.image FROM players LEFT OUTER JOIN data ON players.player_id=data.player_id 
        WHERE players.user_id = ? AND players.position='DEF'", $_SESSION["id"] );
    $GKS = CS50::query("SELECT data.firstname, data.lastname, players.overall, players.position, data.image FROM players LEFT OUTER JOIN data ON players.player_id=data.player_id 
        WHERE players.user_id = ? AND players.position='GK'", $_SESSION["id"] );
    
    // query to find the user's squad size
    $squadsize = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
    
    // render squad, passing in squad.php 
    render("squad_form.php", ["title" => "Squad", "FWDS" => $FWDS,"MIDS" => $MIDS, "DEFS" => $DEFS, "GKS" => $GKS, "squadsize" => $squadsize] );
?>