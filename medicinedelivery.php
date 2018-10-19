<?php session_start();
          if(isset($_POST['remember'])){
              setcookie("username",$username);
          }
          ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Medicine Delivery | Infectious Disease Detector</title>
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
      <li class="#"><a href="update.php">Update Us</a></li>
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
</div><br>
<center>
<div id="non">
<h2 class="major">Non-Prescriptional</h2>
      <form method="post" action="medi_del_non.php">
          <input type="text" name="problem" style="width: 30%; background-color: black; opacity: 0.8;" placeholder="Enter Problem" required><br>
           <button class="btn-primary"><span class="glyphicon glyphicon-send"></span></button>
      </form><br>
    </div></center>
<div id="pre">
<center><h2 class="major">Prescriptional</h2>
         <form method="post" action="medi_del_pre.php">
          <input type="text" name="med_name" style="width: 30%; background-color: black; opacity: 0.8;" placeholder="Medicine Name"><br>
          <input type="text" name="qty" style="width: 30%; background-color: black; opacity: 0.8;" placeholder="Quantity"><br>
          <button class="btn-primary"><span class="glyphicon glyphicon-send"></button>
          </center>
</div>
</body>
</html>
