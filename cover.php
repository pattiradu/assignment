<?php
    session_start();
    include"conn.php";
    $email = $_SESSION['vmail'];
    // user id

    $data = mysqli_query($conn,"SELECT * FROM `users` WHERE `email` = '$email'");
    $user = mysqli_fetch_object($data);

    // store id in vars
    $id = $user->userid;

    if (isset($_FILES['profile'])) {
        $profile = $_FILES['profile'];

        

        print $img_name = $profile['name'];
        $tmp = $profile['image'];

        

        // upload
        if (move_uploaded_file($tmp,$img_name)) {

            $exist = mysqli_query($conn,"SELECT * FROM `profile` WHERE `id` = '$id'");
            if(mysqli_num_rows($exist) == 0) {


                $sql = "INSERT INTO `profile`(`id`, `profile`) VALUES ('$id','$img_name')";

                
                mysqli_query($conn,$sql);
            } else {
                $sql = "UPDATE `profile` SET `profile`='$img_name' WHERE `id` = '$id'";
                mysqli_query($conn,$sql);
            }
            
            header('location: home.php');
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="d-flex align-items-center justify-content-center" style="height:100vh">
    <div class="border shadow-sm p-3 w-50">
        <h5 class="text-dark">Upload profile picture</h5>

        <form action="home.php" method="post" enctype="multipart/form-data">
            <label for="profile" class="btn btn-primary px-5 fw-bold">Choose file to upload</label>
            <input type="file" name="profile" class="d-none" id="profile">
            <input type="submit" value="Upload" class="btn btn-success px-5 fw-bold">
        </form>
    </div>
</body>
</html>