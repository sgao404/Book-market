<?php
/**
 * Created by PhpStorm.
 * User: Sida
 * Date: 6/18/2015
 * Time: 6:23 PM
 */

session_start();

echo "<!DOCTYPE html>\n<html><head>";

require_once 'functions.php';

if (isset($_SESSION['user']))
{
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
}
else $loggedin = FALSE;

echo <<<_END
<meta charset="UTF-8">
    <title>Playground</title>
    <meta charset="utf-8">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/filter.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    <style>
        body {
            font-family: 'Droid Sans', sans-serif;
        }
        .table th,
         .table td {
            text-align: center;
        }
        .row{
            margin-top:40px;
            padding: 0 10px;
        }
        .clickable{
            cursor: pointer;
        }

        .panel-heading div {
            margin-top: -18px;
            font-size: 15px;
        }
        .panel-heading div span{
            margin-left:5px;
        }
        .panel-body{
            display: none;
        }
        body {
            padding-top: 70px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand">BUCSSA BOOKS</a>
        </div>
            <div class="navbar-collapse collapse" id="navbar-main">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Homepage</a>
                    </li>
                    <li><a href="#">Contact</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
_END;

if ($loggedin) {
    echo <<<_END
            <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Add a book</a><li>
                    <li>Hello $user!</li>
                    <li><a href="logout.php" class="btn btn-default" role="button">Log Out</a></li>
            </ul>
        </div>
    </nav>
_END;

}
else {
    echo <<<_END
        <form action='sign.php' method='post' class="navbar-form navbar-right" onsubmit="return checkForm(this)">
                    <div class="form-group">
                        <input type="text" minlength='3' maxlength='10' class="form-control" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" minlength='4' maxlength='10'class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" name="action" value="signin" class="btn btn-default">Log In</button>
                    <button type="submit" name="action" value="signup" class="btn btn-default">Sign Up</button>
                </form>
            </div>
    </nav>
_END;

}