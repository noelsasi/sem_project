<?php
   $con= mysql_connect("localhost", "root","");
   
   if($con!=TRUE){
       echo "Error1: ".mysql_error()."<br>"; 
   }
   mysql_select_db("sem_project");
   $id="";
   $username=$_POST['username'];
   $email=$_POST['email'];
   $password=$_POST['pass'];
   $gender=$_POST['gen'];
   $age=$_POST['age'];
   $pnum=$_POST['pnum'];
   
   $en_pwd=  sha1($password);
   
   
   $query="insert into users values ('".$id."','".$username."','".$en_pwd."','".$email."','".$gender."','".$age."','".$pnum."')";
   $result=mysql_query($query);
   
   if($result!=true){
       echo "Error2: ".mysql_error()."<br>"; 
   }
   else{
      header( "refresh:1;url=index.html#login" );
   }
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
      <center>
         <div id="loading">
            <img src="second.gif" />
            <h3>Please Wait! Going Back to Login Page.</h3>
         </div>
      </center>
      <!-- Scripts -->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/util.js"></script>
      <script src="assets/js/main.js"></script>
   </body>
</html>
