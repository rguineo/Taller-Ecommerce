$(document).ready(function(){
	$("#formu-nuevo-categorias").submit(function (e) {
		e.preventDefault()

		var datos = new FormData($(this)[0])

		$.ajax({
			url: 'ajax/ajaxCategorias.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta) {
				if (respuesta == "ok") {
					swal({
					  type: 'success',
					  title: 'Excelente',
					  text: 'Categoría creada con éxito'
					}).then((result) => {
					  if (result.value) {
					    window.location = "categorias"
					  }
					})
				}
			}

		})

    })
})

$("#titulo-categoria").on("keyup", function(){
    var cadena = $("#titulo-categoria").val()
    cadena = getCleanedString(cadena)
    $("#ruta-categoria").val(cadena)
})

$("#formu-editar-categoria").submit(function (e) {
    e.preventDefault()

    var datos = new FormData($(this)[0])

    $.ajax({
        url: 'ajax/ajaxCategorias.php',
        type: 'POST',
        data: datos,
        processData: false,
        contentType: false,
        success: function(respuesta) {
            if (respuesta == "ok") {
                swal({
                  type: 'success',
                  title: 'Actualizado',
                  text: 'Categoria actualizado con éxito'
                }).then((result) => {
                  if (result.value) {
                    window.location = "slider"
                  }
                })
            }
        }

    })
})

$("body .table-dark").on("click", ".btnEditarCategoria", function(){
    var idCategoria = $(this).attr("idSlider")
    var datos = new FormData()
    datos.append("id", idCategoria)
    datos.append("tipoOperacion", "editarCategoria")

    $.ajax({
        url: 'ajax/ajaxCategorias.php',
        type: 'POST',
        data: datos,
        processData: false,
        contentType: false,
        success: function(respuesta) {
            var valor = JSON.parse(respuesta)
            console.log(valor.id)
            console.log(valor.titulo_slider)

            $('#formu-editar-categoria input[name="tituloCategoria"]').val(valor.categoria)
            $('#formu-editar-categoria input[name="rutaCategoria"]').val(valor.ruta)
            $('#formu-editar-categoria #imagenSlider').attr("src", valor.imagen)
            $('#formu-editar-categoria input[name="id_slider"]').val(valor.idCategoria)
        }
    })
})

$("#titulo-subcategoria").on("keyup", function(){
    var cadena = $("#titulo-subcategoria").val()
    cadena = getCleanedString(cadena)
    $("#ruta-subcategoria").val(cadena)
})

function getCleanedString(cadena){
    // Definimos los caracteres que queremos eliminar
    var specialChars = "'´°¬!¡@#$^&%*()+=[]\/{}|:<>¿?,.";
 
    // Los eliminamos todos
    for (var i = 0; i < specialChars.length; i++) {
        cadena= cadena.replace(new RegExp("\\" + specialChars[i], 'gi'), '');
    }   
 
    // Lo queremos devolver limpio en minusculas
    cadena = cadena.toLowerCase();
 
    // Quitamos espacios y los sustituimos por - porque nos gusta mas asi
    cadena = cadena.replace(/ /g,"-");
 
    // Quitamos acentos y "ñ". Fijate en que va sin comillas el primer parametro
    cadena = cadena.replace(/á/gi,"a");
    cadena = cadena.replace(/ä/gi,"a");
    cadena = cadena.replace(/â/gi,"a");
    cadena = cadena.replace(/à/gi,"a");
    
    cadena = cadena.replace(/é/gi,"e");
    cadena = cadena.replace(/ë/gi,"e");
    cadena = cadena.replace(/ê/gi,"e");
    cadena = cadena.replace(/è/gi,"e");

    cadena = cadena.replace(/í/gi,"i");
    cadena = cadena.replace(/ï/gi,"i");
    cadena = cadena.replace(/î/gi,"i");
    cadena = cadena.replace(/ì/gi,"i");

    cadena = cadena.replace(/ó/gi,"o");
    cadena = cadena.replace(/ö/gi,"o");
    cadena = cadena.replace(/ô/gi,"o");
    cadena = cadena.replace(/ò/gi,"o");

    cadena = cadena.replace(/ú/gi,"u");
    cadena = cadena.replace(/ü/gi,"u");
    cadena = cadena.replace(/û/gi,"u");
    cadena = cadena.replace(/ù/gi,"u");

    cadena = cadena.replace(/ñ/gi,"n");
  
    return cadena;
}