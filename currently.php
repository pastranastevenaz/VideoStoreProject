<?php

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
    <!-- JUMBOTRON -->


    <div class="jumbotron text-center">
      <div class="container">
        <center><img class="img-responsive" src="img/rmBanner.jpg" alt="rio movie banner"></center>
        <h2 >Welcome</h2>
      </div>
    </div>
    <!-- CLOSE JUMBOTRON -->


    <!--           PAGE HEADER        -->
    <div align="center" class="page-header">
      <hr>
      <h2>Currently Rented</h2>
    </div>


    <!-- Table Starts Here! -->

   
<?php



$query = "SELECT Rental_ref_num, Cust_id, Movie_id, Check_out_date, Return_due_date, Rental_fee, Per_diem_late_fee FROM videostoremodel.rental_table WHERE (Check_out_date) IS NOT NULL AND (Returned_date) = ''; "; 
$result = mysqli_query($connect, $query);

?>



<table color="#d0d6dc" align="center" border="1" cellpadding="1" cellspacing="1">
<tr> <!-- header row -->
  <th>Reference number</th> 
  <th>Customer id</th>
  <th>Movie id</th>
  <th>Checked out</th>
  <th>Due date</th>
  <th>Rental fee</th>
  <th>Daily late fee</th>
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
  </tr>
<?php endwhile;?>


</table>




    <!-- Close Table! -->

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