$(document).ready(function(){
	$("#formu-nuevo-subcategorias").submit(function (e) {
		e.preventDefault()

    	var datos = new FormData($(this)[0])
	
		$.ajax({
			url: 'ajax/ajaxSubCategorias.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta){
				var cadena = respuesta
				console.log(cadena)
				if (cadena == "ok") {
					swal({				
						type: 'success',
						title: 'Excelente',
						text: 'SubCategoría creada con éxito'
					}).then((result) => {
						if (result.value) {
							window.location = "subcategorias"
						}
					})
				}
			}

		})
		
	})

    $("body .table-dark").on("click", ".btnEliminarSubCategorias", function(){
		var id = $(this).attr("id")
		var datos = new FormData()
		datos.append("id", id)
		datos.append("tipoOperacion", "eliminarSubCategorias")

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
				url: 'ajax/ajaxSubCategorias.php',
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
						    window.location = "subcategorias"
						  }
						})
					}
				}

			})
		  }
		})	
	})

	$("#inputCategorias").change(function() {

		if ($("#inputCategorias").val() != "" ) {
			var posicion = $("#inputCategorias").val()
			var RutaSelect  = $('#inputCategorias [value="'+posicion+'"]').attr("rutaImagenCat")
			rutaImagen = RutaSelect.substr(3)
	
			$("#imagenCategoria").css("display", "block")
			$("#imagenCategoria").attr("src", rutaImagen);
		}	
	})


	// PREVISUALIZAR IMAGENES

	$("#imagSubCategoria").change(previsualizarImg)
	$("#imagen").change(previsualizarImg)

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
			$("#imagenSubCategoria").val("")

			swal({
				type: "Error al subir la imagen",
				text: "La imagen debe pesar MAX 2MB",
				icon: 'error',
				confirmButtonText: "¡Cerrar!",
			})
		}

		else {
			$("#imagenSubCategoria").css("display", "block")

			var datosImagen = new FileReader;
			datosImagen.readAsDataURL(imgSlider);

			$(datosImagen).on("load", function(event){

				var rutaImagen = event.target.result;

				$("." + identificador +" #imagenSubCategoria").attr("src", rutaImagen);
			})
		}

	}

})