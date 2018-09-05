$(document).ready(function(){
	$("#formu-nuevo-productos").submit(function (e) {
		e.preventDefault()

		var datos = new FormData($(this)[0])

		$.ajax({
			url: 'ajax/ajaxProducto.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta) {
				if (respuesta == "ok") {
					swal({
					  type: 'success',
					  title: 'Excelente',
					  text: 'Producto creado con éxito'
					}).then((result) => {
					  if (result.value) {
					    window.location = "productos"
					  }
					})
				}
			}

		})

	})
	
	$("#formu-editar-productos").submit(function (e) {
		e.preventDefault()

		var datos = new FormData($(this)[0])

		$.ajax({
			url: 'ajax/ajaxProducto.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta) {
				if (respuesta == "ok") {
					swal({
					  type: 'success',
					  title: 'Actualizado',
					  text: 'Producto actualizado con éxito'
					}).then((result) => {
					  if (result.value) {
					    window.location = "productos"
					  }
					})
				}
			}

		})
	})

	$("body .table-dark").on("click", ".btnEditarProductos", function(){
		var idProductos = $(this).attr("idProductos")
		var datos = new FormData()
		datos.append("id", idProductos)
		datos.append("tipoOperacion", "editarProducto")

		$.ajax({
			url: 'ajax/ajaxProducto.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta) {
				var valor = JSON.parse(respuesta)

				$('#formu-editar-usuario input[name="ruta"]').val(valor.ruta)
				$('#formu-editar-usuario input[name="titulo"]').val(valor.titulo)
				$('#formu-editar-usuario textarea[name="descripcion"]').val(valor.descripcion)
				$('#formu-editar-usuario input[name="detalle"]').val(valor.detalle)
				$('#formu-editar-usuario input[name="precio"]').val(valor.precio)
				$('#formu-editar-usuario input[name="oferta"]').val(valor.oferta)
				$('#formu-editar-usuario input[name="preciooferta"]').val(valor.preciooferta)
				$('#formu-editar-usuario input[name="descuento"]').val(valor.descuento)
				$('#formu-editar-usuario input[name="finoferta"]').val(valor.finoferta)
				$('#formu-editar-usuario input[name="idcategoria"]').val(valor.idcategoria)
				$('#formu-editar-usuario input[name="idsubcategoria"]').val(valor.idsubcategoria)

			}

		})

	})

	$("body .table-dark").on("click", ".btnEliminarProductos", function(){
		var idProductos = $(this).attr("idProductos")
		var rutaImagen = $(this).attr("rutaImagen")
		var datos = new FormData()
		datos.append("id", idUsuario)
		datos.append("tipoOperacion", "eliminarproducto")
		datos.append("ruta", rutaImagen)
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
				url: 'ajax/ajaxProducto.php',
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
						    window.location = "productos"
						  }
						})
					}
				}

			})
		  }
		})	
	})



		// PREVISUALIZAR IMAGENES

		$("#imagenNuevaProductos").change(previsualizarImg)
		$("#imagenEditarProductos").change(previsualizarImg)
	
	
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
					$("#ruta").val("")
	
					swal({
						type: "Error al subir la imagen",
						text: "La imagen debe pesar MAX 2MB",
						icon: 'error',
						confirmButtonText: "¡Cerrar!",
					})
				}
	
				else {
					$("#ruta").css("display", "block")
	
					var datosImagen = new FileReader;
						datosImagen.readAsDataURL(imgSlider);
	
						$(datosImagen).on("load", function(event){
	
							var rutaImagen = event.target.result;
	
							$("." + identificador +" #ruta").attr("src", rutaImagen);
						})
				}
	
		}
})