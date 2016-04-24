
<!--
///////////////////////////////////////////////////////////////////
//
// Here we attempt to create a connection to the  DB "videostore model", by passing 
// the parameter, host, username, password, and db name to the "mysqli_connect" function
//	IF there is a connection error, we exit the script, and the function used 
//  provides us with an error code useful for correcting errors. Otherwirse, line 20 grants
//	us a response.
//
////////////////////////////////////////////////////////////////////
-->


<?php
//BE CERTAIN TO CHANGE THE THIRD PARAMETER TO YOUR DB PASSWORD
$db_conx = mysqli_connect("localhost", "root", "", "videostoremodel");
// Evaluate the connection
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit();
} 
?>