$(function () {
	$(".select2").select2();

	$("#itinerary_management_form").validate({	
		rules: {
			'country[]': "required",			
			'state[]': "required",			
			'city[]': "required",			
			title: "required",			
			title: "required"			
		},
		submitHandler: function() { 
		var base_url = $('#baseurl').val();
			$.ajax({
				type: "POST",
				url: base_url+'/addNewItinerary',
				data: $("#itinerary_management_form").serialize(),
				cache: false,
				beforeSend:function(){
					$("#custom-loader").css("display","block");
				},
				success: function(msg)
				{
					if(msg == 1){
						
						swal("Good job!", "Itinerary Basic Details Added Successfully!","success").then( () => {
    						window.location.href = base_url+'/addItinerary/2';
						})
					}else{
						
						swal("Oops!", "something went worng","error").then( () => {
	    					window.location.href = base_url+'/viewItinerary';
						})
					}
				},
				complete: function() {
				$("#custom-loader").css("display","none");
			}
			}); 
		}
	});

	$("#update_itinerary_management").validate({	
		rules: {
			'country[]': "required",			
			'state[]': "required",			
			'city[]': "required",			
			title: "required",			
			title: "required"			
		},
		submitHandler: function() { 
		var base_url = $('#baseurl').val();
		var itinerary_id = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);
			$.ajax({
				type: "POST",
				url: base_url+'/updateItinerary',
				data: $("#update_itinerary_management").serialize(),
				cache: false,
				beforeSend:function(){
					$("#custom-loader").css("display","block");
				},
				success: function(msg)
				{
					if(msg == 1){
						
						swal("Good job!", "Itinerary Updated Successfully!","success").then( () => {
    						window.location.href = base_url+'/editItinerary/2/'+itinerary_id;
						});
					}else{
						
						swal("Oops!", "something went worng","error").then( () => {
	    					window.location.href = base_url+'/viewItinerary';
						});
					}
				},
				complete: function() {
				$("#custom-loader").css("display","none");
			}
			}); 
		}
	});

	$("#itcountry").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
		var base_url = $('#baseurl').val();
		$("#itstate").find('option').remove();
		$("#itcity").find('option').remove();
		
		$.ajax
		({
			
			type: "POST",
			url: base_url+"/getItineraryState",
			data: dataString,
			cache: false,
			beforeSend:function() {
				$("#custom-loader").css("display","block");
			},
			success: function(html)
			{
				$("#itstate").html(html);			
			},
			complete: function() {
				$("#custom-loader").css("display","none");
			} 
		});
	});

	$("#itstate").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
		var base_url = $('#baseurl').val();
		$.ajax
		({
			type: "POST",
			url: base_url+"/getItineraryCity",
			data: dataString,
			cache: false,
			beforeSend:function() {
				$("#custom-loader").css("display","block");
			},
			success: function(html)
			{
				$("#itcity").html(html);
			},
			complete: function() {
				$("#custom-loader").css("display","none");
			} 
		});
	});

	$("#duration").keyup(function(){
		var val = $(this).val();
		showdurationTable(val);
		
		var select = '<option>select</option>';
		var count = $("#countdivrow").val();

		for(var i=1; i<=val; i++){
			
			select += '<option value=' + i + '>day ' + i + '</option>';
		}

		$('#from_day').html(select);
		$('#to_day').html(select);
		
		for(var a=1; a<=count; a++){
			var id = a+1;
			//var otherrows = $(this+a).val();
			$("#from_day"+id).html(select);
			$("#to_day"+id).html(select);
		}
	});

	$("#calculate_price").click(function() {
		var duration = $("#duration").val();
		var price1 = 0;
		var price2 = 0;
		var price3 = 0;
		if (duration == '') {
			swal("Oops!", "Please Select Duration First","error");
		}else{
			for(var i=1; i<=duration; i++){
				var row1 = $("input[name=tblPrice_1_"+i+"]").val();
				price1 = parseInt(price1) + parseInt(row1);
				var row2 = $("input[name=tblPrice_2_"+i+"]").val();
				price2 = parseInt(price2) + parseInt(row2);
				var row3 = $("input[name=tblPrice_3_"+i+"]").val();
				price3 = parseInt(price3) + parseInt(row3);
			}
			$("#totalprice").html('');
			$("#totalprice").css("display","block");
			$("#totalprice").append("<table><tr>\
				<td class='col-md-1'></td>\
				<td class='col-md-1'></td>\
				<td class='col-md-2' align='right'>Total Price 1</td>\
				<td class='col-md-1'><input type='text' readonly class='form-control' name='vehicle_1_total' value='"+price1+"'></td>\
				<td class='col-md-2' align='right'>Total Price 2</td>\
				<td class='col-md-1'><input type='text' readonly class='form-control' name='vehicle_2_total' value='"+price2+"'></td>\
				<td class='col-md-2' align='right'>Total Price 3</td>\
				<td class='col-md-1'><input type='text' readonly class='form-control' name='vehicle_3_total' value='"+price3+"'></td>\
				<td class='col-md-1'></td>\
				</tr></table>");
		}
	})
})

function showdurationTable(number)
{
	var state = $("#itstate").val();
	var base_url = $('#baseurl').val();
	if(number == '' || number == '0')
	{
		$("#durationTable").html('');	
	}
	else{
		var dataString = 'num='+ number+'&states='+state;
		$.ajax
		({
			type: "POST",
			url: base_url+"/getDurationTables",
			data: dataString,
			cache: false,
			async: false,
			beforeSend:function() {
			$("#custom-loader").css("display","block");
			},
			success: function(html)
			{
				$("#durationTable").html(html);		
			},
			complete: function() {
			$("#custom-loader").css("display","none");
			}  
		});
	}
}

function countfile(count) {
	var file_nu = $("#itinerary_image_"+count)[0].files.length;
	if(file_nu >3)//apply your condition here
	{
	 	swal("Oops!", "Only Upto 3 Files Allowed to Upload!","error").then( () => {
			$("#itinerary_image_"+count).val('');
		})
	}
}