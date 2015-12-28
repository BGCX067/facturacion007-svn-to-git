$(document).ready(function(){
    $('.formulario').submit(function(){
        if($('#login').val()== ""){
            alert("Debe Introducir un Usuario");
            $('#login').focus();
            return false
        }else
        if($('#password').val() == ""){
            alert("Debe Introducir un Password");
            $('#password').focus();
            return false
        }else{
            var url = $(this).attr('action');
            var data = $(this).serialize();
            $.ajax({ 
                type: "POST",
                url: url,
                dataType: 'json',
                data: data,
                success: function(data){
                    if(data){
                        $('.message').removeClass('info').addClass('error');
                    }
                    
                }
            });
        }
    });
});

