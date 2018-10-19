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
                  <li class="active"><a href="mainpage.php">Check Symptoms</a></li>
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
         <div id="form-color">
            <form method="post" action="symptomsbcknd.php">
               <div class="form-group-problem">
                  <label for="problem">Type Your Problem / Disease</label>
                  <input type="text" class="form-control" id="problem" name="problem" required>
               </div>
               <br>
               <div class="form-group-problem">
                  <label for="symp">Enter the Symptoms</label>
                  <input type='text' required
                     class='flexdatalist form-control'
                     data-min-length='1'
                     data-searchContain='true'
                     multiple='multiple'
                     list='skills'
                     name='skills'>
                  <datalist id="skills" name="skills" >
                     <option value="Head_ache">Head Ache</option>
                     <option value="stomach_ache">Stomach Ache</option>
                     <option value="Vomitings">Vomitings</option>
                     <option value="Hand_Pain">Hand Pain</option>
                     <option value="Leg_Pain">Leg Pain</option>
                     <option value="Knee_pain">Knee pain</option>
                     <option value="nose_pain">nose pain</option>
                     <option value="ear_pain">ear pain</option>
                     <option value="kneck_pain">kneck pain</option>
                     <option value="Paralysis">Paralysis</option>
                     <option value="Eyes_red">Eyes red</option>
                     <option value="external_cut">external cut</option>
                     <option value="internal_cut">internal cut</option>
                     <option value="Bleeding">Bleeding</option>
                  </datalist>
               </div>
               <script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
               <script src="jquery/jquery.flexdatalist.js"></script><br>
               <div class="form-group-problem">
                  <label for="text">Want to tell us more..</label>
                  <textarea cols="50" rows="7" name="description" required></textarea>
               </div>
               <br>
               <div>
                  <label form="met_doc">Met Doctor?</label>
                  <div class="field half first">
                     <input type="radio" id="demo-priority-low" value="Yes" name="doc">
                     <label for="demo-priority-low">Yes</label>
                  </div>
                  <div class="field half">
                     <input type="radio" id="demo-priority-high" value="No" name="doc">
                     <label for="demo-priority-high">No</label>
                  </div>
               </div>
               <br>
               <div>
                  <label for="med">Previous Medications If Yes mention it below</label>
                  <input type="text" class="form-control" name="medications" required>
               </div>
               <br>
               <details>
                  <summary style="text-decoration: underline;">Want to Upload Previous Prescription?</summary>
                  <label for="upload"></label><input type="file" name="file" accept="image/*">
               </details>
               <br>
               <div class="form-group-problem">
                  <button type="submit">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </body>
</html>
