<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", array("title" => "Register"));
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }
        else if ($_POST["password"] !== $_POST["confirmation"])
        {
            apologize("Your password and confirmation do not match.");
        }
        
		$username = "\"" . $_POST["username"] . "\"";
		$password = "\"" . crypt($_POST["password"]) . "\"";
		
        // add the user into the database
        $registered = makeQuery("INSERT INTO users (username, hash) VALUES($username, $password)");        
        
        if ($registered === false)
        {
            apologize("Username is already taken. Try again!");            

        }
        else
        {
            $rows = makeQuery("SELECT LAST_INSERT_ID() AS id");
			$row = $rows->fetch_assoc();
            $id = $row["id"];
            
            $_SESSION["id"] = $id;
            
            redirect("index.php");
        }
        
    }

?>