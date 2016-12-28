<?php

    // configuration
    require("../includes/config.php");

    // query database
    $rows = CS50::query("SELECT * FROM results WHERE user_id = ?", $_SESSION["id"]);
    
    // $opponent = CS50::query("SELECT * FROM results WHERE user_id = ?", $_SESSION["id"]);
    
    // $opponent = [];
    // foreach ($rows as $row)
    // {
    //     $things = CS50::query("SELECT * FROM results WHERE match_id = ? AND user_id != ?", $row["match_id"], $_SESSION["id"]);
    //     $opponent[] = [
    //         "opponent" => $things[0]
    //     ];
    // }
    
    //dump($opponent);
    
    // foreach ($opponent as $opp)
    // {
    //     $rows[] = [
    //         "opponent" => $opp[0]["user_id"]
    //     ];
    // }
    
    
    
    
    // fix date
    date_default_timezone_set('EST');
    
    // iterate through rows, copying relavant info into positions and updating cash
    $positions = [];
    foreach ($rows as $row)
    {
        $positions[] = [
            //"opponent" => $row["opponent"],
            "time" => date("m/d/Y, h:i:sa", strtotime("+{$row["time"]} -5 hours")),
            "result" => $row["result"],
            "margin" => $row["margin"]
        ];
    }

    //dump($rows);

    // render history, passing relavant info
    render("results_form.php", ["positions" => $positions, "title" => "History"]);

?>
