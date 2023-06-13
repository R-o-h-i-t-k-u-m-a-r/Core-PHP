<?php

//This script will handle login
session_start();

//check if the user is already login or not
if(isset($_SESSION['username']))
{
  header('location: welcome.php');
  exit;
}

require_once "config.php";

$username = $password = "";
$err = "";

//if reuest menthod is post
if($_SERVER['REQUEST_METHOD']=="POST"){
  if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
  {
    $err="Please enter username + password";
  }
  else{
    $username=trim($_POST['username']);
    $password=trim($_POST['password']);
  }
  if(empty($err))
  {
    $sql="SELECT id, username, password FROM users WHERE username=?";

    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"s",$param_username);
    $param_username=$username;
    //mysqli_stmt_execute($stmt)

    //Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
      mysqli_stmt_store_result($stmt);
      if(mysqli_stmt_num_rows($stmt)==1)
      {
        mysqli_stmt_bind_result($stmt,$id,$username,$hashed_password);
        if(mysqli_stmt_fetch($stmt))
        {
          if(password_verify($password,$hashed_password))
          {
            //this means the password is correct. Allow user 
            session_start();
            $_SESSION["username"]=$username;
            $_SESSION["id"]=$id;
            $_SESSION["loggedin"]=true;

            //Redirect user to welcome page
            header("location: welcome.php");
          }
        }
      }
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In</title>
    <!-- bootstrap css link -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <!-- font awesome link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- stylesheet -->
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container d-flex align-items-center justify-content-center">
      <div class="card signin_card">
        <!-- card header -->
        <div class="card-header">
          <h3 class="text-center">Sign In</h3>
        </div>

        <!-- card body -->
        <form action="" method="post">
          <!-- first field -->
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"
              ><i class="fa-solid fa-user"></i
            ></span>
            <input
              type="text"
              class="form-control"
              placeholder="Enter your username"
              required="required"
              autocomplete="off"
              name="username"
              id="username"
              aria-describedby="basic-addon1"
            />
          </div>
          <!-- second field -->
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"
              ><i class="fas fa-key"></i
            ></span>
            <input
              type="password"
              class="form-control"
              placeholder="Enter your password"
              required="required"
              autocomplete="off"
              name="password"
              id="password"
              aria-describedby="basic-addon1"
            />
          </div>

          <!-- signup button -->
          <div class="form-group text-center">
            <input
              type="submit"
              name="signin"
              value="Sign In"
              class="btn registration_btn"
            />
          </div>
        </form>
        <!-- card footer -->
        <div class="card-footer text-center text-light signin">
          Don't have an account? <a href="index.php">Sign Up</a>
        </div>
      </div>
    </div>
  </body>
</html>
