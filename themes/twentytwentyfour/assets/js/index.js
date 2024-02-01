$('#root').hide();
$(document).ready(function(){
    setTimeout(function(){
        $('#splash-screen').hide();
        $('#root').show();
    }, 3000);

    
    
});
$('.menu-bar').click(function(){
    var menu_btn_pos = $('#header-menu .menu-bar').offset();
    $('.main-menu .menu').css({
        'top': menu_btn_pos.top + 'px',
        'left': menu_btn_pos.left + 'px'
    });

    if ($('.main-menu').hasClass('visible')) {
        $('.main-menu').removeClass('visible');
    } else {
        $('.main-menu').addClass('visible');
    }
});