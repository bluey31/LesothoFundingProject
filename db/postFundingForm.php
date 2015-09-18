<?php

ob_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="test"; // Database name
$tbl_name="fundingdata"; // Table name
// Connect to server and select databse.
$dbc = mysqli_connect("$host", "$username", "$password");
if (!$dbc)
  {
  die('Could not connect: ' . mysql_error());
  }
mysqli_select_db($dbc, $db_name) or die("cannot select DB");

// Define funding variable
$FundingAmount = isset($_POST['FundingAmount']) ? $_POST['FundingAmount'] : '';
$CurrentLocation = isset($_POST['CurrentLocation']) ? $_POST['CurrentLocation'] : '';
$Description = isset($_POST['Description']) ? $_POST['Description'] : '';
$TitleOne = isset($_POST['TitleOne']) ? $_POST['TitleOne'] : '';
$EventOne = isset($_POST['EventOne']) ? $_POST['EventOne'] : '';
$TitleTwo = isset($_POST['TitleTwo']) ? $_POST['TitleTwo'] : '';
$EventTwo = isset($_POST['EventTwo']) ? $_POST['EventTwo'] : '';
$TitleThree = isset($_POST['TitleThree']) ? $_POST['TitleThree'] : '';
$EventThree = isset($_POST['EventThree']) ? $_POST['EventThree'] : '';

$sql = "UPDATE $tbl_name SET ";

if ($FundingAmount != ""){
  $sql = $sql . "FundingAmount = '$FundingAmount', ";
}
if ($CurrentLocation != "") {
  $sql = $sql . "CurrentLocation = '$CurrentLocation', ";
}
if ($Description != "") {
  $sql = $sql . "Description = '$Description', ";
}
if ($EventOne != ""){
  $sql = $sql . "EventOne = '$EventOne', ";
}
if ($EventTwo != ""){
  $sql = $sql . "EventTwo = '$EventTwo', ";
}
if ($EventThree != ""){
  $sql = $sql . "EventThree = '$EventThree', ";
}
if ($TitleOne != ""){
  $sql = $sql . "TitleOne = '$TitleOne', ";
}
if ($TitleTwo != ""){
  $sql = $sql . "TitleTwo = '$TitleTwo', ";
}
if($TitleThree != ""){
  $sql = $sql . "TitleThree = '$TitleThree', ";
}
$sql .= "ID = '0'
WHERE ID=0;";

$result = mysqli_query($dbc,$sql);

header ("Location: ../views/home.html");
//else {
  //echo "Wrong Username or Password";

ob_end_flush();
?>
