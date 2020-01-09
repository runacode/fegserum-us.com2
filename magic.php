<?php
include_once('pixelcode/pixelconstants.php');
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($path) {


    case $PixelUrl: //this is the pixel-referral-cloaker url
    case $CheckoutPixelUrl:
    case $ThankYouPixelUrl:
    case $UpSellPixelUrl:
        require_once(dirname(__FILE__) . "/pixelcode/pixelcloaker.php");
        break;
    case $ActualPixelUrl:  //this is the actual pixel
        include_once(dirname(__FILE__) . "/pixelcode/actualpixel.php");
        break;
    default :
        header("HTTP/1.0 404 Not Found");

        exit;
        break;

}

?>

