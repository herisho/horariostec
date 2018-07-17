function checkIn(id) {
    $.ajax({
        type: "POST",
        url: "scripts/checkin.php",
        data: "id=" + id, 
        success: function (res) {} 
    });    
}

$(document).ready(function(){

	var table = $('#recordsTable').DataTable();

    $('.llegoBtn').on( 'click', function () {
        table
            .row( $(this).parents('tr') )
            .remove()
            .draw();
    } );

});