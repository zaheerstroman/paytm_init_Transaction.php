<?php
$paytmParams = array();

$paytmParams["body"] = array(
    "requestType" => "NATIVE",
//    "mid"         => "YOUR_MID_HERE",
//    "mid"         => "phUBdn85816267299329",

//      "mid"         => "uDCgra49195416773464",
    "mid"         => "DMFzHh87373541678799",

    "orderId"     => "Paytm_order_16499365995",
//    "orderId"     => "ORDERID_98786555559",

//    "paymentMode" => "CREDIT_CARD",
	"paymentMode" => "DEBIT_CARD",
//    "cardInfo"    => "|4111111111111111|111|122032",
//    "cardInfo"    => "|4111111111111111|123|092017",

//icici
//	"cardInfo"    => "|4017043892033351|573|032028",

//sbi
	"cardInfo"    => "|6522940172639117|429|042026",

//    "authMode"    => "otp",
      "authMode"    => "otp",
//	"authMode"    => "pin",
);

$paytmParams["head"] = array(
//    "txnToken"    => "f0bed899539742309eebd8XXXX7edcf61588842333227"

    "txnToken"    => "21fb2972ba1f4da69d9c4d35108132881650439498771"


);

$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

/* for Staging */
//$url = "https://securegw-stage.paytm.in/theia/api/v1/processTransaction?mid=phUBdn85816267299329&orderId=Paytm_order_1649936599";
//$url = "https://securegw-stage.paytm.in/theia/api/v1/processTransaction?mid=uDCgra49195416773464&orderId=Paytm_order_1649936599";


/* for Production */
// $url = "https://securegw.paytm.in/theia/api/v1/processTransaction?phUBdn85816267299329&orderId=ORDERID_9878655555";
 $url = "https://securegw.paytm.in/theia/api/v1/processTransaction?DMFzHh87373541678799&orderId=Paytm_order_16499365995";


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json")); 
$response = curl_exec($ch);
print_r($response);

