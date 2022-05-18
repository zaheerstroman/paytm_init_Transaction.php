<?php
//$code = $_POST['code'];
$code = "12345";

//$mid = $_POST['MID'];
//$mid = "phUBdn85816267299329";
$mid = "gXJKzg69117446715397";


//$orderid = $_POST['ORDER_ID'];
$order_id = "orderId";

//$orderid = "Paytm_order_1649936599";
//$orderId = "ORDERID_9876551";
//$orderId = "orderId";
//$orderId = "ORDER_ID";

//$amount = $_POST['AMOUNT'];
$amount = "1";

$code=   stripslashes($code);
$mid=   stripslashes($mid);
//$orderid =   stripslashes($orderid);
$order_id =   stripslashes($order_id);
$amount =   stripslashes($amount);

if($code=="12345"){
    
/*
* import checksum generation utility
* You can get this utility from https://developer.paytm.com/docs/checksum/
*/
require_once("PaytmChecksum.php");

//$Merchant_key = "yxsi%sU@@53MibOZ";
$Merchant_key = "gg1R%LE3d02LTg#d";


$paytmParams = array();

$order_id = "Paytm_order_".time();

$paytmParams["body"] = array(
    "requestType"   => "Payment",
	
//	"mid"           => "YOUR_MID_HERE",
    "mid"           => $mid,
//    "mid"         => "gXJKzg69117446715397",
	
//	"websiteName"   => "YOUR_WEBSITE_NAME",
//    "websiteName"   => "WEBSTAGING",
//	"websiteName"   => "APP_STAGING",
	"websiteName"   => "DEFAULT",

    "orderId"       => $order_id,
//    "orderId"       => "Paytm_order_1649936599",
//    "orderId"       => "150420225741",
//    "orderId"       => "ORDERID_9876551",
//    "orderId"       => "1804202275455555786568910",





	
//  "callbackUrl"   => "https://www.ariqt.com",
//	"callbackUrl"   => "http://10.11.2.122/paytm-all-in-one-completecode/paytmallinone_init_transaction/paytmallinone/generateChecksum.php",
//  "callbackUrl"   => "https://merchant.com/callback",
//	"callbackUrl"   => "https://<callback URL to be used by merchant>",
//  "callbackUrl"   => "https://securegw-stage.paytm.in/theia/paytmCallback?ORDER_ID=".$order_id,


//"callbackUrl"   => "https://securegw-stage.paytm.in/theia/paytmCallback?ORDER_ID=".$order_id,

"callbackUrl"   => "https://securegw.paytm.in/theia/paytmCallback?ORDER_ID=".$order_id,

//"callbackUrl"   => "https://securegw.paytm.in/theia/paytmCallback?ORDER_ID=1804202275455555786568910",

//"callbackUrl"   => "https://securegw.paytm.in/theia/paytmCallback?ORDER_ID="ORDERID_9876551",



    "txnAmount"     => array(
//  "value"     => $amount,
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
$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), $Merchant_key);

$paytmParams["head"] = array(
    "signature"	=> $checksum
//"signature"	=> "EpxJT2OOGpk83igboidceTI0ma2fvvc0Ahw6Vo5wt1I5CXDbVOxUuSwt18/E3WCbrqmiTbDSKfRWSBex/Cb+4/b29l13pIyZrFWbgLAeKPU="
);

$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

/* for Staging */
//$url = "https://securegw-stage.paytm.in/theia/api/v1/initiateTransaction?mid=$mid&orderId=$orderid";
//$url = "https://securegw-stage.paytm.in/theia/api/v1/initiateTransaction?mid=$mid&orderId=ORDERID_98786";
//$url = "https://securegw-stage.paytm.in/theia/api/v1/initiateTransaction?mid=YOUR_MID_HERE&orderId=ORDERID_98765";

//$url = "https://securegw-stage.paytm.in/theia/api/v1/initiateTransaction?mid=phUBdn85816267299329&Paytm_order_1649936599";
//$url = "https://securegw-stage.paytm.in/theia/api/v1/initiateTransaction?mid=phUBdn85816267299329&$order_id";



/* for Production */
// $url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=$mid&orderId=$orderid";
//$url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=$mid&orderId=ORDERID_98765";
// $url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=YOUR_MID_HERE&orderId=ORDERID_98765";

//$url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=gXJKzg69117446715397&orderId=Paytm_order_1649936599";


//$url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=gXJKzg69117446715397&150420225741";
//$url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=gXJKzg69117446715397&ORDERID_9876551";

//$url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=gXJKzg69117446715397&orderId=1804202275455555786568910";

$url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=gXJKzg69117446715397&orderId=$order_id";

//$url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=$mid&orderId=$order_id";


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json")); 
$response = curl_exec($ch);
print_r($response);
print_r($post_data); 
}
?>