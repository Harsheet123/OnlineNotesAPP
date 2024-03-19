<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>contact us</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mdb.css">
    <!-- Your custom styles (optional) -->
    

    <style>
    html {
      position: relative;
      min-height: 100%;
    }

    /*Background Image*/
    body {
      font-family: Arvo, serif;
      background: url("5.jpg") no-repeat center center;
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
    .section {
        margin-top: 50px;
    }
  </style>
</head>

<body>
    <div class="container">
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
            <a class="nav-link" aria-current="page" href="index.php">Home</a></li>
            <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="Onlinenotesloggedin.php">My Notes</a>
                    </li>
          <li class="nav-item">
            <a class="nav-link" href="help.php">Help</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link active" href="contact.php">Contact Us</a>
          </li>
        </ul>
       

      </div>
    </div>
  </nav>




        <!--Section: Contact v.2-->
        <section class="section">

            <!--Section heading-->
            <h2 class="section-heading h1 pt-4">Contact us</h2>
            <!--Section description-->
            <p class="section-description">If you have any Query kindly Contact. we will be happy to help</p>

            <div class="row">

                <!--Grid column-->
                <div class="col-md-8 col-xl-9">
                    <form id ="contact-form" name="contact-form" action="mail.php" method="POST">

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form">
                                    <div class="md-form">
                                    <label for="name" class=""><b>Your name:</b></label>
                                        <input type="text" id="name" name="name" class="form-control">
                                       
                                    </div>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form">
                                    <div class="md-form">
                                    <label for="email" class=""><b>Your email;</b></label>
                                        <input type="text" id="email" name="email" class="form-control">
                                       
                                    </div>
                                </div>
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                <label for="subject" class=""><b>Subject:</b></label>
                                    <input type="text" id="subject" name="subject" class="form-control"> 
                                   
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-12">

                                <div class="md-form">
                                <label for="message"><b>Your message: <br></b></label> <br>
                                    <textarea type="text" id="message" name="message" class="md-textarea"></textarea>
                                  
                                </div>

                            </div>
                        </div>
                        <!--Grid row-->

                    </form>

                    <div class="center-on-small-only">
                        <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 col-xl-3">
                    <ul class="contact-icons">
                        <li><i class="fa fa-map-marker fa-2x"></i>
                            <p>Ludhiana, punjab, India</p>
                        </li>

                        <li><i class="fa fa-phone fa-2x"></i>
                            <p>=91 7986358736</p>
                        </li>

                        <li><i class="fa fa-envelope fa-2x"></i>
                            <p>harsheetkaur546@gmail.com</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

            </div>

        </section>
        <!--Section: Contact v.2-->




    </div>
     <!-- Footer-->
     <div class="footer">
        <div class="container">
            <p>Harsheetkaur &copy; 2023-
                <?php $today = date("Y");
                echo $today ?>.
            </p>
        </div>
    </div>

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.js"></script>
    <!--Custom scripts-->
    <script>

    </script>
</body>

</html>