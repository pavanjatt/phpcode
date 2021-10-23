<?php
include "connection.php";
$id=$_GET['id'];
$sql = "DELETE FROM city WHERE id=$id";
if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: ";
  
}
header("location:list.php");

mysqli_close($conn);
?>