
$("#signupform").submit(function (event) {
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
    //    console.log(datatopost);
    //send them to signup.php using AJAX
    $.ajax({
        url: "signup.php",
        type: "POST",
        data: datatopost,
        success: function (data) {
            if (data) {
                $("#signupmessage").html(data);
            }
        },
        error: function () {
            $("#signupmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");

        }

    });

});
//Ajax Call for the login form
//Once the form is submitted
$("#loginform").submit(function(event) {
    // Prevent default form submission
    event.preventDefault();

    // Collect user inputs
    var datatopost = $(this).serializeArray();

    // Send them to login.php using AJAX
    $.ajax({
        url: "login.php",
        type: "POST",
        data: datatopost,
        dataType: "json", // Specify JSON data type for parsing
        success: function(response) {
            if (response.status === "success") {
                alert("Redirecting to Main page!");
                window.location.href = response.redirect;
            } else if (response.error) {
                $('#loginmessage').html(response.error);
            } else {
                $('#loginmessage').html('<div class="alert alert-danger">An unknown error occurred.</div>');
            }
        },
        error: function() {
            $("#loginmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
});


// $("#loginform").submit(function(event){ 
//     //prevent default php processing
//     event.preventDefault();
//     //collect user inputs
//     var datatopost = $(this).serializeArray();
// //    console.log(datatopost);
//     //send them to login.php using AJAX
//     $.ajax({
//         url: "login.php",
//         type: "POST",
//         data: datatopost,
//         success: function(data) {
//             var responseData = JSON.parse(data);
//             if (responseData.status === "success") {
//                 alert("Redirecting to Main page!");
//                 window.location.href = responseData.redirect;
                
//             } else {
//                 $('#loginmessage').html(data);
//             }
//         },
//         error: function(){
//             $("#loginmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
//         }
    
//     });

// });


//Ajax Call for the forgot password form
//Once the form is submitted
$("#forgotpasswordform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to signup.php using AJAX
    $.ajax({
        url: "forgot-password.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            
            $('#forgotpasswordmessage').html(data);
        },
        error: function(){
            $("#forgotpasswordmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});