$(document).ready(function(){
    if($('#decoration4')[0].checked===true){
        $('#bf-font-family').removeAttr("disabled");
    }
    $('#decoration4').change(function(){
        if(this.checked){
            $('#bf-font-family').removeAttr("disabled");
        }
        else{
            $('#bf-font-family').attr("disabled","disabled");
        }
    });
    $('#pages').click(function(){
        var select_option = $('#pages').find(":selected").val();
        if(select_option=='all'){
            $('.options').prop("disabled", true);
        }
    });
});