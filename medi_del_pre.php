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
      <link href="jquery/jquery.flexdatalist.css" rel="stylesheet" type="text/css">
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
                  <li class=""><a href="viewrecords.php">View Records</a></li>
                  <li><a href="update.php" data-toggle="tooltip" data-placement="bottom" title="Post your Neighbours Health status and Contribute us more">Update Us</a>
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
      <div id="main">
         <br>
         <div><?php
            $_SESSION['med_name'] = $_POST['med_name'];
            $_SESSION['qty'] = $_POST['qty'];
            ?></div>
         <div id="form-color">
            <form method="post" action="medi_del.php">
               <div>
                  <input type="text" class="form-control" name="med_name" value="<?php echo $_SESSION['med_name']; ?>" >
               </div><br>
              <div>
                  <input type="text" class="form-control" name="qty" value="<?php echo $_SESSION['qty']; ?>">
               </div>
               <br>
            <div class="form-group-problem">
                  <label for="text">Full Address</label>
                  <textarea cols="50" rows="3" name="address" required></textarea>
               </div>
               <br>
               <div>
                  <label for="med">Contact Number</label>
                  <input type="text" class="form-control" name="pnum" required>
               </div>
               <br>
               <div>
                  <label for="med">City</label>
                  <input type="text" class="form-control" name="city" required>
               </div>
               <br>
               <div>
                  <label for="med">State</label>
                  <input type="text" class="form-control" name="state" required>
               </div>
               <br>
               <div>
                  <label for="med">Pin Code</label>
                  <input type="text" class="form-control" name="pincode" required>
               </div>
               <br>
               <p style="color: white; font-size:10px;">Important Instructions:<br>
1. You are required to send a scan copy of valid prescription from an authorized Doctor which is mandatory<br> 
2. Please show original prescription at the time of delivery at your place.<br> 
3. Min order amount Rs. 200 for free home delivery <br>
4. Payment method only COD (Cash on Delivery) is available <br>
5. For all in stock items the delivery time is within 12 to 48 hours of order being confirmed subject to the availability<br>of store near the delivery address. </p>
               <div class="form-group-problem">
                  <button type="submit" class="btn-success">Submit</button>
               </div>
            </form>
         </div>
      </div>
</body>
</html>