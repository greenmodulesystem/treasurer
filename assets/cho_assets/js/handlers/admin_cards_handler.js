$(document).ready(function() {
    $('.edit').on('click', function() {
        var req = $(this).closest('tr').find('.req');
        var fee = $(this).closest('tr').find('.fee');
        var save = $(this).closest('tr').find('.save');
        req.addClass("warning");
        fee.addClass("warning");
        req.attr("contentEditable", true);
        fee.attr("contentEditable", true);
        setInterval(function() {
            var changed = ((req.data('default') != $.trim(req.text())) ||
                (fee.data('default') != $.trim(fee.text())));
            save.prop("disabled", !changed);
        }, 200);
    });

    $('.save').on('click', function() {
        var ID = $(this).data('id');
        var req = $(this).closest('tr').find('.req');
        var fee = $(this).closest('tr').find('.fee');
        req.removeClass("warning");
        fee.removeClass("warning");
        req.attr("contentEditable", false);
        fee.attr("contentEditable", false);
        var Requirement = $.trim(req.text());
        var Fee = ($.trim(fee.text())).substring(1);
        $.ajax({
            type: "POST",
            url: baseUrl + "health/update_card",
            data: {
                ID: ID,
                Requirement: Requirement,
                Fee: Fee,
            }
        }).done(function(result) {
            load_cards();
        });
    });
});