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

    $("#no_room_types").on('change',function(){
    	var no_room_type = $('#no_room_types').val();
    	$("#add_rooms").empty();
    	for (i = 1; i <= no_room_type; i++) {
    		$("#add_rooms").append('<div class="col-md-12"><label>Room '+i+' <span style="color: red;">*</span></label>\
                </div><div class="col-md-12"></div><div class="col-md-2"><input class="form-control" data-required="true" id="room_name_'+i+'"  name="room_name_'+i+'" type="text" placeholder="Room Type" required/>\
   				</div><div class="col-md-2"><input class="form-control" data-required="true" id="room_description_'+i+'"  name="room_description_'+i+'" type="text" placeholder="Room Description" required/>\
                </div><div class="col-md-1"><input type="button" value="Select" class="btn btn-md btn-warning" onClick="room_model('+i+');"/>\
                </div><div class="col-md-3"><input class="form-control" data-required="true" id="room_amenities_'+i+'"  name="room_amenities_'+i+'" type="text" placeholder="Amenities & Facilities" required/>\
                </div><div class="col-md-2"><input class="form-control" data-required="true" id="room_units_'+i+'"  name="room_units_'+i+'" type="text" placeholder="Units" required/>\
                </div><div class="col-md-2"><input class="form-control" type="file" class="custom-file-input" id="inputGroupFile01" name="room_images_'+i+'" aria-describedby="inputGroupFileAddon01" accept="image/*" required/>\
                </div>');
		}
    });

    $("#add_more_rows").on('change',function(){
    	var no_room_type = $('#add_more_rows').val();
    	var pervious_room_type = parseInt($('#no_room_types').val(), 10);
    	$("#add_rooms").empty();
    	for (i = 1; i <= no_room_type; i++) {
    		$("#add_rooms").append('<div class="col-md-12"><label>Room '+(pervious_room_type + i)+' <span style="color: red;">*</span></label>\
                </div><div class="col-md-12"></div><div class="col-md-2"><input class="form-control" data-required="true" id="add_room_name_'+i+'"  name="add_room_name_'+i+'" type="text" placeholder="Room Type" required/>\
   				</div><div class="col-md-2"><input class="form-control" data-required="true" id="add_room_description_'+i+'"  name="add_room_description_'+i+'" type="text" placeholder="Room Description" required/>\
                </div><div class="col-md-1"><input type="button" value="Select" class="btn btn-md btn-warning" onClick="add_room_model('+i+');"/>\
                </div><div class="col-md-3"><input class="form-control" data-required="true" id="add_room_amenities_'+i+'"  name="add_room_amenities_'+i+'" type="text" placeholder="Amenities & Facilities" required/>\
                </div><div class="col-md-2"><input class="form-control" data-required="true" id="add_room_units_'+i+'"  name="add_room_units_'+i+'" type="text" placeholder="Units" required/>\
                </div><div class="col-md-2"><input class="form-control" type="file" class="custom-file-input" id="inputGroupFile01" name="add_room_images_'+i+'" aria-describedby="inputGroupFileAddon01" accept="image/*" required/>\
                </div>');
		}
    });

    $("#submodalRoomAmen").click(function(){
		var count = $("#currentItem").val();
		var str='';
		$(".modalRoomAminities").each(function(){
			if($(this).is(':checked')){
				str += $(this).val()+', ';
			}
		});
		var newStr = str.replace(/,\s*$/, "");
		$("#room_amenities_"+count).val(newStr);
		$("#roomAmen").modal('hide');
	});

	$("#submodalAmen").click(function(){
		//alert("sdfs");
		var str='';
		$(".modalAminities").each(function(){
			if($(this).is(':checked')){
				str += $(this).val()+', ';
			}
		});
		//var newStr=rtrim(str,', ');
		var newStr = str.replace(/,\s*$/, "");
		$("#hotel_amenity").val(newStr);
		$("#hotelAmen").modal('hide');
	});

	$(".nav-tabs a[data-toggle=tab]").on("click", function(e) {
	  	if ($(this).hasClass("disabled")) {
			e.preventDefault();
			return false;
	  	}
	});

	$("#addsubmodalRoomAmen").click(function(){
		var count = $("#currentItem").val();
		var str='';
		$(".modalRoomAminities").each(function(){
			if($(this).is(':checked')){
				str += $(this).val()+', ';
			}
		});
		var newStr = str.replace(/,\s*$/, "");
		$("#add_room_amenities_"+count).val(newStr);
		$("#addRoomAmen").modal('hide');
	});

	$(document).on('click',".viewRoomDetail",function(){
	  	$("#qDetail").modal();
	  	var id = $(this).attr('rel');
	  	$("#modalHead").html('Room Photos Detail: <strong>'+id+'</strong>');
	  	$("#mdetail").html($("#room_photos_"+id).html());

	});

	$(document).on('click',".viewPanDetail",function(){
	  	$("#qDetail").modal();
	  	var id = $(this).attr('rel');
	  	$("#modalHead").html('Hotel PanCard: <strong>'+id+'</strong>');
	  	$("#mdetail").html($("#hotel_pan"+id).html());

	});

	$(document).on('click',".viewContactDetail",function(){
	  	$("#qDetail").modal();
	  	var id = $(this).attr('rel');
	  	$("#modalHead").html('Hotel Contract Photos: <strong>'+id+'</strong>');
	  	$("#mdetail").html($("#hotel_contact"+id).html());

	});
});

