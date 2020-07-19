<?php 

$showError = "false";
$showAlert = false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include '_dbconnect.php';
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];
    global $stat;
    $sql = "SELECT * FROM `users` WHERE `user_email`='$email'";
    $result = mysqli_query($conn,$sql);
    $numRows = mysqli_num_rows($result);
    if($numRows == 1){
        // $showError = "Email already in use";
        $row = mysqli_fetch_assoc($result);

        if (password_verify($pass,$row['user_pass'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['useremail'] = $email;
            echo 'Logged in'.$email;
           $stat = true;
        }
        else{
            $stat=false;
        }
        header("location: /php_learn/forums/index.php");
        // implement the wrong login attempt etc same as done with the singup thing


    }
}