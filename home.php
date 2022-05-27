<?php 
session_start();


 if (!isset($_SESSION['userid'])) {
    header('location:backemail.php'); 
 }

  require "conn.php";
 
$email = $_SESSION['vmail'];
// user id
$data = mysqli_query($conn,"SELECT * FROM `users` WHERE `email` = '$email'");
$user = mysqli_fetch_object($data);
// store id in vars
$id = $user->userid;

$img = mysqli_query($conn,"SELECT * FROM `profile` WHERE `id` = '$id'");
$profile = mysqli_fetch_object($img);
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

        <style type="text/css">
            body{
                background-color: rgba(82, 80, 80, 0.107);
            }
            .image{
                width: 120vh;
                height: 20vh;
                margin-left:-2vh;
            }
            .profile{
                border-radius: ;
            }
        </style>

</head>
<body>
<header>

   <div class="row m-0">
       <div class="col bg-danger" >
       <h2 class="text-center" style="color:white;">Assignment</h2>
       </div>
             <div class="dropdown d-flex justify-content-end align-end " style="top:-40px">
        <button class="btn btn-secondary dropdown-toggle rounded-circle" type="button" id="triggerId" data-bs-toggle="dropdown">
            Me
        </button>
          
       <div class="dropdown-menu">
            <a class="dropdown-item" href="logout.php">Logout</a>
            <a class="dropdown-item disabled" href="#">Back</a>
           
        </div>
   </div> 
</header>


<center >

<div class="row "  >
    <div class="col-md-8 bg-white" style="width:120vh;top:0vh;margin-left:15vh;height: 70vh;">
        <div class="row">
           <div class="col">


            <a href="cover.php"><img src="image\cover.jpg" class="image"></a>
             <div class="position-absolute d-flex" style="padding-left: 4vh; top: 90px;"> 
                    <a href="cover.php">
                        <img class="rounded-circle z-depth-2 border-3 border" style="width: 145px;" src="new.jpg" >
                    </a>
                
                </div>




        </div>
        <div class="col">
            <div>
           <b class="position-absolute text-start " style="left: 14vh;"> headline</b>
          
           
       </div>

            <!-- php for updating the headline from database -->

            <?php 
        include('conn.php');

        $select=mysqli_query($conn,"SELECT * FROM headline");
        if ($select) {

            while ($row=mysqli_fetch_assoc($select)) {
                $id=['id'];
                $headline=$row['headline'];
                ?>
                <h4 class="position-absolute text-start " style="top:40vh;"><?php print $headline; ?></h4>
            <a href="updatehead.php?updateid=<?php echo $row['id']; ?>"> 
               <i class="fa fa-pencil text-dark  position-absolute" aria="true" style="top:200px;left:30vh;"></i></a>

                <?php
            
                
            }

        
        }

            ?>
        </div>

        <div class="col">
            </div>
            
        </div>
    </div>
    <div class="col-md-4">
        
        <div class="col text-center border border-top border-info bg-white" style="width: 65vh;" ><h6 class="text-info bg-white"  > Account Settings</h6></div>
         <div class=" col position-relative bg-white border border-top border-info" style="width: 65vh;">
                <a class="dropdown-item ps-4 text-start bg-white" href="#" >Edit Profile</a>
            <i class="fa fa-pencil text-info position-absolute" aria="true" style="top:10px;left:5px;"></i>
            </div>

             <div class=" col position-relative bg-white border border-top border-info" style="width: 65vh;">
                <a class="dropdown-item ps-4 text-start bg-white" href="changepass.php" >Change password</a>
            <i class="fa fa-key text-info position-absolute" aria="true" style="top:10px;left:5px;"></i>
            </div>
            <div class="col position-relative bg-white border border-top border-info" style="width: 65vh;">
                <a class="dropdown-item ps-4 text-start" href="#" >Sign in Activities</a>
            <i class="fa fa-activity text-info position-absolute" aria="true" style="top:10px;left:5px"></i>
            </div>

            <div class="col position-relative bg-white border border-top border-info" style="width: 65vh;">
                <a class="dropdown-item ps-4 text-start" href="#" >Session Timeout</a>
            <i class="fa fa-timeout text-info position-absolute" aria="true" style="top:10px;left:5px"></i>
            </div>
            <div class="col position-relative bg-white border border-top border-info" style="width: 65vh;">
                <a class="dropdown-item ps-4 text-start " href="#" >Memolisation</a>
            <i class="fa fa-memorial text-info position-absolute" aria="true" style="top:10px;left:5px"></i>
            </div>
            <div class="col position-relative bg-white border border-top border-info" style="width: 65vh;">
                <a class="dropdown-item ps-4 text-start " href="#" >Job Feed Contents</a>
            <i class="fa fa-job text-info position-absolute" aria="true" style="top:10px;left:5px"></i>
            </div>
            <div class="col position-relative bg-white border border-top border-info" style="width: 65vh;">
                <a class="dropdown-item ps-4 text-start " href="#" >Email & SMS Notifications</a>
            <i class="fa fa-envelope text-info position-absolute" aria="true" style="top:10px;left:5px"></i>
            </div>
            <div class="col position-relative bg-white border border-top border-info" style="width: 65vh;">
                <a class="dropdown-item ps-4 text-start" href="#" >Push Notifications</a>
            <i class="fa fa-notification text-info position-absolute" aria="true" style="top:10px;left:5px"></i>
            </div>
            <div class="col position-relative bg-white border border-top border-info" style="width: 65vh;">
                <a class="dropdown-item ps-4 text-start" href="#" >Delete My Account</a>
            <i class="fa fa-delete text-info position-absolute" aria="true" style="top:10px;left:5px"></i>
            </div>
    </div>


</div>


  
     
      
  </center>




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


//show password

function show() {
  var x = document.getElementById("view");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}



// Render Google Sign-in button
function renderButton() {
    gapi.signin2.render('gSignIn', {
        'scope': 'profile email',
        'width': 290,
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