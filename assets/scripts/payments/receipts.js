$(function(){
    var current_or = {
        no: '',
        id: ''
    };
    get_voids();
    function get_voids(){
        $(document).gmLoadPage({
            url: baseUrl + 'payments/receipts/1?form='+form,
            load_on: '#void-receipts'
        });
    }
    function complete_voiding(){
        current_or.no = '';
        current_or.id = '';
        $('.form-control[data-field="remarks"]').val('');
        $('#search-or').click();
        $('#modal-void-receipt').modal('hide');
    }
    $('#search-or').on('click',function(){
        $(document).gmLoadPage({
            url: baseUrl + 'payments/receipts/0?number='+$('.void[data-field="search-or"]').val()+'&form='+form,
            load_on: '#receipts'
        });
    });
    $('.void[data-field="search-or"]').on('keypress',function(){
        $('#search-or').click();
    });
    $(document).on('click','.receipt-void',function(){
        current_or.no = $(this).data('value');
        current_or.id = $(this).data('id');
        $('#modal-void-receipt').modal('show');
    });
    $(document).on('click','.receipt-open',function(){
        
        $(document).gmLoadPage({
            url: baseUrl + 'payments/receipt/'+form+'/'+$(this).data('value'),
            load_on: '#receipt'
        })
        $('#modal-receipt').modal('show');
    });

    $('#proceed-void').on('click',function(){
        
        var options = {
            function_call: true,
            function: complete_voiding,
            alert_on_succes: true,
            alert_on_error: true,
            add_functions: [
                {
                    function: get_voids
                }
            ]
        };
        $.ajax({
            url: baseUrl + 'payments/services/payments_service/void_receipt',
            type: "POST",
            dataType: "JSON",
            data: {
                remarks : $('.form-control[data-field="remarks"]').val(),
                form_no: form, 
                or_no: current_or.no,  
                id: current_or.id,  
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
})
