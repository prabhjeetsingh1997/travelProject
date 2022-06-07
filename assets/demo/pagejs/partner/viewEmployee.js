$(function () {
	$(document).on('click',".viewEmployeeDetail",function(){
      	$("#qDetail").modal();
      	var id = $(this).attr('rel');
      	$("#modalHead").html('Employee Detail: <strong>'+id+'</strong>');
      	$("#mdetail").html($("#detail_"+id).html());
	});

	$(document).on('click',".viewDetail",function(){
      	$("#qDetail").modal();
      	var id = $(this).attr('rel');
      	$("#modalHead").html('Employee Detail: <strong>'+id+'</strong>');
      	$("#mdetail").html($("#otherdetail_"+id).html());
    });
});