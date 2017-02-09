$(function(){
	$('#estado').on('change',function(){
	var id= $('#estado').val();
	var url = 'agre_municipios.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(data){
			$('#municipio option').remove();
			$('#municipio').append(data);
		}
	});
	return false;	
	});
});