$(function(){
    function get_stabs(){
        $(document).gmLoadPage({
            url: baseUrl + 'payments/stabs/'+form,
            load_on: '#stabs-lists'
        })
    }
    get_stabs();
})