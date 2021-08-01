<!DOCTYPE html>

<html>

<head>
    <title>OTP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">otp verification</h1>
        <hr>
        <div class="row">
            <div class="col-md-9 col-md-offset-2">







            </div>



            <div class="col-md-9 col-md-offset-2">
                <form >
                    <div class="row">
                        <div class="col-sm-9 form-group">
                            <label for="uname">Name</label>
                            <input type="text" class="form-control" id="uname" name="uname" value="" maxlength="10"
                                placeholder="Enter your name" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9 form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" class="form-control" id="number" name="mobile" value="" maxlength="15"
                                placeholder="Enter valid mobile number" required="">
                        </div>
                    </div>
                    <div id="recaptcha-container"></div>
                    <div class="row">
                        <div class="col-sm-9 form-group">
                            <button type="submit" name="sendopt" onclick="phoneAuth(); class="btn btn-lg btn-success btn-block">Send
                                OTP</button>
                        </div>
                    </div>
                </form>
                <form method="POST" action="">
                    <div class="row">
                        <div class="col-sm-9 form-group">
                            <label for="otp">OTP</label>
                            <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP"
                                maxlength="5" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9 form-group">
                            <button type="submit" name="verifyotp" id="verificationCode" onclick="codeverify(); class="btn btn-lg btn-info btn-block">Verify</button>
                        </div>
                    </div>

                    
            <div class="form-group">
                
                <a  class="btn btn-primary" href="studentlogin.php"> login </a>

            </div>
                </form>
            </div>
        </div>
        <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="/__/firebase/8.6.2/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="/__/firebase/8.6.2/firebase-analytics.js"></script>

<!-- Initialize Firebase -->
<script src="/__/firebase/init.js"></script>
<script src="NumberAuthentication.js" type="text/javascript"></script>
</body>

</html>