$(document).ready(function() {
    $('.s_edit').on('click', function() {
        var type = $(this).closest('tr').find('.type');
        var fee = $(this).closest('tr').find('.s_fee');
        var c_type = $(this).closest('tr').find('.c_type');
        var save = $(this).closest('tr').find('.s_save');
        type.addClass("warning");
        fee.addClass("warning");
        c_type.addClass("warning");
        type.attr("contentEditable", true);
        fee.attr("contentEditable", true);
        c_type.attr("contentEditable", true);
        setInterval(function() {
            var changed = ((type.data('default') != $.trim(type.text())) ||
                (fee.data('default') != $.trim(fee.text())) ||
                (c_type.data('default') != $.trim(c_type.text())));
            save.prop("disabled", !changed);
        }, 200);
    });

    $('.s_save').on('click', function() {
        var ID = $(this).data('id');
        var type = $(this).closest('tr').find('.type');
        var fee = $(this).closest('tr').find('.s_fee');
        var c_type = $(this).closest('tr').find('.c_type');
        type.removeClass("warning");
        fee.removeClass("warning");
        c_type.removeClass("warning");
        type.attr("contentEditable", false);
        fee.attr("contentEditable", false);
        c_type.attr("contentEditable", false);
        var Business_type = $.trim(type.text());
        var Sanitary_fee = ($.trim(fee.text())).substring(1);
        var Card_type = $.trim(c_type.text());
        $.ajax({
            type: "POST",
            url: baseUrl + "health/update_fee",
            data: {
                ID: ID,
                Business_type: Business_type,
                Sanitary_fee: Sanitary_fee,
                Card_type: Card_type,
            }
        }).done(function(result) {
            load_fees();
        });
    });
});