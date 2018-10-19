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
$username = $_SESSION['username'];
$id=$_GET['id'];

$query= "Delete from add_mem where id='$id' ";
$result=mysql_query($query); 
   
   if($result!=true){
       echo "Error2: ".mysql_error()."<br>"; 
   }
   else
    header( "refresh:0;url=editmembers.php" );
   
   ?>