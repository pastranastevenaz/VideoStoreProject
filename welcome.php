<?php

///////////////////////////////////////////////////////////////
//
// This is the initial page the user is navigated to once
// the is a successful login. it utilizes the db_conx file in the
// php includes folder to connect to the database although, there is no 
// need to connect from this page. 
//
////////////////////////////////////////////////////////////////



require_once "php_includes/db_conx.php";

?>

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

      <!-- Navigation Bar-->
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class"container">
          <button type ="button" class="navbar-toggle"
          data-toggle="collapse"
          data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="welcome.php">Rio Video Store</a>

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
           
  

            <!--DROPDOWN OPEN-->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle"
              data-toggle="dropdown"> Menu <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <<li class="dropdown-header"> Employee Tools </li>
                <li><a href="memsignup.php"> New Members </a></li>
                <li><a href="members.php"> All Members </a></li>
                <li><a href="movies.php"> All Movies </a></li>
                <li><a href="rentalform.php"> Rental Portal </a></li>
                <li><a href="rent.php"> Rent a movie </a></li>
                <li><a href="return.php"> Return a movie </a></li>
                <li><a href="currently.php"> Currently rented </a></li>
                
                

                <li class="dropdown-header"> Contact </li>
                <li><a href="mailto:STE2253402@maricopa.edu ?Subject=From%20a%20fan."> Contact Management </a></li>
                <li><a href="mailto:STE2253402@maricopa.edu ?Subject=IT%20Support%20Request.&body=Please%20include%20the%20following%20pertinent%20information%20to%20ensure%20a%20quick%20response.%0D%0A%0D%0AName: %0D%0AWorkstation%20ID: %0D%0AEmployee%20ID: %0D%0ASuporvisor's%20name: %0D%0ABest%20Contact%20Number: %0D%0AConcern: "> Contact IT Support </a></li>


              </ul>
            </li>           
          </ul>
        </div>


      </div>
    </nav>
    <!-- JUMBOTRON -->


    <div class="jumbotron text-center">
      <div class="container">
        <center><img class="img-responsive" src="img/rmBanner.jpg" alt="rio movie banner"></center>
        <h2 >Welcome</h2>
      </div>
    </div>
    <!-- CLOSE JUMBOTRON -->


    <!--           PAGE HEADER        -->
    <div class="page-header">
      <hr>
      <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec viverra dolor. Vivamus id nibh vitae est viverra cursus nec pretium lorem. Sed id hendrerit ipsum. Vivamus fermentum efficitur porttitor. Pellentesque risus sem, accumsan eu dignissim ac, commodo sodales lorem. Proin vitae augue sit amet nisl aliquet pellentesque ut sed metus. Sed ac euismod est.</h4>
    </div>

    <div class="row">
      <div class="col-sm-3">
      <a href="memsignup.php"><img class="img-responsive" src="img/join.png" alt="membership" height="260px" width="260px"></a>        
        <h3>Memberships</h3>
        <p>Sign up a new Member.</p>
        <a href="memsignup.php"><button type="button" class="btn btn-default">Memberships</button></a>
      </div>
      <div class="col-sm-3">     
        <a href="movies.php"><img class="img-responsive" src="img/filmreel.png" alt="movies" height="260px" width="260px"></a>  
        <h3>Movies</h3>
        <p>Browse the Selection</p>
        <a href="movies.php"><button type="button" class="btn btn-default">Movies</button></a>
      </div>

      <div class="col-sm-3">
      <a href="rentalform.php"><img class="img-responsive" src="img/rental.png" alt="rental" height="260px" width="260px"></a>        
        <h3>Rentals</h3>
        <p>Rent a Movie.</p>
        <a href="rentalform.php"><button type="button" class="btn btn-default">Rentals</button></a>
      </div>

      <div class="col-sm-3">   
        <a href="members.php"><img class="img-responsive" src="img/members.png" alt="Members" height="260px" width="260px"></a> 
        <h3>Members</h3>
        <p>View Members list</p>
        <a href="members.php"><button type="button" class="btn btn-default">Members</button><a>
      </div>
    </div>




  </div>
</div>
<br><br><br><br>

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