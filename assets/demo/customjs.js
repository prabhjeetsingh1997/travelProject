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

     $(document).on('click',".viewPartnerAddress",function(){
          $("#qDetail").modal();
          var id = $(this).attr('rel');
          $("#modalHead").html('Address Details: <strong>'+id+'</strong>');
          $("#mdetail").html($("#detail_"+id).html());
      
        });
        
     $(document).on('click',".viewHotelConfirmation",function(){
          $("#qDetail").modal();
          
          var id = $(this).attr('rel');
          //$("#modalHead").html($("#nameAddrdetails_"+id).html());
          $("#mdetail").html($("#detail_"+id).html());
      
    });

     $(document).on('click',".viewPartnerHotels",function(){
          $("#qDetail").modal();
          var id = $(this).attr('rel');
          $("#modalHead").html('Partners Hotels: <strong>'+id+'</strong>');
          $("#mdetail").html($("#Hotel_detail_"+id).html());
      
       });

    $(document).on('click',".viewRoomDetail",function(){
	  	$("#qDetail").modal();
	  	var id = $(this).attr('rel');
	  	$("#modalHead").html('Room Photos Detail: <strong>'+id+'</strong>');
	  	$("#mdetail").html($("#room_photos_"+id).html());

	});

	$(document).on('click',".img-wrap .close",function(){
	  	 var id = $(this).closest('.img-wrap').find('img').data('id');
   		 alert('remove picture: ' + id);
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

	$(document).on('click',".viewHotelPhotos",function(){
	  	$("#qDetail").modal();
	  	var id = $(this).attr('rel');
	  	$("#modalHead").html('Hotel Photos: <strong>'+id+'</strong>');
	  	$(".modal-footer").append('<button type="submit" id="update_caption" class="btn btn-primary">Update Caption</button>');
	  	$("#mdetail").html($("#hotel_pic"+id).html());
	});

	$(document).on('click',".addVehicle",function(){
	  	$("#qDetail").modal();
	});

	$(document).on('click',".updateVehicle",function(){
	  	$("#editDetail").modal();
	  	var id = $(this).attr('rel');
	  	$("#vdetail").html($("#vdetail_"+id).html());
	});

    $("#no_room_types").on('change',function(){
    	var no_room_type = $('#no_room_types').val();
    	$("#add_rooms").empty();
    	for(id = 1; id <= no_room_type; id++) {
    		$("#add_rooms").append('<div class="col-md-12"><label>Room '+id+' <span style="color: red;">*</span></label>\
                </div><div class="col-md-12"></div><div class="col-md-2"><input class="form-control" data-required="true" id="room_name_'+id+'"  name="room_name_'+id+'" type="text" placeholder="Room Type" required/>\
   				</div><div class="col-md-2"><input class="form-control" data-required="true" id="room_description_'+id+'"  name="room_description_'+id+'" type="text" placeholder="Room Description"/>\
                </div><div class="col-md-2"><input type="button" value="Room Amenities" class="btn btn-md btn-warning" onClick="room_model('+id+');"/> <input class="form-control" data-required="true" id="room_amenities_'+id+'" name="room_amenities_'+id+'" type="hidden" placeholder="Amenities & Facilities" required readonly/>\
                </div><div class="col-md-1"><input class="form-control" data-required="true" id="room_units_'+id+'"  name="room_units_'+id+'" type="text" placeholder="Units"/>\
                </div><div class="col-md-2"><input class="form-control" type="file" class="custom-file-input" id="inputGroupFile_'+id+'" name="room_images_'+id+'" onchange="uploadimg('+id+')" aria-describedby="inputGroupFileAddon01" accept="image/*" required/>\
                </div><div class="col-md-3"><span id="uploadDescr'+id+'"><p>Image Should be in jpg/jpeg format.</p><p>Image size should not exceed 2MB.</p></span><img id="output'+id+'" style="width:250px; height:150px; display:none;" />\
                </div>');    
		}
    });
    
    $("#add_more_rows").on('change',function(){
    	var no_room_type = $('#add_more_rows').val();
    	var pervious_room_type = parseInt($('#no_room_types').val(), 10);
    	$("#add_rooms").empty();
    	for(i = 1; i <= no_room_type; i++) {
    		$("#add_rooms").append('<div class="col-md-12"><label>Room '+(pervious_room_type + i)+' <span style="color: red;">*</span></label>\
                </div><div class="col-md-12"></div><div class="col-md-2"><input class="form-control" data-required="true" id="add_room_name_'+i+'"  name="add_room_name_'+i+'" type="text" placeholder="Room Type" required/>\
   				</div><div class="col-md-2"><input class="form-control" data-required="true" id="add_room_description_'+i+'"  name="add_room_description_'+i+'" type="text" placeholder="Room Description"/>\
                </div><div class="col-md-2"><input type="button" value="Room Amenities" class="btn btn-md btn-warning" onClick="add_room_model('+i+');"/> <input class="form-control" data-required="true" id="add_room_amenities_'+i+'" name="add_room_amenities_'+i+'" type="hidden" placeholder="Amenities & Facilities" required readonly/>\
                </div><div class="col-md-1"><input class="form-control" data-required="true" id="add_room_units_'+i+'"  name="add_room_units_'+i+'" type="text" placeholder="Units"/>\
                </div><div class="col-md-2"><input class="form-control" type="file" class="custom-file-input" id="inputGroupFile_'+i+'" onchange="uploadimg('+i+')" name="add_room_images_'+i+'" aria-describedby="inputGroupFileAddon01" accept="image/*" required/>\
                </div><div class="col-md-3"><span id="uploadDescr'+i+'"><p>Image Should be in jpg/jpeg format.</p><p>Image size should not exceed 2MB.</p></span><img id="output'+i+'" style="width:250px; height:150px; display:none;" />\
                </div>');
		}
    });

});

