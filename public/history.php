<?php

    // configuration
    require("../includes/config.php");

    // query database
    $rows = CS50::query("SELECT history.transaction, history.time, data.firstname, data.lastname, history.position, history.price, history.overall 
    FROM history LEFT OUTER JOIN data ON history.player_id=data.player_id WHERE history.user_id = ?", $_SESSION["id"]);
    
    // fix date
    date_default_timezone_set('EST');
    
    // iterate through rows, copying relavant info into positions and updating cash
    $positions = [];
    foreach ($rows as $row)
    {
        $positions[] = [
            "transaction" => $row["transaction"],
            "time" => date("m/d/Y, h:i:sa", strtotime("+{$row["time"]} -5 hours")),
            "firstname" => $row["firstname"],
            "lastname" => $row["lastname"],
            "position" => $row["position"],
            "price" => number_format($row["price"],2),
            "overall" => $row["overall"]
        ];
    }



    // render history, passing relavant info
    render("history_form.php", ["positions" => $positions, "title" => "History"]);

?>
