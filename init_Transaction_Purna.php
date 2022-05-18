<?php
/*
* import checksum generation utility
* You can get this utility from https://developer.paytm.com/docs/checksum/
*/

require_once("PaytmChecksum.php");

//$Merchant_key = "yxsi%sU@@53MibOZ";
//$Merchant_key = "gg1R%LE3d02LTg#d";

$paytmParams = array();

$order_id = "Paytm_order_".time();

$paytmParams["body"] = array(
    "requestType"   => "Payment",
	
//	"mid"           => "YOUR_MID_HERE",
//  "mid"           => "phUBdn85816267299329",
	"mid"           => "gXJKzg69117446715397",
	
//	"websiteName"   => "YOUR_WEBSITE_NAME",
//    "websiteName"   => "WEBSTAGING",
//	"websiteName"   => "APP_STAGING",
	"websiteName"   => "DEFAULT",


//	"ORDERID"       => $order_id,
//    "orderId"       => $orderid,

    "orderId"       => $order_id,
//   "orderId"       => "180420227545555578656",
//    "orderId"       => "Paytm_order_1650272245",


//"callbackUrl"   => "https://<callback URL to be used by merchant>",
//"callbackUrl"   => "http://10.11.2.122/paytm-all-in-one-completecode/paytmallinone_init_transaction/paytmallinone/generateChecksum.php",
//"callbackUrl"   => "https://merchant.com/callback
//"callbackUrl"   => "https://securegw-stage.paytm.in/theia/paytmCallback?ORDER_ID=".$order_id,



//"callbackUrl"   => "https://securegw.paytm.in/theia/paytmCallback?ORDER_ID="ORDERID_9876551",
//"callbackUrl" = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=gXJKzg69117446715397&orderId=$order_id",

"callbackUrl"   => "https://securegw.paytm.in/theia/paytmCallback?ORDER_ID=".$order_id,
//"callbackUrl"   => "https://securegw.paytm.in/theia/paytmCallback?orderId=".$order_id,

//"callbackUrl"   => "https://securegw.paytm.in/theia/paytmCallback?ORDER_ID=180420227545555578656",
//"callbackUrl"   => "https://securegw.paytm.in/theia/paytmCallback?orderId=1804202275455555777531234",

//"callbackUrl"   => "https://securegw.paytm.in/theia/paytmCallback?ORDER_ID=Paytm_order_1650272245",
//"callbackUrl"   => "https://www.ariqt.com",


    "txnAmount"     => array(
        "value"     => "1.00",
        "currency"  => "INR",
    ),
    "userInfo"      => array(
        "custId"    => "CUST_001",
    ),
);

/*
* Generate checksum by parameters we have in body
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/

//$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), "YOUR_MERCHANT_KEY");
//$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), "yxsi%sU@@53MibOZ");
$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), "gg1R%LE3d02LTg#d");



$paytmParams["head"] = array(
    "signature"	=> $checksum
//"signature"	=> "EpxJT2OOGpk83igboidceTI0ma2fvvc0Ahw6Vo5wt1I5CXDbVOxUuSwt18/E3WCbrqmiTbDSKfRWSBex/Cb+4/b29l13pIyZrFWbgLAeKPU="

);

$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

/* for Staging */

//$url = "https://securegw-stage.paytm.in/theia/api/v1/initiateTransaction?mid=$mid&orderId=$orderid";
//$url = "https://securegw-stage.paytm.in/theia/api/v1/initiateTransaction?mid=$mid&orderId=ORDERID_98765";
//$url = "https://securegw-stage.paytm.in/theia/api/v1/initiateTransaction?mid=YOUR_MID_HERE&orderId=ORDERID_98765";
//$url = "https://securegw-stage.paytm.in/theia/api/v1/initiateTransaction?mid=phUBdn85816267299329&orderId=$order_id";



/* for Production */
// $url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=$mid&orderId=$orderid";
//$url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=$mid&orderId=ORDERID_98765";
//$url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=gXJKzg69117446715397&orderId=ORDERID_98765";

$url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=gXJKzg69117446715397&orderId=$order_id";
//$url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=gXJKzg69117446715397&orderId=180420227545555578656";
//$url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=gXJKzg69117446715397&orderId=Paytm_order_1650272245";


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json")); 
$response = curl_exec($ch);
print_r($response);  
?>