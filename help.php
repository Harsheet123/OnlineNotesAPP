<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Help</title>
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

        .accordion {
            margin-top: 100px;
        }

        .accordion-item {
            margin-top: 10px;
        }

        .container {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">OnlineNotes</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Onlinenotesloggedin.php">My Notes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="help.php">Help</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact Us</a>
                        </li>
                    </ul>


                </div>
            </div>
        </nav>
        <div class="contaiiner">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <b>How to signup?</b>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Just Click on Sign-Up button, it's completely free. fill you details and click on submit.
                            you will receive a activation link kindly click on it to activate your account.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <b>How to Login?</b>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            After your account is activated you can easily click on Login button. and fill your
                            credentials. check on rememberme box if you want to stay logged-in for long.
                            In case you <b> forget your password,</b> Don't worry click on forget-password link to
                            and write your email you will receive an mail to reset your password.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <b> How to create notes?<b>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            After a successful login, click on <b>addNotes</b> to create a note and then click
                            on the created note to start writing your notes. all writing just click on
                            <b>Allnotes</b> to save your notes. you can again click on that note to do changes. To
                            <b>delete</b> the note you can simply click on the edit note to delete the existing note and
                            then
                            click on <b>Done </b>once you are done with deleting.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                            <b> Want to Edit your profile?<b>
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            To edit you profile simply click on <b>Profile.</b> there you can see your username, Email and
                            Password. to change the username just click on username you will see the edit username
                            option just <b>edit username </b>and click on submit. Same goes with password. But to chnage
                            your mail id you will receive a mail on your new id which you will type and after clicking
                            on that link your email will be updated.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                            <b> More Query<b>
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            If you face any issue or you have any Query you click on<b> Contact Us </b>and there you can sent us the mail.
                        </div>
                    </div>
                </div>
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
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
                crossorigin="anonymous"></script>

            <!-- JQuery -->
            <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
            <!-- Bootstrap tooltips -->
            <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"></script> -->
            <!-- Bootstrap core JavaScript -->
            <!-- <script type="text/javascript" src="js/bootstrap.js"></script> -->
            <!-- MDB core JavaScript -->
            <!-- <script type="text/javascript" src="js/mdb.js"></script> -->
            <!--Custom scripts-->

</body>

</html>