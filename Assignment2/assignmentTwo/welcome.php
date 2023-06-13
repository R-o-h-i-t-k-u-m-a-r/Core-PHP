<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
    header("location: signin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
      integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Frontend Bootcamp</title>
    <style>
      body::before {
        display: block;
        content: "";
        height: 60px;
      }
      @media (min-width: 768px) {
        .news-input {
          width: 50%;
        }
      }
    </style>
  </head>
  <body>
    <!-- Nabbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
      <div class="container">
        <!-- <a href="#" class="navbar-brand">Frontend Bootcamp</a> -->
        <span class="navbar-brand mb-0 h1">
        <?php
          echo "Welcome ", ucfirst($_SESSION['username']);
        ?>
        </span>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navmenu"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="#learn" class="nav-link">What You'll Learn</a>
            </li>
            <li class="nav-item">
              <a href="#questions" class="nav-link">Questions</a>
            </li>
            <li class="nav-item">
              <a href="#instructors" class="nav-link">Instructors</a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Showcase -->
    <section
      class="bg-dark text-light p-5 pt-lg-5 p-lg-0 text-center text-sm-start"
    >
      <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
            <h1>Become a <span class="text-warning">Web Developer</span></h1>
            <p class="lead my-4">
              We focus on teaching our students the fundamentals of the latest
              and greatest technologies to prepare them for their first dev role
            </p>
            <button
              class="btn btn-primary btn-lg"
              data-bs-toggle="modal"
              data-bs-target="#enroll"
            >
              Start The Enrollments
            </button>
          </div>
          <img
            class="img-fluid w-50 d-none d-sm-block"
            src="img/showcase.svg"
            alt=""
          />
        </div>
      </div>
    </section>

    <!-- Modal -->
    <!-- <div class="modal fade" id="enroll" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="enrollLabel">Modal title</h5>
          <button type="button" class="tn-close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> -->

    <!-- Newsletter -->
    <section class="bg-primary text-light p-5">
      <div class="container">
        <div class="d-md-flex justify-content-between align-items-center">
          <h3 class="mb-3 mb-md-0">Sign Up For Our Newsletter</h3>

          <div class="input-group new-input">
            <input type="text" class="form-control" placeholder="Enter Email" />
            <div class="input-group-append">
              <button class="btn btn-dark btn-lg" type="button">Button</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Boxes -->
    <section class="p-5">
      <div class="container">
          <div class="row text-center g-4">
              <div class="col-md">
                  <div class="card bg-dark text-light">
                      <div class="card-body text-center">
                          <div class="h1 mb-3">
                              <i class="bi bi-laptop"></i>
                          </div>
                          <h3 class="card-title mb-3">Virtual</h3>
                          <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident beatae commodi quas quod!</p>
                          <a href="#" class="btn btn-primary">Read More</a>
                      </div>
                  </div>
              </div>
              <div class="col-md">
                  <div class="card bg-secondary text-light">
                      <div class="card-body text-center">
                          <div class="h1 mb-3">
                              <i class="bi bi-person-square"></i>
                          </div>
                          <h3 class="card-title mb-3">Virtual</h3>
                          <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident beatae commodi quas quod!</p>
                          <a href="#" class="btn btn-primary">Read More</a>
                      </div>
                  </div>
              </div>
              <div class="col-md">
                  <div class="card bg-dark text-light">
                      <div class="card-body text-center">
                          <div class="h1 mb-3">
                              <i class="bi bi-people"></i>
                          </div>
                          <h3 class="card-title mb-3">Virtual</h3>
                          <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident beatae commodi quas quod!</p>
                          <a href="#" class="btn btn-primary">Read More</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

    <!-- Learn Sections -->
    <section class="p-5" id="learn">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-md">
            <img src="img/fundamentals.svg" alt="" class="img-fluid" />
          </div>

          <div class="col-md p-5">
            <h2>Learn The Fundamentals</h2>
            <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit.
              Aspernatur consequuntur ipsam illo aliquam facere mollitia.
            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Doloremque officiis architecto, quasi, itaque debitis cupiditate
              delectus provident mollitia blanditiis vel cumque ipsam animi
              aliquid sunt placeat maiores, ex numquam officia.
            </p>
            <a href="#" class="btn btn-light mt-3">
              <i class="bi bi-chevron-right"></i>
              Read More
            </a>
          </div>
        </div>
      </div>
    </section>
    <section class="p-5 bg-dark text-light" id="learn">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-md">
            <img src="img/react.svg" alt="" class="img-fluid" />
          </div>

          <div class="col-md p-5">
            <h2>Learn The Fundamentals</h2>
            <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit.
              Aspernatur consequuntur ipsam illo aliquam facere mollitia.
            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Doloremque officiis architecto, quasi, itaque debitis cupiditate
              delectus provident mollitia blanditiis vel cumque ipsam animi
              aliquid sunt placeat maiores, ex numquam officia.
            </p>
            <a href="#" class="btn btn-light mt-3">
              <i class="bi bi-chevron-right"></i>
              Read More
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Question Accordion -->
    <section id="questions" class="p-5">
      <div class="container">
          <h2 class="text-center mb-4">Frequently Asked Questions</h2>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Accordion Item #1
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Accordion Item #2
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Accordion Item #3
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
              </div>
            </div>
          </div>
            
      </div>
  </section>
    <!-- Instructors -->
    <section id="instructors" class="p-5 bg-primary">
      <div class="container">
        <h2 class="text-center text-white">Our Instructor</h2>
        <p class="lead text-center text-white mb-5">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Impedit
          corporis mollitia, eius dolores aspernatur dolor.
        </p>
        <div class="row g-4">
          <div class="col-md-6 col-lg-3">
            <div class="card bg-light">
              <div class="card-body text-center">
                <img
                  src="https://randomuser.me/api/portraits/men/11.jpg"
                  class="rounded-circle mb-3"
                  alt=""
                />
                <div class="card-title mb-3">John Doe</div>
                <p class="card-text">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam
                  ipsa doloribus et cupiditate, facere quos?
                </p>
                <a href="#">
                  <i class="bi bi-twitter text-dark mx-1"></i>
                </a>
                <a href="#">
                  <i class="bi bi-facebook text-dark mx-1"></i>
                </a>
                <a href="#">
                  <i class="bi bi-linkedin text-dark mx-1"></i>
                </a>
                <a href="#">
                  <i class="bi bi-instagram text-dark mx-1"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="card bg-light">
              <div class="card-body text-center">
                <img
                  src="https://randomuser.me/api/portraits/men/11.jpg"
                  class="rounded-circle mb-3"
                  alt=""
                />
                <div class="card-title mb-3">John Doe</div>
                <p class="card-text">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam
                  ipsa doloribus et cupiditate, facere quos?
                </p>
                <a href="#">
                  <i class="bi bi-twitter text-dark mx-1"></i>
                </a>
                <a href="#">
                  <i class="bi bi-facebook text-dark mx-1"></i>
                </a>
                <a href="#">
                  <i class="bi bi-linkedin text-dark mx-1"></i>
                </a>
                <a href="#">
                  <i class="bi bi-instagram text-dark mx-1"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="card bg-light">
              <div class="card-body text-center">
                <img
                  src="https://randomuser.me/api/portraits/men/11.jpg"
                  class="rounded-circle mb-3"
                  alt=""
                />
                <div class="card-title mb-3">John Doe</div>
                <p class="card-text">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam
                  ipsa doloribus et cupiditate, facere quos?
                </p>
                <a href="#">
                  <i class="bi bi-twitter text-dark mx-1"></i>
                </a>
                <a href="#">
                  <i class="bi bi-facebook text-dark mx-1"></i>
                </a>
                <a href="#">
                  <i class="bi bi-linkedin text-dark mx-1"></i>
                </a>
                <a href="#">
                  <i class="bi bi-instagram text-dark mx-1"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="card bg-light">
              <div class="card-body text-center">
                <img
                  src="https://randomuser.me/api/portraits/men/11.jpg"
                  class="rounded-circle mb-3"
                  alt=""
                />
                <div class="card-title mb-3">John Doe</div>
                <p class="card-text">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam
                  ipsa doloribus et cupiditate, facere quos?
                </p>
                <a href="#">
                  <i class="bi bi-twitter text-dark mx-1"></i>
                </a>
                <a href="#">
                  <i class="bi bi-facebook text-dark mx-1"></i>
                </a>
                <a href="#">
                  <i class="bi bi-linkedin text-dark mx-1"></i>
                </a>
                <a href="#">
                  <i class="bi bi-instagram text-dark mx-1"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact & Map -->
    <section class="p-5">
      <div class="container">
        <div class="row g-4">
          <div class="col-md">
            <h2 class="text-center mb-4">Contact Info</h2>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="p-5 bg-dark text-white text-center position-relative">
      <div class="container">
        <p class="lead">Copyright &copy; 2021 Frontend Bootcamp</p>

        <a href="#" class="position-absolute bottom-0 end-0 p-5">
          <i class="bi bi-arrow-up-circle h1"></i>
        </a>
      </div>
    </footer>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
