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
$id= rand(50000,100000);
$date= date("Y-m-d");
$time=date("H:m");
$datetime=$date."T".$time;
$username=$_SESSION['username'];
$med_name=$_POST['med_name'];
$qty=$_POST['qty'];
$address=$_POST['address'];
$pnum=$_POST['pnum'];
$city=$_POST['city'];
$state=$_POST['state'];
$pincode=$_POST['pincode'];

$query="insert into med_del_pre values ('".$id."','".$datetime."','".$username."','".$med_name."','".$qty."','".$address."','".$pnum."','".$city."','".$state."','".$pincode."')";
$result=mysql_query($query);

if($result!=true){
    echo "Error2: ".mysql_error()."<br>"; 
}
else
  //echo "<script type='text/javascript'>alert('Added to Cart Successfully!')</script>";
 // header( "refresh:5;url=medicinedelivery.php" );

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
   <center>
    <!--<img src="second.gif" /> --><br><br><br>
    <h2>Order Placed Successfully</h2>
    <h3>Thanks For Shopping!</h3>
<?php
    mysql_select_db("sem_project");
$date= date("Y-m-d");
$time=date("H:m");
$datetime=$date."T".$time;
$username=$_SESSION['username'];
$_SESSION['address'] = $_POST['address'];
$address=$_SESSION['address'];
$_SESSION['pnum'] = $_POST['pnum'];
$pnum=$_SESSION['pnum'];
$_SESSION['city'] = $_POST['city'];
$city=$_SESSION['city'];
$_SESSION['state'] = $_POST['state'];
$state=$_SESSION['state'];
$_SESSION['pincode'] = $_POST['pincode'];
$pincode=$_SESSION['pincode'];
$_SESSION['med_name']= $_POST['med_name'];
$med_name = $_SESSION['med_name'];
$_SESSION['qty']= $_POST['qty'];
$qty = $_SESSION['qty'];
?>
   <div style="background-color: black; width: 40%; padding:50px; opacity: 0.9;">
      <u><span style="font-size: 35px; color:white;">Order ID :</span> <span style="font-size: 35px;"><?php
echo $id;
?></span></u><br>
      <span style="font-size: 25px; color:white;">Medicine Name :</span> <span style="font-size: 25px;"><?php echo $_SESSION['med_name']; ?></span><br>
      <span style="font-size: 25px; color:white;">Quantity :</span> <span style="font-size: 25px;"><?php echo $_SESSION['qty']; ?></span><br>
      <span style="font-size: 25px; color:white;">Address : </span><span style="font-size: 25px;"><?php echo $_SESSION['address']; ?></span><br>
      <span style="font-size: 25px; color:white;">Mobile Number : </span><span style="font-size: 25px;"><?php echo $_SESSION['pnum']; ?></span><br>
      <span style="font-size: 25px; color:white;">City : </span><span style="font-size: 25px;"><?php echo $_SESSION['city']; ?></span><br>
      <span style="font-size: 25px; color:white;">State : </span><span style="font-size: 25px;"><?php echo $_SESSION['state']; ?></span><br>
      <span style="font-size: 25px; color:white;">Pin Code : </span><span style="font-size: 25px;"><?php echo $_SESSION['pincode']; ?></span><br><br>
      <form action="home.php"><button>Go Back To HomePage</button></form>
    </div>


    </center>
          <!-- Scripts -->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/util.js"></script>
      <script src="assets/js/main.js"></script>
   </body>
</html>
