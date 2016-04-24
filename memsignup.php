<?php

////////////////////////////////////////////////
//
// This is the page to signup a new member. It will add them to 
// the customer table in the database. 
//
//////////////////////////////////////////////////



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
  // The following is the SQL code used to queery the database and insert a new user.
  //
  //
  //
  //
  //
  //////////////////////////////////////////////////////////////////////////



  $sql = "INSERT INTO customer_table (Last_name, Middle_initial, First_name, Street_number, Street_name, Apt_unit, City, State, Zip, Email, Member_join, Member_cancel, Phone_number, Movies_rented) VALUES ('{$mysqli->real_escape_string($_POST['Last_name'])}', '{$mysqli->real_escape_string($_POST['Middle_initial'])}', '{$mysqli->real_escape_string($_POST['First_name'])}', '{$mysqli->real_escape_string($_POST['Street_number'])}', '{$mysqli->real_escape_string($_POST['Street_name'])}', '{$mysqli->real_escape_string($_POST['Apt_unit'])}', '{$mysqli->real_escape_string($_POST['City'])}', '{$mysqli->real_escape_string($_POST['State'])}', '{$mysqli->real_escape_string($_POST['Zip'])}', '{$mysqli->real_escape_string($_POST['Email'])}', '{$mysqli->real_escape_string($_POST['Member_join'])}', '{$mysqli->real_escape_string($_POST['Member_cancel'])}', '{$mysqli->real_escape_string($_POST['Phone_number'])}', '{$mysqli->real_escape_string($_POST['Movies_rented'])}')";
  $insert = $mysqli->query($sql);
  
  // Print response from MySQL
  if ( $insert ) {
    echo "Success! New Guest Registered";
  } else {
    die("Error: {$mysqli->errno} : {$mysqli->error}");
  }
  
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

      <script>
        funtion restrict(elem) {
          var tf = _(elem);
          var rx = new RegExp;
          if(elem == "email"){
            rx = /[' "]/gi;
          }
          tf.value = tf.value.replace(rx, "");
        }
        function emptyElement(x){
         _(x).innerHTML = "";
       }


     </script>

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

  <!-- JUMBOTRON -->
  <div class="jumbotron text-center">
    <div class="container">
      <center><img class="img-responsive" src="img/rmBanner.jpg" alt="rio movie banner"></center>
      <h2 >Welcome</h2>
    </div>
  </div>
  <!-- CLOSE JUMBOTRON -->

  <!-- OPEN FORM -->
  
  <form class="form-horizontal" id="memsignupform" name="memsignupform" method="post" action="">



    <div class="form-group"> 
      <label class="col-sm-2 control-label">Last Name</label> 
      <div class="col-sm-10">
        <input class="form-control" name="Last_name" type="text" placeholder="Last Name" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Middle Initial</label> 
      <div class="col-sm-10">
        <input class="form-control" name="Middle_initial" type="text" placeholder="Middle Initial">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">First Name</label> 
      <div class="col-sm-10">
        <input class="form-control" name="First_name" type="text" placeholder="First Name" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Street Number</label> 
      <div class="col-sm-10">
        <input class="form-control" name="Street_number" type="text" placeholder="Street Number" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Street Name</label> 
      <div class="col-sm-10">
        <input class="form-control" name="Street_name" type="text" placeholder="Street Name" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Apt/Unit</label> 
      <div class="col-sm-10">
        <input class="form-control" name="Apt_unit" type="text" placeholder="Apt unit">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">City</label> 
      <div class="col-sm-10">
        <input class="form-control" name="City" type="text" placeholder="City" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">State</label> 
      <div class="col-sm-10">
       <!-- <input class="form-control" name="State" type="text" placeholder="AA" required> -->
                <select class="form-control" name="State" id="State">
                  <option value="AL">AL</option>
                  <option value="AK">AK</option>
                  <option value="AZ">AZ</option>
                  <option value="AR">AR</option>
                  <option value="CA">CA</option>
                  <option value="CO">CO</option>
                  <option value="CT">CT</option>
                  <option value="DE">DE</option>
                  <option value="DC">DC</option>
                  <option value="FL">FL</option>
                  <option value="GA">GA</option>
                  <option value="HI">HI</option>
                  <option value="ID">ID</option>
                  <option value="IL">IL</option>
                  <option value="IN">IN</option>
                  <option value="IA">IA</option>
                  <option value="KS">KS</option>
                  <option value="KY">KY</option>
                  <option value="LA">LA</option>
                  <option value="ME">ME</option>
                  <option value="MD">MD</option>
                  <option value="MA">MA</option>
                  <option value="MI">MI</option>
                  <option value="MN">MN</option>
                  <option value="MS">MS</option>
                  <option value="MO">MO</option>
                  <option value="MT">MT</option>
                  <option value="NE">NE</option>
                  <option value="NV">NV</option>
                  <option value="NH">NH</option>
                  <option value="NJ">NJ</option>
                  <option value="NM">NM</option>
                  <option value="NY">NY</option>
                  <option value="NC">NC</option>
                  <option value="ND">ND</option>
                  <option value="OH">OH</option>
                  <option value="OK">OK</option>
                  <option value="OR">OR</option>
                  <option value="PA">PA</option>
                  <option value="RI">RI</option>
                  <option value="SC">SC</option>
                  <option value="SD">SD</option>
                  <option value="TN">TN</option>
                  <option value="TX">TX</option>
                  <option value="UT">UT</option>
                  <option value="VT">VT</option>
                  <option value="VA">VA</option>
                  <option value="WA">WA</option>
                  <option value="WV">WV</option>
                  <option value="WI">WI</option>
                  <option value="WY">WY</option>
                </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Zip</label> 
      <div class="col-sm-10">
        <input class="form-control" name="Zip" type="text" placeholder="1234567" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Email</label>
      <div class="col-sm-10"> 
        <input class="form-control" name="Email" type="text" onkeyup="restrict('Email')" placeholder="someone@domain.com" required>
      </div>
    </div>

    <input id="Member_join" name="Member_join" type="hidden">
    <input id="Member_cancel" name="Member_cancel" type="hidden" value="">
    <input id="Movies_rented" name="Movies_rented" type="hidden" value="0">

    <div class="form-group">
      <label class="col-sm-2 control-label">Phone</label>
      <div class="col-sm-10"> 
        <input class="form-control" name="Phone_number" type="tel" placeholder="1234567890" required>
      </div>
    </div>


    <div align="center">
    <input type="submit" value="Register">
    </div>
  </form>
  <!-- CLOSE FORM -->

  <!--///////////////////////////////////////////////////////////
  //
  // The following javascript assigns a value of the current date
  // formatted as YYYYMMDD to the hidden form input for the date
  // guest signs up.
  //
  ////////////////////////////////////////////////////////////-->
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


    document.memsignupform.Member_join.value=displayfirst+'-'+displaysecond+'-'+displaythird
  </script>







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
