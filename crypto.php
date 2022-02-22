<?php

require './utils/config.php';

if(isset($_POST['address']) && isset($_POST['amount'])) {
    $address = filter_input(INPUT_POST, 'address');
    $fiat_amount = filter_input(INPUT_POST, 'amount');
    $signature = generateSignature($address, $secret);
    $redirect = generateRedirectURL($widget_id, $address, $signature, $fiat_amount);
    header('Location: ' . $redirect);
}

function generateRedirectURL($widget_id, $address, $signature, $fiat_amount) {
    return 'buy?widget_id=' . $widget_id . '&address=' . $address . '&signature=' . $signature . '&fiat_amount=' . $fiat_amount;
}

function generateSignature($address, $secret) {
    return hash('sha512', $address . $secret);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="https://kefa-communication.com/assets/images/logo/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Kefa Communication</title>
</head>
<body style="background-color: #19194b;">
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="card" style="width: 25rem;height: 23rem;">
            <div class="card-body">
                <form class="form-group" method="POST" action="<?php echo(basename($_SERVER['REQUEST_URI']));?>">
                    <div class="row">
                        <div class="col-3">
                            <img src="https://kefa-communication.com/assets/images/logo/favicon.png" class="img-responsive" style="height:100px;width:100px;">
                        </div>
                        <div class="col-9">
                            <h2>Kefa Communication</h2>
                        </div>
                    </div>  
                    <span>Enter Amount</span>
                    <input class="form-control" type="tel" name="amount" id="amount" placeholder="Amount" required><br>
                    <span>Address</span>
                    <input class="form-control" type="text" name="address" id="address" placeholder="Address" required><br>
                    <button class="btn btn-primary col-12" type="submit">Proceed</button>
                </form>
            </div>
        </div>
    </div>
</div>  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>