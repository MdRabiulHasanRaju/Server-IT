<?php
$start = microtime(true);

require_once("cacheFunction.php");

$page = "main.php";

$cacheMaxAge = 86400;

$cacheData = cacheRead($page, $cacheMaxAge, true);

if($cacheData != NULL){
    echo $cacheData;
    // die;
}else{
    ob_start();

    include($page);

    $page_content = ob_get_contents();

    cacheWrite($page, $page_content);

    ob_end_flush();
}

echo "<p>Execution Time : ".round(microtime(true) - $start, 3)."</p>";

?>