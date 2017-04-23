<?php
require('blockspring.php');
$username = $_GET['username'];
$res = Blockspring::runParsed("get-a-users-latest-tweets", array("username" => $username), array("api_key" => "br_59842_677f27518f86b714edc3035e3b1833f7bf776b4b"));
$str = $res->params;
$sum = $str["tweets"];
$par = $sum[0];
$text = $par["text"];
echo $text;
?>