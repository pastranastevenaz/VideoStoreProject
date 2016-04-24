<!--///////////////////////////////////////////////////
//
// This page will show all of the movies in the database/store
// It includes a carousel with images of all the movies. 
//
//////////////////////////////////////////////////////-->


<?php
//Don't forget to set your database password
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "videostoremodel";
// connect
 $connect = mysqli_connect($hostname, $username, $password, $databaseName);


$query = "SELET * FROM video_table";

$result = mysqli_query($connect, $query);

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
                <li class="dropdown-header"> Employee Tools </li>
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
    <!--CLOSE NAV BAR-->

    
       <!--CAROUSEL-->
        <center>
        <div id="mycarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
          <ol class="carousel-indicators" >  
          <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
          <li data-target="#mycarousel" data-slide-to="1"></li>
          <li data-target="#mycarousel" data-slide-to="2"></li>
          <li data-target="#mycarousel" data-slide-to="3"></li>
          <li data-target="#mycarousel" data-slide-to="4"></li>
          <li data-target="#mycarousel" data-slide-to="5"></li>
          <li data-target="#mycarousel" data-slide-to="6"></li>
          <li data-target="#mycarousel" data-slide-to="7"></li>
          <li data-target="#mycarousel" data-slide-to="8"></li>
          <li data-target="#mycarousel" data-slide-to="9"></li>
          </ol>

            <div class="carousel-inner">
            <div class="item active">
            <img height="400" width="800" src="img/movies/streetkings1.jpg">
              <div class="carousel-caption">
              <h3>Street Kings</h3>
              </div>
            </div>
            <div class="item">
            <img height="400" width="800" src="img/movies/thegreatwar1.jpg">
              <div class="carousel-caption">
             <h3>The Great War (BBC)</h3>
              </div>
            </div>
            <div class="item">
            <img height="400" width="800" src="img/movies/lawrenceofarabia1.jpg">
              <div class="carousel-caption">
               <h3>Lawrence of Arabia</h3>
               </div>
            </div>

            <div class="item">
            <img height="400" width="800" src="img/movies/everest1.jpg">
              <div class="carousel-caption">
             <h3>Everest</h3>
              </div>
            </div>

            <div class="item">
            <img height="400" width="800" src="img/movies/sicario1.jpg">
              <div class="carousel-caption">
             <h3>Sicario</h3>
              </div>
            </div>

            <div class="item">
            <img height="400" width="800" src="img/movies/sinister1.jpg">
              <div class="carousel-caption">
             <h3>Sinister</h3>
              </div>
            </div>

            <div class="item">
            <img height="400" width="800" src="img/movies/minions1.jpg">
              <div class="carousel-caption">
             <h3>Minions</h3>
              </div>
            </div>

            <div class="item">
            <img height="400" width="800" src="img/movies/runlolarun1.jpg">
              <div class="carousel-caption">
             <h3>Run Lola Run</h3>
              </div>
            </div>

            <div class="item">
            <img height="400" width="800" src="img/movies/lakehouse1.jpg">
              <div class="carousel-caption">
             <h3>The Lake House</h3>
              </div>
            </div>

            <div class="item"> 
            <img height="400" width="800" src="img/movies/empirestrikesback1.jpg">
              <div class="carousel-caption">
             <h3>Star Wars: Episode V – The Empire Strikes Back</h3>
              </div>
            </div> 

            </div>
            <!--carousel buttons-->
              <a class="left carousel-control" href="#mycarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="right carousel-control" href="#mycarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </div>
        </center>


<?php



$query = "SELECT * FROM video_table"; 
$result = mysqli_query($connect, $query);

?>

<header>
  <hr><h2 align="center">Movies</h2><hr>
</header>


<table align="center" border="1" cellpadding="1" cellspacing="1">
<tr> <!-- header row -->
  <th>Movie id</th>
  <th>Amount inventory</th>
  <th>Movie title</th>
  <th>Release date</th>
  <th>Format</th>
  <th>Directot last name</th>
  <th>Director first name</th>
  <th>Runtime</th>
  <th>Category</th>
  <th>Production company</th>
  <th>Rating</th>
</tr>

<?php while($row1 = mysqli_fetch_array($result)):;?>
  <tr>
    <td><?php echo $row1[0];?></td>
    <td><?php echo $row1[1];?></td>
    <td><?php echo $row1[2];?></td>
    <td><?php echo $row1[3];?></td>
    <td><?php echo $row1[4];?></td>
    <td><?php echo $row1[5];?></td>
    <td><?php echo $row1[6];?></td>
    <td><?php echo $row1[7];?></td>
    <td><?php echo $row1[8];?></td>
    <td><?php echo $row1[9];?></td>
    <td><?php echo $row1[10];?></td>
  </tr>
<?php endwhile;?>


</table>






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