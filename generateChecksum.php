<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

//"orderId"       => $order_id,
//"ORDER_ID"       => $order_id,
//$order_id = "ORDER_ID_123456";
$order_id = "ORDER_ID_1234565";

//$order_id = "ORDER_ID"

$checkSum = "";
//$checkSum = "iWfyZ/KvCDbJD0aQLf7maQWNd36PAzsjNiNOcFeidRDYcC3eTGzjBeOKayxkYs9JEKxkG4nGBpfo/GgbSZdPinrBE+Kb52nuQfXDef3HXPA=";

// below code snippet is mandatory, so that no one can use your checksumgeneration url for other purpose .
$findme   = 'REFUND';
$findmepipe = '|';

$paramList = array();

$paramList["MID"] = '';
$paramList["ORDER_ID"] = '';
$paramList["CUST_ID"] = '';
$paramList["INDUSTRY_TYPE_ID"] = '';
$paramList["CHANNEL_ID"] = '';
$paramList["TXN_AMOUNT"] = '';
$paramList["WEBSITE"] = '';

foreach($_POST as $key=>$value)
{  
  $pos = strpos($value, $findme);
  $pospipe = strpos($value, $findmepipe);
  if ($pos === false || $pospipe === false) 
    {
        $paramList[$key] = $value;
    }
}

$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
echo json_encode(array("CHECKSUMHASH" => $checkSum,"ORDER_ID" => $order_id, "payt_STATUS" => "1"),JSON_UNESCAPED_SLASHES);
//echo json_encode(array("CHECKSUMHASH" => $checkSum,"ORDER_ID" => "Paytm_order_1650261516", "payt_STATUS" => "1"),JSON_UNESCAPED_SLASHES);
//echo json_encode(array("CHECKSUMHASH" => $checkSum,"ORDER_ID" => "ORDERID_98765", "payt_STATUS" => "1"),JSON_UNESCAPED_SLASHES);
//echo json_encode(array("CHECKSUMHASH" => $checkSum,"ORDER_ID" => "ORDS81270916", "payt_STATUS" => "1"),JSON_UNESCAPED_SLASHES);
// echo json_encode(array("CHECKSUMHASH" => $checkSum,"ORDER_ID" => $_POST["ORDER_ID"], "payt_STATUS" => "1"),JSON_UNESCAPED_SLASHES);

  
//Here checksum string will return by getChecksumFromArray() function.

//print_r($_POST);
 
  //Sample response return to SDK
 
//  {"CHECKSUMHASH":"mBvdzvQKrqONdR+XlBY110eUpEgoz9bSAODvais2p33Xpprn2dIVojt3HWB6f2F3Ev8PSxH5NfUOfDR+sPgJu8GiE3gy5X0wfvTYalkfdJM","ORDER_ID":"asgasfgasfsdfhl7","payt_STATUS":"1"} 
 
?>
