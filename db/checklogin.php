
<?php

ob_start();
$host="localhost"; // Host name 
$username=""; // Mysql username
$password=""; // Mysql password
$db_name="test"; // Database name
$tbl_name="members"; // Table name

// Connect to server and select databse.
$dbc = mysqli_connect("$host", "$username", "$password")or die("cannot connect");
mysqli_select_db($dbc, $db_name)or die("cannot select DB");

// Define $myusername and $mypassword
$myusername = isset($_POST['myusername']) ? $_POST['myusername'] : '';
$mypassword = isset($_POST['mypassword']) ? $_POST['mypassword'] : '';

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($dbc, $myusername);
$mypassword = mysqli_real_escape_string($dbc,$mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysqli_query($dbc,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "admin.php"
$_SESSION['myusername'] = "myusername";
$_SESSION['mypassword'] = "mypassword";

//session_register("myusername");
//session_register("mypassword");

include ("C:\wamp\www\admin.html");

}
else {
echo "Wrong Username or Password";
}
ob_end_flush();
?>
