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
      <script>
         $(document).ready(function(){
             $('[data-toggle="tooltip"]').tooltip(); 
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
                  <li class="#"><a href="viewrecords.php">View Records</a></li>
                  <li class="#"><a href="update.php" data-toggle="tooltip" data-placement="bottom" title="Post your Neighbours Health status and Contribute us more">Update Us</a></li>
                  <li class="dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span>Doctors</span>
                     <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="doctors.php">Consult Doctor</a></li>
                        <li><a href="https://www.google.co.in/maps/search/hospitals+near+me/@10.9418622,76.7309732,14z/data=!3m1!4b1?dcr=0" target="blank">Nearest Hospitals</a></li>
                     </ul>
                  </li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>
                     <span style="text-transform: capitalize;"><?php echo $_SESSION['username']; ?></span>
                     <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="editmembers.php">Edit Profile</a></li>
                        <li><a href="addmembers.php">Add Members</a></li>
                        <li><a href="#">View Members</a></li>
                        <li><a href="mybookings.php">My Bookings</a></li>
                        <li><a href="#">Delete Account</a></li>
                     </ul>
                  </li>
                  <li><a href="index.html"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
               </ul>
            </div>
         </nav>
      </div>
      <!-- View Family Members Table Starts here -->
      <div>
         <br>
         <h3 style="padding-left: 150px; color:black;"><u>Your Family Members</u></h3>
         <center>
            <table class="table table-bordered" id="form-color" style="width: 80%;" >
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
                     <center><?php echo 'Name'; ?></center>
                  </th>
                  <th>
                     <center><?php echo 'Age'; ?></center>
                  </th>
                  <th>
                     <center><?php echo 'Gender'; ?></center>
                  </th>
                  <th>
                     <center><?php echo 'Health status'; ?></center>
                  </th>
                  <th>
                     <center><?php echo 'Oftenly Affected By'; ?></center>
                  </th>
                  <th>
                     <center><?php echo 'Under any Treatment'; ?></center>
                  </th>
               </tr>
               <?php
                  $username = $_SESSION['username'];
                  $sql = "SELECT name,age,gender,health_stat,aff_by,under_treat FROM add_mem where Username='$username'";
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
                     <center><?php echo $row ["name"]; ?></center>
                  </td>
                  <td>
                     <center><?php echo $row["age"]; ?></center>
                  </td>
                  <td>
                     <center><?php echo $row["gender"]; ?></center>
                  </td>
                  <td>
                     <center><?php echo $row["health_stat"]; ?></center>
                  </td>
                  <td>
                     <center><?php echo $row["aff_by"]; ?></center>
                  </td>
                  <td>
                     <center><?php echo $row ["under_treat"]; ?></center>
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
      <!-- View Family Members Table Ends here -->
      <!-- View Updated Members Table Starts here -->
      <div>
         <br>
         <h3 style="padding-left: 150px; color:black;"><u>Updated Members</u></h3>
         <center>
            <table class="table table-bordered" id="form-color" style="width: 80%;">
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
                     <center><?php echo 'Name'; ?></center>
                  </th>
                  <th>
                     <center><?php echo 'Age'; ?></center>
                  </th>
                  <th>
                     <center><?php echo 'Gender'; ?></center>
                  </th>
                  <th>
                     <center><?php echo 'Health status'; ?></center>
                  </th>
                  <th>
                     <center><?php echo 'Problem'; ?></center>
                  </th>
                  <th>
                     <center><?php echo 'Under any Treatment'; ?></center>
                  </th>
               </tr>
               <?php
                  $username = $_SESSION['username'];
                  $sql = "SELECT name,age,gender,health_stat,problem,under_treat FROM update_mem where Username='$username'";
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
                     <center><?php echo $row ["name"]; ?></center>
                  </td>
                  <td>
                     <center><?php echo $row["age"]; ?></center>
                  </td>
                  <td>
                     <center><?php echo $row["gender"]; ?></center>
                  </td>
                  <td>
                     <center><?php echo $row["health_stat"]; ?></center>
                  </td>
                  <td>
                     <center><?php echo $row["problem"]; ?></center>
                  </td>
                  <td>
                     <center><?php echo $row ["under_treat"]; ?></center>
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
