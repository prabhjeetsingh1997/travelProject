$(function () {
	$(document).on('click',".viewpartnerEmployee",function(){
      	$("#empDetail").modal();
      	var id = $(this).attr('rel');
      	$("#empModel").html('Query Detail: <strong>'+id+'</strong>');
      	$("#query_id").val(id);
      //$("#empdetail").html($("#detail_"+id).html());
	});

	$(document).on('click',".markColor",function(){
      	$("#queryColor").modal();
      	var id = $(this).attr('rel');
      	$("#colorModel").html('Query Detail: <strong>'+id+'</strong>');
      	$("#query_id").val(id);
      //$("#empdetail").html($("#detail_"+id).html());
	});

	$(document).on('click',".massPush",function(){
		var checked = $("input:checkbox[name=mass_delete]:checked").length > 0;
	    if (!checked){
	        alert("Please check at least one checkbox");
	        return false;
	    }
      	$("#pushDetail").modal();
	});

	$(document).on('click',".viewCancelDetail",function(){
      	$("#cDetail").modal();
      	var id = $(this).attr('rel');
      	$("#cmodalHead").html('Cancelation Reason: <strong>'+id+'</strong>');
      	$("#cdetail").html($("#cdetail_"+id).html());
	});

	$('.deleteVendor').on('click', function () {
        return confirm('Are you sure?');
    });

	$("#assignEmp").click(function(){
		var query_id = $("#query_id").val();
		var emp_id = $("#pushed_employee").val();
		var base_url = $("#base_url").val();
		$.ajax({
			type:"POST",
        	url:base_url+'/updateQueryHandledBy',
        	data:{qid:query_id, eid:emp_id},    // multiple data sent using ajax
        	beforeSend:function() {
				$("#custom-loader").css("display","block");
			},
			success: function(html)
			{
				if(html == 1)
			 	{
					swal("Good job!", "User Is Assigned to Query!","success").then( () => {
    					location.reload();
					})
			 	}
			 	else
			 	{
					swal("Oops!", "There is something problem!","error").then( () => {
    					location.reload();
					})
			 	}
			},
			complete: function() {
				$("#custom-loader").css("display","none");
			}
		});
	});

	$("#assignPushEmp").click(function(){
		var selected = new Array();
        $("input:checkbox[name=mass_delete]:checked").each(function(){
          	selected.push($(this).val());
        });
		var emp_id = $("#pushed_mass_employee").val();
		var base_url = $("#base_url").val();
		$.ajax({
			type:"POST",
        	url:base_url+'/updateMassQueryHandledBy',
        	data:{qid:selected, eid:emp_id},    // multiple data sent using ajax
        	beforeSend:function() {
				$("#custom-loader").css("display","block");
			},
			success: function(html)
			{
				if(html == 1)
			 	{
					swal("Good job!", "User Is Assigned to Query!","success").then( () => {
    					location.reload();
					})
			 	}
			 	else
			 	{
					swal("Oops!", "There is something problem!","error").then( () => {
    					location.reload();
					})
			 	}
			},
			complete: function() {
				$("#custom-loader").css("display","none");
			}
		});
	});

	$("#cancelquery").click(function(){
		var query_id = $("#query_id").val();
		var reason = $("#cancel_reason").val();
		var base_url = $("#base_url").val();
		$.ajax({
			type:"POST",
        	url:base_url+'/queryStatusCanceled',
        	data:{qid:query_id, cancel_reasonn:reason},    // multiple data sent using ajax
        	beforeSend:function() {
				$("#custom-loader").css("display","block");
			},
			success: function(html)
			{
				if(html == 1)
			 	{
					swal("Good job!", "Query cancelled Succesfully!","success").then( () => {
					    location.reload();
    					//window.location.href = base_url+'/';
    					
					})
			 	}
			 	else
			 	{
					swal("Oops!", "There is something problem!","error").then( () => {
    					location.reload();
					})
			 	}
			},
			complete: function() {
				$("#custom-loader").css("display","none");
			}
		});
	});

	$("#markColor").click(function(){
		var query_id = $("#query_id").val();
		var color = $("#query_color").val();
		var base_url = $("#base_url").val();
		$.ajax({
			type:"POST",
        	url:base_url+'/markQueryColor',
        	data:{qid:query_id, query_color:color},    // multiple data sent using ajax
        	beforeSend:function() {
				$("#custom-loader").css("display","block");
			},
			success: function(html)
			{
				if(html == 1)
			 	{
					swal("Good job!", "Color is marked to Query","success").then( () => {
    					window.location.href = base_url+'/queryInHand';
					})
			 	}
			 	else
			 	{
					swal("Oops!", "There is something problem!","error").then( () => {
    					location.reload();
					})
			 	}
			},
			complete: function() {
				$("#custom-loader").css("display","none");
			}
		});
	});

	$(document).on('click',".viewEmployeeDetail",function(){
      $("#qDetail").modal();
      var id = $(this).attr('rel');
      $("#modalHead").html('Query Detail: <strong>'+id+'</strong>');
      $("#mdetail").html($("#detail_"+id).html());
	});
	
// 	$(document).on('click',".maketourcard",function(){
//       $("#TourCard").modal();
//       var id = $(this).attr('rel');
//     //   $("#modalHead").html('Query Detail: <strong>'+id+'</strong>');
//       //$("#mdetail").html($("#detail_"+id).html());
// 	});
	

	 $(document).ready(function () {
    $("#ckbCheckAll").click(function () {
        $(".checkBoxClass").prop('checked', $(this).prop('checked'));
    });
});

  	$("#massDelete").click(function() {
    var checked = $("input:checkbox[name=mass_delete]:checked").length > 0;
    if (!checked){
        alert("Please check at least one checkbox");
        return false;
    }

    var result = confirm("Are you sure to delete?");
    if(result){
    	var base_url = $("#base_url").val();
       	var selected = new Array();
        $("input:checkbox[name=mass_delete]:checked").each(function(){
          	selected.push($(this).val());
        });
        $.ajax({
          	type:"POST",
              	url:base_url+'/deleteMassQuery',
              	data:{ids:selected},    // multiple data sent using ajax
              	beforeSend:function() {
                	$("#custom-loader").css("display","block");
              	},
              	success: function(html)
              	{	
                	if(html == 1)
                	{
                  		swal("Good job!", "Query is Deleted Succesfully","success").then( () => {
                      		location.reload();
                  		})
                	}
                	else
                	{
                  		swal("Oops!", "There is something problem!","error").then( () => {
                      		location.reload();
                  		})
                	}
              	},
              	complete: function() {
                	$("#custom-loader").css("display","none");
              	}
        	});
    	}else{
        	return false;
    	}
  	});

  	$(document).on('click',".advanceSearch",function(){
      	$("#advanceSearchPopup").modal();
	});

	$("#advanceSearchSumbit").click(function() {
		if ($("#ad_name").val() == '' && $("#ad_email").val() == '' && $("#ad_number").val() == '' 
			&& $("#ad_destination").val() == '' && $("#ad_handler").val() == '' 
			&& $("#ad_date").val() == '' && $("#ad_queryid") == '' && $("#ad_status") == '') {
			swal("Oops!", "Please Select atleast one field to search!","error").then( () => {
          		return false;
      		});
		}else{
			var base_url = $("#base_url").val();
			$.ajax({
          	type:"POST",
              	url:base_url+'/advanceQuerySearch',
              	data:$("#advanceSearchForm").serialize(),    // multiple data sent using ajax
              	beforeSend:function() {
                	$("#custom-loader").css("display","block");
              	},
              	success: function(html)
              	{	
              		$("#advancetable").html(html);
              		$("#advanceSearchPopup").modal('hide');
              	},
              	complete: function() {
                	$("#custom-loader").css("display","none");
              	}
        	});
		}
	});
});
