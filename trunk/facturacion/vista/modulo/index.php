<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script type="text/javascript">
    $(function() {
        function search_modulo(){
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "<?php echo URL; ?>modulo/buscar_modulo/"+$('#modulos').val(),
                success: function(data){
                    if(data.length > 0){
                        var html ='';
                        $.each(data, function(i,item){
                            html += '<tr class="rows"><td>'+item.id+'</td><td>'+item.nombre+'</td><td><a class="tip" title="Editar" href="<?php echo URL ?>modulo/editar/'+item.id+'"><img src="<?php echo URL; ?>public/images/bedit.png" alt="Editar" />&nbsp;<a class="tip" title="Eliminar" id="eliminar-perfil" href="#"><img  src="<?php echo URL; ?>public/images/bdelete.png" alt="Eliminar" onclick="eliminarModulo('+item.id+')"/></a></td></tr>';
                        });
                        $(".sortable tbody").html(html);
                        $(".sortable").trigger("update");
                        var sorting = [[1,0]];
                        $(".sortable").trigger("sorton",[sorting]);
                    }
                }
            });
        }
        $("#modulos").live("keyup",(function(){
            search_modulo();
        }));


    });



</script>
<div class="block_head">
    <div class="bheadl"></div>
    <div class="bheadr"></div>

    <h2> Modulos</h2>

    <ul class="tabs">
        <li class="active nobg"><a href="#list">Listar</a></li>
        <li><a href="#new">Nuevo Modulo</a></li>
    </ul>

    <ul>
        <li>
            <form>
                <label for="modulos">Buscar:</label><input class="text" type="text" id="modulos" value="" >
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
                foreach ($this->modulos as $value) {
                    ?>
                    <tr class="rows even">
                        <td>
                            <?php echo $value['id']; ?>
                        </td>
                        <td>
                            <?php echo $value['nombre']; ?> 
                        </td>

                        <td class="options">
                            <a class="tip" title="Editar" href="<?php echo URL ?>modulo/editar/<?php echo $value['id'] ?>"><img src="<?php echo URL; ?>public/images/bedit.png" alt="Editar" /></a>
                            <a class="tip" title="Eliminar" id="eliminar-modulo" href="#"><img  src="<?php echo URL; ?>public/images/bdelete.png" alt="Eliminar" onclick="eliminarModulo(<?php echo $value['id'] ?>)"/></a>
                        </td>


                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </form>

</div>
<div style="display: none;" class="block_content tab_content hide" id="new">

    <form novalidate="novalidate" method="post" action="<?php echo URL ?>modulo/crear" enctype="multipart/form-data" id="form_">  
        <p> 
            <label>Nombre</label><br> <input name="nombre" id="nombre" size="55" class="text required" type="text">
        </p>
        <hr>
        <p>
            <input class="submit mid" value="Guardar" type="submit">
        </p>

    </form>

</div>