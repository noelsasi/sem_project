<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>View Records</title>

</head>

<body>



<?php

/*

VIEW.PHP

Displays all data from 'players' table

*/



// connect to the database

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if (!$conn) {
     die("Connection failed: " . mysql_error());
}


// get results from database

mysql_select_db('sem_project');
$result = mysql_query("SELECT * FROM users")

or die(mysql_error());



// display data in table

echo "<p><b>View All</b> | <a href='view-paginated.php?page=1'>View Paginated</a></p>";



echo "<table border='1' cellpadding='10'>";

echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th></th><th></th></tr>";



// loop through results of database query, displaying them in the table

while($row = mysql_fetch_array( $result )) {



// echo out the contents of each row into a table

echo "<tr>";

echo '<td>' . $row['Username'] . '</td>';

echo '<td>' . $row['Password'] . '</td>';

echo '<td>' . $row['email'] . '</td>';

echo '<td><a href="edit.php?id=' . $row['id'] . '">Edit</a></td>';

echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';

echo "</tr>";

}



// close table>

echo "</table>";

?>

<p><a href="new.php">Add a new record</a></p>



</body>

</html>
