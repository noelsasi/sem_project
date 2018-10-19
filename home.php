<?php session_start();
          if(isset($_POST['remember'])){
              setcookie("username",$username);
          }
          ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home | Infectious Disease Detector</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">

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
        .span{
          font-family: "Century Gothic", serif;
        }
        #demo{
           font-family: "Courier New", serif;
           color:black; font-size:30px; font-weight: bold;
        }
        #demo1{
           font-family: "Courier New", serif;
        }
</style>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});

var i = 0;
var txt = 'Hello <?php echo $_SESSION['username']; ?>! Thank You for Logging in';
var speed = 50;

function typeWriter() {
  if (i < txt.length) {
    document.getElementById("demo").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, 70);
  }
}
</script>

</head>
<body onload="typeWriter()">
<div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="#"><a href="mainpage.php">Check Symptoms</a></li>
      <li class="#"><a href="viewrecords.php">View Records</a></li>
      <li class="#"><a href="update.php" data-toggle="tooltip" data-placement="bottom" data-title="Post your Neighbours Health status and Contribute us more">Update Us</a></li>
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
        <span style="text-transform: capitalize.;"><?php echo $_SESSION['username']; ?></span>
        <span class="caret"></span></a>
            <ul class="dropdown-menu">
          <li><a href="editmembers.php">Edit Profile</a></li>
          <li><a href="addmembers.php">Add Members</a></li>
          <li><a href="viewmembers.php">View Members</a></li>
          <li><a href="mybookings.php">My Bookings</a></li>
          <li><a href="#">Delete Account</a></li>
       </ul>
      </li>
      <li><a href="notification.php"><span class="glyphicon glyphicon-bell"></span><span class="badge">2</span></a></li>
      <li><a href="index.html"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
</div>
<br>
<center><p id="demo"></p></center>

<!-- PHP FOR MOST SUFFERING DISEASE -->
<?php
                  $dbhost = 'localhost';
                  $dbuser = 'root';
                  $dbpass = '';
                  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
                  
                  if (!$conn) {
                      die("Connection failed: " . mysql_error());
                  }
                  $sql = "SELECT problem FROM temp GROUP BY problem ORDER BY COUNT(*) DESC LIMIT 1";
                  $sql_count = "SELECT count(id) from users";
                  mysql_select_db('sem_project');
                  $retval1 = mysql_query($sql_count);
                   $retval = mysql_query( $sql, $conn );
                              
                              if(! $retval ) {
                                 die('Could not enter data: ' . mysql_error());
                  }
                  
                  elseif (mysql_num_rows($retval) > 0) {
                       // output data of each row
                       while($row = mysql_fetch_assoc($retval)) {
                     ?>

<div style="background-color: black;"><br>
  <center>
  <p id="demo1" style="font-size: 20px; color: white; font-weight:bolder;">As Per Our Records, users are mostly suffering with <br>
  <span style="font-size: 40px; color:#C70039; font-weight:bold; margin-bottom: 0px; background-color: white; padding-left: 10px; padding-right: 10px;">
    <?php echo $row ["problem"]; ?>
  </span>
  </p>
  </center>
  <p align="right" style="font-size:15px; color: white;">
    Total Users : <?php while($row = mysql_fetch_assoc($retval1)) { echo $row ["count(id)"];  } ?> <br>
  Last updated: 8:00 AM, &nbsp;updates every 24hrs.
  </p>
</div>
                
        <?php
        
                  }
                  } else {
                  echo "0 results";
                  }
                  
                  mysql_close($conn);
                  
                  ?> 

       <!-- ends here-->           

<div class="second">
<div class="container">    
  <div class="row" >
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Check your Symptoms</div>
        <div class="panel-body"><img src="https://u-nomesecurity.com.au/wp-content/uploads/2014/10/energy-drink-enough-to-pop-a-valve.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><p>We'll get few symptoms from you and fetch with our database, and will try to check the disease with medications and cure. <a href="mainpage.php">Click Here</a>..</p></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-danger">
        <div class="panel-heading">Get Doctor Appointment</div>
        <div class="panel-body"><img src="https://www.hagmannreport.com/wp-content/uploads/2017/10/doctors.jpg" class="img-responsive" style="width:100%" alt="Image"><br></div>
        <div class="panel-footer"><p>Find and book appointments with doctors, diagnostic labs. Ask free health questions to doctors or get free tips from health experts. <a href="doctors.php">Click Here</a>..</p></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-success">
        <div class="panel-heading">Get Medicines Delivered to Home</div>
        <div class="panel-body"><img src="images/img.jpg" class="img-responsive" style="width:91%" alt="Image" class="imgedit"></div>
        <div class="panel-footer"><p>Offer fast online access to medicines with home delivery. Kindly display the original prescription at the time of picking up medicines. <a href="medicinedelivery.php">Click Here</a>..</p></div>
      </div>
    </div>
  </div>
</div><br>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Health Tips from Top notch Doctors</div>
        <div class="panel-body"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTAtGPL05kRXjd-9yLLZpkykEfPuraSbCJM9oDEutBRftvS3T1g" class="img-responsive" style="width:120%" alt="Image"></div>
        <div class="panel-footer"><p>We daily provide the Health tips and give you daily update to resist from all the diseases. please subscribe to us and get our daily updates. <a href="https://food.ndtv.com/health">Click Here</a>..</p></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Check your BMI Index</div>
        <div class="panel-body"><img src="https://www.healthhub.sg/sites/assets/Assets/Programs/bmi/image01.gif" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><p>Check your BMI index and get your diet plans and excercises according to your fitness and immunity.<br><a href="bmi.html">Click Here</a>..</p></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Testimonies and happy Customers</div>
        <div class="panel-body"><img src="https://theonetechnologies.com/images/services/testimonials.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><p>Post Your Questions and testimonies if you are cured from our team and assistance.<br> <a href="#">Click Here</a>..</p></div>
      </div>
    </div>
  </div>
</div><br><br></div></div>

<!-- Pie Chart starts -->
<center><h2>Most Spreading Diseases</h2>

<div id="piechart"></div> 
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
</center>
<!-- pie chart ends -->


<div style="background-color: black;">
<footer id="footer">
   <br><br><br>
   <!-- Contact -->
  <div class="w3-container">
    <h2 style="color:white;">Contact</h2>
    <i class="fa fa-map-marker" style="width:30px"></i><span class="span">Karunya Nagar, Coimbatore, TN</span><br>
    <i class="fa fa-phone" style="width:30px"></i><span class="span"> Phone: 040-2662123<br>
    <i class="fa fa-envelope" style="width:30px"> </i><span class="span"> Email: mail@curingonline.com<br><br>
    <form action="/action_page.php" target="_blank" id="main" >
      <p><input class="w3-input w3-border" type="text" style="color:white;" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-border" type="text" style="color:white;" placeholder="Email" required name="Email"></p>
    <div class="form-group-problem">
      <label for="text">Want to tell us more..</label>
        <textarea cols="30" rows="4" placeholder="Message us"></textarea><br>
        </div>
        <div><button>Submit</button></div>
      </form>
  </div>
  <h5 style="color:white;">Copyright © Infectious Disease Detector 2018 &nbsp;• All Rights Reserved &nbsp;• Privacy Policy &nbsp;• Terms of Use</h5><br>
</footer>
</div>
</body>
</html>
