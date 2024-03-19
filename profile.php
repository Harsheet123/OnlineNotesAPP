<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
include('connectionn.php');

$user_id = $_SESSION['user_id'];

//get username and email
$sql = "SELECT * FROM user WHERE user_id='$user_id'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
} else {
    $count = mysqli_num_rows($result);
    print_r($row); //
    if ($count == 1) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $username = $row['username'];
        $email = $row['email'];
    } else {
        echo "There was an error retrieving the username and email from the database";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>

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
            background: url("7.jpg") no-repeat center center;
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
            border-spacing: 2px;
        }


        .navbar-expand-lg .navbar-nav>li>a:hover,
        .navbar-expand-lg .navbar-nav>li>a:focus {
            color: blue;
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

        #container {
            margin-top: 100px;
            background-color: transparent;

        }


        #notePad,
        #allNotes,
        #done,
        .delete {
            display: none;
        }

        .buttons {
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            max-width: 100%;
            font-size: 16px;
            line-height: 1.5em;
            border-left-width: 20px;
            border-color: #CA3DD9;
            color: #CA3DD9;
            background-color: #FBEFFF;
            padding: 10px;

        }

        .noteheader {
            border: 1px solid grey;
            border-radius: 10px;
            margin-bottom: 10px;
            cursor: pointer;
            padding: 0 10px;
            background: linear-gradient(#FFFFFF, #ECEAE7);
        }

        .text {
            font-size: 20px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .timetext {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .notes {
            margin-bottom: 100px;
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


        table,
        tbody,
        tr,
        th,
        td {
            background-color: rgba(0, 0, 0, 0.0) !important;
        }

        tr {
            cursor: pointer;
        }
    </style>
    <link rel="stylesheet" href="notes/styling.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Navigation bar -->

    <nav class="navbar navbar-expand-lg navbar fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">OnlineNotes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="profile.php">Profile</a>
                    </li>
                   

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="help.php">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="Onlinenotesloggedin.php">My Notes</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="help.php">Logged in as <b> <?php 
                        echo "$username";
                         ?>   </b>  </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?logout=1">Logout </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Container-->
    <div class="container" id="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">

                <h2>General Account Settings:</h2>
                <div class="table-responsive">
                    <table class="table table-hover table-condensed table-bordered table-transparent"
                        style="background-color:rgba(0, 0, 0, 0);">
                        <tr data-bs-target="#updateusername" data-bs-toggle="modal">
                            <td>Username</td>
                            <td>
                            <?php echo $username;?> 
                               </td>
                        </tr>
                        <tr data-bs-target="#updateemail" data-bs-toggle="modal">
                            <td>Email</td>
                            <td>
                                <?php
                                 echo $email;
                                  ?></td>
                        </tr>
                        <tr data-bs-target="#updatepassword" data-bs-toggle="modal">
                            <td>Password</td>
                            <td>hidden</td>
                        </tr>
                    </table>

                </div>

            </div>
        </div>
    </div>
  <!--Update username-->
    <form method="post" id="updateusernameform">
        <div class="modal" id="updateusername" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header"> <h4 id="myModalLabel">
                            Edit Username:
                        </h4>
                        <button class="close" data-bs-dismiss="modal">
                            &times;
                        </button>
                       
                    </div>
                   
             
                    <div class="modal-body">

                        <!--update username message from PHP file-->
                        <div id="updateusernamemessage"></div>


                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input class="form-control" type="text" name="username" id="username" maxlength="30"
                                value="<?php echo $username;  ?> ">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input class="btn green" name="updateusername" type="submit" value="Submit">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!--Update email-->
    <form method="post" id="updateemailform">
        <div class="modal" id="updateemail" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 id="myModalLabel">
                            Enter new email:
                        </h4>
                        <button class="close" data-bs-dismiss="modal">
                            &times;
                        </button>
                        
                    </div>
                    <div class="modal-body">

                        <!--Update email message from PHP file-->
                        <div id="updateemailmessage"></div>


                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input class="form-control" type="email" name="email" id="email" maxlength="50"
                                value="<?php echo $email; ?>">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input class="btn green" name="update email" type="submit" value="Submit">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!--Update password-->
    <form method="post" id="updatepasswordform">
        <div class="modal" id="updatepassword" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 id="myModalLabel">
                            Enter Current and New password:
                        </h4>
                        <button class="close" data-bs-dismiss="modal">
                            &times;
                        </button>
                        
                    </div>
                    <div class="modal-body">

                        <!--Update password message from PHP file-->
                        <div id="updatepasswordmessage"></div>


                        <div class="form-group">
                            <label for="currentpassword" class="sr-only">Your Current Password:</label>
                            <input class="form-control" type="password" name="currentpassword" id="currentpassword"
                                maxlength="30" placeholder="Your Current Password">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Choose a password:</label>
                            <input class="form-control" type="password" name="password" id="password" maxlength="30"
                                placeholder="Choose a password">
                        </div>
                        <div class="form-group">
                            <label for="password2" class="sr-only">Confirm password:</label>
                            <input class="form-control" type="password" name="password2" id="password2" maxlength="30"
                                placeholder="Confirm password">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input class="btn green" name="updateusername" type="submit" value="Submit">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">
                            Cancel
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
        <script src="profile.js"></script>

</body>

</html>