<?php 
 require_once './db/conn.php';
  //  Get values from post operation
  if(isset($_POST['submit'])) {
    // Extract values from the $_POST array
    $id = $_POST['id']; // needed for edit specific username in the DB
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $speciality = $_POST['speciality'];
    //  Call Crud function 
    $result = $crud-> editAttendee($id, $fname, $lname, $dob, $email, $contact, $speciality);
    //  Redirect to index.php
    if($result) {
      header("Location: viewrecords.php");
    } else {
      include 'includes/errormessage.php';
    }
  }
  else {
    // Error
    include 'includes/errormessage.php';
  }


?>