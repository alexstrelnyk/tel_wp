$('#root').hide();
$(document).ready(function(){
    setTimeout(function(){
        $('#splash-screen').hide();
        $('#root').show();
    }, 3000);
    console.log('page loaded');
});