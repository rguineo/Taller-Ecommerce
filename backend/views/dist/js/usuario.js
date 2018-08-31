$(document).ready(function(){
	$("#formu-nuevo-usuario").submit(function (e) {
		e.preventDefault()

		var datos = new FormData($(this)[0])

		$.ajax({
			url: 'ajax/ajaxUsuario.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta) {
				if (respuesta == "ok") {
					swal({
					  type: 'success',
					  title: 'Excelente',
					  text: 'Usuario creada con éxito'
					}).then((result) => {
					  if (result.value) {
					    window.location = "usuarios"
					  }
					})
				}
			}

		})

    })

    $("body .table-dark").on("click", ".btnEliminarUsuario", function(){
		var idUsuario = $(this).attr("idUsuario")
		var rutaImagen = $(this).attr("rutaImagen")
		var datos = new FormData()
		datos.append("id_admin", idUsuario)
		datos.append("tipoOperacion", "eliminarUsuario")
		datos.append("avatar_admin", rutaImagen)
        console.log("pasoporaca")
		swal({
		  title: '¿Estás seguro de eliminar?',
		  text: "Los cambios no son reversibles!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Si, Elimina!'
		}).then((result) => {
		  if (result.value) {
		  	$.ajax({
				url: 'ajax/ajaxUsuario.php',
				type: 'POST',
				data: datos,
				processData: false,
				contentType: false,
				success: function(respuesta) {
					if ( respuesta == "ok") {
						swal(
					      'Eliminado!',
					      'Su archivo a sido eliminado.',
					      'success'
					    ).then((result) => {
						  if (result.value) {
						    window.location = "usuarios"
						  }
						})
					}
				}

			})
		  }
		})	
	})
})