function uploadimg(val){
    //$("#inputGroupFile_"+val).val("");
    var fileupload = document.getElementById('inputGroupFile_'+val);
    var sizeInKB = fileupload.files[0].size/1024; //Normally files are in bytes but for KB divide by 1024 and so on
    var sizeLimit= 2000;
    var validImageTypes = ["image/jpeg", "image/jpg"];
    var fileType = fileupload.files[0].type;
    if(sizeInKB >= sizeLimit) {
    alert("Max file size is 2MB");
    fileupload.value = "";
    //return false;
    }
    else if(!validImageTypes.includes(fileType)){
        //console.log(fileType);
        alert(fileType+" Image Format not supported");
        fileupload.value = "";
    }
    else{
        //console.log(fileType);
    $("#uploadDescr"+val).css("display","none");
    $('#output'+val).css("display","block");
    $('#output'+val).attr('src', URL.createObjectURL(event.target.files[0]));    
    }
}

function editUploadImg(val){
    var fileupload = document.getElementById('editUploadImg'+val);
    var sizeInKB = fileupload.files[0].size/1024; //Normally files are in bytes but for KB divide by 1024 and so on
    var sizeLimit= 2000;
    var validImageTypes = ["image/jpeg", "image/jpg"];
    var fileType = fileupload.files[0].type;
    if(sizeInKB >= sizeLimit) {
    alert("Max file size 2MB");
    fileupload.value = "";
    //return false;
    }
    else if(!validImageTypes.includes(fileType)){
        //console.log(fileType);
        alert(fileType+" Format not supported");
        fileupload.value = "";
    }
    else{
        //console.log(fileType);
    //$("#uploadDescr"+val).css("display","none");
    $('#dispImg'+val).css("display","block");
    $('#dispImg'+val).attr('src', URL.createObjectURL(event.target.files[0]));    
    }
}
$("#inputGroupFilePan_card").on('change', function(){
    var fileupload = document.getElementById('inputGroupFilePan_card');
    var sizeInKB = fileupload.files[0].size/1024; //Normally files are in bytes but for KB divide by 1024 and so on
    var sizeLimit= 2000;
    var validImageTypes = ["image/jpeg", "image/jpg"];
    var fileType = fileupload.files[0].type;
    if(sizeInKB >= sizeLimit) {
    alert("Max file size 2MB");
    fileupload.value = "";
    //return false;
    }
    else if(!validImageTypes.includes(fileType)){
        //console.log(fileType);
        alert(fileType+" Image Format not supported");
        fileupload.value = "";
    }else{
        $("#paNuploadDescr").css("display","none");
        $('#pan_cardImg').attr('src', URL.createObjectURL(event.target.files[0]));   
    }
});

