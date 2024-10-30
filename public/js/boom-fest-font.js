$=jQuery
$(document).ready(function(){
    var count = $('body').find('h1').length;
    for(var i=0; i<count; i++){
        $('h1').attr('id', 'boom-fest-font');
    }
})