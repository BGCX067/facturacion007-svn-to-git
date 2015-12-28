<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="block_head">
    <div class="bheadl"></div>
    <div class="bheadr"></div>

    <h2> Editar Perfil</h2>

    <ul class="tabs">
        <li class="active nobg"><a href="javascript: history.back()">Atras</a></li>
    </ul>
</div>

<div class="block_content">

    <form method="post" action="<?php echo URL ?>perfil/guardarEditar/<?php echo $this->perfil['id'] ?>" enctype="multipart/form-data">                
        <input type="hidden" name="id" id="id" value="22" />
        <p><label>Nombre</label> <br /><input type="text" name="nombre" id="nombre" size="55" class="text" value="<?php echo $this->perfil['nombre'] ?>"> </p>
        <table>
            <tr>
                <?php
                foreach ($this->permisos as $modulo => $permiso) {
                    $this->count++;
                    ?>

                    <td>



                        <p>
                            <label><?php echo strtoupper($modulo) ?></label>
                            <input type="hidden" name="modulos[]" value="<?php echo $this->id_modulos[$modulo] ?>">
                        <ul>
                            <?php
                            if (is_array($permiso)) {
                                foreach ($permiso as $clave => $permiso_perfil) {
                                    if ($permiso_perfil) {
                                        ?>   

                                        <li><input type="checkbox" checked name="permiso_<?php echo $this->id_modulos[$modulo] ?>[]" value="<?php echo $this->solo_permisos[$modulo][$clave] ?>"><?php echo strtoupper($clave) ?></li>
                                    <?php } else { ?>
                                        <li><input type="checkbox" name="permiso_<?php echo $this->id_modulos[$modulo] ?>[]" value="<?php echo $this->solo_permisos[$modulo][$clave] ?>"><?php echo strtoupper($clave) ?></li>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </ul>
                        <p>
                    </td>
                    <?php if ($this->count / 5 == 1) { ?>
                    </tr>
                    <tr>
                    <?php
                    }
                }
                ?>
            </tr>
        </table>

        <hr>
        <p>
            <input type="submit" class="submit mid" value="Actualizar" />
        </p>

    </form>

</div>