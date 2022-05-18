<?php
$paytmParams = array();

$paytmParams["body"] = array(
    "requestType" => "NATIVE",
//  "mid"         => "YOUR_MID_HERE",
//  "mid"         => "phUBdn85816267299329",
    "mid"         => "gXJKzg69117446715397",

    "orderId"     => "123555456",
//    "orderId"     => $order_id,
//  "orderId"     => "190420226104",	
//  "orderId"     => "180420227545555578656",	
//  "orderId"     => "Paytm_order_1650274645",
	
//  "paymentMode" => "CREDIT_CARD",
	"paymentMode" => "DEBIT_CARD",

//  "cardInfo"    => "|4111111111111111|111|122032",
//  "cardInfo"    => "|4111111111111111|123|092017",

//ICICI
//	"cardInfo"    => "|4017043892033351|573|032028",

//SBI
	"cardInfo"    => "|6522940172639117|429|042026",

    "authMode"    => "otp",
//	"authMode"    => "pin",
);

$paytmParams["head"] = array(
//  "txnToken"    => "f0bed899539742309eebd8XXXX7edcf61588842333227"
    "txnToken"    => "f02bb060b02d4e3e8543c33c8a1be8541650439261145"
);

$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

/* for Staging */
//$url = "https://securegw-stage.paytm.in/theia/api/v1/processTransaction?mid=phUBdn85816267299329&orderId=Paytm_order_1649936599";

/* for Production */

$url = "https://securegw.paytm.in/theia/api/v1/processTransaction?mid=gXJKzg69117446715397&orderId=123555456";

//$url = "https://securegw.paytm.in/theia/api/v1/processTransaction?mid=gXJKzg69117446715397&orderId=$order_id";
//$url = 'https://securegw.paytm.in/theia/api/v1/processTransaction?mid=gXJKzg69117446715397&orderId=$order_id';

//$url = 'https://securegw.paytm.in/theia/api/v1/processTransaction?mid=gXJKzg69117446715397&orderId=.$order_id';
//$url = "https://securegw.paytm.in/theia/api/v1/processTransaction?mid=gXJKzg69117446715397&orderId=.$order_id";

//$url = "https://securegw.paytm.in/theia/api/v1/processTransaction?mid=gXJKzg69117446715397&orderId=".$order_id;
//$url = 'https://securegw.paytm.in/theia/api/v1/processTransaction?mid=gXJKzg69117446715397&orderId='.$order_id;

//$url = "https://securegw.paytm.in/theia/api/v1/processTransaction?mid=gXJKzg69117446715397&orderId=Paytm_order_1650274645";
//$url = "https://securegw.paytm.in/theia/api/v1/processTransaction?mid=gXJKzg69117446715397&orderId=180420227545555578656";
//$url = "https://securegw.paytm.in/theia/api/v1/processTransaction?mid=gXJKzg69117446715397&orderId=190420226104";
//$url = "https://securegw.paytm.in/theia/api/v1/processTransaction?mid=gXJKzg69117446715397&ORDER_ID=190420226104";





$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json")); 
$response = curl_exec($ch);
print_r($response);

