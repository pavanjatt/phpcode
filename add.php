<?php
include_once "connection.php";

if(isset($_POST['submit'])){
$fname=trim($_POST['fname']);
$lname=trim($_POST['lname']);
$dob=$_POST['dob'];
$address=$_POST['message'];
$contact=$_POST['contact'];
$gender=trim($_POST['gender']);
$photo=$_POST['photo'];
$checkbox1= implode(",",$_POST['vehicle']);

if (empty($_POST["name"])) {
  $name = "Name is required";
}else {
  $name = test_input($_POST["name"]);
}
 
if (empty($_POST["lname"])) {
  $lname = "lname is required";
}else {
  $lname = test_input($_POST["lname"]);
 }

 if (empty($_POST["dob"])) {
  $dob = "date of birth is required";
}else {
  $dob = test_input($_POST["dob"]);
 }

 if (empty($_POST["message"])) {
  $address = "address is required";
}else {
  $address = test_input($_POST["message"]);
 }
 
 if (empty($_POST["contact"])) {
  $contact = "contact is required";
}else {
  $contact = test_input($_POST["contact"]);
 }

 $sql = "INSERT INTO city (fname,lname,dob,address,contact,gender,office)
VALUES ('$fname','$lname','$dob','$address','$contact','$gender','$checkbox1')";

function test_input($sql) {
  $sql = trim($sql);
  // $sql = stripslashes($sql);
  // $sql = htmlspecialchars($sql);
  return $sql;
}

if(mysqli_query($conn,$sql)){
  echo "record inserted";
  header("location:list.php");
}else{
  echo "record failed";
}
mysqli_close($conn);
}
?>
