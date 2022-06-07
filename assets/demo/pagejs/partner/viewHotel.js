$(function () {
	$(document).on('click',".viewHotelDetail",function(){
      	$("#qDetail").modal();
      	var id = $(this).attr('rel');
      	$("#modalHead").html('Hotel Detail: <strong>'+id+'</strong>');
      	$("#mdetail").html($("#detail_"+id).html());
	});

	 $(document).on('click',".viewPersonDetail",function(){
      	$("#qDetail").modal();
      	var id = $(this).attr('rel');
      	$("#modalHead").html('Person Detail: <strong>'+id+'</strong>');
      	$("#mdetail").html($("#otherdetail_"+id).html());
    });

	$('.deleteVendor').on('click', function () {
        return confirm('Are you sure?');
    });
});