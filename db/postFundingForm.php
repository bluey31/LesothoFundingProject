<?php

ob_start();
$host="localhost"; // Host name
$username=""; // Mysql username
$password=""; // Mysql password
$db_name="lesothoMembers"; // Database name
$tbl_name="members"; // Table name

// Connect to server and select databse.
$dbc = mysqli_connect("$host", "$username", "$password")or die("cannot connect");
mysqli_select_db($dbc, $db_name) or die("cannot select DB");

// Define funding variable
$fundedAmount = isset($_POST['FundingAmount']) ? $_POST['FundingAmount'] : '';
$currentLocation = isset($_POST['currentlocation']) ? $_POST['currentlocation'] : '';
$title1 = isset($_POST['title1']) ? $_POST['title1'] : '';
$details1 = isset($_POST['details1']) ? $_POST['details1'] : '';
$title2 = isset($_POST['title2']) ? $_POST['title2'] : '';
$details1 = isset($_POST['details1']) ? $_POST['details1'] : '';
$title3 = isset($_POST['title3']) ? $_POST['title3'] : '';
$title1 = isset($_POST['details3']) ? $_POST['details3'] : '';

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($dbc, $myusername);
$mypassword = mysqli_real_escape_string($dbc,$mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result = mysqli_query($dbc,$sql);

}
else {
  echo "Wrong Username or Password";
}
ob_end_flush();
?>
