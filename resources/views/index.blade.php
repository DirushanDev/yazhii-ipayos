<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="Yazhi NCC provides easy smart and secured platform for payments.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yazhi NCC Demo</title>
    
    <link rel="shortcut icon" href="{{ asset('assets/img/icon.png') }}" type="image/png" />
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://www.prepbootstrap.com/Content/shieldui-lite/dist/css/light/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Payment Details</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('ipayos.init') }}">
                        @csrf

                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
                                <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter amount" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-group col-md-12">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mobileNumber">Mobile Number</label>
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control" id="mobileNumber" name="mobileNumber" placeholder="Enter mobile number" required>
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success">Pay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
