$(document).ready(function() {
	$('#dataTables-example').DataTable().fnDestroy()
    $('#dataTables-example').DataTable({
            responsive: true
    })

    $("#titulo-subcategoria").on("keyup", function(){
        var cadena = $("#titulo-subcategoria").val()
        cadena = getCleanedString(cadena)
        $("#ruta-subcategoria").val(cadena)
    })
    
    $("#titulo-productos").on("keyup", function(){
        var cadena = $("#titulo-productos").val()
        cadena = getCleanedString(cadena)
        $("#ruta-productos").val(cadena)
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



})