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
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/filter.js"></script>
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
            padding-top: 40px;
        }
        .messagepop {
  background-color: white;
  border:2px solid #999999;
  cursor:default;
  position: fixed;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    width: 500px;
  display:none;
  z-index:50;
}
.input-mysize { width: 300px }
.mylabel { text-align: right}
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
            <a href="index.php" class="navbar-brand">Book Market</a>
        </div>
            <div class="navbar-collapse collapse" id="navbar-main">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Homepage</a>
                    </li>
                    <li><a href="http://bucssa.net/" target="_blank">BUCSSA</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BU<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://www.bu.edu/webmail/" target="_blank">Web Mail</a></li>
                            <li><a href="http://www.bu.edu/studentlink" target="_blank">Student Link</a></li>
                            <li><a href="https://learn.bu.edu/" target="_blank">Blackboard</a></li>
                        </ul>
                    </li>
                </ul>
_END;

if ($loggedin) {
    echo <<<_END
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" class="glyphicon glyphicon-user" aria-hidden="true">Hello,$user!</a></li>
                <div class="messagepop pop col-md-4" style="padding-top:10px">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button>
    <form class="form-horizontal" role="form" method="post" action="addbook.php" onsubmit="return confirm('All information are correct?');">
<fieldset>

<!-- Form Name -->
<legend>Enter book info:</legend>


<div class="form-group">
  <label class="col-md-3 mylabel" for="title">Title</label>
    <div class="col-md-9">
    <input class="input-mysize"id="title" name="title" type="text" placeholder="故事会" class="input-xlarge" required="">
</div>
</div>


<div class="form-group">
  <label class="col-md-3 mylabel" for="isbn">ISBN</label>
  <div class="col-md-9">
    <input class="input-mysize" id="isbn" name="isbn" type="number" placeholder="1234567890" class="input-xlarge" required="">
</div>
</div>


<div class="form-group">
  <label class="col-md-3 mylabel" for="course">Course</label>
  <div class="col-md-9">
    <input class="input-mysize" id="course" name="course" type="text" placeholder="CAS CS111" value=""class="input-xlarge">
    <p class="help-block">Not required</p>
    </div>
</div>

<div class="form-group">
  <label class="col-md-3 mylabel" for="price">Price($)</label>
  <div class="col-md-9">
    <input class="input-mysize" id="price" name="price" type="number" placeholder="120" class="input-xlarge" required="">
    </div>
</div>

<div class="form-group">
  <label class="col-md-3 mylabel" for="bargain">Bargaining</label>
  <div class="col-md-9">
  <label class="radio-inline mylabel"><input type="radio" name="bargain" id="bargain" value="Yes"checked>Yes</label>
  <label class="radio-inline mylabel"><input type="radio" name="bargain" id="bargain" value="No">No</label>
    </div>
</div>

<div class="form-group">
  <label class="col-md-3 mylabel" for="condition">Condition</label>
  <div class="col-md-9">
      <input class="input-mysize" style="width:300px" type="range" id="condition" name="condition" min="1" max="10" value="5" step="1" onchange="showValue(this.value)"/><span id="range">5</span>
      <p class="help-block">1(POOR) <-> 10(NEW)</p>
<script type="text/javascript">
function showValue(newValue)
{
	document.getElementById("range").innerHTML=newValue;
}
</script>
    </div>
</div>

<div class="form-group">
  <label class="col-md-3 mylabel" for="contact">Contact</label>
    <div class="col-md-9">
    <input class="input-mysize" id="contact" name="contact" type="text" placeholder="微信whitecatgsd" class="input-xlarge" required="">
</div>
</div>

<div class="form-group">
  <div class="col-md-9 col-md-offset-3">
    <input id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary">
    </div>
</div>

</fieldset>
</form>
</div>
                <li><a href="/addbook" id="addbook" class="btn btn-default btn-md" role="button">Add a book</a></li>
                <li><a href="logout.php" class="btn btn-default btn-md" role="button">Log Out</a></li>
            </ul>
        </div>
    </nav>
_END;

}
else {
    echo <<<_END
        <form action='sign.php' method='post' class="navbar-form navbar-right" onsubmit="return checkForm(this)">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" minlength='3' maxlength='10' class="form-control" name="username" placeholder="Username" required>
                    </div>
                    <div class="input-group">
                         <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" minlength='4' maxlength='10'class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" name="action" value="signin" class="btn btn-default">Log In</button>
                    <button type="submit" name="action" value="signup" class="btn btn-default">Sign Up</button>
                </form>
        </div>
    </nav>
_END;

}