$("#inputGroupFileContract").on('change', function(){
    var fileupload = document.getElementById('inputGroupFileContract');
    var sizeInKB = fileupload.files[0].size/1024; //Normally files are in bytes but for KB divide by 1024 and so on
    var sizeLimit= 2000;
    var validImageTypes = ["application/pdf"];
    var fileType = fileupload.files[0].type;
    if(sizeInKB >= sizeLimit) {
    alert("Max file size 2MB");
    fileupload.value = "";
    //return false;
    }
    else if(!validImageTypes.includes(fileType)){
        //console.log(fileType);
        alert(fileType+" Format not supported");
        fileupload.value = "";
    }
    else{
        $("#ContractuploadDescr").css("display","none");
         //$('#ContractuploadDescr').text(URL.createObjectURL(event.target.files[0]));    
    }
    
});
$("#hotel_photo_upload").on("change", function(e) {
        $(".pip").html("");
        var sizeLimit= 2000;
        var validImageTypes = ["image/jpeg", "image/jpg"];
        var files = e.target.files;
        //var files = e.target.files.size/1024;
        if(files.length > 5){
            alert("You can upload upto 5 images");
            $("#hotel_photo_upload").val("");
        }else{
              filesLength = files.length;
              for(var i = 0; i < filesLength; i++) {
              //var f = files[i];
              var uplsize = files[i].size/1024;
              var uplformat = files[i].type;
              if(uplsize >= sizeLimit ){
                  alert("Max file size for per image is 2MB");
                  $("#hotel_photo_upload").val("");
                  $(".pip").html("");
                  $(".pip").css("display","none");
              } 
               if(!validImageTypes.includes(uplformat)){
                  alert(uplformat+" Format not supported");
                  $("#hotel_photo_upload").val("");
                  $(".pip").html("");
                  $(".pip").css("display","none");
              }
              else{
              var f = files[i];
              var fileReader = new FileReader();
              fileReader.onload = (function(e) {
                var file = e.target;
              //   $("<span class=\"pip\">" +
              //     "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
              //     "<br/><span class=\"remove\">Remove image</span>" +
              //     "</span>").insertAfter("#hotel_photo_upload");
              $("<span class=\"pip\">" +
                  "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>"+
                  "</span>").insertAfter("#hotel_photo_upload");
                //$(".remove").click(function(){
                  //$(this).parent(".pip").remove();
                  //$('#hotel_photo_upload').remove();
                //});
          
              })
              fileReader.readAsDataURL(f);
              }
       
            }
        }
      
});
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

