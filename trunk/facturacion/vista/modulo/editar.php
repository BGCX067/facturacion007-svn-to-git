<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="block_head">
    <div class="bheadl"></div>
    <div class="bheadr"></div>

    <h2> Editar Modulo</h2>

    <ul class="tabs">
        <li class="active nobg"><a href="javascript: history.back()">Atras</a></li>
    </ul>
</div>

<div class="block_content">

    <form method="post" action="<?php echo URL ?>modulo/guardarEditar/<?php echo $this->modulo['id'] ?>" enctype="multipart/form-data">                
        <input type="hidden" name="id" id="id" value="22" />
        <p><label>Nombre</label> <br /><input type="text" name="nombre" id="nombre" size="55" class="text" value="<?php echo $this->modulo['nombre'] ?>"> </p>
        
        <hr>
        <p>
            <input type="submit" class="submit mid" value="Actualizar" />
        </p>

    </form>

</div>