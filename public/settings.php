<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render form
        render("settings_form.php", ["title" => "Settings"]);
    }
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // change team name
        if (!empty($_POST["team"]))
        {
            CS50::query("UPDATE users SET name = ? WHERE id = ?", $_POST["team"], $_SESSION["id"]);
        }
        
        // change username/password
        if (!empty($_POST["username"]) || !empty($_POST["password"]) || !empty($_POST["new_pass"])
            || !empty($_POST["confirm_pass"]) || !empty($_POST["new_user"]) || !empty($_POST["confirm_user"]))
        {
            // ensure proper usage
            if (empty($_POST["username"]) || empty($_POST["password"]))
            {
                apologize("To change usename or password, you must enter current username and password");
            }
            
            // query database for user
            $rows = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
            
            // first (and only) row
            $row = $rows[0];
            
            // verify user's username and password
            if (!password_verify($_POST["password"], $row["hash"]) || $row["username"] != $_POST["username"])
            {
                apologize("Invalid username/password");
            }
            
            // new password?
            if (!empty($_POST["new_pass"]) || !empty($_POST["confirm"]))
            {
                // reset password
                if ($_POST["new_pass"] == $_POST["confirm_pass"])
                {
                    CS50::query("UPDATE users SET hash = ? WHERE id = ?", password_hash($_POST["new_pass"], PASSWORD_DEFAULT), $_SESSION["id"]);
                }
                // ensure proper usage
                else
                {
                    apologize("New password must match the confirmation");
                }
            }
            
            // new username?
            if (!empty($_POST["new_user"]) || !empty($_POST["confirm_user"]))
            {
                // reset username
                if (CS50::query("SELECT * FROM users WHERE username = ?", $_POST["new_user"]))
                {
                    apologize("Username already exists");
                }
                if ($_POST["new_user"] == $_POST["confirm_user"])
                {
                    CS50::query("UPDATE users SET username = ? WHERE id = ?", $_POST["new_user"], $_SESSION["id"]);
                }
                else
                {
                    apologize("New username must match the confirmation");
                }
            }
        }
        
        // change logo, unis, ball
        if (!empty($_POST["logo"]))
        {
            CS50::query("UPDATE users SET logo = ? WHERE id = ?", $_POST["logo"], $_SESSION["id"]);
        }
        
        // change unis
        if (!empty($_POST["unis"]))
        {
            CS50::query("UPDATE users SET unis = ? WHERE id = ?", $_POST["unis"], $_SESSION["id"]);
        }
        
        // change ball
        if (!empty($_POST["ball"]))
        {
            CS50::query("UPDATE users SET ball = ? WHERE id = ?", $_POST["ball"], $_SESSION["id"]);
        }
        
        redirect("index.php");
    }
?>