<?php
include "create-database.php";

if(isset($_POST['submit'])) {    
   $imie = $_POST['imie'];
   $email = $_POST['email'];
   $mobile = $_POST['mobile'];
   $fmessage = $_POST['fmessage'];

   require_once "config.php";
   $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

   if ($mysqli->connect_error) {
       die("Connection failed: " . $mysqli->connect_error);
   }

   $stmt = $mysqli->prepare("INSERT INTO klienty (imie, email, mobile, fmessage) VALUES (?, ?, ?, ?)");
   $stmt->bind_param("ssss", $imie, $email, $mobile, $fmessage);

   if ($stmt->execute()) {
       echo "New record created successfully";
   } else {
       echo "Error: " . $stmt->error;
   }

   $stmt->close();
   $mysqli->close();

   header('Location: ../contact.php');
   exit();
}
?>
