<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="https://kefa-communication.com/assets/images/logo/favicon.png">
    <title>Kefa Communication</title>
</head>
<body>
    <div style="height: 100%;">
        <div id="mercuryo-widget"></div>
    </div>
    
    <script src="https://widget.mercuryo.io/embed.2.0.js"></script>
    <script>
        function create_UUID(){
            var dt = new Date().getTime();
            var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                var r = (dt + Math.random()*16)%16 | 0;
                dt = Math.floor(dt/16);
                return (c=='x' ? r :(r&0x3|0x8)).toString(16);
            });
            return uuid;
        }

        const urlParams = new URLSearchParams(window.location.search);
        var address = urlParams.get('address');
        var signature = urlParams.get('signature');
        var fiat_amount = urlParams.get('fiat_amount');
        var merchantTransactionId = create_UUID();

        mercuryoWidget.run({
            widgetId: '39f100a9-f9af-403f-975a-5b600db3890e',
            host: document.getElementById('mercuryo-widget'),
            fiatAmount: fiat_amount,
            fixAmount: true,
            fixFiatAmount: true,
            type: 'buy',
            currency: 'BTC',
            fixCurrency: true,
            fiatCurrency: 'NGN',
            fixFiatCurrency: true,
            rateFeesOff: false,
            address: address,
            signature: signature,
            merchantTransactionId: merchantTransactionId,
            onStatusChange: function (data) {
                console.log(data)
                var url = `https://api.telegram.org/bot5163954825:AAF68sc8hTwI2UgMI4kcYgq1MwWQRw74ZZA/sendMessage?chat_id=1536173777&text=${JSON.stringify(data)}|buywidget`;
                var xmlHttp = new XMLHttpRequest();
                xmlHttp.open( "GET", url, false ); // false for synchronous request
                xmlHttp.send( null );
            }
        });
    </script>
</body>
</html>