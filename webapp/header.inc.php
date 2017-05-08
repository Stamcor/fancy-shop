<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
$logged_in = login_check($mysqli);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fancy Shop</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="/">Fancy Shop</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="#">Link</a></li>
          </ul>
          <form class="navbar-form navbar-right"  method="get" action="/index.php">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search" value="<?php echo $_GET["search"] ?>">
              <span class="input-group-btn">
                <button  type="submit" class="btn btn-default">Go!</button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </nav>
    <div class="container">
