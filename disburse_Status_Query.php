<?php
/*
* import checksum generation utility
* You can get this utility from https://developer.paytm.com/docs/checksum/
*/
require_once("PaytmChecksum.php");

$paytmParams = array();

//$paytmParams["orderId"] = "ORDERID_98765";

$paytmParams["orderId"] = "180420227545";
//$paytmParams["orderId"] = "Paytm_order_1650274645";

$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

/*
* Generate checksum by parameters we have in body
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$checksum = PaytmChecksum::generateSignature($post_data, "YOUR_MERCHANT_KEY");

//$x_mid      = "YOUR_MID_HERE";
//$x_mid      = "phUBdn85816267299329";
$x_mid      = "gXJKzg69117446715397";


$x_checksum = $checksum;

/* for Staging */
//$url = "https://dashboard.paytm.com/bpay/api/v1/disburse/order/query";

/* for Production */
 $url = "https://dashboard.paytm.com/bpay/api/v1/disburse/order/query";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "x-mid: " . $x_mid, "x-checksum: " . $x_checksum)); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$response = curl_exec($ch);
print_r($response);

