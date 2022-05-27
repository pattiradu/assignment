<?php 
session_start();
 if (!isset($_SESSION['userid'])) {
    header('location:backemail.php');
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


        <style type="text/css">
            body{
                background-color: rgba(82, 80, 80, 0.107);
            }
        </style>

</head>
<body >
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
            <a class="dropdown-item " href="home.php">Back_home_page</a>
           
        </div>
   </div> 
</header>


<center>

<div class="row " >
    <div class="col-md-8 bg-white" style="width:110vh;top:0vh;margin-left:30vh;height: 75vh;">
        <div class="col">
            cover image
       

        <form method="POST" action="cover.php" id="wraper">        

            <input type="file" name="cover" value="" /><br>

                <button type="submit" name="uploadfile">

                UPLOAD

                </button>


        </form>



        </div>
        <div class="col">
            <hr>
            <div class="text-start">
           <b > headline</b>
          
           
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
                <h4 class="text-start"><?php print $headline; ?></h4>
            <a href="updatehead.php?updateid=<?php echo $row['id']; ?>"> 
               <i class="fa fa-pencil text-dark  position-absolute" aria="true" style="top:202px;left:45vh;"></i></a>

                <?php
            
                
            }

        
        }

            ?>
        </div>


        <div class="col-md-6 border">
            <div class="row">
                
            <div class="col position-relative bg-info" style="width: vh;left: -27vh;border-bottom: red;">
                <a class="dropdown-item ps-4 text-start bg-info text-white" style="width: 108vh;left: vh;border-bottom: red;">Change password</a>
            <i class="fa fa-key text-white position-absolute" aria="true" style="top:10px;left:5px;"></i>
            </div>

            <form method="POST" action="setnewpass.php">
                   
              <div  class="col position-absolute"style="width:60vh;left:60vh;top:55vh">
                <label  class="position-absolute " style="left: -25vh;top: vh;">Current Pasword</label>
                <input type="password" class="form-control ps-4" placeholder="Password" name="cp">

            
            </div>
        
               
              <div class="col position-absolute " style="width:60vh;left: 60vh;top: 64vh;">
                <label  class="position-absolute " style="left: -25vh;top: vh;">New Password</label>
                <input type="password" class="form-control ps-4" placeholder="Password" name="np" id="view">
            <i class="fa fa-key text-info position-absolute"   aria="true" aria="true" style="top:2vh;left:1vh"></i>
            <i class="fa fa-eye pull-right text-info position-absolute" onclick="show()"  aria="true" style="top:10px;right:5px"></i>

            <input type="checkbox"  name=" " class="position-absolute" style="left:0vh ;top: 9vh;">
            <p class="position-absolute " style="top: 8vh;left:3vh">Remind me to change password for each 3 months</p>
            </div>
                 <div class="col position-absolute">
            <button class="col btn btn-outline-white bg-info text-white position-absolute" style="width:30vh;top:30vh;left:30vh" name="sumbit">Set New Password</button>
              </div>
       
                </div>
            </form>
          
        </div>
    </div>
    <div class="col-md-4">
        
        <div class="col text-center border border-top border-info bg-white" style="width: 65vh;" ><h6 class="text-info bg-white"  > Account Settings</h6></div>
         <div class=" col position-relative bg-white border border-top border-info" style="width: 65vh;">
                <a class="dropdown-item ps-4 text-start bg-white" href="#" >Change password</a>
            <i class="fa fa-key text-info position-absolute" aria="true" style="top:10px;left:5px;"></i>
            </div>

             <div class="col position-relative bg-white border border-top-3 border-info " style="width: 65vh;">
                <a class="dropdown-item ps-4 text-start" href="#" >Change Profile</a>
            <i class="fa fa-user text-info position-absolute" aria="true" style="top:10px;left:5px"></i>
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




<!-- <footer>

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

</footer> -->
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