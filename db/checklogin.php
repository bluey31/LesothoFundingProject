<?php

ob_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="test"; // Database name
$tbl_name="members"; // Table name

// Connect to server and select databse.
$dbc = mysqli_connect("$host", "$username", "$password")or die("cannot connect");
mysqli_select_db($dbc, $db_name) or die("cannot select DB");

// Define $myusername and $mypassword
$myusername = isset($_POST['myusername']) ? $_POST['myusername'] : '';
$mypassword = isset($_POST['mypassword']) ? $_POST['mypassword'] : '';

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($dbc, $myusername);
$mypassword = mysqli_real_escape_string($dbc,$mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysqli_query($dbc, $sql);

if ($result) {
  //do the deed
  //$row = mysql_fetch_array($result);

  // If result matched $myusername and $mypassword, table row must be 1 row
  // Register $myusername, $mypassword and redirect to file "admin.php"
  if ($myusername =="username" && $mypassword="password"){
    $_SESSION['myusername'] = "myusername";
    $_SESSION['mypassword'] = "mypassword";
    include ("../views/admin.html");
  }else{
    echo "Wrong Username or Password";
  }
}else{
  echo "Internal Error.";
}

ob_end_flush();
?>
