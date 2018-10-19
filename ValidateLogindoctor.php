<?php

  
 $con= mysql_connect("localhost", "root","");
      if($con!=TRUE){
      echo "Error1: ".mysql_error()."<br>"; 
      }
      mysql_select_db("sem_project");
      if(isset($_COOKIE['sno'])){
      $sno=$_COOKIE['sno'];
      $query="select * from doctors where sno='".$sno."'";
      }
      else{
      $sno=$_POST['sno'];
      $password=$_POST['pass'];
      $query="select * from doctors where sno='".$sno."' and password='".$password."'";    
      }
      $result=mysql_query($query);
      if($result!=true){
      echo "Error2: ".mysql_error()."<br>"; 
      }
      $records=  mysql_num_rows($result);
      if($records!=0){
         // $rec=mysql_fetch_row($result);
          session_start();
          if(isset($_POST['remember'])){
              setcookie("sno",$sno);
          }
          
          echo "<center><br><br><h2>Welcome To CURING ONLINE &nbsp;<h2><h3>Have a Better Health Chekup &nbsp;" .$sno. "<h3></center>";
          header( "refresh:1;url=doc_app.php" );
          $_SESSION['sno']=$sno;
        } 
      else{
          echo "<script type='text/javascript'>alert('Invalsno Username or Password')</script>";
          header('location:index.html#doctor');
          echo "<script>alert(\"Invalsno Username or Password\")</script><br>";
        }
?>  

<!DOCTYPE html>
<html lang="en">
<head>  
  <title>Add Members | Infectious Disease Detector</title>
  <meta charset="utf-8">
  <meta name="viewport" content="wsnoth=device-wsnoth, initial-scale=1">
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
        }

  </style>
</head>
<body>
  <div sno="bgimg"></div>
  <center><div sno="loading">
    <img src="second.gif" /></div></center>
</body>
</html>