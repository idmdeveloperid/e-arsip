$(document).ready(function(){

//event
$('#search').on('keyup', function(){

    $('#wadah').load('vendors/ajak/ajaksk.php?search=' + $('#search').val());

});

});