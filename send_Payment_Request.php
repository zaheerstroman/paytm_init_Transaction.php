<?php
/*
* import checksum generation utility
* You can get this utility from https://developer.paytm.com/docs/checksum/
*/
require_once("PaytmChecksum.php");

$paytmParams = array();

$paytmParams["body"] = array(
//    "mid"             => "YOUR_MID_HERE",
    "mid"             => "phUBdn85816267299329",
//    "mid"             => "gXJKzg69117446715397",
	
//    "merchantOrderId" => 'BEKJBJK123',
  "merchantOrderId" => "180420227545",
//    "merchantOrderId" => "Paytm_order_1650274645",




    "amount"          => "1.00",
    'posId'           =>"S1234_P1235",
//    'userPhoneNo'     =>"7777777777"
    'userPhoneNo'     =>"7382714389"

);

/*
* Generate checksum by parameters we have in body
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), "YOUR_MERCHANT_KEY");

$paytmParams["head"] = array(
    "clientId"	     => 'C11',
    "version"	     => 'v1',
    "signature"	     => $checksum,
);

$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

/* for Staging */
//$url = "https://securegw-stage.paytm.in/order/sendpaymentrequest";

/* for Production */
$url = "https://securegw.paytm.in/order/sendpaymentrequest";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json")); 
$response = curl_exec($ch);
print_r($response);        

