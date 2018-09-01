$(document).ready(function() {
	$('#dataTables-example').DataTable().fnDestroy()
    $('#dataTables-example').DataTable({
            responsive: true
    })
})