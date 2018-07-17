$(document).ready(function(){

	$('#recordsTable').DataTable();

    $("#register-edit").on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
        var isNew = $(e.relatedTarget).data('new');
        $(e.currentTarget).find('input[name="isNew"]').val(isNew);
        $(e.currentTarget).find('input[name="IdEdit"]').val(id);  
        
        if (!isNew){
        	$.ajax({
        	    type: "GET",
        	    url: "scripts/registers.php",
        	    data: 'id=' + id,
        	    success: function (res) {
        	        var data = JSON.parse(res);
        	        console.log(data);
        	    	$('#matriculaEdit').val(data.matricula);
        	    	$('#nombreEdit').val(data.nombre);
        	    	$('#apellidoEdit').val(data.apellido);
        	    	$('#nombreEdit').val(data.nombre);
        	    	$('#carreraEdit').val(data.carrera);
        	    	if (data.tipo != 'null') $('#tipoEdit').val(data.tipo);
        	    	$('#turnoEdit').val(data.turno);
        	    	if (data.paso == 1) $('#pasoEdit').prop('checked', true);
        	    	if (data.llego == 1) $('#llegoEdit').prop('checked', true);
        	    	$('#turnoEdit').val(data.turno.substring(0,10)+'T'+data.turno.substring(11,16));
        	    },
        	});
        }        
    });

    $("#register-edit").on('hidden.bs.modal', function (e) {
    	$('#editForm')[0].reset();
	});

    $("#editForm").on('submit', function (e) {
    	e.preventDefault();    	
    	var id = $(e.currentTarget).find('input[name="IdEdit"]').val();
    	var isNew = $(e.currentTarget).find('input[name="isNew"]').val();
    	// console.log(id);
    	// console.log(isNew);
        var data =  $(this).serialize();
        console.log(data);
        $.ajax({
		    type: "POST",
		    url: "scripts/registers.php",
		    data: data, 
		    success: function (res) {
		    	var data = JSON.parse(res);
		    	console.log(data);
		    	if (isNew == 'true') {
		    		window.location.reload(1);
		    	} else {
		    		$('#matricula-'+id).html(data.matricula);
		    		$('#nombre-'+id).html(data.nombre);
		    		$('#apellido-'+id).html(data.apellido);
		    		$('#carrera-'+id).html(data.carrera);
		    		$('#tipo-'+id).html(data.tipo);
		    		$('#turno-'+id).html(data.turno);
		    		if (data.llego == '1') $('#llego-'+id).html('&check;');
		    		else $('#llego-'+id).html('');
		    		if (data.paso == '1') $('#paso-'+id).html('&check;');
		    		else $('#paso-'+id).html('');
		    	}
		        $('#register-edit').modal('hide');
		        
	        }
        });
    });
});