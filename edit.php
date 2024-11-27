<?php 
  $title = "Edit Record";
  require_once './includes/header.php';
  require_once './db/conn.php';

  $results = $crud->getSpecialities();
  if(!isset($_GET['id'])) {
    // echo 'error';
    include 'includes/errormessage.php';
    header("Location: viewrecords.php"); // if query string is not set redirect to the view records page
  } else {
    $id = $_GET['id'];
    $attendee = $crud->getAttendeeDetails($id);
  
?>


<h1 class="text-center">Edit Record</h1>


<!-- <form method="get" action="success.php"></form> -->
<form method="post" action="editpost.php">
  <input type="hidden" name="id" value="<?php echo $attendee['attendee_id']; ?>">
  <div class="mb-3">
    <label for="firstname" class="form-label">First Name</label>
    <input type="text" class="form-control" id="firstname" name="firstname"
      value="<?php echo $attendee['firstname']; ?>">
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $attendee['lastname']; ?>">
  </div>
  <div class="mb-3">
    <label for="dob" class="form-label">Date of Birth</label>
    <!-- <input type="date" class="form-control" id="dob"> -->
    <!-- To ensure consistency of the date control across different browsers we 'll use one soln such as jqueryUI date picker  -->
    <input type="text" class="form-control" id="dob" name="dob" value="<?php echo $attendee['dateofbirth']; ?>">
  </div>
  <div class="mb-3">
    <label for="speciality" class="form-label">Area of Expertise</label>
    <select class="form-select" aria-label="Default select example" id="speciality" name="speciality">
      <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
      <option value="<?php echo $r['speciality_id']; ?>"
        <?php if($r['speciality_id'] === $attendee['speciality_id']) echo 'selected'; ?>>
        <?php echo $r['name']; ?>
      </option>
      <?php  } ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
      value="<?php echo $attendee['emailaddress']; ?>">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Contact Number</label>
    <input type="phone" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp"
      value="<?php echo $attendee['contactnumber']; ?>">
    <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
  </div>

  <div class=" d-grid gap-2">
    <button type="submit" name="submit" class="btn btn-success">Save Changes</button>
  </div>
</form>
<?php } ?>
<br>
<br>
<br>
<br>

<?php 
  require_once './includes/footer.php';
?>