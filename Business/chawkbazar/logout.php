<?php

ob_start();
session_start();
unset($_SESSION['chawkbazar_name']);
unset($_SESSION['chawkbazar_uid']);
unset($_SESSION['chawkbazar_username']);
echo '<script type="text/javascript">window.location="login.php"; </script>';


?>