$('#cpPakdescriotion').click(function() {
   $('#packagedescrmodal').modal('show');
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

function meal_plan_func(id) {
    // var selectedmeal = $("#meal_plan_new").find(":selected").text();
    // if(selectedmeal == 'CP Package' || selectedmeal == 'MAP Package' || selectedmeal == 'AP Package' || selectedmeal == 'EP Package'){
    //     document.getElementById("pakdescrdiv").style.display='block';
        //document.getElementById("cpPakdescriotion").style.display='block';
    // }
    // else{
    //     document.getElementById("pakdescrdiv").style.display='none';
        //document.getElementById("cpPakdescriotion").style.display='none';
    //}
    
	var hotel_id=id;
	var mealId= $("#meal_plan_new").val();
	var base_url = $('#baseurl').val();
	$.ajax({
			type: "POST",
			url: base_url+'/getMealPlanDate/'+hotel_id+'/'+mealId,
			cache: false,
			beforeSend:function() {
				$("#custom-loader").css("display","block");
			},
			success: function(data)
			{
				dateRange = [];
				var b=$.parseJSON(data);
				$.each(b, function(i,e ) {
					var start_date = e.from_date;
					var end_date = e.to_date;
					for (var d = new Date(start_date); d <= new Date(end_date); d.setDate(d.getDate() + 1)) {
						dateRange.push($.datepicker.formatDate('yy-mm-dd', d));
					}
				});
				$('.fromdate').datepicker({
					minDate:0,
					dateFormat: 'dd-mm-yy',
					beforeShowDay: function (date) {
						var dateString = $.datepicker.formatDate('yy-mm-dd', date);
						return [dateRange.indexOf(dateString) == -1];
					}
				});
				$('.todate').datepicker({
					minDate:0,
					dateFormat: 'dd-mm-yy',
					beforeShowDay: function (date) {
						var dateString = $.datepicker.formatDate('yy-mm-dd', date);
						return [dateRange.indexOf(dateString) == -1];
					}
				});
				
				
				$(".fromdate").attr("disabled",false);
				$(".todate").attr("disabled",false);
			},
			complete: function() {
				$("#custom-loader").css("display","none");
			}
		});
	}

function remove_rate(counter, dateId)
{
	var base_url = $('#baseurl').val();
	if(dateId == '0')
	{
		$('#rates_'+counter).remove();
		counter--;
		$("#item_count9").val(counter);
	}
	else
	{
		if(confirm("Do you want to delete table?")){
			$.ajax({
				type: "POST",
				url: base_url+'hotel/deleteRateTable',
				data: {date_id : dateId},
				cache: false,
				beforeSend:function() {
					$("#custom-loader").css("display","block");
				},
				success: function(html)
				{    
					location.reload();
					$('#rates_'+counter).remove();
					counter--;
					$("#item_count9").val(counter);
				},
				complete: function() {
				$("#custom-loader").css("display","none");
			}
			});
		}else{
			return false;
		}
		 
	}
}

function checkhotelexist(){
    var base_url = $('#baseurl').val();
    var country_id = $('#country_id').val();
    var state_id = $('#state_id').val();
    var city_id = $('#city_id').val();
    var city_name = $('#city_id option:selected').text();
    var zip = $('#zip').val();
    var hotel_name = $('#hotel_name').val();
    if(country_id == ''){
        //alert("please select country");
        //$("#countryerrormsg").parent().before("<div style='color:red;'>Please select Country</div>");
        
        $("#countryerrormsg").text("Please select Country");
         $("#country_id").on('keypress keydown keyup change', function(){
             if($(this).val == ""){
                 $("#countryerrormsg").text("Please select Country");
             }else{
               $("#countryerrormsg").text("*");    
             }
         });
        //
    }
    else if(state_id == ''){
        //alert("please select state");
        //$("#stateerrormsg").parent().before("<div style='color:red;'>Please select State</div>");
       
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
        //alert("please select city");
        //$("#cityerrormsg").parent().before("<div style='color:red;'>Please select city</div>");
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
        //alert("please Enter zip code");
        //$("#zipcodeerrormsg").parent().before("<div style='color:red;'>Please enter Zip code</div>");
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
        //alert("please Enter Hotel name");
        //$("#hotelerrormsg").parent().before("<div style='color:red;'>Please enter Hotel name</div>");
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
        
    //console.log(base_url+','+country_id+','+city_id+','+state_id+','+zip+','+hotel_name);
    $.ajax({
        type: "POST",
        url: base_url+'hotel/checkHotelExistWithZip',
        data:{country_id: country_id, state_id: state_id, city_id: city_id, zip: zip, hotel_name: hotel_name},
        //dataType: 'json',
        cache: false,
        beforeSend:function(){
            $("#custom-loader").css("display","block");
        },
        success:function(data){
            //location.reload();
                   
                var hoteldata = jQuery.parseJSON(data);
                if(hoteldata.hotelDetail == '[]' || hoteldata.hotelDetail == 0){
                    $("#hotelexistmessage").html("<p style='color:green; font-size:14px;'>Hotel is availiable to add.</p>");
                    $("#country_id option:not(:selected)").attr("disabled", "true");
                    $("#state_id option:not(:selected)").attr("disabled", "true");
                    $("#city_id option:not(:selected)").attr("disabled", "true");
                    $("#zip").attr("readonly", "true");
                    $("#hotel_name").attr("readonly", "true");
                    $("#div1tohide").css("display","block");
                    $("#div2tohide").css("display","block");
                    $("#div3tohide").css("display","block");
                    $("#div4tohide").css("display","block");
                    $("#div5tohide").css("display","block");
                    $("#div6tohide").css("display","block");
                    $("#div7tohide").css("display","block");
                    $("#div8tohide").css("display","block");
                   
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
                                
                                        if(val.state_id == arrVal.id){
                                            if(val.country_id == value.id){
                                               $("#hotelData").append("<p>"+val.hotel_name+', '+val.address_line_1+', '+val.address_line_2+', '+indval.city_name+', '+arrVal.state_name+', '+value.country_name+', '+val.zip+"<br></p>");
                                            }
                                        }
                                });
                                
                            });
                            
                        });
                        
                    });
                    
                    $("#div1tohide").css("display","none");
                    $("#div2tohide").css("display","none");
                    $("#div3tohide").css("display","none");
                    $("#div4tohide").css("display","none");
                    $("#div5tohide").css("display","none");
                    $("#div6tohide").css("display","none");
                    $("#div7tohide").css("display","none");
                    $("#div8tohide").css("display","none");
                    
                }
                
                // if(html == '[]' || html == 0){
                //     $("#hotelexistmessage").html("<p style='color:green; font-size:14px;'>Hotel is availiable to add.</p>");
                //     $("#country_id option:not(:selected)").attr("disabled", "true");
                //     $("#state_id option:not(:selected)").attr("disabled", "true");
                //     $("#city_id option:not(:selected)").attr("disabled", "true");
                //     $("#zip").attr("readonly", "true");
                //     $("#hotel_name").attr("readonly", "true");
                //     $("#div1tohide").css("display","block");
                //     $("#div2tohide").css("display","block");
                //     $("#div3tohide").css("display","block");
                //     $("#div4tohide").css("display","block");
                //     $("#div5tohide").css("display","block");
                //     $("#div6tohide").css("display","block");
                //     $("#div7tohide").css("display","block");
                //     $("#div8tohide").css("display","block");
                // }
                // else{
                    
                //     $("#hotelexistmessage").html("<p style='color:red; font-size:14px;'>The hotel you are trying to add is already exist. If you own this hotel please contact us.</p>");
                    
                //     $("#div1tohide").css("display","none");
                //     $("#div2tohide").css("display","none");
                //     $("#div3tohide").css("display","none");
                //     $("#div4tohide").css("display","none");
                //     $("#div5tohide").css("display","none");
                //     $("#div6tohide").css("display","none");
                //     $("#div7tohide").css("display","none");
                //     $("#div8tohide").css("display","none");
                // }
               
            
        },
        complete:function() {
			$("#custom-loader").css("display","none");
		}
        
    });
    
        
    }
    
}

