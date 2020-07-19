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
    
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE `thread_id` = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $title = $row['thread_title'];
    $date = $row['timestamp'];
    $desc = $row['thread_desc'];
    
    ?>


<?php 
    
    $method = $_SERVER['REQUEST_METHOD'];
    // echo $method;
    $showAlert = false;
    if ($method == 'POST'){
        // insert into db
        $comment = $_POST['comment'];
        $sql = "INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES (NULL, '$comment', '$id', '0', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert){
            echo '
            
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>Successful!</strong> Your Comment has been posted.
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


        <div class="jumbotron" style="padding-bottom:-120px">
            <h1 class="display-4"><?php echo ''.$title?></h1>
            <p class="lead my-4"><?php echo ''.$desc ?></p>
            <hr class="my-4">
            <!-- <p>This is a peer to peer forum to share information</p> -->
            <!-- <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a> -->
            <p>Posted by : <b>Hruday</b></p>
            <!-- <p><b>On: <?php echo ''.$date ?></b></p> -->

        </div>



    </div>


    <div class="container">
        <h1 class="py-2">Post a Comment</h1>
        <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
            <div class="form-group">
                <label for="comment">Your solution??</label>
                <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Post Comment</button>
        </form>
    </div>

    <div class="container">

        <h1 class="py-2">Discussions</h1>

        <?php 
        
        $id = $_GET['threadid'];
        // echo $id;
        $sql = "SELECT * FROM `comments` WHERE `thread_id` = '$id'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==0){
            echo '
            <div class="alert my-4 alert-danger text-center alert-dismissible fade show" role="alert">
            <strong>Uh Oh ,No Threads found!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            
            ';
        }
        else{
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['comment_id'];
                $content = $row['comment_content'];
                $time = $row['comment_time'];
                echo '
                
                <div class="container" style="margin-top:60px;margin-bottom:100px">
        
            <div class="media container " style=" margin-bottom:10px">
                <img class="mr-3" src="img/user-default.jpg" style="width: 60px;" alt="Generic placeholder image">
                <div class="media-body">
                <p class="font-weight-bold my-0">Anonymous User</p> 
                <p class="mt-2">'.$content.'</p>
                
                </div>
                <small id="" class="form-text text-muted text-right">'.$row["comment_time"].'</small>
                </div>
                </div>
                ';
                
            
            }
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