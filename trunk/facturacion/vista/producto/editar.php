<div class="block_head">
        <div class="bheadl"></div>
        <div class="bheadr"></div>
        
        <h2>Editar Producto</h2>
        
        <ul class="tabs">
            <li class="active nobg"><a href="javascript: history.back()">Atras</a></li>
<!--            <li><a href="<?php echo URL;?>producto">Nuevo Producto</a></li>-->
        </ul>
    </div>
<div class="block_content">
    <form novalidate="novalidate" method="post" action="<?php echo URL ?>producto/guardarEditar/<?php echo $this->producto['id']?>" enctype="multipart/form-data" id="form_">
    

    <p>
        <label for="codigo">Codigo</label><br>
        <input type="text" name="codigo" id="codigo" value="<?php echo $this->producto['codigo'] ?>" size="55" class="text required"/>
    </p>

    <p>
        <label for="descripcion">Descripcion</label><br>
        <input  type="text" name="descripcion" id="descripcion" value="<?php echo $this->producto['descripcion'] ?>" size="55" class="text required" />
    </p>

    <p>
        <label for="precio_compra">Precio Compra</label><br>
        <input  type="text" name="precio_compra" id="precio_compra" value="<?php echo $this->producto['precio_compra'] ?>" size="55" class="text required"/>
    </p>

    <p>
        <label for="precio_venta">Precio Venta</label><br>
        <input  type="text" name="precio_venta" id="precio_venta" value="<?php echo $this->producto['precio_venta'] ?>" size="55" class="text required"/>
    </p>

    <p>
        <label for="stock_minimo">Stock Minimo</label><br>
        <input  type="text" name="stock_minimo" id="stock_minimo" value="<?php echo $this->producto['stock_minimo'] ?>" size="55" class="text required"/>
    </p>

    <p>
        <label for="existencia">Existencia</label><br>
        <input  type="text" name="existencia" id="existencia" value="<?php echo $this->producto['existencia'] ?>" size="55" class="text "/>
    </p>

    <p>
       <input class="submit long" class="boton-enviar" type="submit" value="Actualizar" />
    </p>

    </form>

</div>


