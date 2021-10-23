<?php
include "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>list page</title>
<link rel="stylesheet" href="assets/style.css">

</head>
<body>

<h2>records</h2>
<a href="create.php" class="anch">add</a>

<table class="tb">
  <tr>
    <th>ID</th>
    <th>firstname</th>
    <th>lastname</th>
    <th>dob</th>
    <th>address</th>
    <th>contact.no</th>
    <th>gender</th>
    <th>office</th>
    <td>Edit</td>
    <td>Delete</td>
  </tr>

<?php

$records = mysqli_query($conn,"select * from city"); // fetch data from database

while($row = mysqli_fetch_array($records))
{
?>
    <tr>
      <td><?php echo $row['id'] ;?></td>
      <td><?php echo $row['fname'] ;?></td>
      <td><?php echo $row['lname'] ;?></td>
      <td><?php echo $row['dob'] ;?></td>
      <td><?php echo $row['address'] ;?></td>
      <td><?php echo $row['contact'] ;?></td>
      <td><?php echo $row['gender'] ;?></td>
      <td><?php echo $row['office'] ;?></td>
      <td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
      <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
    </tr>
    <?php
  }
  mysqli_close($conn);

?>
  
</table>
</body>
</html>
