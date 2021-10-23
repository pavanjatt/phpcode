<?php
         // define variables and set to empty values
         $nameErr = $emailErr = $genderErr = $websiteErr = "";
         $name = $email = $gender = $comment = $website = "";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
               $nameErr = "Name is required";
            }else {
               $name = test_input($_POST["name"]);
            }
            
            if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }else {
               $email = test_input($_POST["email"]);
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
            }
            
            if (empty($_POST["website"])) {
               $website = "";
            }else {
               $website = test_input($_POST["website"]);
            }
            
            if (empty($_POST["comment"])) {
               $comment = "";
            }else {
               $comment = test_input($_POST["comment"]);
            }
            
            if (empty($_POST["gender"])) {
               $genderErr = "Gender is required";
            }else {
               $gender = test_input($_POST["gender"]);
            }
         }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
      ?>
     
      <h2>Absolute classes registration</h2>
     
      <p><span class = "error">* required field.</span></p>