
//ADDED BY KYLE 10-26-2023

let canExecute = true;

$("#searchBTN").click(function(){

    if (!canExecute) {
        return;
    }

    canExecute = false;
    
    setTimeout(function(){
        canExecute = true;
    }, 1500);

    $.ajax({
        type: 'POST', // You can use 'GET' if appropriate
        url: baseUrl + 'edit_or_number/edit_or_number/search_or_range',
        data: {
            from_OR: $('#range_from').val(),
            to_OR:  $('#range_to').val(),
        },
        success: function(response) {
            // Handle the response from the server if needed
            // For example, update the #print-electrical element with the response content
            $('#grid').html(response);
        },
        error: function(xhr, status, error) {
            // Handle errors if needed
            console.error(error);
        },
        load_on: '#grid'
    });

});


$("#replicateBTN").click(function(){

    $.post({
        url: baseUrl + 'edit_or_number/services/edit_or_service/replicate_OR',
        data: {
            
            Test_Data:  "Testing",

        },
        success: function(e) {
            var e = JSON.parse(e);
            if (e.has_error == false) {
                // setTimeout(function() {
                    // location.reload();
                // }, 200);
            } else {
            }
        },
    })


});

function clickFunction(element){
    var index =  parseInt((element.id).match(/\d+/)[0]);
    // alert($('#new_OR'+index).val());
    // alert($('#system_OR'+index).val());

    if (confirm("Do you want to Edit OR number"+$('#system_OR'+index).val()+"?")) {
        alert("OR number "+$('#system_OR'+index).val()+" successufly edited to "+$('#new_OR'+index).val());
        $.post({
            url: baseUrl + 'edit_or_number/services/edit_or_service/edit_or_num',
            data: {
                
                HCOR_num_edited:  $('#new_OR'+index).val(),
                SOR_num: $('#system_OR'+index).val(),
    
            },
            success: function(e) {
                var e = JSON.parse(e);
                if (e.has_error == false) {
                    // setTimeout(function() {
                        // location.reload();
                    // }, 200);
                } else {
                }
            },
        })

        setTimeout(function(){
            canExecute = true;
            document.getElementById('searchBTN').click();
        }, 1000);
        
    } else {
        alert("OR editing cancelled");
    }

    

}

function revive_OR(element){
    // alert(element.id);

    $.post({
        url: baseUrl + 'treasurers/service/Treasurers_service/revive_receipt',
        data: {
            
            OR_number: element.id,

        },
        success: function(e) {
            var e = JSON.parse(e);
            if (e.has_error == false) {
                // setTimeout(function() {
                    // location.reload();
                // }, 200);
            } else {
            }
        },
    })

    setTimeout(function(){
        canExecute = true;
        document.getElementById('searchBTN').click();
    }, 1000);

}

// $(".Edit_OR").click(function(){

//     let loops = parseInt(counter);
//     var new_OR_numbers = [];
//     var system_OR = [];

//     for (let i = 1; i <= loops; i++){
//         system_OR.push($('#system_OR'+i).val());
//     }

//     for (let i = 1; i <= loops; i++){
//         new_OR_numbers.push($('#new_OR'+i).val());
//     }

//     // alert(system_OR);

//     $.post({
//         url: baseUrl + 'edit_or_number/services/edit_or_service/edit_or_num',
//         data: {
            
//             HCOR_num_edited:  new_OR_numbers,
//             SOR_num: system_OR,

//         },
//         success: function(e) {
//             var e = JSON.parse(e);
//             if (e.has_error == false) {
//                 // setTimeout(function() {
//                     // location.reload();
//                 // }, 200);
//             } else {
//             }
//         },
//     })


// });



