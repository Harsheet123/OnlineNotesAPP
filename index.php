<?php
session_start();
include('connectionn.php');
//logout
include('logout.php');
//remember me
include('rememberme.php');
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Online notes</title>
  <link rel="stylesheet" href="styling.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <style>
    html {
      position: relative;
      min-height: 100%;
    }

    /*Background Image*/
    body {
      font-family: Arvo, serif;
    background: url("b.jpg") no-repeat center center;
    background-attachment: fixed;
    background-size: 100% 100%;
    margin: 0;
    padding: 0;
    
    
    }

    /*Style Jumbotron*/
    .jumbotron {
      background-color: transparent;
      text-align: center;
      letter-spacing: 2.5px;
      padding: 10px;
      margin-top: 150px;
    }

    /*buttons*/
    .signup {
      margin-top: 50px;
    }

    .green {
      background-color: rgba(114, 190, 35, 0.8);
    }

    .green:hover {
      background-color: rgb(114, 190, 35);
    }

    /*Style the footer*/
    .footer {
      position: absolute;
      bottom: 0;
      text-align: center;
      width: 100%;
      padding-top: 10px;
    }


    .navbar-expand-lg,
    .footer {
      background-color: #62aacf;
      border-color: #499cc7;
      background-image: -webkit-gradient(linear, left 0%, left 100%, from(#89bfdb), to(#62aacf));
      background-image: -webkit-linear-gradient(top, #89bfdb, 0%, #62aacf, 100%);
      background-image: -moz-linear-gradient(top, #89bfdb 0%, #62aacf 100%);
      background-image: linear-gradient(to bottom, #89bfdb 0%, #62aacf 100%);
      background-repeat: repeat-x;
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff89bfdb', endColorstr='#ff62aacf', GradientType=0);
    }

    .navbar-expand-lg .navbar-brand {
      color: #ffffff;
    }

    .navbar-expand-lg .navbar-brand:hover,
    .navbar-expand-lg .navbar-brand:focus {
      color: #e6e6e6;
      background-color: transparent;
    }

    .navbar-expand-lg .navbar-text {
      color: #ffffff;
    }

    .navbar-expand-lg .navbar-nav>li:last-child>a {
      border-right: 1px solid #499cc7;
    }

    .navbar-expand-lg .navbar-nav>li>a {
      color: #ffffff;
      border-left: 1px solid #499cc7;
    }

    .navbar-expand-lg .navbar-nav>li>a:hover,
    .navbar-expand-lg .navbar-nav>li>a:focus {
      color: #c0c0c0;
      background-color: transparent;
    }

    .navbar-expand-lg .navbar-nav>.active>a,
    .navbar-expand-lg .navbar-nav>.active>a:hover,
    .navbar-expand-lg .navbar-nav>.active>a:focus {
      color: #c0c0c0;
      background-color: #499cc7;
      background-image: -webkit-gradient(linear, left 0%, left 100%, from(#499cc7), to(#70b1d3));
      background-image: -webkit-linear-gradient(top, #499cc7, 0%, #70b1d3, 100%);
      background-image: -moz-linear-gradient(top, #499cc7 0%, #70b1d3 100%);
      background-image: linear-gradient(to bottom, #499cc7 0%, #70b1d3 100%);
      background-repeat: repeat-x;
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff499cc7', endColorstr='#ff70b1d3', GradientType=0);
    }

    .navbar-expand-lg .navbar-nav>.disabled>a,
    .navbar-expand-lg .navbar-nav>.disabled>a:hover,
    .navbar-expand-lg .navbar-nav>.disabled>a:focus {
      color: #cccccc;
      background-color: transparent;
    }

    .navbar-expand-lg .navbar-toggle {
      border-color: #dddddd;
    }

    .navbar-expand-lg .navbar-toggle:hover,
    .navbar-expand-lg .navbar-toggle:focus {
      background-color: #dddddd;
    }

    .navbar-expand-lg .navbar-toggle .icon-bar {
      background-color: #cccccc;
    }

    .navbar-expand-lg .navbar-collapse,
    .navbar-expand-lg .navbar-form {
      border-color: #479bc7;
    }

    .navbar-expand-lg .navbar-nav>.dropdown>a:hover .caret,
    .navbar-expand-lg .navbar-nav>.dropdown>a:focus .caret {
      border-top-color: #c0c0c0;
      border-bottom-color: #c0c0c0;
    }

    .navbar-expand-lg .navbar-nav>.open>a,
    .navbar-expand-lg .navbar-nav>.open>a:hover,
    .navbar-expand-lg .navbar-nav>.open>a:focus {
      background-color: #499cc7;
      color: #c0c0c0;
    }

    .navbar-expand-lg .navbar-nav>.open>a .caret,
    .navbar-expand-lg .navbar-nav>.open>a:hover .caret,
    .navbar-expand-lg .navbar-nav>.open>a:focus .caret {
      border-top-color: #c0c0c0;
      border-bottom-color: #c0c0c0;
    }

    .navbar-expand-lg .navbar-nav>.dropdown>a .caret {
      border-top-color: #ffffff;
      border-bottom-color: #ffffff;
    }

    @media (max-width: 767) {
      .navbar-expand-lg .navbar-nav .open .dropdown-menu>li>a {
        color: #ffffff;
      }

      .navbar-expand-lg .navbar-nav .open .dropdown-menu>li>a:hover,
      .navbar-expand-lg .navbar-nav .open .dropdown-menu>li>a:focus {
        color: #c0c0c0;
        background-color: transparent;
      }

      .navbar-expand-lg .navbar-nav .open .dropdown-menu>.active>a,
      .navbar-expand-lg .navbar-nav .open .dropdown-menu>.active>a:hover,
      .navbar-expand-lg .navbar-nav .open .dropdown-menu>.active>a:focus {
        color: #c0c0c0;
        background-color: #499cc7;
      }

      .navbar-expand-lg .navbar-nav .open .dropdown-menu>.disabled>a,
      .navbar-expand-lg .navbar-nav .open .dropdown-menu>.disabled>a:hover,
      .navbar-expand-lg .navbar-nav .open .dropdown-menu>.disabled>a:focus {
        color: #cccccc;
        background-color: transparent;
      }
    }

    .navbar-expand-lg .navbar-link {
      color: #ffffff;
    }

    .navbar-expand-lg .navbar-link:hover {
      color: #c0c0c0;
    }

    .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      background-color: red;
      color: white;
      text-align: center;
    }
  </style>
  <link rel="stylesheet" href="notes/styling.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">OnlineNotes</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="help.php">Help</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="contact.php">Contact Us</a>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">

          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#loginModal" data-bs-toggle="modal">Login</a>
          </li>
         
        </ul>

      </div>
    </div>
  </nav>
  <!-- jumbotron -->
  <div class="jumbotron" id="mycontainer">
    <h1 class="display-4">Online Notes App </h1>
    <p>Your Notes with you wherever you go.</p>
    <p>Easy to use, protects all your notes!</p>

    <button type="button" class="btn btn-lg green signup" data-bs-target="#signupModal" data-bs-toggle="modal">Sign
      up-It's free</button>

  </div>
  <!--Login form-->
  <form method="post" id="loginform">
    <div class="modal" id="loginModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">


          <div class="modal-header">
            <h4 id="myModalLabel">
              Login:
            </h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

            </button>
          </div>



          <div class="modal-body">

            <!--Login message from PHP file-->
            <div id="loginmessage"></div>


            <div class="form-group">
              <label for="loginemail" class="sr-only">Email:</label>
              <input class="form-control" type="email" name="loginemail" id="loginemail" placeholder="Email"
                maxlength="50">
            </div>
            <div class="form-group">
              <label for="loginpassword" class="sr-only">Password</label>
              <input class="form-control" type="password" name="loginpassword" id="loginpassword" placeholder="Password"
                maxlength="30">
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="rememberme" id="rememberme">
                Rememberme
              </label>
              <a class="float-end" style="cursor: pointer" data-bs-target="#forgotpasswordModal" data-bs-toggle="modal">
                Forgot Password?
              </a>
            </div>

          </div>
          <div class="modal-footer">
            <input class="btn green" name="login" type="submit" value="Login">
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">
              Cancel
            </button>
            <button type="button" class="btn btn-default float-start" data-bs-dismiss="modal"
              data-bs-target="signupModal" data-bs-toggle="modal">
              Register
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!--Sign up form-->
  <form method="post" id="signupform">
      <div class="modal" id="signupModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 id="myModalLabel">
              Sign up today and Start using our Online Notes App!
            </h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close">
              
            </button>


          </div>
          <div class="modal-body">

            <!--Sign up message from PHP file-->
            <div id="signupmessage"></div>

            <div class="form-group">
              <label for="username" class="sr-only">Username:</label>
              <input class="form-control" type="text" name="username" id="username" placeholder="Username"
                maxlength="30">
            </div>
            <div class="form-group">
              <label for="email" class="sr-only">Email:</label>
              <input class="form-control" type="email" name="email" id="email" placeholder="Email Address"
                maxlength="50">
            </div>
            <div class="form-group">
              <label for="password" class="sr-only">Choose a password:</label>
              <input class="form-control" type="password" name="password" id="password" placeholder="Choose a password"
                maxlength="30">
            </div>
            <div class="form-group">
              <label for="password2" class="sr-only">Confirm password</label>
              <input class="form-control" type="password" name="password2" id="password2" placeholder="Confirm password"
                maxlength="30">
            </div>
          </div>
          <div class="modal-footer">
            <input class="btn green" name="signup" type="submit" value="Sign up">
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">
              Cancel
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!--Forgot password form-->
  <form method="post" id="forgotpasswordform">
    <div class="modal" id="forgotpasswordModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 id="myModalLabel">
              Forgot Password? Enter your email address:
            </h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close">

            </button>

          </div>

          <div class="modal-body">

            <!--forgot password message from PHP file-->
            <div id="forgotpasswordmessage"></div>


            <div class="form-group">
              <label for="forgotemail" class="sr-only">Email:</label>
              <input class="form-control" type="email" name="forgotemail" id="forgotemail" placeholder="Email"
                maxlength="50">
            </div>
          </div>
          <div class="modal-footer">
            <input class="btn green" name="forgotpassword" type="submit" value="Submit">
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">
              Cancel
            </button>
            <button type="button" class="float-start" data-bs-dismiss="modal" data-bs-target="signupModal"
              data-toggle="modal">
              Register
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- Footer-->
  <div class="footer">
    <div class="container">
      <p>Harsheetkaur &copy; 2023-
        <?php $today = date("Y");
        echo $today ?>.
      </p>
    </div>
  </div>


  
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
  
  
  <script src="javascript.js"> </script>


 

</body>





</html>