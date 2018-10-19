<?php session_start();
          if(isset($_POST['remember'])){
              setcookie("username",$username);
          }
          ?>
<!DOCTYPE html>
<html>
<head>
	<title>Editing</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/css/main.css" />
<style type="text/css">
<style type="text/css">
#abc {
width:100%;
height:100%;
top:0;
left:0;
display:none;
position:fixed;
overflow:auto
}
img#close {
position:absolute;
right:-14px;
top:-14px;
cursor:pointer
}
div#popupContact {
position:absolute;
left:52%;
top:8%;
margin-left:-202px;
font-family:'Raleway',sans-serif
}
form {
max-width:320px;
min-width:250px;
padding:10px 50px;
border:2px solid gray;
border-radius:10px;
font-family:raleway;
background-color: white;
color:black;
}
p {
margin-top:30px;
color: black;
}
h2 {
padding:20px 35px;
margin:-10px -50px;
text-align:center;
color: red;
border-radius:10px 10px 0 0
}
hr {
margin:10px -50px;
border:0;
color:black;
border-top:1px solid #ccc
}
input[type=text] {
width:100%;
padding:10px;
margin-top:30px;
border:1px solid #000;
padding-left:40px;
font-size:16px;
font-family:raleway
}

#submit {
text-decoration:none;
width:100%;
text-align:center;
display:block;
border:1px solid #FFCB00;
padding:10px 0;
font-size:20px;
cursor:pointer;
border-radius:5px
}
button {
height:45px;
border-radius:3px;
background-color: green;
font-family:'Raleway',sans-serif;
font-size:18px;
cursor:pointer
}
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
<div id="abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->
 <?php
                  $dbhost = 'localhost';
                  $dbuser = 'root';
                  $dbpass = '';
                  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
                  
                  if (!$conn) {
                      die("Connection failed: " . mysql_error());
                  }
                  $username = $_SESSION['username'];
                  $id=$_GET['id'];
                   $sql = "SELECT id,name,age,gender,health_stat,aff_by,under_treat FROM add_mem where id='$id'";
                   mysql_select_db('sem_project');
                   $retval = mysql_query( $sql, $conn );
                              
                              if(! $retval ) {
                                 die('Could not enter data: ' . mysql_error());
                  }
                  
                  elseif (mysql_num_rows($retval) > 0) {
                       // output data of each row
                       while($row = mysql_fetch_assoc($retval)) {
                          
                     ?>
<form action="<?php echo 'editbcknd.php?id=' . $row['id'] . '' ?>" id="form" method="post" name="form"> 
<img id="close" src="images/img3.png" width="50px;" onclick="location.href='editmembers.php';">
<p style="font-size: 30px; color:black; margin: 0px;">Update Here</p>
<hr>
<input name="name" placeholder="Name" type="text" value="<?php echo $row ["name"]; ?>">
<input name="age" placeholder="Age" type="text" value="<?php echo $row ["age"]; ?>">
<input name="gender" placeholder="Age" type="text" value="<?php echo $row ["gender"]; ?>">
<input name="health_stat" placeholder="Health Status" type="text" value="<?php echo $row ["health_stat"]; ?>">
<input name="aff_by" placeholder="Affected By" type="text" value="<?php echo $row ["aff_by"]; ?>">
<input name="under_treat" placeholder="Under treatment" type="text" value="<?php echo $row ["under_treat"]; ?>"><br>
<button>Update</button>
<?php
                  }
                  } else {
                  echo "0 results";
                  }
                  
                  mysql_close($conn);
                  
                  ?>  
<br>
&nbsp;
</form>
</div><!-- Popup Div Ends Here -->
</div>
</body>
</html>