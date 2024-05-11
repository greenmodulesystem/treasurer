var Type;

$(document).on('change', '#typeOfReport', function() {
    Type = $('#typeOfReport option:selected').val();
});

/** geenerate type of abstract reports */
$(document).on('click', '#generateTypeOfReport', function() {
    if (Type == undefined) {
        alert('Please Select Type of Collection');
    } else {
        window.location = baseUrl + 'reports/display_abstract?get=' + $('#colType').val() + '&type=' + Type;
    }
});