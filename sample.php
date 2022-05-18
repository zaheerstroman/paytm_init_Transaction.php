<?php

/* import checksum generation utility */
require_once("./PaytmChecksum.php");

/* initialize an array */
$paytmParams = array();

/* add parameters in Array */
//$paytmParams["MID"] = "YOUR_MID_HERE";
//$paytmParams["MID"] = "phUBdn85816267299329";
//$paytmParams["MID"] = "gXJKzg69117446715397";

//$paytmParams["MID"] = "uDCgra49195416773464";
$paytmParams["MID"] = "DMFzHh87373541678799";

//$paytmParams["ORDERID"] = "YOUR_ORDERID_HERE";
//$paytmParams["ORDERID"] = "ORDS27837481";

$paytmParams["ORDERID"] = "180420227545";
//$paytmParams["ORDERID"] = "Paytm_order_1650274645";




/**
* Generate checksum by parameters we have
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$paytmChecksum = PaytmChecksum::generateSignature($paytmParams, 'YOUR_MERCHANT_KEY');
$verifySignature = PaytmChecksum::verifySignature($paytmParams, 'YOUR_MERCHANT_KEY', $paytmChecksum);

echo sprintf("generateSignature Returns: %s\n", $paytmChecksum);
echo sprintf("verifySignature Returns: %b\n\n", $verifySignature);

/* initialize JSON String */  
$body = "{\"mid\":\"YOUR_MID_HERE\",\"orderId\":\"YOUR_ORDER_ID_HERE\"}";

/**
* Generate checksum by parameters we have in body
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$paytmChecksum = PaytmChecksum::generateSignature($body, 'YOUR_MERCHANT_KEY');
$verifySignature = PaytmChecksum::verifySignature($body, 'YOUR_MERCHANT_KEY', $paytmChecksum);
echo sprintf("generateSignature Returns: %s\n", $paytmChecksum);
echo sprintf("verifySignature Returns: %b\n\n", $verifySignature);