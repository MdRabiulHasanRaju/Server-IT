<?php $page='dashboard';
include("php/dbconnect.php");
include("php/checklogin.php");


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Business - Server IT Studio</title>

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
    <link rel="icon" href="img/logo-min.png" type="image/x-icon" />


</head>
<?php
include("php/header.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Dashboard</h1>
                        

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
				
				  <div class="col-md-4">
                        <div style="background:red;" class="main-box">
                            <a href="student.php">
                                <i class="fa fa-users fa-5x"></i>
                                <h4>Total Students: <?php include 'counter/stucount.php'?></h4>
                                <h5>Manage Students</h5>
                            </a>
                        </div>
                    </div>
				
				
                   
					
                    <div class="col-md-4">
                        <div class="main-box mb-green" style="background:black;">
                            <a href="fees.php">
                                <i class="fa fa-money fa-5x"></i>
                                <h4>Total Earnings: <?php include 'counter/totalearncount.php'?></h4>
                                <h4>Total Due: <?php include 'counter/totalduecount.php'?></h4>
                            </a>
                        </div>
                    </div>
					
					
                    <div class="col-md-4">
                        <div class="main-box mb-secondary" style="background:green;color:white">
                                <i class="fa fa-th-large fa-5x"></i>
                                <h4>Fund Balance: <?php include 'counter/fundBalance.php'?></h4>
                                <h5><?=$fund>0?"<b>Positive Fund Balance</b>":"<b style='color:orange'>Negative Fund Balance</b>";?></h5>
                        </div>
                    </div>
                  

                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="main-box mb-dull" style="background:black;">
                            <a>
                                <i class="fa fa-toggle-on fa-5x"></i>
                                <h5>Active Students: <?php include 'counter/activecount.php'?></h5>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="main-box mb-maroon" style="background:red;">
                            <a href="report.php">
                                <i class="fa fa-file-pdf-o fa-5x"></i>
                                <h5>View Reports</h5>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="main-box mb-yell" style="background:black;">
                            <a href="inactivestd.php">
                                <i class="fa fa-toggle-off fa-5x"></i>
                                <h5>In-Active Students: <?php include 'counter/inactivecount.php'?></h5>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->

            
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    
   
   <script src="js/jquery-1.10.2.js"></script>	
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="js/custom1.js"></script>
    


</body>
</html>
