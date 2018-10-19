<?php

  
 $con= mysql_connect("localhost", "root","");
      if($con!=TRUE){
      echo "Error1: ".mysql_error()."<br>"; 
      }
      mysql_select_db("sem_project");
      if(isset($_COOKIE['username'])){
      $username=$_COOKIE['username'];
      $query="select * from users where username='".$username."'";
      }
      else{
      $username=$_POST['username'];
      $password=$_POST['pass'];
      $en_cr=sha1($password);
      $query="select * from users where username='".$username."' and password='".$en_cr."'";    
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
              setcookie("username",$username);
          }
          
          echo "<center><br><br><h2>Welcome To CURING ONLINE &nbsp;<h2><h3>Have a Better Health Chekup &nbsp;" .$username. "<h3></center>";
          header( "refresh:1;url=home.php" );
          $_SESSION['username']=$username;
        } 
      else{
          echo "<script type='text/javascript'>alert('Invalid Username or Password')</script>";
          header('location:index.html#login');
          echo "<script>alert(\"Invalid Username or Password\")</script><br>";
        }
?>  

<!DOCTYPE html>
<html lang="en">
<head>  
  <title>Add Members | Infectious Disease Detector</title>
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
        }

  </style>
</head>
<body>
  <div id="bgimg"></div>
  <center><div id="loading">
    <img src="second.gif" /></div></center>
</body>
</html>