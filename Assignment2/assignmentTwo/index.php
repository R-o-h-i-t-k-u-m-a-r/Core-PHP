<?php
require_once "config.php";

$username = "";
$password = "";
$confirm_password = "";
$username_err = "";
$password_err = "";
$confirm_password_err = "";

if($_SERVER['REQUEST_METHOD']=="POST"){

    //check if username is empty or not
    if(empty(trim($_POST["username"]))){
        $username_err="Username can not be blank";
    }
    else{
        $sql="SELECT id FROM users WHERE username = ?";
        $stmt=mysqli_prepare($conn,$sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt,"s",$param_username);

            //Set the value of param username
            $param_username=trim($_POST['username']);

            //Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt)==1)
                {
                  
                    $username_err="This username is already taken";
                    //echo '<script>alert("This username is already taken")</script>';
                    //header("location: index.php");
                    echo "<script>
                    alert('This username is already taken');
                    window.location.href='index.php';
                    </script>";
                }
                else{
                    $username=trim($_POST['username']);
                }
            }
            else{
              
                echo "something went wrong";
                //echo '<script>alert("Something went wrong")</script>';
                echo "<script>
alert('Something went wrong');
window.location.href='index.php';
</script>";
            }
        }
        mysqli_stmt_close($stmt);
    }

    //Check for password
    if(empty(trim($_POST['password']))){
      
        $password_err="Password can not be blank";
        //echo '<script>alert("Password can not be blank")</script>';
        echo "<script>
alert('Password can not be blank');
window.location.href='index.php';
</script>";
    }
    elseif(strlen(trim($_POST['password']))<5){
      
        $password_err="Password can not be less than 5 characters";
        //echo '<script>alert("Password can not be less than 5 charancters")</script>';
        echo "<script>
alert('Password can not be less than 5 characters');
window.location.href='index.php';
</script>";
    }
    else{
        $password=trim($_POST['password']);
    }

    //Check for confirm  password fied
    if(trim($_POST['password'])!=trim($_POST['confirm_password'])){
      
        $password_err="Passwords should match";
        //echo '<script>alert("Passwords should match")</script>';
        echo "<script>
alert('Both Passwords are not matching!!!');
window.location.href='index.php';
</script>";
    }

    //If there were no errors, go ahead and insert into the database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        $sql=" INSERT INTO users (username,password) VALUES (?,?)";

        //Preparing statement
        $stmt=mysqli_prepare($conn,$sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt,"ss",$param_username,$param_password);

            //Set these parameters
            $param_username=$username;
            $param_password=password_hash($password,PASSWORD_DEFAULT);
        }

        //Try to execute the query
        if(mysqli_stmt_execute($stmt)){
            header("location: signin.php");
        }
        else{
          
            echo "Something went wrong!!! can not redirect to Sign In page";echo '<script>alert("Something went wrong!!! can not redirect to Sign In page")</script>';
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
    
}
else{
  
  echo "Form data is not coming via post request !!!!";
  //echo '<script>alert("Form data is not coming via post request")</script>';
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Form</title>
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
      <div class="card">
        <!-- card header -->
        <div class="card-header">
          <h3 class="text-center">Sign Up</h3>
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
          <!-- third field -->
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"
              ><i class="fas fa-lock"></i
            ></span>
            <input
              type="password"
              class="form-control"
              placeholder="Confirm your password"
              required="required"
              autocomplete="off"
              name="confirm_password"
              id="confirm_password"
              aria-describedby="basic-addon1"
            />
          </div>
          <!-- signup button -->
          <div class="form-group text-center">
            <!-- <input type="submit" name="submit" id="submit" value="Sign up" class="btn registration_btn"> -->
            <button type="submit" name="submit" class="btn btn-primary">
              Sign up
            </button>
          </div>
        </form>
        <!-- card footer -->
        <div class="card-footer text-center text-light signup">
          Already have an account? <a href="signin.php">Sign In</a>
        </div>
      </div>
    </div>
  </body>
</html>
