<?php include 'conn.php';
$error=NULL;
$check=NULL;
session_start();
if (isset($_POST['submit'])) {
$email=$_POST['e'];
if (empty($email)) {
    $error="Please your email can not be empty";

    // code...
}
else{

$sel=$conn->query("SELECT * FROM users where email='$email'");
$check=mysqli_num_rows($sel);
if ($check) {
    $row=mysqli_fetch_array($sel);
    $_SESSION['uname']=$row['lname'];
    $_SESSION['vmail']=$email;
    header("location:password.php");
    // code...
}
else{

    $error="Please your email not exist";
}

}
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>index page in this assignment</title>

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<header>

   <div class="row m-0">
       <div class="col bg-danger" >
       <h2 class="text-center" style="color:white;">Assignment</h2>
       </div>
   </div> 
</header>

  <div class="d-flex justify-content-center align-center" style="height:60vh;margin-top:80px" >

      <div class="border px-4 pt-4 position-relative text-center" style="width:50vh">

<h5>Welcome Back!</h5><br>
<p class="text-center">Sign in</p>
<div class="text-center alert-danger"><?php echo $error;?></div>
    <form action="" method="POST">
    <div class="row g-1 py-1">
          <div class="col">
              <div class="position-relative">
                <input type="text" class="form-control ps-4" placeholder="Email" name="e">
            <i class="fa fa-envelope text-info position-absolute" aria="true" style="top:10px;left:5px"></i>
            </div>
           </div>
        </div>
        <div class="row g-1 py-1">
          <div class="col">
              <div class="position-relative">
              <button class="btn w-100 btn-info rounded-pill" type="submit" name="submit">NEXT</button>
            </div>
           </div>
        </div>
        <div class="row g-1 py-1">
          <div class="col">
              <div class="position-relative">
                <hr>
                <span style="margin-top:-30px; position:absolute; background:#fff;">or</span>
                
                </div>
           </div>
        </div>
        <div class="row g-1 py-1">
          <div class="col">
              <!-- Display Google sign-in button -->
              <div id="gSignIn"></div>

              <!-- Show the user profile details -->
              <div class="userContent" style="display: none;"></div> 
              
           </div>
        </div>
        <div class="row g-1 py-2">
          <div class="col">
              <div class="position-relative">
                <p class="text-start"><a href="index.php" style="text-decoration:none;" >Create account</a></p>
            </div>
           </div>
        

    </form>
 
      </div>

  </div>




<footer>

      <div class="row bg-info position-absolute bottom-0 w-100 m-0 py-2" style=" color:white;left:-1vh">
                
           <div class="col ">
            <p class="text-end">About Us</p>
           </div>
           <div class="col ">
              <p class="text-start"> Advertisement</p>
           </div>
           <div class="col ">
           <p class="text-center"> Kigali,Rwanda</p>
           </div>
        <div class="col ">
              <p class="text-end"> How search work</p>
           </div>
           <div class="col ">
             <p class="text-start" > Privacy</p>
           </div>
                
    </div>

</footer>
<script>
// Render Google Sign-in button
function renderButton() {
    gapi.signin2.render('gSignIn', {
        'scope': 'profile email',
        'width': 240,
        'height': 40,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
    });
}

// Sign-in success callback
function onSuccess(googleUser) {
    // Get the Google profile data (basic)
    //var profile = googleUser.getBasicProfile();
    
    // Retrieve the Google account data
    gapi.client.load('oauth2', 'v2', function () {
        var request = gapi.client.oauth2.userinfo.get({
            'userId': 'me'
        });
        request.execute(function (resp) {
            // Display the user details
            var profileHTML = '<h3>Welcome '+resp.given_name+'! <a href="javascript:void(0);" onclick="signOut();">Sign out</a></h3>';
            profileHTML += '<img src="'+resp.picture+'"/><p><b>Google ID: </b>'+resp.id+'</p><p><b>Name: </b>'+resp.name+'</p><p><b>Email: </b>'+resp.email+'</p><p><b>Gender: </b>'+resp.gender+'</p><p><b>Locale: </b>'+resp.locale+'</p><p><b>Google Profile:</b> <a target="_blank" href="'+resp.link+'">click to view profile</a></p>';
            document.getElementsByClassName("userContent")[0].innerHTML = profileHTML;
            
            document.getElementById("gSignIn").style.display = "none";
            document.getElementsByClassName("userContent")[0].style.display = "block";
        });
    });
}

// Sign-in failure callback
function onFailure(error) {
    alert(error);
}

// Sign out the user
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        document.getElementsByClassName("userContent")[0].innerHTML = '';
        document.getElementsByClassName("userContent")[0].style.display = "none";
        document.getElementById("gSignIn").style.display = "block";
    });
    
    auth2.disconnect();
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
        <script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
        
</body>
</html>