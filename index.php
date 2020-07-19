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
    <style>
      a{
        text-decoration: none;
        color: #000;

      }
      a:hover{
        text-decoration: none;
        color: #696969;
      }
    </style>
</head>

<body>
    <?php include 'partials/_header.php' ?>
    <?php include 'partials/_dbconnect.php' ?>


    <!-- slider starts here -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="https://source.unsplash.com/1500x400/?coding,android" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://source.unsplash.com/1500x400/?programmers,programming"
                    alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://source.unsplash.com/1500x400/?hacking,coding" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- category container start -->
    <div class="container text-center">
        <h1 class="my-4">iDiscuss -Categories</h1>
        <div class="row">

            <!-- using for loop to iterate through categories -->

            <?php
            
              $sql = "SELECT * FROM `categories`";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result))
              {
                // echo $row['category_id']; 

                $cat = $row['category_name'];
                $id = $row['category_id'];
                $desc = $row['category_description'];
                echo '
                
                <div class="col-md-4 my-4">
                <div class="card  h-100" style="width: 18rem;">
                    <img class="card-img-top" src="https://source.unsplash.com/500x400/?'.$cat.',coding " alt="Card image cap">
                    <div class="card-body">
                        <a href="threadList.php?catid='.$id.'"><h5 class="card-title">'.$cat.'</h5></a>
                        <p class="card-text text-justify" >'.substr($desc,0,170).'...</p>
                        <a href="threadList.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
                        </div>
                    </div>
                </div>
                
                ';
              }
            ?>






            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <?php include 'partials/_footer.php' ?>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
                integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
                crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
                integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
                crossorigin="anonymous"></script>
</body>

</html>