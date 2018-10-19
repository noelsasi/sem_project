<?php
session_start();
          if(isset($_POST['remember'])){
              setcookie("username",$username);
          }
 function fetch_data()  
 {  
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "sem_project");  
      $sql = "SELECT * FROM doc_app";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["id"].'</td>  
                          <td>'.$row["date"].'</td>  
                          <td>'.$row["username"].'</td> 
                          <td>'.$row["name"].'</td>  
                          <td>'.$row["category"].'</td>  
                          <td>'.$row["Hospital_name"].'</td>
                          <td>'.$row["pno"].'</td> 
                     </tr>  
                          ';  
      }  
      return $output;  
 } 
if(isset($_POST["generate_pdf"]))  
 {  
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Download Table");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h4 align="center">Doctor Appointments Table</h4><br/><br>
      <table border="1" cellspacing="0" cellpadding="4">  
           <tr>  
                <th width="10%" style="font-weight:bold;">ID</th>  
                <th width="13%" style="font-weight:bold;">date</th>  
                <th width="13%" style="font-weight:bold;">username</th>
                <th width="13%" style="font-weight:bold;">Name</th>  
                <th width="13%" style="font-weight:bold;">Category</th>  
                <th width="25%" style="font-weight:bold;">Hospital Name, Address</th>
                <th width="15%" style="font-weight:bold;">phone number</th>
           </tr>

      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
 } 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home | Infectious Disease Detector</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
        table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
</style>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});


</script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</head> 

<body>
<div>
<nav class="navbar navbar-inverse fixed-top">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="#"><a href="home.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span>Doctors</span>
        <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="doctors.php">Consult Doctor</a></li>
          <li><a href="https://www.google.co.in/maps/search/hospitals+near+me/@10.9418622,76.7309732,14z/data=!3m1!4b1?dcr=0" target="blank">Nearest Hospitals</a></li>
    </ul>
     </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
     <li><a href="index.html"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
      <div class="table-responsive">
      <br>
      <div style="padding-left:140px;"><input id="myInput" type="text" placeholder="Search.." style="width:20%; background-color: black;"></div><br>
      <center>
     <table class="table table-bordered" id="form-color" style="width: 80%;" style="overflow-x:auto;">
<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if (!$conn) {
     die("Connection failed: " . mysql_error());
}
?>
            <thead>
            <tr>
                <th><center><?php echo '#id'; ?></center></th>
                <th><center><?php echo 'date'; ?></center></th>
                <th><center><?php echo 'Patient Name'; ?></center></th>
                <th><center><?php echo 'Doctor name'; ?></center></th>
                <th><center><?php echo 'Hospital Name And Address'; ?></center></th>
           </tr>
         </thead>
<?php
$sno = $_SESSION['sno'];
$sql = "SELECT * FROM doc_app where doc_id='$sno'";
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
    <tbody id="myTable">
        <tr>
              <td><?php echo $row["id"]; ?></center></td>
                  <td><?php echo $row["date"]; ?></center></td>
                  <td><?php echo $row["username"]; ?></center></td>
                  <td><?php echo $row["name"]; ?></center></td>
                  <td><?php echo $row["Hospital_name"]; ?></center></td>
              <!--<td><center><a href="delete.php?username=<?php echo $row["username"]; ?>">Delete</a></center></td>-->
            </tr>
    </tbody>

  <?php

     }
} else {
     echo "0 results";
}

mysql_close($conn);

?>  
  </table></center>
</div>
 <center> <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div></center>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../#admin">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
