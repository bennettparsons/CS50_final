<?php

    // configuration
    require("../includes/config.php");

    // query database
    $rows = CS50::query("SELECT * FROM users");

    
    // iterate through rows, copying relavant info into positions
    $positions = [];
    foreach ($rows as $row)
    {
        $positions[] = [
            "username" => $row["username"],
            "wins" => $row["wins"],
            "loses" => $row["loses"],
            "draws" => $row["draws"],
            "points" => $row["points"],
            "overall" => $row["overall"]
        ];
    }

    // render history, passing relavant info
    render("ranking_form.php", ["positions" => $positions, "title" => "Ranking"]);

?>

username wins loses draws points squad-overall