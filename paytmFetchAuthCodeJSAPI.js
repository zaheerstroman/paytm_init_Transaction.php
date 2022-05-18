function ready(callback) {
    if (window.JSBridge) {
        callback && callback();
    } else {
        document.addEventListener('JSBridgeReady', callback, false);
    }
}

ready(function () {
    JSBridge.call('paytmFetchAuthCode', {
	
//        clientId: "/*your reqClient ID*/"
          clientId: "e2922b0d1a484657be78c9b6f9ada10a"
    }, function (result) {
        console.log(JSON.stringify(result))
    });
});
