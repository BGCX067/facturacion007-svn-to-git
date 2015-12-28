function eliminarUsuario(id){
    if(confirm("¿Desea Eliminar este Usuario?")){
        location.href="http://localhost/facturacion/usuario/eliminar/"+id;
    }
}