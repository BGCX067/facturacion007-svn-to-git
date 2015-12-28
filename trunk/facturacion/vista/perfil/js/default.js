function eliminarPerfil(id){
    if(confirm("¿Desea Eliminar este Perfil?")){
        location.href="http://localhost/facturacion/perfil/eliminar/"+id;
    }
}