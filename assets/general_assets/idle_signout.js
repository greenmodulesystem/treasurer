// KARL ALOB 5/2 revamped idle js

// V old idle js
// $(document).ready(function() {
//     var time = new Date().getTime();
//     $(document.body).on('mousemove keypress', function() {
//         time = new Date().getTime();
//     });
        
//     function refresh() {
//         //set time to blah2x
//         if (new Date().getTime() - time >= 5000) {
//             setTimeout(function() {
//                 // $.ajax({
//                 //     url: baseUrl + 'login/service/Authenticate/sign_out',
//                 //     dataType: 'json'
//                 // });
//                 alert("ARE YOU STILL THERE?");
//             }, 1000); // wait for 1 second before executing the else if block
//         }
//         else if(new Date().getTime() - time >= 6000){
//             alert("SESSION EXPIRED. PLEASE LOG IN AGAIN.");
//         }
//         else {
//             setTimeout(refresh, 1000);
//         }
//     }
//     setTimeout(refresh, 1000);

// });

//idle js recursion something
$(document).ready(function() {
    var time = new Date().getTime(); //timer variable
    var modalShown = false; // flag to track whether the modal has been shown

    //detects key input and mouse movement. Executes the function if conditions are met.
    $(document.body).on('mousemove keypress', function() {
        time = new Date().getTime(); //resets the time
        modalShown = false; //flag for modal
        setTimeout(refresh, 1000); //starts the timer
    });

    function refresh() {
        //if user is idle for 5 minutes, modal will show to warn the user
        if (new Date().getTime() - time >= 300000 && !modalShown) {
            setTimeout(function() {
                document.getElementById("pModal").style.color = "red";
                document.getElementById("bModal").disabled = false;
                $('#idle-modal').modal('show');
                modalShown = true;
                refresh(); //continues the timer.
            }, 1000); 
        }
        //if user is idle for 5.5 mins, session will be destroyed.
        else if(new Date().getTime() - time >= 330000){
            $.ajax({
                    url: baseUrl + 'login/service/Authenticate/sign_out',
                    dataType: 'json',
                success: function(result) {
                    if(result.has_error == false){
                        window.location = baseUrl;
                    } 
                }
                });
        }
        else {
            setTimeout(refresh, 1000);
        }
    }
    // initializes the timer and adds 1000 miliseconds to timer
    setTimeout(refresh, 1000);

});

// end