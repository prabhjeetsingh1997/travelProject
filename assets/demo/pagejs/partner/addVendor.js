$(function () {
	$('#country_id').on('change',function(){
		var base_url = $('#baseurl').val();
        var country_id = $('#country_id').val();
        $.ajax({
		    type: 'POST',
		    url: base_url +'/getStateByCountry',
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
            			$("#state_id").append('<option value = "'+val.id+'">'+val.state_name+'</option>')
        			});
		    	}
		    },
		    complete: function() {
		    	$("#custom-loader").css("display","none");
		    }
		});
    });

    $('#state_id').on('change',function(){
		var base_url = $('#baseurl').val();
        var state_id = $('#state_id').val();
        $.ajax({
		    type: 'POST',
		    url: base_url +'/getCityByState',
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

    $('#com_country_id').on('change',function(){
		var base_url = $('#baseurl').val();
        var country_id = $('#com_country_id').val();
        $.ajax({
		    type: 'POST',
		    url: base_url +'/getStateByCountry',
		    data: {id:country_id},
		    beforeSend: function() {
		    	$("#custom-loader").css("display","block");
		    },
		    success: function(data) {
		    	if (data == '[]' || data == 0) {
		    		$('#com_state_id').find('option').remove();
		    		swal("Oops!!", "No State Found for this Country!", "error");
		    		$("#com_state_id").append('<option value = "">Select State</option>');
		    	}else{
		    		$('#com_+state_id').find('option').remove();
		    		$("#com_state_id").append('<option value = "">Select State</option>');
		    		$.each(JSON.parse(data), function(key,val) {
            			$("#com_state_id").append('<option value = "'+val.id+'">'+val.state_name+'</option>')
        			});
		    	}
		    },
		    complete: function() {
		    	$("#custom-loader").css("display","none");
		    }
		});
    });

    $('#com_state_id').on('change',function(){
		var base_url = $('#baseurl').val();
        var state_id = $('#com_state_id').val();
        $.ajax({
		    type: 'POST',
		    url: base_url +'/getCityByState',
		    data: {id:state_id},
		    beforeSend: function() {
		    	$("#custom-loader").css("display","block");
		    },
		    success: function(data) {
		    	if (data == '[]' || data == 0) {
		    		$('#com_city_id').find('option').remove();
		    		swal("Oops!!", "No State Found for this Country!", "error");
		    		$("#com_city_id").append('<option value = "">Select City</option>');
		    		swal("Oops!!", "No City Found for this State!", "error");
		    	}else{
		    		$('#com_city_id').find('option').remove();
		    		$("#com_city_id").append('<option value = "">Select City</option>');
		    		$.each(JSON.parse(data), function(key,val) {
            			$("#com_city_id").append('<option value = "'+val.id+'">'+val.city_name+'</option>')
        			});
		    	}
		    },
		    complete: function() {
		    	$("#custom-loader").css("display","none");
		    }
		});
    });
});