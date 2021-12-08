$(function(){
    $('#generate').on('click',function(){
        $(document).gmLoadPage({
            url: baseUrl + 'payments/reports/1/'+form+'?from='+$('.form-control[data-field="from"]').val()+'&to='+$('.form-control[data-field="to"]').val(),
            load_on: '#table-1'
        })
        $(document).gmLoadPage({
            url: baseUrl + 'payments/reports/2/'+form+'?from='+$('.form-control[data-field="from"]').val()+'&to='+$('.form-control[data-field="to"]').val(),
            load_on: '#table-2'
        })
        
    });
})