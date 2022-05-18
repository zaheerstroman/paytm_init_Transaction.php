import requests
import json
# import checksum generation utility
# You can get this utility from https://developer.paytm.com/docs/checksum/
import PaytmChecksum
paytmParams = dict()
paytmParams["body"] = {
#  "mid": "YOUR_MID_HERE",
#  "mid": "phUBdn85816267299329",
   "mid": "gXJKzg69117446715397",


    "fromDate": "2021-01-25T23: 59: 35+08: 00",
    "toDate": "2021-02-02T23: 59: 35+08: 00",
    "orderSearchType": "TRANSACTION",
    "orderSearchStatus": "SUCCESS",
    "pageNumber": "1",
    "pageSize": "50",
    "searchConditions": {
        "searchKey" : "VAN_ID",
        "searchValue" : "PYI3831611899004"
    }
}
# Generate checksum by parameters we have in body
# Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys
checksum = PaytmChecksum.generateSignature(json.dumps(paytmParams["body"]), "YOUR_MERCHANT_KEY")
paytmParams["head"] = {
        "signature":checksum,
        "tokenType":"CHECKSUM",
        "requestTimestamp":""
}
post_data = json.dumps(paytmParams)
# for Staging
url = "https://securegw-stage.paytm.in/merchant-passbook/search/list/order/v2"
response = requests.post(url, data = post_data, headers = {"Content-type": "application/json"}).json()
print(response)
