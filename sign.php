<?php
session_start();
?>
<?php
  $success=0;
  $user=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'connect.php';
  $username=$_POST['username'];
  $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
  
  $sql="select *from `users` where username='$username'";
  $result=mysqli_query($con,$sql);
  if($result){
    $num=mysqli_num_rows($result);
  if($num>0){
     $user=1;
  }
  else{
    $sql="insert into `users`(username,password) values('$username','$password')";
    $result=mysqli_query($con,$sql);
    if($result){
      $success=1;
    }
    else{
      die(mysqli_error($con));
    }
  }
}
 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous">
  <style>
     .box{
      margin:auto;
      padding:3rem;
      box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }
  </style>
  
  <title>Signup page</title>
</head>
<body>


<!-- navigationbar -->

<nav class="navbar navbar-expand-lg bg-primary border-bottom border-body" data-bs-theme="dark">
<div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.html" onclick="navigateToPage('index.html')">Home</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="login.php" onclick="navigateToPage('login.php')">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<!-- navigationend -->
  <?php
   if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry, </strong>User already exist
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
   }
   if($success){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success, </strong>You are successfully signed up    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
   }
  ?> 
  <div class="row">
  <div class="col col-lg-4 col-md-6 container mt-5 box">
    <h1 class="text-center">Sign up</h1>

  <form action="sign.php" method="post" autocomplete="off" >
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" placeholder="Enter your username">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter your password" >
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
   
  </div>
  <button type="submit" class="btn btn-primary w-100">Signup</button>
</form>
</div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>
