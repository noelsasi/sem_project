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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
        table {
    font-family: "Century Gothic", serif;
    border-collapse: collapse;
    width: 100%;
}
</style>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});


</script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</head> 

<body>
<div>
<nav class="navbar navbar-inverse fixed-top">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="#"><a href="home.php">Home</a></li>
      <li class="#"><a href="mainpage.php">Check Symptoms</a></li>
      <li class="active"><a href="viewrecords.php">View Records</a></li>
      <li class="#"><a href="update.php" data-toggle="tooltip" data-placement="bottom" title="Post your Neighbours Health status and Contribute us more">Update Us</a></li>
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
          <li><a href="#">My Bookings</a></li>
          <li><a href="#">Delete Account</a></li>
       </ul>
      </li>
      <li><a href="index.html"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
</div>
    <div class="table-responsive">
      <br>
      <center>
        <h3 class="major">Medicines Ordered</h3>
     <table class="table table-bordered" id="form-color" style="width: 50%;" style="overflow-x:auto;">
<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if (!$conn) {
     die("Connection failed: " . mysql_error());
}
?>
            <thead>
            <tr>
                <th><center><?php echo 'Order ID'; ?></center></th>
                <th><center><?php echo 'Ordered Date'; ?></center></th>
                <th><center><?php echo 'Medicine Name'; ?></center></th>
                <th><center><?php echo 'Quantity'; ?></center></th>
                <!--<th><center><?php echo 'Delete'; ?></center></th>-->
           </tr>
         </thead>
<?php
$username = $_SESSION['username'];
$sql = "SELECT id,date,username,med_name,qty FROM med_del_pre where username='$username'";
 mysql_select_db('sem_project');
 $retval = mysql_query( $sql, $conn );
            
            if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
}

elseif (mysql_num_rows($retval) > 0) {
     // output data of each row
     while($row = mysql_fetch_assoc($retval)) {
         //echo "Title--- " . $row["username"]. " --- Amount: " . $row["age"]. "--- Persons" . $row["gender"]. $row["problem"]. "--- Persons" .$row["symptom1"]. "--- Persons" .$row["duration"]. "--- Persons" .$row["doctor_report"]. "--- Persons" ."<br>";
   ?>
    <tbody id="myTable">
        <tr>  <td><center><?php echo $row["id"]; ?></center></td>
              <td><center><?php echo $row["date"]; ?></center></td>
              <td><center><?php echo $row["med_name"]; ?></center></td>
              <td><center><?php echo $row["qty"]; ?></center></td>
              <!--<td><center><a href="delete.php?username=<?php echo $row["username"]; ?>">Delete</a></center></td>-->
            </tr>
    </tbody>

  <?php

     }
} else {
     echo "0 results";
}

mysql_close($conn);

?>  
  </table>
</center>
</div>
<!-- Doctor Appointment Table Starts here -->

<div>
         <br>
         <center>
         <h3 style="color:black;"><u>Doctor Appointments</u></h3>
           <table class="table table-bordered" id="form-color" style="width: 70%;">
               <?php
                  $dbhost = 'localhost';
                  $dbuser = 'root';
                  $dbpass = '';
                  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
                  
                  if (!$conn) {
                      die("Connection failed: " . mysql_error());
                  }
                  ?>
               <tr>
                  <th>
                     <center><?php echo 'Booking ID'; ?></center>
                  </th>
                  <th>
                     <center><?php echo 'Appointment Date'; ?></center>
                  </th>
                  <th>
                     <center><?php echo 'Doctor Name'; ?></center>
                  </th>
                  <th>
                     <center><?php echo 'Specialist'; ?></center>
                  </th>
                  <th>
                     <center><?php echo 'Hospital Name & Address'; ?></center>
                  </th>
                  <th>
                     <center><?php echo 'Contact No'; ?></center>
                  </th>
               </tr>
               <?php
                  $username = $_SESSION['username'];
                  $sql = "SELECT id,name,category,Hospital_name,pno,date FROM doc_app where username='$username'";
                   mysql_select_db('sem_project');
                   $retval = mysql_query( $sql, $conn );
                              
                              if(! $retval ) {
                                 die('Could not enter data: ' . mysql_error());
                  }
                  
                  elseif (mysql_num_rows($retval) > 0) {
                       // output data of each row
                       while($row = mysql_fetch_assoc($retval)) {
                           //echo "Title--- " . $row["username"]. " --- Amount: " . $row["age"]. "--- Persons" . $row["gender"]. $row["problem"]. "--- Persons" .$row["symptom1"]. "--- Persons" .$row["duration"]. "--- Persons" .$row["doctor_report"]. "--- Persons" ."<br>";
                     ?>
               <tr>
                  <td>
                     <center><?php echo $row ["id"]; ?></center>
                  </td>
                  <td>
                     <center><?php echo $row ["date"]; ?></center>
                  </td>
                  <td>
                     <center><?php echo $row["name"]; ?></center>
                  </td>
                  <td>
                     <center><?php echo $row["category"]; ?></center>
                  </td>
                  <td>
                     <center><?php echo $row["Hospital_name"]; ?></center>
                  </td>
                  <td>
                     <center><?php echo $row["pno"]; ?></center>
                  </td>
               </tr>
               <?php
                  }
                  } else {
                  echo "0 results";
                  }
                  
                  mysql_close($conn);
                  
                  ?>  
            </table>
         </center>
      </div>


</body>
</html>
