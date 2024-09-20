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
<?php $page = 'expense';
ob_start();
session_start();
$siteName = "serveritstudio.com";

DEFINE("BASE_URL", "http://localhost/serverit/business");
DEFINE('DB_PSWD', '');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME1', 'server_it_admin');

date_default_timezone_set('Asia/Dhaka');
$conn =  new mysqli(DB_HOST, DB_USER, DB_PSWD, DB_NAME1);
if ($conn->connect_error)
    die("Failed to connect database " . $conn->connect_error);
include("php/checklogin.php");






if (isset($_POST['save'])) {
    if ($_GET['action'] == "add") {
        $date = $_POST['date'];
        $amount = $_POST['amount'];
        $expenseBy = $_POST['expenseBy'];
        $description = $_POST['description'];

        $q1 = $conn->query("INSERT INTO expense (amount,expense_by,`description`,`date`) VALUES ('$amount','$expenseBy','$description','$date')");

        $expenseSave = $conn->insert_id;
        if($expenseSave){
        echo '<script type="text/javascript">window.location="expense.php";</script>';
        }
    }
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Expense - Server IT Studio</title>

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
                <h1 class="page-head-line">Expense </h1>
                <?php
                echo (isset($_GET['action']) && @$_GET['action'] == "add" || @$_GET['action'] == "edit") ?
                    ' <a href="expense.php" class="btn btn-success btn-sm pull-right" style="border-radius:0%;top: -63px; position: relative;">Go Back </a>' : '<a href="expense.php?action=add" class="btn btn-danger btn-sm pull-right" style="border-radius:0%;top: -63px; position: relative;"><i class="glyphicon glyphicon-plus"></i> Add New expense</a>';
                ?>
            </div>
        </div>
        <link href="css/datatable/datatable.css" rel="stylesheet" />

        <?php
        if (isset($_GET['action']) && $_GET['action'] == "add") {
        ?>
            <div style="padding:0 10px!important" class="panel panel-default">

                <div class="panel-heading">
                    Add Expense Details
                </div>
<form action="" method="post">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Expense Information:</legend>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="Old">Date* </label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" placeholder="Date" id="date" name="date" style="background-color: #fff;" required/>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="amount">Amount* </label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="amount" name="amount" value="" required />
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="expenseBy">Expense By* </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="expenseBy" id="expenseBy" required>
                                <option value="" required readonly disabled selected>Choose Person</option>
                                <option required value="Raju">Raju</option>
                                <option required value="Nibir">Nibir</option>
                            </select>
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="description">Description* </label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-10">
                            <button type="submit" name="save" class="btn btn-success" style="border-radius:0%">Save </button>

                        </div>
                    </div>
                </fieldset>
                </form>
            </div>

        <?php
        } else {
        ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                <?php
                    $total_sql = "SELECT SUM( amount) FROM expense";
                    $totalAmountStmt = $conn->query($total_sql);
                    $totalAmount = $totalAmountStmt->fetch_assoc()
                ?>
                    Expense List (Total Expense: <b><?=$totalAmount['SUM( amount)'].' ৳';?></b>) From - 24 Apr 2024

                    <form id="expenseFilter" action="" method="post">
                        <select name="monthAmount" id="monthAmount">
                            <option value="" required readonly disabled selected>Choose Month</option>
                            <option value="Jan">January</option>
                            <option value="Fab">February</option>
                            <option value="Mar">March</option>
                            <option value="Apr">April</option>
                            <option value="May">May</option>
                            <option value="Jun">June</option>
                            <option value="Jul">July</option>
                            <option value="Aug">August</option>
                            <option value="Sep">September</option>
                            <option value="Oct">October</option>
                            <option value="Nov">November</option>
                            <option value="Dec">December</option>
                        </select>
                        <select name="yearAmount" id="yearAmount">
                            <option required="required" value="" required readonly disabled selected>Choose Year</option>
                            <option value="24">2024</option>
                            <option value="25">2025</option>
                        </select>
                        <input type="submit" value="Filter">
                    </form>
                    <h5 id="amountShow"></h5>

<script>
    $(document).ready(function() {
    let formId = document.getElementById("expenseFilter");
    formId.addEventListener("submit", (e) => {
        e.preventDefault();
        let monthAmount = document.getElementById("monthAmount").value;
        let yearAmount = document.getElementById("yearAmount").value;
        $.ajax({
            url: "/serverit/Business/alankar/php/expenseFilter.php",
            type: "POST",
            data: {
                "monthAmount": monthAmount,
                "yearAmount": yearAmount,
            },
            success: function(data) {
                var jsonData = JSON.parse(data);
                if (jsonData.success == 1) {
                   // window.location = jsonData.success_msg;
                    document.getElementById("amountShow").innerHTML = jsonData.success_msg;
                }
            },

        });


    })

});
</script>
                </div>
                <div class="panel-body">
                    <div class="table-sorting table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tSortable22">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Amount</th>
                                    <th>Expense By</th>
                                    <th>Desciption</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM `expense` order by id desc";
                                $q = $conn->query($sql);
                                $i = 1;
                                while ($r = $q->fetch_assoc()) {
                                    echo '<tr ' . '>
                                                    <td>' . $i . '</td>
        											<td>' . $r['amount'] . ' ৳</td>
        											<td>' . $r['expense_by'] . '' . '</td>
                                                    <td>' . $r['description'] . '</td>
                                                    <td>' . date("d M y", strtotime($r['date'])) . '</td>
                                                </tr>';
                                    $i++;
                                }
                                ?>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        <?php
        }
        ?>


<script src="js/dataTable/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tSortable22').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": true
        });

    });
</script>



</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->


<!-- BOOTSTRAP SCRIPTS -->
<script src="js/bootstrap.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="js/custom1.js"></script>


</body>

</html>