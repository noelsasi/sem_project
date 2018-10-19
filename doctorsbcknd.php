<?php
session_start();
          if(isset($_POST['remember'])){
              setcookie("username",$username);
          }

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if (!$conn) {
     die("Connection failed: " . mysql_error());
}?>
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
        .bill{
          font-family: "Courier New", serif;
        }
        .head{
          font-size: 20px; color:white;
        }
        .tail{
          font-size: 20px;
        }
        .note{
          font-size: 16px;
          color:white;
        }
 </style>
   </head>
   <body>
   <center>
    <!--<img src="second.gif" /> --><br>
    <h2 class="major">Booking Confirmed</h2>

<?php 
mysql_select_db('sem_project');
$username = $_SESSION['username'];
$sno=$_POST['ssno'];
$date=$_POST['date'];
$id= rand(50000,100000);
$sql = "SELECT * FROM doctors where sno='$sno'";
 
 $retval = mysql_query( $sql, $conn );
            
            if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
}

elseif (mysql_num_rows($retval) > 0) {
     // output data of each row
     while($row = mysql_fetch_assoc($retval)) {
         
       //  echo "
              // Doctor Name :  </span>" . $row["name"]. "<br>
              // Category :  " . $row["category"]. "<br>
              // Hospital Name :  " . $row["Hospital_name"]. "<br>
              // Consultant fee :  " .$row["consult_fee"]. "<br>
              // Date : " .$date. "<br>
              // Timings : 9 AM - 12 PM , 2 PM - 6PM <br>
              // Phone Number :  " .$row["pno"]. "<br>
               //";
             
             ?>

    <div style="background-color: black; width: 40%; padding:50px; opacity: 0.9; margin-bottom: 0px;" class="bill">
      <u><span class="head">Booking ID :</span> <span class="tail major"><?php
echo $id;
?></span></u><br>
<span class="head">Doctor Name :</span> <span class="tail"><?php echo $row["name"]; ?></span><br>
<span class="head">Doctor id :</span> <span class="tail"><?php echo $row["sno"]; ?></span><br>
      <span class="head">Specialised :</span> <span class="tail"><?php echo $row["category"]; ?></span><br>
      <span class="head">Hospital Address : </span><span class="tail"><?php echo $row["Hospital_name"]; ?></span><br>
      <span class="head">Email : </span><span class="tail"><?php echo $row["email"]; ?></span><br>
      <span class="head">Consultant Fee : </span><span class="tail"><?php echo $row["consult_fee"]; ?></span><br>
      <span class="head">Booking Date : </span><span class="tail"><?php echo $date; ?></span><br>
      <span class="head">Timings : </span><span class="tail">9 AM - 12 PM , 2 PM - 6PM</span><br>
      <span class="head">Mobile Number : </span><span class="tail"><?php echo $row["pno"]; ?></span><br><br>
      <form action="home.php"><button style="background-color: green;" onclick="window.print();">Print Appointment</button><br><br>
      <p class="note"> NOTE : &nbsp;Please carry Your Appointment </p>
      </form>
    </div>


<?php 
  $username = $_SESSION['username'];
  $name= $row["name"];
  $doc_id= $row["sno"];
  $category= $row["category"];
  $Hospital_name= $row["Hospital_name"];
  $pno= $row["pno"];
  $date=$_POST['date'];
  $query="insert into doc_app values ('".$id."','".$username."','".$name."','".$doc_id."','".$category."','".$Hospital_name."','".$pno."','".$date."')";
  $result=mysql_query($query);

  if($result!=true){
    echo "Error2: ".mysql_error()."<br>"; 
  }
  else {
  echo "<script type='text/javascript'>alert('Appointment Booked Successfully')</script>";
  
  //header( "url=mybookings.php" );
 }
} 

}
else {
     echo "0 results";
}

mysql_close($conn);

?>  
</center>          <!-- Scripts -->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/util.js"></script>
      <script src="assets/js/main.js"></script>
   </body>
</html>