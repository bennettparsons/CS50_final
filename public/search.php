<?php

    require(__DIR__ . "/../includes/config.php");

    // numerically indexed array of names
    $names = [];
    
    
    // check for null
    if (empty($_GET["geo"]))
    {
        http_response_code(400);
        exit;
    }
    // search database for names
    else
    {
        $names = CS50::query("SELECT firstname, lastname FROM data1 WHERE MATCH (firstname, lastname)
        AGAINST (?)", $_GET["geo"]);
        
        // $names = CS50::query("SELECT firstname, lastname FROM data1 WHERE firstname LIKE ?", $_GET["geo"]);
        
        // if (empty($names))
        // {
        //     $names = CS50::query("SELECT firstname, lastname FROM data1 WHERE lastname LIKE ?", $_GET["geo"]);
        // }
        
    }
    
    //$names = [["firstname" => $rows[0]["firstname"], "lastname"=> $rows[0]["lastname"]]];
    
    
    // dump($names);

    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($names, JSON_PRETTY_PRINT));

?>