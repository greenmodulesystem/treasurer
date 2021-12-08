$(function(){
    window.scrollTo(0, 0);
    var lists = [];
    var edit_data = null;
    var amount = {
        total: 0,
        cash: 0,
        cash_cheque: 0,
        change: 0,
    };
    $('.form-control[data-field="particular"]').on('change',function(){
        var selected = $('.form-control[data-field="particular"] option:selected');
        $('.form-control[data-field="amount"]').val($(selected).data('amount'));
    })
    $('#save').on('click',function(){
        var selected = $('.form-control[data-field="particular"] option:selected');
        var data = {
            id: $(selected).val(),
            item : $(selected).text(),
            description: $('.form-control[data-field="description"]').val(),
            amount: $('.form-control[data-field="amount"]').val()
        };
        if(data.id!=='' && data.amount !== ''){
            console.log(edit_data != null);
            if(edit_data != null){
                lists[edit_data.key] = data;
            }else{
                lists.push(data);
            }
            $('.form-control[data-field="particular"]').val('');
            $('.form-control[data-field="description"]').val('');
            $('.form-control[data-field="amount"]').val('');
            edit_data = null;
            update_list();
        }else{   
            alert('Please SELECT particular and input a valid amount !!! HAHAHA abe mo ha.');
        }
       
    });
    $(document).on('click','.btn-delete',function(){
        lists.splice($(this).data('key'), 1);
        update_list();
    });
    $(document).on('click','.btn-edit',function(){
        var data = lists[$(this).data('key')];
        edit_data = {
                    key: $(this).data('key'),
                    data : data};
        $('.lists-row').removeClass('bg-danger');
        $('.lists-row').addClass('bg-success');
        $('.lists-row[data-row="'+edit_data.key+'"]').removeClass('bg-success');
        $('.lists-row[data-row="'+edit_data.key+'"]').addClass('bg-danger');
        $('.form-control[data-field="particular"]').val(data.id);
        $('.form-control[data-field="description"]').val(data.description);
        $('.form-control[data-field="amount"]').val(data.amount);
    });
    function update_list() {
       
        var html = '';
        amount.total = 0;
        $(lists).each(function(key, value) {
            var btn = {
                delete: '<button class="btn btn-danger btn-sm btn-flat btn-delete" data-key="' + key + '"> <i class="fa fa-trash"></i> REMOVE </button>',
                edit: '<button class="btn btn-default btn-sm btn-flat btn-edit" data-key="' + key + '"> <i class="fa fa-edit"></i> EDIT </button>'
            };
            var row = '<tr class="lists-row bg-success" data-row="'+key+'">' +
                        '<td>' + value.item + '<code>'+value.description+'</code></td>' +
                        '<td>' + value.amount + '</td>' +
                        '<td colspan="3">' + btn.edit+' '+btn.delete + '</td>' +
                    '</tr>';
            html += row;
            amount.total += parseFloat(value.amount);
        });
        calculate();
        $('.amount[data-value="total"]').html(amount.total.toLocaleString());
        $('#lists').html(html);
    }
    function calculate(){
        amount.cash = $('.form-control[data-value="cash"]').val();
        amount.cash_cheque = $('.cheque[data-value="amount"]').val();
        amount.change = parseFloat(amount.cash - amount.total);
        $('.amount[data-value="change"]').html( amount.change > 0 ? amount.change.toLocaleString():'0');
        var check = !(parseFloat(amount.cash) + parseFloat(amount.cash_cheque) >= amount.total && lists.length > 0 ); 
        $('#btn-pay-print').attr('disabled', check);
    }
    function complete_transaction(){
        $('#modal-receipt').modal('show');
        $('#btn-pay-print').html('<i class="fa fa-money"></i> REPRINT RECEIPT');
        $('#save').attr('disabled',true);
        $('.btn-edit').attr('disabled',true);
        $('.btn-delete').attr('disabled',true);
        $('#certificate').attr('disabled',false);
    }
    function get_receipt(){
        $(document).gmLoadPage({
            url: baseUrl + 'payments/receipt/'+form+'/'+$('.form-control[data-field="or-number"]').val(),
            load_on: '#receipt'
        })
    }
    $('.form-control[data-value="cash"], .cheque[data-value="amount"]').on('keyup',function(){
        calculate();
    })
    $('#btn-pay-print').on('click',function(){
        var options = {
            function_call: true,
            function: complete_transaction,
            alert_on_succes: true,
            alert_on_error: true,
            add_functions: [
                {
                    function: get_receipt
                }
            ]
        };
        $.ajax({
            url: baseUrl + 'payments/services/payments_service/pay',
            type: "POST",
            dataType: "JSON",
            data: {
                date: $('.form-control[data-field="date"]').val(),
                or_no : $('.form-control[data-field="or-number"]').val(),
                form_no: form,
                payor : $('.form-control[data-field="payor"]').val(),
                paid_by : $('.form-control[data-field="paid-by"]').val(),
                address : $('.form-control[data-field="address"]').val(),
                city : $('.form-control[data-field="city-municipality"]').val(),
                province : $('.form-control[data-field="province"]').val(),
                sex : $('.form-control[data-field="sex"] option:selected').val(),
                age : $('.form-control[data-field="age"]').val(),
                ownership_no : $('.form-control[data-field="ownerhsip-no"]').val(),
                c_m_brand : $('.form-control[data-field="city-municipality-brand"]').val(),
                ow_brand : $('.form-control[data-field="ownder-brand"]').val(),
                received_by : $('.form-control[data-field="received-by"]').val(),
                r_address : $('.form-control[data-field="r-address"]').val(),
                r_city_municipality : $('.form-control[data-field="r-city-municipality"]').val(),
                r_province : $('.form-control[data-field="r-province"]').val(),
                particulars: JSON.stringify(lists),
                cheque : JSON.stringify({
                    bank: $('.cheque[data-value="bank"] option:selected').val(),
                    no:  $('.cheque[data-value="no"]').val(),
                    date:  $('.cheque[data-value="date"]').val(),
                    amount:  $('.cheque[data-value="amount"]').val(),
                }),
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
    });

    $('#btn-new').on('click',function(){
        if(confirm("Are you sure you want to create NEW TRANSACTION? ")){
            location.reload();
        }else{

        }
    });
    
    var Values;
    $('.form-control[data-field="payor"]').keyup(function(e) {
        if (e.keyCode === 13) {
            $('#load-search-payer').modal({ backdrop: 'static' });
            $('#load-search-payer').modal('show');
            $.post({
                url: baseUrl + 'general_collection/service/general_collection_service/get_payer_name',
                data: {
                    payer_name: $('.form-control[data-field="payor"]').val()
                },
                dataType: 'json',
                success: function(e) {
                    if (e.has_error == false) {     
                        Values = e.error_message;                  
                        $.each(e.error_message, function(key, value) {
                            $('#load-searched').append(
                                '<tr> <td><button class="btn btn-flat btn-sm btn-primary add-part" data-id="' + value.ID + '"><i class="fa fa-plus-square"></i></button></td> <td>' + value.Payer + '</td> <td>' + value.Address + '</td> </tr>'
                            );
                        })
                    } else {
                        alert(e.error_message);
                    }
                }
            });
        }
    });

    $(document).on('click', '.add-part', function() {
        var ID = $(this).data('id');
        $('#load-search-payer').modal('hide');
        $.each(Values, function(idx, val) {
            if (ID == val.ID) {               
                $('.form-control[data-field="payor"]').val(val.Payer);
                $('.form-control[data-field="address"]').val(val.Address);
                $('.form-control[data-field="paid-by"]').val(val.Payer);
            }
        });
    });

    $('#print').on('click',function(){
        $("#form-print").printThis();
    });
})
