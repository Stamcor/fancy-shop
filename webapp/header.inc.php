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
          <form class="navbar-form navbar-right"  method="get">
            <div class="form-group">
              <input type="text" name="product" class="form-control" placeholder="Search">
            </div>
            <form action="/index.php">
           <button  type="submit" value="" onclick="setValue()" name="search" class="btn btn-default">Submit</button>
           </from>
          </form>
        </div>
      </div>
    </nav>
    <div class="container">
    <script>
      function setValue() {
          var prod = document.getElementsByName("product")[0].value;
          if (prod!="") {
            document.getElementsByName("search")[0].value = prod;
          } else {
            document.getElementsByName("search")[0].value = "";
          }
      }
    </script>