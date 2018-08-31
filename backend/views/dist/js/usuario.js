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
	
	$("#formu-editar-usuario").submit(function (e) {
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
					  title: 'Actualizado',
					  text: 'Usuario actualizado con éxito'
					}).then((result) => {
					  if (result.value) {
					    window.location = "usuarios"
					  }
					})
				}
			}

		})
	})

	$("body .table-dark").on("click", ".btnEditarUsuario", function(){
		var idUsuario = $(this).attr("idUsuario")
		var datos = new FormData()
		datos.append("id_admin", idUsuario)
		datos.append("tipoOperacion", "editarUsuario")

		$.ajax({
			url: 'ajax/ajaxUsuario.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta) {
				var valor = JSON.parse(respuesta)

				$('#formu-editar-usuario input[name="nombre_admin"]').val(valor.nombre_admin)
				$('#formu-editar-usuario input[name="correo_admin"]').val(valor.correo_admin)
				$('#formu-editar-usuario textarea[name="password_admin"]').val(valor.password_admin)
				$('#formu-editar-usuario #avatar_admin').attr("src", valor.avatar_admin)
				$('#formu-editar-usuario input[name="id_admin"]').val(valor.id_admin)
				$('#formu-editar-usuario input[name="rutaActual"]').val(valor.avatar_admin)

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



		// PREVISUALIZAR IMAGENES

		$("#imagenNuevaUsuario").change(previsualizarImg)
		$("#imagenEditarUsuario").change(previsualizarImg)
	
	
		function previsualizarImg(e) {
			var contenedor = e.target.parentNode
	
			var identificador = contenedor.classList[1]
	
			imgSlider = this.files[0];
	
				if( imgSlider["type"] != "image/jpeg" && imgSlider["type"] != "image/png") {
					$("#custom").val("")
	
					swal({
						type: 'error',
						title: 'No es una imagen!!',
						text: 'Debe subir imagenes en formato JPEG o PNG',
					})
				} 
				if ( imgSlider["type"] > 2000000) {
					$("#avatar_admin").val("")
	
					swal({
						type: "Error al subir la imagen",
						text: "La imagen debe pesar MAX 2MB",
						icon: 'error',
						confirmButtonText: "¡Cerrar!",
					})
				}
	
				else {
					$("#avatar_admin").css("display", "block")
	
					var datosImagen = new FileReader;
						datosImagen.readAsDataURL(imgSlider);
	
						$(datosImagen).on("load", function(event){
	
							var rutaImagen = event.target.result;
	
							$("." + identificador +" #avatar_admin").attr("src", rutaImagen);
						})
				}
	
		}
})