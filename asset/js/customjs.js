$(function () {
	$('#country_id').on('change',function(){
		var baseUrl = $('#baseUrl').val();
        var country_id = $('#country_id').val();
        $.ajax({
		    type: 'POST',
		    url: baseUrl +'/getStateByCountry',
		    data: {id:country_id},
		    beforeSend: function() {
		    	$("#custom-loader").css("display","block");
		    },
		    success: function(data) {
		    	if (data == '[]' || data == 0) {
		    		$('#state_id').find('option').remove();
		    		swal("Oops!!", "No State Found for this Country!", "error");
		    		$("#state_id").append('<option value = "">Select State</option>');
		    	}else{
		    		$('#state_id').find('option').remove();
		    		$("#state_id").append('<option value = "">Select State</option>');
		    		$.each(JSON.parse(data), function(key,val) {
            			$("#state_id").append('<option value ='+val.id+'>'+val.state_name+'</option>')
        			});
		    	}
		    },
		    complete: function() {
		    	$("#custom-loader").css("display","none");
		    }
		});
    });

    $('#state_id').on('change',function(){
		var baseUrl = $('#baseUrl').val();
        var state_id = $('#state_id').val();
        $.ajax({
		    type: 'POST',
		    url: baseUrl +'/getCityByState',
		    data: {id:state_id},
		    beforeSend: function() {
		    	$("#custom-loader").css("display","block");
		    },
		    success: function(data) {
		    	if (data == '[]' || data == 0) {
		    		$('#city_id').find('option').remove();
		    		swal("Oops!!", "No State Found for this Country!", "error");
		    		$("#city_id").append('<option value = "">Select City</option>');
		    		swal("Oops!!", "No City Found for this State!", "error");
		    	}else{
		    		$('#city_id').find('option').remove();
		    		$("#city_id").append('<option value = "">Select City</option>');
		    		$.each(JSON.parse(data), function(key,val) {
            			$("#city_id").append('<option value = "'+val.id+'">'+val.city_name+'</option>')
        			});
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

    $(document).on('click',".viewDetail",function(){
          $("#qDetail").modal();
          var id = $(this).attr('rel');
          $("#modalHead").html('Employee Detail: <strong>'+id+'</strong>');
          $("#mdetail").html($("#otherdetail_"+id).html());
        });

    $(document).on('click',".viewVendorDetail",function(){
          $("#qDetail").modal();
          var id = $(this).attr('rel');
          $("#modalHead").html('Vendor Detail: <strong>'+id+'</strong>');
          $("#mdetail").html($("#detail_"+id).html());
      
        });

    $(document).on('click',".viewBankingDetail",function(){
          $("#qDetail").modal();
          var id = $(this).attr('rel');
          $("#modalHead").html('Vendor Banking Detail: <strong>'+id+'</strong>');
          $("#mdetail").html($("#otherdetail_"+id).html());
      
        });

     $('.deleteVendor').on('click', function () {
        return confirm('Are you sure?');
    })


})