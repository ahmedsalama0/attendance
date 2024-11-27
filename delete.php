<!-- 
    // We have different approaches here to delete a user.
       1. prompt a user that he is going to delete a record.
       2. Redirect the user to another page that shows the to be deleted record with confirm button.
       3. Delete the user immediately.
-->

<?php 
       require_once './db/conn.php';
       if(!$_GET['id']) {
        include 'includes/errormessage.php';
        header("Location: viewrecords.php"); 
       } else {
        // Get ID values.
        $id = $_GET['id'];
        // Call Delete function.
        $result = $crud->deleteAttendee($id);
        // Redirect to the list.
        if($result) {
          header("Location: viewrecords.php");
        } else {
          include 'includes/errormessage.php';
        }

       }
  ?>