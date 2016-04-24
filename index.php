


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Rio Video Store</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

      <script src="js/main.js"></script>
      <script src="js/ajax.js"></script>
    </head>
    <body>


      <!--CLOSE NAV BAR-->

      <!-- JUMBOTRON -->
      <div class="jumbotron text-center">
        <div class="container">
          <center><img class="img-responsive" src="img/rmBanner.jpg" alt="rio movie banner"></center>
          <h2 >Welcome</h2>
        </div>
      </div>
      <!-- CLOSE JUMBOTRON -->





      <!--OPEN LOG IN FORM-->

      <form class="form-horizontal" action="login.php" method="POST">

        <div class="form-group">
          <label class="col-sm-2 control-label">Username:</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="Username" placeholder="username" required>
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-2 control-label">Password:</label>
          <div class="col-sm-10">
            <input class="form-control" type="password" name="Password" placeholder="**********" type="password" required>
          </div>
        </div>

        <input type="submit" value="Log-in">


      </form>






      <!--Fixed Footer-->
      <div class="navbar navbar-inverse navbar-fixed-bottom"> 
        <div class="container">
          <div class="navbar-text pull-left">
            <h6>Copyright 2016 Rio Video Store</h6>
          </div>
          <div class="navbar-text pull-right">
            <a href="#"><i class="fa fa-facebook-official fa-2x"></i></a>
            <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
            <a href="#"><i class="fa fa-google-plus fa-2x"></i></a>
          </div>
        </div>
      </div>




      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
    </body>
    </html>