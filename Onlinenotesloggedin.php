<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
?>
 
 <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main notes</title>
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.tiny.cloud/1/c2awd4o23dtv4fbfdicd1x1d74zqt5bcel9pv2z2c2nforwq/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
 
  <!-- <script>
    tinymce.init({
      selector: 'textarea',
      height: 700,
      setup: function (editor) {
        document.getElementById('fontColor').addEventListener('input', function () {
                    var fontColor = this.value;
                    editor.execCommand('forecolor', false, fontColor);
                });
            // Listen for changes in the background color picker
            document.getElementById('backgroundColor').addEventListener('input', function () {
                var bgColor = this.value;
                editor.getBody().style.backgroundColor = bgColor;
            });
        },
        
      plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
    });
    document.getElementById('backgroundColor').addEventListener('change', function() {
    var selectedColor = this.value;
    applyBackgroundColor(selectedColor);
});
function applyBackgroundColor(color) {
    tinymce.activeEditor.getBody().style.backgroundColor = color;
}

  </script> -->
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

        #container-fluid {
            margin-top: 120px;
            
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
/* ... Your existing CSS styles ... */
        }

/* Todo Modal Styles */
#todoModal .modal-dialog {
    max-width: 500px;
}

#todoModal .modal-content {
    background-color: #f9f9f9;
    border: none;
}

#todoModal .modal-title {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
}

#todoModal .list-group {
    max-height: 300px;
    overflow-y: auto;
    border-top: 1px solid #ddd;
}

#todoModal .list-group-item {
    cursor: pointer;
    background-color: transparent;
    border: none;
    border-top: 1px solid #ddd;
    color: #333;
    transition: background-color 0.3s ease;
}

#todoModal .list-group-item:hover {
    background-color: #f0f0f0;
}

#todoModal .modal-footer {
    justify-content: space-between;
    border-top: 1px solid #ddd;
    padding-top: 10px;
}

#todoModal .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

#todoModal .btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

#shareNotesModal {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    margin: 0 auto;
}

#shareNotesModal h1 {
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
    color: #333;
}

#shareNotesModal label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
    color: #666;
}

#shareNotesModal select,
#shareNotesModal input[type="email"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

#shareNotesModal button {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
}


#shareNotesModal button:hover {
    background-color: #0056b3;
}

/* Additional Styles for My Notes Page */
#myNotesModal {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

#myNotesmodal h1 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

.note {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 15px;
    background-color: #f9f9f9;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

/* Email Content Styling */
.email-content {
    font-size: 16px;
    line-height: 1.5;
    color: #333;
}

.email-content p {
    margin-bottom: 10px;
}

/* ... Continue with your existing CSS styles ... */


   


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
                        <a class="nav-link" aria-current="page" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="help.php">Help</a>
                    </li>
        

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page"   href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="Onlinenotesloggedin.php">My Notes</a>
                    </li>
                </ul>
                 <!-- Add a button to open the share notes modal -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#shareNotesModal">Share Notes</button>
                </li>
            </ul>
                <!-- Add a button to open the to-do modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#todoModal">
    To-Do
</button>

                <ul class="nav navbar-nav navbar-right">


                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Logged in as <b> <?php echo $_SESSION['username']?> </b> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?logout=1">Logout </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- container -->
    <div class="container-fluid" id="container-fluid">
         <!--Alert Message-->
         <div id="alert" class="alert alert-danger collapse">
              <a class="close" data-bs-dismiss="alert">
                &times;
              </a>
              <p id="alertContent"></p>
              
          
          </div>
          <div class="container-fluid" id="container-fluid">
        <!-- <div class="row">
        <div class="col-md-offset-3 col-md-6"> -->
            <!-- <div class="col-md-offset-3 col-md-8"> -->
                <div class="buttons">
                    <button id="addNote" type="button" class="btn btn-info btn-lg">Add Note</button>
                    <button id="edit" type="button" class="btn btn-info btn-lg float-end">Edit</button>
                    <button id="done" type="button" class="btn green btn-lg float-end">Done</button>
                    <button id="allNotes" type="button" class="btn btn-info btn-lg">All Notes</button>
                </div>
                <div id="notePad">
                <label for="backgroundColor"> <h2 style="color:blue;">Background Color: </h2></label>
<input type="color" id="backgroundColor" value="#ffffff">
<label for="fontColor">Font Color:</label>
    <input type="color" id="fontColor" value="#000000">

                    <textarea id="noteEditor" rows="10"></textarea>
                   
                    <!-- <textarea id="noteEditor">
    
    </textarea> -->
                </div>
                <div id="notes" class="notes">
<!--                   Ajax call to a php file-->
                  </div>


            </div>
        </div>
    </div>
    <!-- To-Do Modal -->
<!-- To-Do Modal -->
<div class="modal fade" id="todoModal" tabindex="-1" aria-labelledby="todoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="todoModalLabel">To-Do List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- To-Do list goes here -->
                <ul id="taskList" class="list-group">
                    <li class="list-group-item" contenteditable="true">Task 1</li>
                    <li class="list-group-item" contenteditable="true">Task 2</li>
                    <!-- Add more tasks here -->
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="addTaskBtn" type="button" class="btn btn-primary">Add Task</button>
            </div>
        </div>
    </div>
</div>
<!-- Share Notes Modal -->
<div class="modal fade" id="shareNotesModal" tabindex="-1" aria-labelledby="shareNotesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="shareNotesModalLabel">Share Notes</h5> -->
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
               <?php 
               include('share_notes.php');
               ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- Add any additional buttons or actions here if needed -->
            </div>
        </div>
    </div>
</div>

<script> document.addEventListener('DOMContentLoaded', function () {
    const taskList = document.getElementById('taskList');
    const addTaskBtn = document.getElementById('addTaskBtn');

    // Add a new task when the "Add Task" button is clicked
    addTaskBtn.addEventListener('click', function () {
        const newTask = document.createElement('li');
        newTask.className = 'list-group-item';
        newTask.contentEditable = true;
        newTask.textContent = 'New Task';
        taskList.appendChild(newTask);
        newTask.focus();
    });
});





 </script>
 <script>

    // Get references to the background color and font color input elements
const backgroundColorInput = document.getElementById('backgroundColor');
const fontColorInput = document.getElementById('fontColor');
const noteEditor = document.getElementById('noteEditor');

// Add event listeners to listen for changes in the color inputs
backgroundColorInput.addEventListener('input', () => {
    const selectedBackgroundColor = backgroundColorInput.value;
    noteEditor.style.backgroundColor = selectedBackgroundColor;
});

fontColorInput.addEventListener('input', () => {
    const selectedFontColor = fontColorInput.value;
    noteEditor.style.color = selectedFontColor;
});

  
  </script>

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
        <script src="mynotes.js"></script>  

</body>

</html>