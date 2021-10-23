<?php
include_once "connection.php";

$nameErr = $lastname = $dateofb = $messge = $cntt ="";
$fname = $lname = $dob = $address = $contact = "";

if(isset($_POST['submit'])){


if (empty($_POST["fname"])) {
  $nameErr = "Name is required";
}else {
  $fname = trim($_POST['fname']);
}

if (empty($_POST["lname"])) {
  $lastname = "lname is required";
}else {
  $lname = trim($_POST['lname']);
}

if (empty($_POST["dob"])) {
  $dateofb = "date of birth is required";
}else {
  $dob = $_POST['dob'];
}

if (empty($_POST["message"])) {
  $messge = "address is required";
}else {
  $address = $_POST['message'];
}

if (empty($_POST["contact"]) || $_POST["contact"]== "" ) {
  $cntt = "contact is required";
}else {
  $contact = $_POST['contact'];
}

$gender=$_POST['gender'];
@$checkbox1= implode(",",$_POST['vehicle']);
$photo=$_POST['photo'];


$sql = "INSERT INTO city (fname,lname,dob,address,contact,gender,office)
VALUES ('$fname','$lname','$dob','$address','$contact','$gender','$checkbox1')";

if(mysqli_query($conn,$sql)){
  echo "record inserted";
  header("location:list.php");
}else{
  echo "record failed";
}
mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
   .error{
     color: red;
   }
    </style>
</head>
<body>

<form method="post">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" placeholder="firstname">

  <span class = "error">* <?php echo $nameErr;?></span> <br> <br>


  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" placeholder="lastname">
  <span class = "error">* <?php echo $lastname;?></span> <br> <br>



  <label for="dob">date of birth:</label><br>
  <input type="date" id="dob" name="dob" placeholder="enter your birthdate">
  <span class = "error">* <?php echo $dateofb;?></span> <br> <br>

  <label for="address">address:</label><br>
  <textarea name="message" style="width:200px; height:100px;" placeholder="enter your address"></textarea>
  <span class = "error">* <?php echo $messge;?></span>  <br> <br>

  <label for="contact">contact number:</label><br>
  <input type="text" id="contact" name="contact" placeholder="contact number">
  <span class = "error">* <?php echo $cntt;?></span> <br> <br>

  <label for="gender">select gender:</label>
  <input type="radio" id="gender" name="gender" value="male" checked>male
  <input type="radio" id="gender" name="gender" value="female">female  <br> <br>

  <label for="office">office:</label>
  <input type="checkbox" id="office" name="vehicle[]" value="Bike">
  <label for="office"> I have a bike</label>

  <input type="checkbox" id="office1" name="vehicle[]" value="Car">
  <label for="office1"> I have a car</label> <br> <br>


  <label for="photo"> upload photo</label>
  <input type="file" name="photo"> <br> <br>


  <input type="submit" value="Submit" name="submit">
</form> 
<a href="list.php">check list</a>
</body>
</html>






