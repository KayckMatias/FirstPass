$(window).on('load', function () {
    $('#pre-loader').fadeOut('slow');
});

function isaNumber(number){
    number = (number) ? number : window.event;
    var charCode = (number.which) ? number.which : number.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}