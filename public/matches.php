<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $rows = CS50::query("SELECT * FROM matches LEFT OUTER JOIN users ON matches.player_id2 = users.id WHERE player_id1 = ? AND status = 0", $_SESSION["id"]);
        
        $infos = [];
        foreach ($rows as $row)
        {
            $infos[] = [
                "username" => $row["username"],
            ];
        }
        
        $rows2 = CS50::query("SELECT * FROM matches LEFT OUTER JOIN users ON matches.player_id1 = users.id WHERE player_id2 = ? AND status = 0", $_SESSION["id"]);
        
        $infos2 = [];
        foreach ($rows2 as $row2)
        {
            $infos2[] = [
                "id" => $row2["id"],
                "username" => $row2["username"]
            ];
        }
        
        // render form
        render("matches_form.php", ["infos" => $infos, "infos2" => $infos2, "title" => "Matches"]);
    }
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // register a fixture
        if (!empty($_POST["opponent"]))
        {
            // find opponent
            $rows = CS50::query("SELECT * FROM users WHERE username = ?", $_POST["opponent"]);
            
            
            if (empty($rows))
            {
                apologize("Invalid opponent");
            }
            else if ($_SESSION["id"] == $rows[0]["id"])
            {
                apologize("You cannot challenge yourself");
            }
            else if (CS50::query("SELECT * FROM matches WHERE player_id1 = ? AND player_id2 = ? AND status = 0", $_SESSION["id"], $rows[0]["id"]))
            {
                apologize("You already challenged this user");
            }
            else
            {
                // add a row to matches
                CS50::query("INSERT INTO matches (player_id1, player_id2) VALUES (?, ?)", $_SESSION["id"], $rows[0]["id"]);
                
                redirect("matches.php");
            }
        }
        
        // play a game!
        if (!empty($_POST["name"]))
        {
            $opponent = CS50::query("SELECT overall FROM users WHERE id = ?", $_POST["name"]);
            $you = CS50::query("SELECT overall FROM users WHERE id = ?", $_SESSION["id"]);
            
            // update match status
            CS50::query("UPDATE matches SET status = 1 WHERE player_id2 = ? AND player_id1 = ?", $_SESSION["id"], $_POST["name"]);
            
            $matches = CS50::query("SELECT * FROM matches WHERE player_id2 = ? AND player_id1 = ?", $_SESSION["id"], $_POST["name"]);
            $match = $matches[0];
            
            // you lost :(
            if ($opponent[0]["overall"] > $you[0]["overall"])
            {
                CS50::query("INSERT INTO results (match_id, user_id, result, margin, time) VALUES (?, ?, 'won', ?, Now())",
                $match["match_id"], $_POST["name"], $you[0]["overall"] - $opponent[0]["overall"]);
                CS50::query("UPDATE users SET wins = wins + 1, cash = cash + 2000 WHERE id = ?", $_POST["name"]);
                
                CS50::query("INSERT INTO results (match_id, user_id, result, margin, time) VALUES (?, ?, 'loss', ?, Now())",
                $match["match_id"], $_SESSION["id"], $you[0]["overall"] - $opponent[0]["overall"]);
                CS50::query("UPDATE users SET loses = loses + 1 WHERE id = ?", $_SESSION["id"]);
                
                render("lost.php", ["title" => "Lost"]);
            }
            // you won!
            if ($opponent[0]["overall"] < $you[0]["overall"])
            {
                CS50::query("INSERT INTO results (match_id, user_id, result, margin, time) VALUES (?, ?, 'loss', ?, Now())",
                $match["match_id"], $_POST["name"], $you[0]["overall"] - $opponent[0]["overall"]);
                CS50::query("UPDATE users SET loses = loses + 1 WHERE id = ?", $_POST["name"]);
                
                CS50::query("INSERT INTO results (match_id, user_id, result, margin, time) VALUES (?, ?, 'won', ?, Now())",
                $match["match_id"], $_SESSION["id"], $you[0]["overall"] - $opponent[0]["overall"]);
                CS50::query("UPDATE users SET wins = wins + 1, cash = cash + 2000 WHERE id = ?", $_SESSION["id"]);
                
                render("won.php", ["title" => "Victory!"]);
            }
            // tie!
            else
            {
                CS50::query("INSERT INTO results (match_id, user_id, result, margin, time) VALUES (?, ?, 'draw', ?, Now())",
                $match["match_id"], $_POST["name"], $you[0]["overall"] - $opponent[0]["overall"]);
                CS50::query("UPDATE users SET draws = draws + 1 WHERE id = ?", $_POST["name"]);
                
                CS50::query("INSERT INTO results (match_id, user_id, result, margin, time) VALUES (?, ?, 'draw', ?, Now())",
                $match["match_id"], $_SESSION["id"], $you[0]["overall"] - $opponent[0]["overall"]);
                CS50::query("UPDATE users SET draws = draws + 1 WHERE id = ?", $_SESSION["id"]);
                
                render("draw.php", ["title" => "Draw"]);
            }
        }
        
    }





// player1 challenges player2 in games table

// for each SESSION["id"] = (sql)player1 and status = 0: You are waiting on (username)

// if SESSION["id"] = (sql)player2
// {
//     display form: accept (username)'s challenge!
    
//     query database with users' starting lineup summed overall
//     determine winner
//     updates status of fixture in match (status == 1)
//     update result of game in results (players 
//     update wins and loses in users
    
// }

// Challenge: (form for username)
//     insert into games SESSION["id"] = player1, $_POST["opponent"] = player2
    
// Fixture history: (from results table)

// opponent   time   result   margin (difference in overalls at time)

?>