$(document).on('click', ".submit_rate_form", function(event){
		var id=$(this).attr('rel');
		var base_url = $('#baseurl').val();
		$("#hotel_rate_"+id).validate({
		rules: {
			tcountry: "required"				
		},			
		
		messages: {
			tcountry: "Please select country"
			
		},
		submitHandler: function() {
			$.ajax({
				type: "POST",
				url: base_url+'hotel/addNewHotel',
				data: $("#hotel_rate_"+id).serialize(),
				cache: false,
				beforeSend:function() {
					$("#custom-loader").css("display","block");
				},
				success: function(data)
				{
					location.reload();
					if(data == 0)
					{
						swal("Oops!!", "Date Already Exists", "error");
					}
				},
				complete: function() {
					$("#custom-loader").css("display","none");
				}
			}); 
		}
	});	
});

$(document).ready(function(){
	$(".rateTables").hide();
});


$(document).ready(function(){
	$(document).on('click','.showRtable',function(){
		var number = $(this).attr('rel');
		$("#tblR_"+number).fadeToggle(1000);
		//$("#showRtable").text("Hide");
	});
});

$(document).on('click', ".submit_rate_form1", function(event){
		var id=$(this).attr('rel');
		var base_url = $('#baseurl').val();
		$("#hotel_rate1_"+id).validate({
		rules: {
			tcountry: "required"				
		},			
		
		messages: {
			tcountry: "Please select country"
			
		},
		submitHandler: function() { 
			$.ajax({
				type: "POST",
				url: base_url+'hotel/addNewHotel',
				data: $("#hotel_rate1_"+id).serialize(),
				cache: false,
				beforeSend:function() {
					$("#custom-loader").css("display","block");
				},
				success: function(html)
				{
					 if(html == 1)
				 {
					swal("Updated!!", "Date Rates Updated Successfully", "success");
				 }
				 else
				 {
					swal("Oops!!", "Date Already Exists", "error");
				 }
				  //return false;
				  location.reload();
				},
				complete: function() {
					$("#custom-loader").css("display","none");
				}
			}); 
		}
	});
});

$(document).on('click', "#update_caption", function(event){
		var base_url = $('#baseurl').val();
		$.ajax({
			type: "POST",
			url: base_url+'hotel/updateHotelImageCaption',
			data: $("#caption_form").serialize(),
			cache: false,
			beforeSend:function() {
				$("#custom-loader").css("display","block");
			},
			success: function(html)
			{
				 if(html == 1)
			 {
				swal("Updated!!", "Date Rates Updated Successfully", "success");
			 }
			 else
			 {
				swal("Oops!!", "Date Already Exists", "error");
			 }
			  //return false;
			  location.reload();
			},
			complete: function() {
				$("#custom-loader").css("display","none");
			}
		}); 
});

$(document).on('click', "#submitvehicle", function(event){
		var base_url = $('#baseurl').val();
		$.ajax({
			type: "POST",
			url: base_url+'/addVehicle',
			data: $("#addvehicle").serialize(),
			cache: false,
			beforeSend:function() {
				$("#custom-loader").css("display","block");
			},
			success: function(html)
			{
				 if(html == 1)
			 	{
					swal("Good job!", "Vehicle Added Successfully!","success").then( () => {
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

$(document).on('click', "#updateAddedvehicle", function(event){
		var base_url = $('#baseurl').val();
		$.ajax({
			type: "POST",
			url: base_url+'/editVehicle',
			data: $("#updatevehicle").serialize(),
			cache: false,
			beforeSend:function() {
				$("#custom-loader").css("display","block");
			},
			success: function(html)
			{
				 if(html == 1)
			 	{
					swal("Good job!", "Vehicle Updated Successfully!","success").then( () => {
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