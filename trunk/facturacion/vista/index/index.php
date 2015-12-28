<div class="block_head">
                                    <div class="bheadl"></div>
                                    <div class="bheadr"></div>
                                    <h2>Bienvenido</h2>
                                </div>
                                <div class="block_content" id="fondo_inicio"> 
<div class="grid_12" id="icondock">
        <div id="icondock" class="grid_12">
            <ul>

                    <?php if(Permisos::tienePermiso('usuarios', 'ver')){ ?>
                    <li><a original-title="Ver usuarios" href="<?php echo URL; ?>usuario" class="tip"><img src="<?php echo URL; ?>/public/images/user.png" alt="Users"><br>Usuarios</a></li>
                    <?php }?>
                    <?php if(Permisos::tienePermiso('clientes', 'ver')){ ?>
                    <li><a original-title="Clientes" href="<?php echo URL; ?>cliente" class="tip"><img src="<?php echo URL; ?>/public/images/client.png" alt="Contacts"><br>Clientes</a></li>
                    <?php }?>
                    <?php if(Permisos::tienePermiso('proveedores', 'ver')){ ?>
                    <li><a original-title="Proveedores" href="<?php echo URL; ?>proveedor" class="tip"><img src="<?php echo URL; ?>/public/images/provider.png" alt="Proveedores"><br>Proveedores</a></li>
                    <?php }?>
                    <?php if(Permisos::tienePermiso('productos', 'ver')){ ?>
                    <li><a original-title="Productos" href="<?php echo URL; ?>producto" class="tip"><img src="<?php echo URL; ?>public/images/product.png" alt="Productos"><br>Productos</a></li>
                    <?php }?>
                    <?php if(Permisos::tienePermiso('facturas', 'ver')){ ?>
                    <li><a original-title="Facturas" href="<?php echo URL; ?>factura" class="tip"><img src="<?php echo URL; ?>/public/images/doc.png" alt="Facturas"><br>Facturas</a></li>
                    <?php }?>




            </ul><br clear="all">

        </div>

</div>
                                    </div>		<!-- .block_content ends -->

