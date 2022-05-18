<?php
//Change the value of PAYTM_MERCHANT_KEY constant with details received from Paytm.
//define('PAYTM_MERCHANT_KEY','yxsi%sU@@53MibOZ'); 
//define('PAYTM_MERCHANT_KEY','gg1R%LE3d02LTg#d'); 
//define('PAYTM_MERCHANT_KEY','KwjGGd47920042787294'); 

//define('PAYTM_MERCHANT_KEY','phUBdn85816267299329');
//define('PAYTM_MERCHANT_KEY','gXJKzg69117446715397');
//define('PAYTM_MERCHANT_KEY','LKPHip25982739917049');

//define('PAYTM_MERCHANT_KEY','yxsi%sU@@53MibOZ');

//"orderId"  => $order_id,

//define('PAYTM_ENVIRONMENT', 'TEST'); // PROD
define('PAYTM_ENVIRONMENT', 'PROD'); // TEST

//define('PAYTM_MERCHANT_KEY', 'yxsi%sU@@53MibOZ'); //Change this constant's value with Merchant key received from Paytm.
//define('PAYTM_MERCHANT_KEY', 'gg1R%LE3d02LTg#d'); //Change this constant's value with Merchant key received from Paytm.

//define('PAYTM_MERCHANT_KEY', '&aV@#N381wM#6Q2T'); //Change this constant's value with Merchant key received from Paytm.
define('PAYTM_MERCHANT_KEY', '61owPauP__z5hAo&'); //Change this constant's value with Merchant key received from Paytm.


//define('PAYTM_MERCHANT_MID', 'phUBdn85816267299329'); //Change this constant's value with MID (Merchant ID) received from Paytm.
//define('PAYTM_MERCHANT_MID', 'gXJKzg69117446715397'); //Change this constant's value with MID (Merchant ID) received from Paytm.

//define('PAYTM_MERCHANT_MID', 'uDCgra49195416773464'); //Change this constant's value with MID (Merchant ID) received from Paytm.
define('PAYTM_MERCHANT_MID', 'DMFzHh87373541678799'); //Change this constant's value with MID (Merchant ID) received from Paytm.

//define('PAYTM_MERCHANT_WEBSITE', 'WEBSTAGING'); //Change this constant's value with Website name received from Paytm.
//define('PAYTM_MERCHANT_WEBSITE', 'APPSTAGING'); //Change this constant's value with Website name received from Paytm.
define('PAYTM_MERCHANT_WEBSITE', 'DEFAULT'); //Change this constant's value with Website name received from Paytm.


$PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatus';

//Transaction URL:-
//$PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/order/process';
//Transaction Status URL:-
//$PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/order/status';



//$PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/processTransaction';
$PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/api/v1/processTransaction?mid=phUBdn85816267299329&orderId=Paytm_order_1649936599';
$PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/api/v1/initiateTransaction?mid=phUBdn85816267299329&orderId=Paytm_order_1650261516';
//$PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/api/v1/initiateTransaction?mid=phUBdn85816267299329&orderId=$order_id';

if (PAYTM_ENVIRONMENT == 'PROD') {
	$PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
//$PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
//$PAYTM_TXN_URL='https://securegw.paytm.in/theia/api/v1/processTransaction?mid=gXJKzg69117446715397&orderId=Paytm_order_1649936599';
//$PAYTM_TXN_URL='https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=gXJKzg69117446715397&orderId=Paytm_order_1650261516';

$PAYTM_TXN_URL='https://securegw.paytm.in/theia/api/v1/processTransaction?mid=DMFzHh87373541678799&orderId=Paytm_order_1649936599';
$PAYTM_TXN_URL='https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=DMFzHh87373541678799&orderId=Paytm_order_1650261516';
//$PAYTM_TXN_URL='https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=gXJKzg69117446715397&orderId=$order_id';

}

define('PAYTM_REFUND_URL', '');
define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
define('PAYTM_TXN_URL', $PAYTM_TXN_URL);
?>
