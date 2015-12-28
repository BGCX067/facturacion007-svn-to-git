<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />




        <title>Administrador : Sistema Facturación</title>
        <style type="text/css" media="all">
            @import url("http://localhost/facturacion/public/css/style.css");
            @import url("http://localhost/facturacion/public/css/jquery.wysiwyg.css");
            @import url("http://localhost/facturacion/public/css/facebox.css");
            @import url("http://localhost/facturacion/public/css/visualize.css");
            @import url("http://localhost/facturacion/public/css/date_input.css");
        </style>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.js"></script>
        <!--[if lt IE 8]>
        <style type="text/css" media="all">@import url("public/admin/css/ie.css");</style>
    <![endif]-->
        <script type="text/javascript">
            $(document).ready(function(){
                $('#formulario').submit(function(event){
                    event.preventDefault(); 
                    if($('#nick').val()== ""){
                        $('.message').html('<p>Ingrese un Usuario</p>').removeClass('info').addClass('error');
                        $('#nick').focus();
                        return false
                    }else
                        if($('#clave').val() == ""){
                            $('.message').html('<p>Ingrese una Contraseña</p>').removeClass('info').addClass('error');
                            $('#clave').focus();
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
                                if(data.error != ""){
                                    $('.message').html('<p>'+data.error+'</p>').removeClass('info').addClass('error');
                                }else{
                                    location.href='<?php echo URL ?>index';
                                }
                                    
                            }
                        });
                    }
                });
            });
        </script>
    </head>
    <body>
        <div id="hld">
            <div class="wrapper">
                <div class="block small center login">
                    <div class="block_head">
                        <div class="bheadl"></div>
                        <div class="bheadr"></div>
                        <h2>Login</h2>
                        <ul>
                            <li><a href="">Administrador</a></li>
                        </ul>
                    </div>		<!-- .block_head ends -->
                    <div class="block_content" id="flogin">
                        <div class="message info"><p>Información, Ingrese sus datos de acceso.</p></div>
                        <form id="formulario" action="login/entrar" method="post">						<p>
                                <label>Usuario:</label> <br />
                                <input type="text" class="text" tabindex="1" name="nick" id="nick" value="" />
                            </p>

                            <p>
                                <label>Contraseña:</label> <br />
                                <input type="password" class="text" value="" tabindex="2" name="clave" id="clave" />
                            </p>
                            <p>
                                <input type="submit" class="submit" value="Acceder" /> &nbsp; 
                                <input type="checkbox" class="checkbox" id="rememder" name="recordar_si_MKD" value="si"  /> <label for="rememberme">Recordarme</label>
                            </p>
                        </form>

                    </div>		
                    <div class="bendl"></div>
                    <div class="bendr"></div>
                </div>		
            </div>						
        </div>		

      
    </body>
</html>

