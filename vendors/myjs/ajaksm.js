$(document).ready(function(){
    $('#search').on('keyup', function(){
        $('#wadah').load('vendors/ajak/ajaksm.php?search=' + $('#search').val() );
    });
});