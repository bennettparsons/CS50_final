<!DOCTYPE html>

<html>

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>
        
        <link href="/img/favicon.ico" rel="icon"/>

        <?php if (isset($title)): ?>
            <title>Fantasy Futbol: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Fantasy Futbol</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>
        
        <!-- https://github.com/twitter/typeahead.js/ -->
        <script src="/js/typeahead.jquery.min.js"></script>
        
        <!-- http://underscorejs.org/ -->
        <script src="/js/underscore-min.js"></script>
    
        <!-- include own scripts -->
        <script src="/js/scripts.js"></script>
        
        <!-- tablesorter plugin -->
	    <script type="text/javascript" src="/js/jquery.tablesorter.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="top">
                <?php if (empty($_SESSION["id"])): ?>
                <div>
                    <h1 class="bg-primary">Fantasy Futbol</h1>
                    <!--<a href="/"><img alt="Final Project" src="/img/logo.png"/></a>-->
                </div>
                <?php endif ?>
                <?php if (!empty($_SESSION["id"])): ?>
                    <div class="navbar navbar-inverse">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            
                            <?php
                                $rows = CS50::query("SELECT name FROM users WHERE id = ?", $_SESSION["id"]);
                            if (empty($rows[0]["name"])): ?>
                            <a class="navbar-brand" href="index.php">Enter Team Name in Settings!</a>
                            <?php endif ?>
                            
                            <?php if (!empty($rows)): ?>
                            <a class="navbar-brand" href="index.php"><?= htmlspecialchars($rows[0]["name"]) ?></a>
                            <?php endif ?>
                            
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav">
                                <li><a href="squad.php">Squad</a></li>
                                <li><a href="training.php">Train Players</a></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Transfers<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="buy.php">Buy</a></li>
                                        <li><a href="sell.php">Sell</a></li>
                                        <li><a href="history.php">History</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Matches<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="matches.php">Play</a></li>
                                        <li><a href="results.php">Results</a></li>
                                    </ul>
                                </li>
                                <li><a href="ranking.php">World Ranking</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="settings.php"><span class="glyphicon glyphicon-user"></span>Settings</a></li>
                                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                <?php endif ?>
            </div>

            <div id="middle">
