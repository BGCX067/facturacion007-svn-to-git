

function eliminarCliente(id){
    if(confirm("¿Desea Eliminar este Proveedor?")){
        location.href="http://localhost/facturacion/proveedor/eliminar/"+id;
    }
//    else{
//        return false;
//    }
}