<?php
if (!isset($connection)) {
  include $_SERVER['DOCUMENT_ROOT'] . "/serverit/lib/Database.php";
}
include $_SERVER['DOCUMENT_ROOT'] . "/serverit/utility/Baseurl.php";
include $_SERVER['DOCUMENT_ROOT'] . "/serverit/utility/Format.php";
$baseurl = new Baseurl;
define("IMAGEPATH", "{$baseurl->url()}/serverit/public/images/");
define("UPLOADIMAGEPATH", "{$baseurl->url()}/serverit/public/upload/");
define("VIDEOPATH", "{$baseurl->url()}/serverit/public/video/");
define("LINK", "{$baseurl->url()}/serverit/");
$format = new Format;
?>
<?php $page='lead';
ob_start();
session_start();
$siteName = "serveritstudio.com";

DEFINE("BASE_URL","http://localhost/serverit/business");
DEFINE ('DB_PSWD', ''); 
DEFINE ('DB_HOST', 'localhost'); 
DEFINE ('DB_NAME1', 'server_it_admin'); 

date_default_timezone_set('Asia/Dhaka'); 
$conn =  new mysqli(DB_HOST,DB_USER,DB_PSWD,DB_NAME1);
if($conn->connect_error)
die("Failed to connect database ".$conn->connect_error );
include("php/checklogin.php");

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage Students - Server IT Studio</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	
	<link href="css/ui.css" rel="stylesheet" />
	<link href="css/datepicker.css" rel="stylesheet" />	
	<link rel="icon" href="img/logo-min.png" type="image/x-icon" />
	
    <script src="js/jquery-1.10.2.js"></script>
	
    <script type='text/javascript' src='js/jquery/jquery-ui-1.10.1.custom.min.js'></script>
   
	
</head>
<?php
include("php/header.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Lead </h1>
                    </div>
                </div>
		 <link href="css/datatable/datatable.css" rel="stylesheet" />
		<div class="panel panel-default">
                        <div class="panel-heading">
                            Students Lead
                        </div>
                        <div class="panel-body">
                            <div class="table-sorting table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="tSortable22">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Contact</th>
											<th>Course Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
											<th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$sql = "SELECT * FROM `admission_form`";
									$q = $connection->query($sql);
									$i=1;
									while($r = $q->fetch_assoc())
									{
                                        if(!$r['user_id']){
        									echo '<tr '.'>
                                                    <td>'.$i.'</td>
        											<td>'.$r['user_name'].'</td>
        											<td>'.$r['mobile'].'</td>
        											<td>'.$r['course_name'].''.'</td>
                                                    <td>'.$r['email'].'</td>
        											<td>'.$r['status'].'</td>
                                                    <td>'.date("d M y", strtotime($r['date'])).'</td>
                                                </tr>';
        										$i++;
    									}
									}
									?>
									
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     
	<script src="js/dataTable/jquery.dataTables.min.js"></script>
    
     <script>
         $(document).ready(function () {
             $('#tSortable22').dataTable({
    "bPaginate": true,
    "bLengthChange": true,
    "bFilter": true,
    "bInfo": false,
    "bAutoWidth": true });
	
         });
		 
	
    </script>
		
						
            
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

  
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="js/custom1.js"></script>

    
</body>
</html>
