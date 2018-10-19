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
</div>
  <div id="main"><br>
    <div class="alert alert-success" style="width: 80%; font-size: 20px;">
      <center>Thank You! for Signing Up please Add your Family Details and update us your Health Status.</center>
    </div>
    <div class="alert alert-success" style="width: 80%; font-size: 20px;">
      <center>No Harmful diseases are spreading in your Area.</center>
    </div>
    <div class="alert alert-info" style="width: 80%; font-size: 20px;">
      <center>If you have any queries or problems please contact us.</center>
    </div>
    <div class="alert alert-info" style="width: 80%; font-size: 20px;">
      <center>We are updating our databases and finding the harmful diseases please update us about your area problems in <a href="update.php" style="text-decoration: underline;"> UPDATE</a> section</center>
    </div>
</div><br>
<center>

<div id="form-color" >
  <h2>Most Spreading Diseases</h2>
<div id="piechart" style="background-color: black; opacity: 1.2;"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js" id="form-color"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Fever', 8],
  ['Cancer', 2],
  ['Head-Ache', 4],
  ['Sprains', 2],
  ['Heart-Attack', 2]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Average Disease', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
</div>
</center>
</body>
</html>
