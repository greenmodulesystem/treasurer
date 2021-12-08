$(function(){
    function load_certificate(){
        $(document).gmLoadPage({
            url: baseUrl + 'payments/certificate/'+form+'/'+$('.form-control[data-field="or-number"]').val()+'/'+$( "#certificates option:selected" ).val(),
            load_on: '#temp-certificate'
        })
        $('#modal-certificate').modal('show');
        $('#certificate').html('<i class="fa fa-certificate"></i> REPRINT CERTIFICATE');
    }
    $('#certificate').on('click',function(){                
        var options = {
            function_call: true,
            function: load_certificate,
            // alert_on_succes: true,
            alert_on_error: true,
            // add_functions: [
            //     {
            //         function: get_receipt
            //     }
            // ]
        };
        $.ajax({
            url: baseUrl + 'payments/services/payments_service/certificate',
            type: "POST",
            dataType: "JSON",
            data: {
                or_no : $('.form-control[data-field="or-number"]').val(),
                form_no: form,
            },
            success: function(e) {
    
                if (e != "") {
                    if (e.has_error) {
    
                        if (options.alert_on_error) {
                            alert(e.error_message);
                        }
                        if (options.function_call_on_error) {
                            $.each(options.error_function, function(index, value) {
                                value.function();
                            });
                        }
                    } else {
                        if(options.alert_on_success){
                            alert(e.message);
                        }
                        if (options.load_on != null && options.load_after != null) {
                            $(options.load_on).load(baseUrl + options.load_after);
                        }
                        
                        if (options.function_call) {
                            if (options.parameter) {
                                options.function(e);
                            } else {
                                options.function();
                            }
    
                            $.each(options.add_functions, function(index, value) {
                                value.function();
                            });
                        }
    
    
                    }
    
                }
    
            }
        });
    })
    $('#print-certificate').on('click',function(){
        $('#certificate-form').printThis();
    })
})