<?php
////////////////////////////////////////////////////////////////
//
// This page is used to rent a movie. It will place a movie 
// in the rental table with a foreign key to the user id. 
//
////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////
//
// Initially we check to see IF the attempt to post is NOT empty.
// Then we set up our connection to the database
// That is followed by checking the connection status.
// If there is an error, the browser will inform of the error number/
/////////////////////////////////////////////////////////////////

if ( ! empty( $_POST ) ) {


  $mysqli = new mysqli( 'localhost', 'root', '', 'videostoremodel' );


  // connection status exception handle.
  if ( $mysqli->connect_error ) {
    die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
  }
  
  ////////////////////////////////////////////////////////////////////////
  // The following is the SQL code used to queery the database and insert 
  // a new rental. 
  //
  // ---------------------------------------------------------------
  // NOTE!!!!: Check for better operation between NULL or '' in regards
  // to the `Returned_date`. Try both. Consider the Query in currently.php
  // Also, consider the need for `Last_updated` field.
  //////////////////////////////////////////////////////////////////////////


  ////////////////////////////////////////////////////////////////////////
  //
  // Declare the following variable in order to manipulate them 
  // during the sql queries. $rt will recieve a sanitized string of
  // the rental price and late fee. $rtx will be assigne the results of the
  // explode function, used to seperate the afformention string. 
  // $csid holds the value for the customer id; it's used in the second sql query
  // to figure out which ROW in the CUSTOMER TABLE needs to be modified with the 
  // increment operator. $mvid serves a similar purpose as $csid. IT allows the 
  // query to target the correct movie in the movie table for inventory management
  // using the decrement operator. 
  //
  //////////////////////////////////////////////////////////////////////
  $rt = $mysqli->real_escape_string($_POST['Rental_type']);
  $rtx = explode(',',$rt);
  $csid = $mysqli->real_escape_string($_POST['Cust_id']);
  $mvid = $mysqli->real_escape_string($_POST['Movie_id']);
 // $cinf = $mysqli->real_escape_string($_POST['Cust_id']);


// create string of queries separated by ;
$sql = "INSERT INTO rental_table (Cust_id, Movie_id, Check_out_date, Return_due_date, Returned_date, Rental_fee, Per_diem_late_fee, Last_updated) VALUES ('{$mysqli->real_escape_string($_POST['Cust_id'])}', '{$mysqli->real_escape_string($_POST['Movie_id'])}', '{$mysqli->real_escape_string($_POST['Check_out_date'])}', '{$mysqli->real_escape_string($_POST['Return_due_date'])}','{$mysqli->real_escape_string($_POST['Returned_date'])}', '$rtx[0]', '$rtx[1]', '{$mysqli->real_escape_string($_POST['Last_updated'])}');";
$sql .= "UPDATE `customer_table` 
            SET `Movies_rented` = `Movies_rented` + 1 
            WHERE (`Cust_id` = '$csid');";
$sql .= "UPDATE `video_table` 
            SET `Amount_inventory` = `Amount_inventory` - 1 
            WHERE (`Movie_id` = '$mvid');";

// execute query - $result is false if the first query failed
$result = mysqli_multi_query($mysqli, $sql);

if ($result) {
    do {
        // grab the result of the next query
        if (($result = mysqli_store_result($mysqli)) === false && mysqli_error($mysqli) != '') {
            echo "Query failed: " . mysqli_error($mysqli);
        } 
    } while (mysqli_more_results($mysqli) && mysqli_next_result($mysqli)); // while there are more results
} else {
    echo "First query failed..." . mysqli_error($mysqli);
}echo "Success! Movie rented";

  // Close our connection
  $mysqli->close();
}
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
      <h2>Rent a Movie</h2>

      <table>
        <tr>
          <th>New Release Rental</th>
          <th>Standard Rental</th>
        </tr>
        <tr>
          <td>Rental fee: $6.99</td> 
          <td>Rental fee: $4.99</td>
        </tr>
        <tr>
          <td>Daily late fee: $2.99</td> 
          <td>Daily late fee: $1.99</td>
        </tr>
      </table>


      
    </div>
    <!--      CLOSE HEADER   -->


    <!--     OPEN FORM       -->
    <form class="form-horizontal" id="rentform" name="rentform" method="post" action="">



      <div class="form-group"> 
        <label class="col-sm-2 control-label">Customer ID</label> 
        <div class="col-sm-4">
          <input class="form-control" name="Cust_id" type="text" placeholder="Customer ID" required>
        </div>
        <label class="col-sm-2 control-label">Movie ID</label>
        <div class="col-sm-4">
          <input class="form-control" name="Movie_id" type="text" placeholder="Movie ID" required>
        </div>
      </div>

      <div class="form-group"> 
        <label class="col-sm-2 control-label">Rental type</label> 
        <div class="col-sm-4">
          New release <input name="Rental_type" type="radio" value="6.99,2.99" checked="checked" action="">
          Standard <input name="Rental_type" type="radio" value="4.99,1.99" action="">
        </div> 



        <label class="col-sm-2 control-label">Due back</label>
        <div class="col-sm-4">
          <input class="form-control" name="Return_due_date" type="date" placeholder="format: YYYYMMDD" required>
        </div>
      </div>
<!--
      <div id="rental_fee" class="form-group"> 
        <label class="col-sm-2 control-label">Daily late fee</label>
        <div class="col-sm-4">
          <input class="form-control" name="Per_diem_late_fee" type="text" placeholder="format: 00.00" required>
        </div>
      </div>
-->

      <input id="Check_out_date" name="Check_out_date" type="hidden">
      <input id="Last_updated" name="Last_updated" type="hidden">
      <input id="Returned_date" name="Returned_date" type="hidden" value="">


      <div align="center">
        <input type="submit" value="Submit">
      </div>
    </form>


    <!--     CLOSE FORM     -->

    <!-- /////////////////////////////////////////////////////////////////////////////////////
    //
    // The following script creates a variable called mydate, and assigns the function date() 
    // to it. After the if statements, there are three variable whcih format the
    // order of the year, month, and date. 
    //
    // The final line targets the scripts output to the hidden html form field id="Check_out_date"
    // which then, upon form submission, posts the current date to the date of rental.
    //
    //////////////////////////////////////////////////////////////////////////////////////// -->

    <script>

      var mydate=new Date()
      var theyear=mydate.getYear()
      if (theyear < 1000)
        theyear+=1900
      var theday=mydate.getDay()
      var themonth=mydate.getMonth()+1
      if (themonth<10)
        themonth="0"+themonth
      var theday=mydate.getDate()
      if (theday<10)
        theday="0"+theday

      var displayfirst=theyear
      var displaysecond=themonth
      var displaythird=theday


      document.rentform.Check_out_date.value=displayfirst+'-'+displaysecond+'-'+displaythird
      document.rentform.Last_updated.value=displayfirst+'-'+displaysecond+'-'+displaythird
    </script>



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