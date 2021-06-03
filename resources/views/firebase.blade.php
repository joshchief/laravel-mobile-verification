<html>
<head>
    <title>Phone Number Authentication</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
  
<div class="container">
    <h1>Phone Number Authentication using Firebase</h1>
  
    <div class="alert alert-danger" id="error" style="display: none;"></div>
  
    <div class="card">
      <div class="card-header">
        Enter Phone Number
      </div>
      <div class="card-body">
  
        <div class="alert alert-success" id="sentSuccess" style="display: none;"></div>
  
        <form>
            <label>Phone Number:</label>
            <input type="text" id="number" class="form-control" placeholder="+234 ** **** ***">
            <div id="recaptcha-container"></div><br>
            <button type="button" class="btn btn-success" onclick="phoneSendAuth();">SendCode</button>
        </form>
      </div>
    </div>
      
    <div class="card" style="margin-top: 10px">
      <div class="card-header">
        Enter Verification code
      </div>
      <div class="card-body">
  
        <div class="alert alert-success" id="successRegsiter" style="display: none;"></div>
  
        <form>
            <input type="text" id="verificationCode" class="form-control" placeholder="Enter verification code"><br>
            <button type="button" class="btn btn-success" onclick="codeverify();">Verify code</button>
  
        </form>
      </div>
    </div>
  
</div>
  
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-analytics.js"></script>

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyCMEaFR77vfvPUzsId0uN24p-eOKusLais",
    authDomain: "laravel-mobile-verification.firebaseapp.com",
    projectId: "laravel-mobile-verification",
    storageBucket: "laravel-mobile-verification.appspot.com",
    messagingSenderId: "476996540056",
    appId: "1:476996540056:web:1bc9d21e92052e692762ed",
    measurementId: "G-4YZ19QLPS8"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>
  
<script type="text/javascript">
  
    window.onload=function () {
      render();
    };
  
    function render() {
        window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }
  
    function phoneSendAuth() {
           
        var number = $("#number").val();
          
        firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {
              
            window.confirmationResult=confirmationResult;
            coderesult=confirmationResult;
            console.log(coderesult);
  
            $("#sentSuccess").text("Message Sent Successfully.");
            $("#sentSuccess").show();
              
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
  
    }
  
    function codeverify() {
  
        var code = $("#verificationCode").val();
  
        coderesult.confirm(code).then(function (result) {
            var user=result.user;
            console.log(user);
  
            $("#successRegsiter").text("you are register Successfully.");
            $("#successRegsiter").show();
  
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }
  
</script>
  
</body>
</html>