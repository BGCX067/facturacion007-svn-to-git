<!doctype html>
<?php Session::init(); ?>

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=7">

                <title>Sistema Facturación<?php $this->mostrarTitulo(); ?></title>
                <style type="text/css" media="all">
                    @import url("<?php echo URL; ?>public/css/style.css");
                    @import url("<?php echo URL; ?>public/css/jquery.wysiwyg.css");
                    @import url("<?php echo URL; ?>public/css/facebox.css");
                    @import url("<?php echo URL; ?>public/css/visualize.css");
                    @import url("<?php echo URL; ?>public/css/date_input.css");
                    @import url("<?php echo URL; ?>public/jquery-ui/css/smoothness/jquery-ui-1.8.20.custom.css");
                </style>
                <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.js"></script>
                <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.img.preload.js"></script>
                <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.filestyle.mini.js"></script>
                <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.wysiwyg.js"></script>
                <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.date_input.pack.js"></script>
                <script type="text/javascript" src="<?php echo URL; ?>public/js/facebox.js"></script>
                <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.select_skin.js"></script>
                <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.tablesorter.min.js"></script>
                <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.tablesorter.filer.js"></script>
                <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.tablesorter.pager.js"></script>
                <script type="text/javascript" src="<?php echo URL; ?>public/js/ajaxupload.js"></script>
                <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.pngfix.js"></script>
                <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.tipsy.js"></script>
                <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.validate.js"></script>
                <script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>
                <script type="text/javascript" src="<?php echo URL; ?>public/jquery-ui/js/jquery-ui-1.8.20.custom.min.js"></script>
               
                 <?php $this->mostrarJs(); ?>
                </head>
                <body>
                    <div id="hld">
                        <div class="wrapper">
                            <div id="header">
                                <div class="hdrl"></div>
                                <div class="hdrr"></div>
                                <h1><a href="#">Sistema Facturación</a></h1>
                                <ul id="nav">
                                    <li class="">
                                        <a href="<?php echo URL; ?>">Inicio</a>
                                        
                                    </li>
                                    <li class="">
                                        <a href="">Datos</a>
                                        <ul>
                                             <?php if(Permisos::tienePermiso('clientes', 'ver')){ ?>
                                            <li><a href="<?php echo URL; ?>cliente">Clientes</a></li>
                                            <?php }?>
                                            <?php if(Permisos::tienePermiso('proveedores', 'ver')){ ?>
                                            <li><a href="<?php echo URL; ?>proveedor">Proveedores</a></li>
                                            <?php }?>
                                            <?php if(Permisos::tienePermiso('productos', 'ver')){ ?>
                                            <li><a href="<?php echo URL; ?>producto">Productos</a></li>
                                            <?php }?>
                                        </ul>
                                    </li>
                                    <li class="">
                                        <a href="">Facturación</a>
                                        <ul>
                                            <?php if(Permisos::tienePermiso('facturas', 'ver')){ ?>
                                            <li class=""><a href="<?php echo URL; ?>factura">Facturas</a></li>
                                            <?php }?>
                                        </ul>
                                    </li>
                                    <?php if(Session::get('rol') == 'administrador'){?>
                                    <li class="">
                                        <a href="">Administración</a>
                                        <ul>                                          
                                            <li><a href="<?php echo URL; ?>usuario">Usuarios</a></li> 
                                            <li><a href="<?php echo URL; ?>perfil">Perfiles</a></li>
                                            <li><a href="<?php echo URL; ?>modulo">Modulos</a></li>
                                        </ul>
                                    </li>
                                    <li class="">
                                        <a href="">Mantenimiento</a>
                                        <ul>                                          
                                            <li><a href="#">Respaldo</a></li>                                            
                                        </ul>
                                    </li>
                                    <?php }?>
                                </ul>

                                <p class="user">Hola, <a href="<?php echo URL; ?>usuario"><?php echo $this->usuario; ?></a> | <a href="<?php echo URL; ?>dashboard/logout">Salir</a></p>

                            </div>


                            <div class="block">
                                



