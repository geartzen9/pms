var drawer = $('#drawer');
var overlay = $('#drawer-overlay');

$('#hamburger').click(function() {
    overlay.removeClass('invisible');
    overlay.addClass('visible show');
});

overlay.click(function() {
    drawer.removeClass('collapse show');

    overlay.removeClass('visible show');
    overlay.addClass('invisible');
});