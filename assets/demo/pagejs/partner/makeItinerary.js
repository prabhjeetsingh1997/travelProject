$(function () {
	$(".select2").select2();

	$("#itinerary_management_form").validate({	
		rules: {
			'country[]': "required",			
			'state[]': "required",			
			'city[]': "required",			
			title: "required",			
			//title: "required"			
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
    						window.location.href = base_url+'/makeItinerary/2';
						});
					}else{
						
						swal("Oops!", "something went worng","error").then( () => {
	    					window.location.href = base_url+'/viewPartnerItinerary';
						});
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
			iteDurationDetail: "required",
			duration : "required"
			//title: "required"			
		},
		submitHandler: function() { 
		var base_url = $('#baseurl').val();
		var itinerary_id = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);
			$.ajax({
				type: "POST",
				url: base_url+'/updatePartnerItinerary',
				data: $("#update_itinerary_management").serialize(),
				cache: false,
				beforeSend:function(){
					$("#custom-loader").css("display","block");
				},
				success: function(msg)
				{
					if(msg == 1){
						
						swal("Good job!", "Itinerary Updated Successfully!","success").then( () => {
    						window.location.href = base_url+'/editPartnerItinerary/2/'+itinerary_id;
						});
					}else{
						
						swal("Oops!", "something went worng","error").then( () => {
	    					//window.location.href = base_url+'/viewPartnerItinerary';
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
		
	});


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
		});
	}
}