function hotel_amenity_modal() {
	var selected=$("#hotel_amenity").val();
	var arrHotelAmenty=selected.split(', ');
	
	$('.modalAminities').each(function(){			
		if($.inArray($(this).val(), arrHotelAmenty) !== -1)
		{
			$(this).attr('checked',true);
		}
		
	});
	$('#hotelAmen').modal();
}

function room_model(count) {
    $('#roomAmen').modal();
	$("#currentItem").val(count);
	var selected=$("#room_amenities_"+count).val();
	var arrroomAmenty=selected.split(', ');
	
	$('.modalRoomAminities').each(function(){			
		if($.inArray($(this).val(), arrroomAmenty) !== -1)
		{
			$(this).attr('checked',true);
		}
		else
		{
			$(this).removeAttr('checked');
		}
		
	});
}

function add_room_model(count) {
	$('#addRoomAmen').modal();
	$("#currentItem").val(count);
	var selected=$("#add_room_amenities_"+count).val();
	var arrroomAmenty=selected.split(', ');
	
	$('.modalRoomAminities').each(function(){			
		if($.inArray($(this).val(), arrroomAmenty) !== -1)
		{
			$(this).attr('checked',true);
		}
		else
		{
			$(this).removeAttr('checked');
		}
		
	});
}

function checkhotelexist(){
    $("#hotelData").html('');
    var base_url = $('#baseurl').val();
    var country_id = $('#country_id').val();
    var state_id = $('#state_id').val();
    var city_id = $('#city_id').val();
    var city_name = $('#city_id option:selected').text();
    var zip = $('#zip').val();
    var hotel_name = $('#hotel_name').val();
    if(country_id == ''){
       
        $("#countryerrormsg").text("Please select Country");
        $("#country_id").on('keypress keydown keyup change', function(){
            if($(this).val == ""){
                $("#countryerrormsg").text("Please select Country");
            }else{
                $("#countryerrormsg").text("*");    
            }
        });
       
    }
    else if(state_id == ''){
        
        $("#stateerrormsg").text("Please select State");
        $("#state_id").on('keypress keydown keyup change', function(){
             if($(this).val == ""){
                 $("#stateerrormsg").text("Please select State");
             }else{
               $("#stateerrormsg").text("*");    
             }
        });
    }
    else if(city_id == ''){
        
        $("#cityerrormsg").text("Please select city");
        $("#city_id").on('keypress keydown keyup change', function(){
             if($(this).val == ""){
                 $("#cityerrormsg").text("Please select city");
             }else{
               $("#cityerrormsg").text("*");    
             }
        });
    }
    else if(zip == ''){
        
        $("#zipcodeerrormsg").text("Please enter Zip code");
        $("#zip").on('keypress keydown keyup change', function(){
             if($(this).val == ""){
                 $("#zipcodeerrormsg").text("Please enter Zip code");
             }else{
               $("#zipcodeerrormsg").text("*");    
             }
        });
    }
    else if(hotel_name == ''){
        
        $("#hotelerrormsg").html("* Please enter Hotel name");
         $("#hotel_name").on('keypress keydown keyup change', function(){
             if($(this).val == ""){
                 $("#hotelerrormsg").text("Please enter Hotel name");
             }else{
               $("#hotelerrormsg").text("*");    
             }
        });
    }
    else{
        $("#countryerrormsg").text("");
        $("#stateerrormsg").text("");
        $("#cityerrormsg").text("");
        $("#zipcodeerrormsg").text("");
        $("#hotelerrormsg").html("");
        
    $.ajax({
        type:"POST",
        url: base_url+'/checkHotelExistWithZip',
        data:{country_id: country_id, state_id: state_id, city_id: city_id, zip: zip, hotel_name: hotel_name},
        //dataType: 'json',
        cache: false,
        beforeSend:function(){
            $("#custom-loader").css("display","block");
        },
        success:function(data){
           
                //console.log(html);
                //var resdata = $.parseJSON(data);
                var hoteldata = jQuery.parseJSON(data);
                if(hoteldata.hotelDetail == '[]' || hoteldata.hotelDetail == 0){
                    $("#hotelexistmessage").html("<p style='color:green; font-size:14px;'>Hotel is availiable to add.</p>");
                    $("#country_id option:not(:selected)").attr("disabled", "true");
                    $("#state_id option:not(:selected)").attr("disabled", "true");
                    $("#city_id option:not(:selected)").attr("disabled", "true");
                    $("#zip").attr("readonly", "true");
                    $("#hotel_name").attr("readonly", "true");
                    $("#div1tohide").css("display","block");
                   
                }
                else{
                    $("#hotelexistmessage").css("display","block");
                    //$("#hotelexistmessage").html("<p style='color:red; font-size:14px;'>The hotel you are trying to add is already exist. If you own this hotel please contact us.</p>");
                    
                        //var hoteldata = jQuery.parseJSON(data);
                        var resdata = jQuery.parseJSON(data);
                        //console.log(resdata.countries);
                    $.each(resdata.hotelDetail, function(key,val){
                        
                        $.each(resdata.cities, function(ind,indval){
                            
                            $.each(resdata.states, function(arrInd,arrVal){
                                
                                $.each(resdata.countries, function(index,value){
                                
                                    //if(val.city_id == indval.id){
                                        if(val.state_id == arrVal.id){
                                            if(val.country_id == value.id){
                                               $("#hotelData").append("<p>"+val.hotel_name+', '+val.address_line_1+', '+val.address_line_2+', '+indval.city_name+', '+arrVal.state_name+', '+value.country_name+', '+val.zip+"<br></p>");
                                            }
                                        }  
                                    //}
                            
                                });
                                
                            });
                            
                        });
                        //$("#hotelData").append("<p>"+val.hotel_name+', '+val.address_line_1+', '+val.address_line_2+"<br></p>");
                        //$("#hotelexistmessage").append("<div class='alert alert-info alert-dismissable'><h5>Following are the similar hotels existed in database.</h5>"+val.hotel_name+', '+val.address_line_1+', '+val.address_line_2+"<br><br><h5>Still want to enter your data?</h5><button type='button' id='proceed' onclick='proceed()' class='btn btn-sm btn-success'>Proceed</button>&nbsp;<button type='button' id='discard' onclick='discard()' class='btn btn-sm btn-warning'>Discard</button></div>");
                    });
                    
                    $("#div1tohide").css("display","none");
                    
                }
            
        },
        complete:function() {
			$("#custom-loader").css("display","none");
		}
        
    });
        
    }
}