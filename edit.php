<?php

include "connection.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($conn,"select * from city where id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    print_r($_POST);
    $fullname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $address = $_POST['message'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    // $vehicle = $_POST['vehicle[]'];
    $vehicle= implode(",",$_POST['vehicle']);

 
    $edit = mysqli_query($conn,"update city set fname='$fullname', lname='$lname' , dob='$dob' , address='$address' , contact='$contact' , gender='$gender' , office='$vehicle' where id='$id'");
	
    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:list.php"); // redirects to all records page
        
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>

<h3>Update Data</h3>

<form method="post">
<input type="hidden" id="id" name="id" value="<?php $data['id'] ?>"><br>
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="<?php echo $data['fname'] ?>"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="<?php echo $data['lname'] ?>"><br>
  <label for="dob">date of birth:</label><br>
  <input type="date" id="dob" name="dob" value="<?php echo $data['dob'] ?>"><br>
  <label for="address">address:</label><br>

  <textarea name="message" id="address" style="width:200px; height:100px;" cols="20" rows="5"  ><?php echo $data['address'] ; ?></textarea><br>
  <label for="contact">contact number:</label><br>
  <input type="text" id="contact" name="contact" value="<?php echo $data['contact'] ?>"><br>
  <label for="gender">select gender:</label><br>
  <input type="radio" id="gender" name="gender" <?php if($data['gender']=="male"){ echo "checked";}?> value="male" >male
  <input type="radio" id="gender" name="gender" <?php if($data['gender']=="female"){ echo "checked";}?> value="female">female <br>
  <label for="office">office:</label><br>
  <?php
  $a=explode(",",$data['office']);
  ?>

  <input type="checkbox" id="office" name="vehicle[]" <?php   if(in_array("Bike",$a)){
                            echo "checked";
                        }?>  value="Bike">
  <label for="vehicle1"> I have a bike</label><br>
  <input type="checkbox" id="office" name="vehicle[]"  <?php   if(in_array("Car",$a)){
                            echo "checked";
                        }?>  value="Car">
  <label for="vehicle2"> I have a car</label><br>
  <label for="photo"> upload photo</label><br>
  <input type="file" name="photo"><br>
  <input type="submit" value="update" name="update">
</form> 