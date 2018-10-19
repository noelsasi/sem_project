<?php
session_start();
          if(isset($_POST['remember'])){
              setcookie("username",$username);
          }

$con= mysql_connect("localhost", "root","");

if($con!=TRUE){
    echo "Error1: ".mysql_error()."<br>"; 
}
mysql_select_db("sem_project");

$date= date("d-m-Y");
$id="";
$username=$_SESSION['username'];
$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gen'];
$health_stat=$_POST['health_stat'];
$aff_by=$_POST['aff_by'];
$under_treat=$_POST['under_treat'];


$query="insert into add_mem values ('".$id."','".$username."','".$name."','".$age."','".$gender."','".$health_stat."','".$aff_by."','".$under_treat."')";
$result=mysql_query($query);

if($result!=true){
    echo "Error2: ".mysql_error()."<br>"; 
}
else
  echo "<script type='text/javascript'>alert('Members Added Successfully!')</script>";
	header( "refresh:0;url=addmembers.php" );

?>

<!DOCTYPE HTML>
<html>
   <head>
      <title>Infectious Disease Detector</title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
      <link rel="stylesheet" href="assets/css/main.css" />
      <!--<link rel="stylesheet" href="assets/css/ie9.css" />-->
      <noscript>
         <link rel="stylesheet" href="assets/css/noscript.css" />
      </noscript>
      <style>
          body {
      top: 0px;
      background-image: linear-gradient(to top, rgba(19, 21, 25, 0.5), rgba(19, 21, 25, 0.5)), url("../../images/overlay.png");
      background-size: auto, 256px 256px;
      background-image: url("images/image21.jpg");
      background-size: cover;
        }
 </style>
   </head>
   <body>
   <div id="bgimg"></div>
   <center><div id="loading">
    <img src="second.gif" />
    <h3>Submitted Successfully</h3>
    </div></center>
          <!-- Scripts -->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/util.js"></script>
      <script src="assets/js/main.js"></script>
   </body>
</html>
