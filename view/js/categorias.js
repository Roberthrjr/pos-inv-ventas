// EDITAR CATEGORIA
$(".btnEditarCategoria").click(function(){

    var idCategoria = $(this).attr('idCategoria');

    var datos = new FormData();
    
    datos.append("idCategoria", idCategoria);

    $.ajax({
        url: "ajax/categorias.ajax.php",
        method:'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:'json',
        success:function(respuesta){

            $("#editarCategoria").val(respuesta["categoria"]);
     		$("#idCategoria").val(respuesta["id"]);
        
        }
    })
})

// BORRAR CATEGORIA
$(".btnEliminarCategoria").click(function(){
    
    var idCategoria = $(this).attr('idCategoria');

    Swal.fire({
        icon: 'warning',
        title: '¿Esta seguro de eliminar la categoría?',
        text: 'Si esta seguro, presiones en el boton azul',
        showCancelButton: true,
        confirmButtonColor:'#3085d6',
        cancelButtonColor:'#d33',
        confirmButtonText: 'Si, deseo eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {

            window.location = "index.php?ruta=categorias&idCategoria="+idCategoria;
    
        }
    });

})