var llegoCounter = 0;

$.ajax({
   type: "GET",
   url: "scripts/checkcounters.php",
   data: 'tipo=llego',
   success: function (res) {
       var data = JSON.parse(res);
       llegoCounter = data.timestamp;
   },
});

setInterval(function(){
   $.ajax({
       type: "GET",
       url: "scripts/checkcounters.php",
       data: 'tipo=llego',
       success: function (res) {
           var data = JSON.parse(res);
           console.log(data);
           if (data.timestamp > llegoCounter) {
                window.location.reload(1);
           }
       },
   });
}, 5000);

function pasarRegistro(id) {
    $.ajax({
        type: "POST",
        url: "scripts/pasarregistro.php",
        data: "id=" + id, 
        success: function (res) {} 
    });    
}

function limpiarTablero(carrera){
    $.ajax({
        type: "POST",
        url: "scripts/pasarregistro.php",
        data: "carrera=" + carrera, 
        success: function (res) {
            $('#clean-modal').modal('show');
        } 
    });    
}

$(document).ready(function(){

	var table = $('#recordsTable').DataTable();

    $('.pasoBtn').on( 'click', function () {
        table
            .row( $(this).parents('tr') )
            .remove()
            .draw();
    } );

});