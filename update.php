<?php session_start();
          if(isset($_POST['remember'])){
              setcookie("username",$username);
          }
          ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Members | Infectious Disease Detector</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/css/main.css" />
  <style type="text/css">
  	body {
  		top: 0px;
	    background-image: linear-gradient(to top, rgba(19, 21, 25, 0.5), rgba(19, 21, 25, 0.5)), url("../../images/overlay.png");
	    background-size: auto, 256px 256px;
	    background-image: url("images/image21.jpg");
	    background-size: cover;
            background-repeat: no-repeat;
      background-attachment: fixed;
        }

  </style>
</head>
<body>
<div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="#"><a href="home.php">Home</a></li>
      <li class="#"><a href="mainpage.php">Check Symptoms</a></li>
      <li class="#"><a href="viewrecords.php">View Records</a></li>
      <li class="active"><a href="update.php">Update Us</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span>Doctors</span>
        <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="doctors.php">Consult Doctor</a></li>
          <li><a href="https://www.google.co.in/maps/search/hospitals+near+me/@10.9418622,76.7309732,14z/data=!3m1!4b1?dcr=0" target="blank">Nearest Hospitals</a></li>
       </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>
       <span style="text-transform: capitalize;"><?php echo $_SESSION['username']; ?></span>
        <span class="caret"></span></a>
      		<ul class="dropdown-menu">
          <li><a href="editmembers.php">Edit Profile</a></li>
          <li><a href="addmembers.php">Add Members</a></li>
          <li><a href="viewmembers.php">View Members</a></li>
          <li><a href="mybookings.php">My Bookings</a></li>
          <li><a href="#">Delete Account</a></li>
       </ul>
      </li>
      <li><a href="index.html"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
</div>
  <div id="main"><br>
  <div id="form-color">
	<form method="post" action="update_membcknd.php">
    <div class="form-group-details">
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control" id="name">
    </div><br>
    <div class="form-group-details">
      <label for="age">Age</label>
      <input type="text" name="age" class="form-control" id="age">
    </div><br>
    <div class="form-group-details">
      <label for="gender">Gender</label>
                      <div class="field half first">
                      <input type="radio" id="demo-priority-low" name="gen" value="M" checked>
                      <label for="demo-priority-low">Male</label>
                      </div>
                      <div class="field half">
                      <input type="radio" id="demo-priority-high" name="gen" value="F">
                      <label for="demo-priority-high">Female  </label>
                      </div>
    </div><br>
    <div class="form-group-details">
      <label for="healthstatus">Health Status</label>
      <input type="text" class="form-control" id="healthstatus" name="health_stat">
    </div><br>
    <div class="form-group-details">
      <label for="problem">Problem</label>
      <input type="text" class="form-control" id="prob" name="problem">
    </div><br>
    <div class="form-group-details">
      <label for="treatment">Undertaking any Treatment</label>
      <input type="text" class="form-control" id="treatment" name="under_treat">
    </div><br>
    <div class="form-group-details">
    	<label for="text">Need any assistance? call us Immediately +919123527819</label></div><br>
    <div class="form-group-details">
    <button type="submit">Submit</button>
  	</div>
   </form>
 </div>
</div>


</body>
</html>
