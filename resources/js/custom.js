$(window).on('load', function () {
    $('#pre-loader').fadeOut('slow');
});

window.copyToClipboard = function(element, show){
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
    $(show).fadeIn('slow');
    setTimeout(function() { 
        $(show).fadeOut('slow');
    }, 3000);
}
