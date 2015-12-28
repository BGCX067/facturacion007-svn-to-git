<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script type="text/javascript">
    $(function() {
        function search_perfil(){
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "<?php echo URL; ?>perfil/buscar_perfil/"+$('#perfiles').val(),
                success: function(data){
                    if(data.length > 0){
                        var html ='';
                        $.each(data, function(i,item){
                            html += '<tr class="rows"><td>'+item.id+'</td><td>'+item.nombre+'</td><td><a class="tip" title="Editar" href="<?php echo URL ?>perfil/editar/'+item.id+'"><img src="<?php echo URL; ?>public/images/bedit.png" alt="Editar" /></a>&nbsp;<a class="tip" title="Listar Permisos" href="<?php echo URL ?>permiso/listar/'+item.id+'"><img width="16" height="16" src="<?php echo URL; ?>public/images/list.png" alt="Listar Permisos" /></a> &nbsp;<a class="tip" title="Eliminar" id="eliminar-perfil" href="#"><img  src="<?php echo URL; ?>public/images/bdelete.png" alt="Eliminar" onclick="eliminarPerfil('+item.id+')"/></a></td></tr>';
                        });
                        $(".sortable tbody").html(html);
                        $(".sortable").trigger("update");
                        var sorting = [[1,0]];
                        $(".sortable").trigger("sorton",[sorting]);
                    }
                }
            });
        }
        $("#perfiles").live("keyup",(function(){
            search_perfil();
        }));


    });



</script>
<div class="block_head">
    <div class="bheadl"></div>
    <div class="bheadr"></div>

    <h2> Perfiles</h2>

    <ul class="tabs">
        <li class="active nobg"><a href="#list">Listar</a></li>
        <li><a href="#new">Nuevo Perfil</a></li>
    </ul>

    <ul>
        <li>
            <form>
                <label for="perfiles">Buscar:</label><input class="text" type="text" id="perfiles" value="" >
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
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->perfiles as $value) {
                    ?>
                    <tr class="rows even">
                        <td>
                            <?php echo $value['id']; ?>
                        </td>
                        <td>
                            <?php echo $value['nombre']; ?> 
                        </td>

                        <td class="options">
                            <a class="tip" title="Editar" href="<?php echo URL ?>perfil/editar/<?php echo $value['id'] ?>"><img src="<?php echo URL; ?>public/images/bedit.png" alt="Editar" /></a>
                            <a class="tip" title="Listar Permisos" href="<?php echo URL ?>permiso/listar/<?php echo $value['id'] ?>"><img width="16" height="16" src="<?php echo URL; ?>public/images/list.png" alt="Listar Permisos" /></a> 
                            <a class="tip" title="Eliminar" id="eliminar-perfil" href="#"><img  src="<?php echo URL; ?>public/images/bdelete.png" alt="Eliminar" onclick="eliminarPerfil(<?php echo $value['id'] ?>)"/></a>
                        </td>


                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </form>

</div>
<div style="display: none;" class="block_content tab_content hide" id="new">

    <form novalidate="novalidate" method="post" action="<?php echo URL ?>perfil/crear" enctype="multipart/form-data" id="form_">  
        <p> 
            <label>Nombre</label><br> <input name="nombre" id="nombre" size="55" class="text required" type="text">
        </p>
        <table>
            <tr>
                
            
        <?php foreach($this->modulos as $modulo){ 
                $this->count++;
        ?>
            <td>
            <p>
                <label><?php echo strtoupper($modulo['nombre']) ?></label>
                <input type="hidden" name="modulos[]" value="<?php echo $modulo['id']?>">
                <ul>
                    <?php foreach($this->permisos as $permiso){ ?>
                    <li><input type="checkbox" name="permiso_<?php echo $modulo['id']?>[]" value="<?php echo $permiso['id']?>"><?php echo strtoupper($permiso['nombre'])?></li>
                    <?php } ?>
                </ul>
            <p>
            </td>
        <?php if($this->count/5 ==1){?>
            </tr>
            <tr>
        <?php }} ?>
            </tr>
        </table>
        <hr>
        <p>
            <input class="submit mid" value="Guardar" type="submit">
        </p>

    </form>

</div>