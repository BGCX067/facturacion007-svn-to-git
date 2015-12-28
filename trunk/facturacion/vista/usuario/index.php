<script type="text/javascript">
    $(function() {
        function search_usuario(){
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "<?php echo URL; ?>usuario/buscar_usuarios/"+$('#usuarios').val(),
                success: function(data){
                    if(data.length > 0){
                        var html ='';
                        $.each(data, function(i,item){
                            html += '<tr class="rows"><td>'+item.id+'</td><td>'+item.nombre+'</td><td>'+item.apellido+'</td><td>'+item.login+'</td><td>'+item.rol+'</td><td><?php if (Permisos::tienePermiso('usuarios', 'editar')) { ?><a class="tip" title="Editar" href="<?php echo URL ?>usuario/editar/'+item.id+'"><img src="<?php echo URL; ?>public/images/bedit.png" alt="Editar" /></a>&nbsp;<a class="tip" title="Reset Password" href="<?php echo URL ?>usuario/reset_password/'+item.id+'"><img src="<?php echo URL; ?>public/images/key_go.png" alt="Reset Password" /></a><?php } ?>&nbsp;<?php if (Permisos::tienePermiso('usuarios', 'eliminar')) { ?><a class="tip" title="Eliminar" id="eliminar-usuario" href="#"><img  src="<?php echo URL; ?>public/images/bdelete.png" alt="Eliminar" onclick="eliminarUsuario('+item.id+')"/></a><?php } ?></td></tr>';
                        });
                        $(".sortable tbody").html(html);
                        $(".sortable").trigger("update");
                        var sorting = [[1,0]];
                        $(".sortable").trigger("sorton",[sorting]);
                    }
                }
            });
        }
        $("#usuarios").live("keyup",(function(){
            search_usuario();
        }));


    });



</script>
<div class="block_head">
    <div class="bheadl"></div>
    <div class="bheadr"></div>

    <h2> Usuarios</h2>

    <ul class="tabs">
        <li class="active nobg"><a href="#list">Listar</a></li>
        <?php if (Permisos::tienePermiso('usuarios', 'guardar')) { ?>
            <li><a href="#new">Nuevo Usuario</a></li>
        <?php } ?>
    </ul>

    <ul>
        <li>
            <form>
                <label for="usuarios">Buscar:</label><input class="text" type="text" id="usuarios" value="" >
            </form>
        </li>
    </ul>
</div>
<div style="display: block;" class="block_content tab_content " id="list">
    <form action="" method="post">

        <table class="sortable" cellpadding="0" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Login</th>
                    <th>Rol</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->listaUsuario as $key => $value) {
                    ?>
                    <tr class="rows even">
                        <td>
                            <?php echo $value['id']; ?>
                        </td>
                        <td>
                            <?php echo $value['nombre']; ?> 
                        </td>
                        <td>
                            <?php echo $value['apellido']; ?> 
                        </td>
                        <td>
                            <?php echo $value['login']; ?> 
                        </td>
                        <td>
                            <?php echo $value['rol']; ?>
                        </td>
                        <td class="options">
                            <?php if (Permisos::tienePermiso('usuarios', 'editar')) { ?>
                                <a class="tip" title="Editar" href="<?php echo URL ?>usuario/editar/<?php echo $value['id'] ?>"><img src="<?php echo URL; ?>public/images/bedit.png" alt="Editar" /></a>
                                <a class="tip" title="Reset Password" href="<?php echo URL ?>usuario/reset_password/<?php echo $value['id'] ?>"><img src="<?php echo URL; ?>public/images/key_go.png" alt="Reset Password" /></a> 
                            <?php } ?>
                            <?php if (Permisos::tienePermiso('usuarios', 'eliminar')) { ?>
                                <a class="tip" title="Eliminar" id="eliminar-usuario" href="#"><img  src="<?php echo URL; ?>public/images/bdelete.png" alt="Eliminar" onclick="eliminarUsuario(<?php echo $value['id'] ?>)"/></a>
                            <?php } ?>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </form>

</div>

<div style="display: none;" class="block_content tab_content hide" id="new">

    <form novalidate="novalidate" method="post" action="<?php echo URL ?>usuario/crear" enctype="multipart/form-data" id="form_">  
        <p> 
            <label>Nombre</label><br> <input name="nombre" id="nombre" size="55" class="text required" type="text">
        </p>
        <p><label>Apellido</label><br> <input name="apellido" id="apellido" size="55" class="text required" type="text"></p> 

        <p><label>Usuario</label><br> <input name="login" id="login" size="55" class="text required" type="text"></p>
        <p><label>Contraseña</label> <br><input name="password" id="password" size="55" class="text required" type="password"></p> 
        <p><label>Rol</label> <br>

            <select  class="styled valid" style="opacity: 0; position: relative; z-index: 100;" name="role" id="role">
                <option value="0">SELECCIONE</option>
                <?php foreach ($this->perfiles as $valor) { ?>
                <option value="<?php echo $valor['id'] ?>"><?php echo strtoupper($valor['nombre']) ?></option>
                <?php } ?>
            </select>
        </p>
        <hr>
        <p>
            <input class="submit mid" value="Guardar" type="submit">
        </p>

    </form>

</div>
