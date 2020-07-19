<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <?php include 'partials/_header.php' ?>
    <?php include 'partials/_dbconnect.php' ?>

    <?php 
    
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE `category_id` = '$id'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)){

        $catname = $row['category_name'];
        $catdesc = $row['category_description'];



    }
    
    ?>

    <?php 
    
    $method = $_SERVER['REQUEST_METHOD'];
    // echo $method;
    $showAlert = false;
    if ($method == 'POST'){
        // insert into db
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $sql = "INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES (NULL, '$th_title', '$th_desc', '$id', '0', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert){
            echo '
            
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>Successful!</strong> Your thread has been posted, be patient until someone responds to your post.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            
            ';
        }
        // echo ''.$th_title;
    }

    ?>


    <div class="container my-4">


        <div class="jumbotron"
            style="color:white ;background-image: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(https://source.unsplash.com/1700x500/?<?php echo ''.$catname?>,programming)">
            <h1 class="display-4">Welcome to <?php echo ''.$catname?></h1>
            <p class="lead my-4"><?php echo ''.$catdesc ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum to share information</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>



    </div>

    <?php

    if(isset($_SESSION['loggedin'])){
    echo '<div class="container jumbotron">
        <h1 class="py-2">Start a Discussion</h1>


        <form action="'.$_SERVER["REQUEST_URI"].' ?>" method="post">
            <div class="form-group">
                <label for="title">Problem Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp"
                    placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">Briefly describe the problem here</small>
            </div>
            <div class="form-group">
                <label for="desc">Elaborate your concern</label>
                <textarea class="form-control" name="desc" id="desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>';
    }
    else{
        echo '
        
        <div class="alert alert-danger my-4" role="alert">
        <h4 class="alert-heading">Login to Start a discussion!</h4>
        <p>You have to login to start the discussion or post a comment, orele you wont be allowed to post any content.</p>
        <hr>
        <p class="mb-0">By loging in you accept all the rules and regulaions of the website.</p>
        </div>

        ';
    }


    ?>

    <div class="container">

        <h1 class="py-2">Browse Questions</h1>
        <!-- for loop -->

        <?php 
    
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `threads` WHERE `thread_cat_id` = '$id'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==0){
        echo '
        <div class="container" style=" margin-left:3rem">
            <div class="alert my-4 alert-danger text-center alert-dismissible fade show" role="alert">
            <strong>Uh Oh ,No Threads found!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
        </div>
        
        ';
    }
    while ($row = mysqli_fetch_assoc($result)){

        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $id = $row['thread_id'];
        echo '

        <div class="container" style="margin-top:60px;margin-bottom:100px">
        
            <div class="media " style=" margin-bottom:10px">
                <img class="mr-3" src="img/user-default.jpg" style="width: 60px;" alt="Generic placeholder image">
                <div class="media-body">
                <h5 class="mt-0"><a href="thread.php?threadid='.$id.'" class="text-dark">'.$title.'</a></h5>
                    '.$desc.'
                </div>
            </div>
        </div>
        
        
        
        
        ';


    }
    
    ?>





    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php include 'partials/_footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>