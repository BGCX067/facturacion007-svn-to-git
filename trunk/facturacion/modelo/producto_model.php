<?php

class Producto_Model extends Modelo {

    function __construct() {
        parent::__construct();
    }
    
    public function listarProductos() {
                
       $consulta = $this->db->ejecutarConsulta('SELECT id, codigo, descripcion, precio_compra,precio_venta,stock_minimo, existencia FROM productos ') ;
       
       return $consulta->fetchAll();
    }
    
    public function listarProductoIndividual($id) {
       // exit("id: ".$id);
//       $sql = 'SELECT p.id, p.rif, p.razon_social, p.telefono,
//               FROM proveedores p
//               WHERE p.id= :id';
       $consulta = $this->db->ejecutarConsulta('SELECT id, codigo, descripcion, precio_compra,precio_venta,stock_minimo, existencia FROM productos where id='.$id) ;
       return $consulta->fetch();
    }
    
    public function crear($data){
        $datos=array(
            'codigo'        => $data['codigo'],
            'descripcion'   => $data['descripcion'],
            'precio_compra' => $data['precio_compra'],
            'precio_venta'  => $data['precio_venta'],
            'stock_minimo'  => $data['stock_minimo'],
            'existencia'    => $data['existencia'],
            'id_proveedor'  => 2//$data['existencia']
        );
        $this->db->insertar('productos', $datos);
    }
    
    public function guardarEditar($data){
       
       $datos=array(
            'codigo'        => $data['codigo'],
            'descripcion'   => $data['descripcion'],
            'precio_compra' => $data['precio_compra'],
            'precio_venta'  => $data['precio_venta'],
            'stock_minimo'  => $data['stock_minimo'],
            'existencia'    => $data['existencia'],
            'id_proveedor'  => $data['id_proveedor']
        );
         $this->db->actualizar('productos', $datos,"id={$data['id']}");
    }
    
    public function eliminar($id) {
        $sql = 'DELETE FROM productos WHERE id= :id';
        $consulta = $this->db->ejecutarConsulta($sql,array(':id' => $id));
    }

    public function listarProductosProveedor($id_proveedor) {

       $consulta = $this->db->ejecutarConsulta('SELECT id, codigo, descripcion, precio_compra,precio_venta,stock_minimo, existencia FROM productos where id_proveedor='.$id_proveedor) ;

       return $consulta->fetchAll();
    }

    public function buscarProveedores($nombre) {

       $consulta = $this->db->ejecutarConsulta("SELECT id,razon_social, rif,telefono from proveedores
where razon_social like '%$nombre%'");
       $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $data = $consulta->fetchAll();
        echo json_encode($data);
    }

    public function buscar_producto($nombre) {

       $consulta = $this->db->ejecutarConsulta("SELECT * from productos where descripcion like '%$nombre%' or codigo like '%$nombre%'");
       $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $data = $consulta->fetchAll();
        echo json_encode($data);
    }

    public function actualizarExistencia($data){
        $sql='UPDATE productos set existencia=existencia + '.$data['existencia'].' where id='.$data['id'];
        $consulta = $this->db->ejecutarConsulta($sql) ;
    }
    

    
    

}