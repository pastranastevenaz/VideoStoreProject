<!--////////////////////////////////////////////////////////
//
// The purpose of this file is to return a video that was rented.
// I implemented a very basic search tool to go through the database 
// and search based on rental_id, in order to verify before submiting 
// the return
//
////////////////////////////////////////////////////////-->
<?php
$search_term="";
$search_results="";

//Check if search data was submitted
if ( isset( $_GET['s'] ) ) {
  // Include the search class
  require_once( dirname( __FILE__ ) . '/class-search.php' );
  
  // Instantiate a new instance of the search class
  $search = new search();
  
  // Store search term into a variable
  $search_term = htmlspecialchars($_GET['s'], ENT_QUOTES);
  
  // Send the search term to our search class and store the result
  $search_results = $search->search($search_term);
}
?>


<?php



////////////////////////////////////////////////////////////////
//
// Initially we check to see IF the attempt to post is NOT empty.
// Then we set up our connection to the database
// That is followed by checking the connection status.
// If there is an error, the browser will inform of the error number/
/////////////////////////////////////////////////////////////////

if ( ! empty( $_POST ) ) {

// Don't forget to change the DB password
  $mysqli = new mysqli( 'localhost', 'root', '', 'videostoremodel' );


  // connection status exception handle.
  if ( $mysqli->connect_error ) {
    die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
  }



  /////////////////////////////////////////////////////
  //
  // define variables for use in queries
  //
  //
  ///////////////////////////////////////////////////////

 $rd = $mysqli->real_escape_string($_POST['Returned_date']);
 $rrf = $mysqli->real_escape_string($_POST['Rental_ref_num']);
 



////////////////////////////////////////////////////////////////////


$result = mysqli_query($mysqli,"SELECT Movie_id FROM rental_table where Rental_ref_num ='".$rrf."'");

$row = mysqli_fetch_array($result);
$name = $row['Movie_id'];


/////////////////////////////////////////////////////////////////////
   $sql = "UPDATE `rental_table` 
        SET `Returned_date` = '$rd' 
        WHERE (`Rental_ref_num` = '$rrf');";
if (!mysqli_query($mysqli, $sql)) {
    echo "Errormessage: ". mysqli_error($mysqli);
}

$sql = "UPDATE `video_table` 
            SET `Amount_inventory` = `Amount_inventory` + 1 
            WHERE (`Movie_id` = '$name');";
if (!mysqli_query($mysqli, $sql)) {
    echo "Errormessage: ". mysqli_error($mysqli);
}
  

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
} echo "Success! Movie returned";

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
      <h2>Return Movies</h2>
    </div>

    <div align="center"><h4>Search</h4></div>


    <!--      SEARCH FORM OPEN      -->
   <div align="center" class="search-form">
      <form action="" method="get">
        <div class="form-field">
          <label for="search-field">Rental number</label>
          <input type="search" name="s" placeholder="Enter reference number..." results="5" value="<?php echo $search_term; ?>">
          <input type="submit" value="Search">
        </div>
      </form>
    </div>
    <!--     SEARCH FORM CLOSE     -->
    <br>
    <div align="center"><h4>Or submit return</h4></div>

    <!--      OPEN RETURN FORM      -->
   
      <form class="form-horizontal" name="returnform" id="returnform" action="" method="post">


        <div align="center" class="form-group">
          <label class="col-sm-2">Rental number</label>
          <div class="col-sm-10">
          <input class="form-control" name="Rental_ref_num" type="text" name="s" placeholder="Enter reference number..." required="">
          </div>
          </div>


          <input id="Returned_date" name="Returned_date" type="hidden">
          <input id="Movie_id" name="Movie_id" type="hidden">

       <div align="center">
         <input type="submit" value="Return">
         </div>
      </form>
    
    <!--     CLOSE RETURN FORM   -->

    <!--   OPEN  SEARCH SCRIPT     -->
    <?php if ( $search_results ) : ?>
    <div class="results-count">
      <p><?php echo $search_results['count']; ?> results found</p>
    </div>
    <div class="results-table">
      <?php foreach ( $search_results['results'] as $search_result ) : ?>
      <div class="result">
        <p><?php echo $search_result->Rental_ref_num; ?></p>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="search-raw">
      <pre><?php print_r($search_results); ?></pre>
    </div>
    <?php endif; ?>


  
    <!--   CLOSE SEARCH SCRIPT      -->


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


    document.returnform.Returned_date.value=displayfirst+'-'+displaysecond+'-'+displaythird
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