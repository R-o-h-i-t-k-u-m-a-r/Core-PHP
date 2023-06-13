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
     <link rel="stylesheet" type="text/css" href="public/css/style.css">
  </head>
  <body>
    <div class="container d-flex align-items-center justify-content-center">
      <div class="card">
        <!-- card header -->
        <div class="card-header">
          <h3 class="text-center">Sign Up</h3>
        </div>

        <!-- card body -->
        <form action="index.php?action=register" method="post" autocomplete="off">
          <!-- first field -->
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"
              ><i class="fa-solid fa-user"></i
            ></span>
            <input
              type="text"
              class="form-control"
              placeholder="First Name"
              required="required"
              name="firstName"
              id="firstName"
              aria-describedby="basic-addon1"
            />
          </div>
          <!-- first field -->
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"
              ><i class="fa-solid fa-user"></i
            ></span>
            <input
            type="text"
            class="form-control"
            placeholder="Last Name"
            id="lastName"
            name="lastName"
            aria-describedby="basic-addon1"
            required
            />
          </div>
          <!-- first field -->
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"
              ><i class="fa-solid fa-user"></i
            ></span>
            <input
            type="email"
            class="form-control"
            placeholder="Enter Email"
            id="email"
            name="email"
            required
            />
          </div>
          <!-- first field -->
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"
              ><i class="fa-solid fa-user"></i
            ></span>
            <input
            type="text"
            class="form-control"
            placeholder="Enter Phone"
            id="phone"
            name="phone"
            required
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
          Already have an account? <a href="index.php?action=login">Sign In</a>
        </div>
      </div>
    </div>
  </body>
</html>

