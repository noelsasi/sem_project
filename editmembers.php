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
  <script type="text/javascript">
//Function To Display Popup
function div_show() {
document.getElementById('abc').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('abc').style.display = "none";
}
  </script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
<style type="text/css">
    #abc {
width:100%;
height:100%;
opacity:1.0;
top:0;
left:0;
display:none;
position:fixed;
background-color:#313131;
overflow:auto
}
.glyphicon{
  text-decoration: none;
}
img#close {
position:absolute;
right:-14px;
top:-14px;
cursor:pointer
}
div#popupContact {
position:absolute;
left:57%;
top:17%;
margin-left:-202px;
font-family:'Raleway',sans-serif
}
p {
margin-top:30px
}
h2 {
background-color:#FEFFED;
padding:20px 35px;
margin:-10px -50px;
text-align:center;
border-radius:10px 10px 0 0
}
hr {
margin:10px -50px;
border:0;
border-top:1px solid #ccc
}
input[type=text] {
width:82%;
padding:10px;
margin-top:30px;
border:1px solid #ccc;
padding-left:40px;
font-size:16px;
font-family:raleway;
}
#name {
background-image:url(../images/name.jpg);
background-repeat:no-repeat;
background-position:5px 7px
}
#email {
background-image:url(../images/email.png);
background-repeat:no-repeat;
background-position:5px 7px
}
textarea {
background-repeat:no-repeat;
background-position:5px 7px;
width:82%;
height:95px;
padding:10px;
resize:none;
margin-top:30px;
border:1px solid #ccc;
padding-left:40px;
font-size:16px;
font-family:raleway;
margin-bottom:30px
}
#submit {
text-decoration:none;
width:100%;
text-align:center;
display:block;
background-color:#FFBC00;
color:black;
border:1px solid #FFCB00;
padding:10px 0;
font-size:20px;
cursor:pointer;
border-radius:5px
}

</style>
</head>

<body id="body" style="overflow:hidden;">
<div>
<nav class="navbar navbar-inverse fixed-top">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="#"><a href="home.php">Home</a></li>
      <li class="#"><a href="mainpage.php">Check Symptoms</a></li>
      <li class="#"><a href="viewrecords.php">View Records</a></li>
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
          <li><a href="#">Edit Profile</a></li>
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
<center><br>
  <div>
    <h3><u>Edit Your Profile</u></h3>
    <table class="table" id="form-color" style="width: 30%;">
    <div>
         <br>
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
                     <center><?php echo 'Email'; ?></center>
                  </th>
                  <th>
                     <center><?php echo 'Gender'; ?></center>
                  </th>
                  <th>
                     <center><?php echo 'Age'; ?></center>
                  </th>
                  <th>
                     <center><?php echo 'Phone Number'; ?></center>
                  </th>
                  <th>
                     <center><?php echo 'Edit'; ?></center>
                  </th>
               </tr>
               <?php
                  $username = $_SESSION['username'];
                  $sql = "SELECT username,password,email,age,gender,pnum FROM users where username='$username'";
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
                     <center><?php echo $row ["username"]; ?></center>
                  </td>
                  <td>
                     <center><?php echo $row["email"]; ?></center>
                  </td>
                  <td>
                     <center><?php echo $row["gender"]; ?></center>
                  </td>
                  <td>
                     <center><?php echo $row["age"]; ?></center>
                  </td>
                  <td>
                     <center><?php echo $row ["pnum"]; ?></center>
                  </td>
                  <td style="background-color: #52BE80;">
                     <center><a href="#login"><span class="glyphicon glyphicon-edit"></span></center>
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
</div>
    <div>
      <center><h3><u>Edit Your Family Members</u></h3></center>
      <!-- editing Family members -->
       <div>
         <br>
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
                     <center><?php echo 'ID'; ?></center>
                  </th>
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
                  <th>
                     <center><?php echo 'EDIT'; ?></center>
                  </th>
                  <th>
                     <center><?php echo 'Delete'; ?></center>
                  </th>
               </tr>
               <?php
                  $username = $_SESSION['username'];
                   $sql = "SELECT id,name,age,gender,health_stat,aff_by,under_treat FROM add_mem where Username='$username'";
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
                <!--  <td style="background-color: #52BE80;">
                     <center><button id="popup" onclick="div_show()"><span class="glyphicon glyphicon-edit"></span></button></center>
                  </td>-->

                  <td style="background-color: #52BE80  ;">
                    <center>
                    <a href="<?php echo 'edit.php?id=' . $row['id'] . '' ?>"><span class="glyphicon glyphicon-edit"></span></a>
                    </center>
                  </td>
                <td style="background-color: #E96144;">
                <center>
                <a href="<?php echo 'delete.php?id=' . $row['id'] . '' ?>"><span class="glyphicon glyphicon-trash"></span></a>
                </center>
                </td>
                  <!--<td style="background-color:#E74C3C;">
                      <form action="delete.php" method="Post" style="all:none;">
                      <input  type=hidden value="<?php echo $row['id']; ?>" name="idnum" >
                      <button><span class="glyphicon glyphicon-trash"></span></button>
                      </form>
                  </td>-->
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
     </div>
</center>
<div id="abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->
<form action="updatebcknd.php?id=<?php echo $row['id']?>" id="form" method="post" name="form"> 
<img id="close" src="images/img3.png" width="50px;" onclick ="div_hide()">
<p style="font-size: 30px; color:white; margin: 0px;">Update Here</p>
<hr>
<input name="name" placeholder="Name" type="text" value="<?php echo $row['name']; ?>">
<input name="age" placeholder="Age" type="text">
<input name="health_stat" placeholder="Health Status" type="text">
<input name="aff_by" placeholder="Affected By" type="text">
<input name="under_treat" placeholder="Under treatment" type="text"><br>
<button>Update</button>
</form>
</div><!-- Popup Div Ends Here -->
</div>
</body>
</html>
