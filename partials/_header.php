<?php 

session_start();

echo '



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="index.php">iDiscuss</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contact.php">Contact</a>
    </li>
       
  </ul>';

  if (isset($_SESSION['loggedin']) && $_SESSION == true){
    echo '
    <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success my-2 my-sm-0  mx-1" type="submit">Search</button>
    <p class="text-light align-self-center my-0 mx-3">Welcome: '.$_SESSION['useremail'].'</p>
    <a href="partials/_logout.php" class="btn btn-outline-success  mx-1 my-2 my-sm-0 logoutbtn" type="button">Log Out</a>
  </form>
  </div>
  </nav>
    
    ';
  }
  else{

    echo '

      <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success my-2 my-sm-0  mx-1" type="submit">Search</button>
    <button class="btn btn-outline-success  mx-1 my-2 my-sm-0" type="button" data-toggle="modal" data-target="#loginModal" >Login</button>
    <button class="btn btn-outline-success my-2  mx-1 my-sm-0" data-toggle="modal" type="button" data-target="#signupModal" >Signup</button>
  </form>
</div>
</nav>';
  }
  

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';

if(isset($_GET['signupsuccess'])){


  $res = $_GET['signupsuccess'];
  // echo $res;
  // echo $_GET['error'];
  if ($res == 'true'){
      echo '
  
  <div class="alert text-center alert-success alert-dismissible my-0 fade show" role="alert">
  <strong>Success!</strong> You can now login.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>

  ';
  }
  else{
      echo '
  
  <div class="alert text-center alert-danger alert-dismissible my-0 fade show" role="alert">
  <strong>Uh Oh!</strong> -> '.$_GET['error'].'.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>

  ';
  }


}

// include '_handleLogin.php';
// if(!$stat){

//   echo '
  
//   <div class="alert text-center alert-danger alert-dismissible my-0 fade show" role="alert">
//   <strong>Uh Oh!</strong> -> Wrong Credentials.
//   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//     <span aria-hidden="true">&times;</span>
//   </button>
//   </div>

//   ';


// }



// $m = $_GET['ggg'];  
// if(isset($_GET)){
  
//   if($_GET['signupsuccess'] == true){
  
//   echo '
  
//   <div class="alert text-center alert-success alert-dismissible my-0 fade show" role="alert">
//   <strong>Success!</strong> You can now login.
//   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//     <span aria-hidden="true">&times;</span>
//   </button>
//   </div>

//   ';
//   }
//   else{
//     echo '
  
//     <div class="alert alert-danger alert-dismissible fade show" role="alert">
//     <strong>Uh Oh!</strong> '.$_GET['error'].'
//     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//       <span aria-hidden="true">&times;</span>
//     </button>
//     </div>
  
//     ';
//   }
// }
// elseif (!isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == false){

       
// }
// else{

//   if(!isset($_GET)){
//     header("location: /php_learn/forums/index.php");
//   // break;
//     exit();
//   }
//   elseif($_GET['signupsuccess'] == false && $_GET['error']!=="false"){
//      echo '
  
//   <div class="alert alert-danger alert-dismissible fade show" role="alert">
//   <strong>Success!</strong> You can now login.
//   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//     <span aria-hidden="true">&times;</span>
//   </button>
//   </div>

//   ';
//   }

 




?>

