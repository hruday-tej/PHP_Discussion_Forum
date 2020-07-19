<?php 

$showError = "false";
$showAlert = false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include '_dbconnect.php';
    $user_email = $_POST['signupEmail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];

    // check wheter the user already exists or not
    $existSql = "SELECT * FROM `users` WHERE `user_email` = '$user_email'";
    $result = mysqli_query($conn ,$existSql);
    $numRows= mysqli_num_rows($result);

    if($numRows > 0){
        $showError = "Email already in use";

    }
    else{
        if ($pass == $cpass){
            $hash = password_hash($pass,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `timestamp`) VALUES (NULL, '$user_email', '$hash', current_timestamp())";
            $result = mysqli_query($conn ,$sql);
            if($result){
                $showAlert = true;
                header("location: /php_learn/forums/index.php?signupsuccess=true");
                exit();
            }


        }
        else{
            $showError = "Passwords donot match";
            // header("location: ../index.php?signupsuccess=false");
        }
    }
    header("location: ../index.php?signupsuccess=false&error=".$showError);
}

?>