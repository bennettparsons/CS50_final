<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("Username is required!");
        }
        else if (empty($_POST["password"]))
        {
            apologize("Password is required!");
        }
        else if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("Confirmation must match password!");
        }
        
        // query database and check for duplicate username
        else if (CS50::query("INSERT INTO users (username, hash) VALUES(?, ?)", 
            $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT)) == 0)
        {
            apologize("Username already exists! Try entering a different username.");
        }
        
        // store new user id in session and redirect to index
        else
        {
            $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];
            
            $_SESSION["id"] = $id;
            redirect("index.php");
        }
    }

?>