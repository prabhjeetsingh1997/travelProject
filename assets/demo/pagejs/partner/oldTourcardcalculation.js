    $('#gst_percentage').on('input', function(){
          var value = $(this).val();
		  //$("#igst1").val(value);
		
		  $("#igsttxt").text(value+"%");
		  $("#igstlabel").text("IGST@:"+value+"%");
		  $("#igst2").val(value);

		  //var a = value/2;
		  $("#cgsttxt").text((value/2)+"%,"+(value/2)+"%");
		  $("#cgst2").val(value/2);
		  $("#cgstlabel").text("CGST@:"+value/2+"%");
		  $("#sgstlabel").text("SGST@:"+value/2+"%");
		  $("#sgst2").val(value/2);

		  
		});

		
$("#gst_percentage, #gstamount").on('input', function(){
          var a = Number(document.getElementById("gst_percentage").value);
		   var b = Number(document.getElementById("gstamount").value);
		   
		   //var c = document.getElementById("oc_cost1").value;
		   var total = (a*b)/100;
		   
		   //c += (a*b/100);
		   if(document.getElementById('cgst1').checked)
		   {
			  $("#cgstperctamt").show();
			   //var totalagain = "hi";
			   //var total3 = (total3*b)/100;
			   document.getElementById('cgstperctamt').value = total/2;
			   document.getElementById('sgstperctamt').value = total/2;
			   //document.getElementById('gstperctamt').value = 0;			   
		   }
		   if(document.getElementById('igst1').checked)
		   {
			document.getElementById('gstperctamt').value = total;
			//document.getElementById('cgstperctamt').value = 0;
			//document.getElementById('sgstperctamt').value = 0;
		   }
		   else{
			document.getElementById('gstperctamt').value = 0;
		   }
		   
		   //document.getElementById('tc_cost').value = total;
		   //var total2 = 0;
		//    $('#oc_cost2').each(function(){
        //             total += parseFloat(this.value);
        //             document.getElementById('tc_cost').value = total;
        //         });
            
                
		});
		
		
        
        
        $("#gst_percentage, #oc_cost2").on('input', function(){
          var a = Number(document.getElementById("gst_percentage").value);
		   var b = Number(document.getElementById("oc_cost2").value);
		   var total = (a*b/100);
		   var total2 = (a*b/100)+b;
		   if(document.getElementById('cgst1').checked){
			$("#cgstperctamt").show();
			document.getElementById('cgstperctamt').value = total/2;
			document.getElementById('sgstperctamt').value = total/2;
		   }
		   if(document.getElementById('igst1').checked)
		   {
			document.getElementById('gstperctamt').value = total;
		   }
		   else{
			document.getElementById('gstperctamt').value = 0;
		   }
		   //$('#gstperctamt').val(total);
		   $('#tc_cost').val(total2);
		  // $('#pc_cost').on('input', function(){
    //             total += parseFloat(this.value);
    //             $('#tc_cost').val(total);
    //         });
		});

    $("#gst_percentage, #gstamount").on('input', function(){
        var a = Number(document.getElementById("gst_percentage").value);
         var b = Number(document.getElementById("gstamount").value);
         //var c = document.getElementById("oc_cost1").value;
         var total = (a*b)/100;
         //c += (a*b/100);
         document.getElementById('gstperctamt').value = total;
         
          $('#pc_cost').each(function(){
        		  total += parseFloat(this.value);
        		  document.getElementById('tc_cost').value = total;
        	  });
              
      });
    
    
    $("#gst_percentage, #pc_cost").on('input', function(){
      var a = Number(document.getElementById("gst_percentage").value);
       var b = Number(document.getElementById("pc_cost").value);
       var total = (a*b/100);
	   var total2 = (a*b/100)+b;
	   if(document.getElementById('cgst1').checked){
		var c = Number(document.getElementById("pc_cost").value);
		$("#cgstperctamt").show();
		var totaltwo = total/2;
		//var totalthree = total+c;
		document.getElementById('cgstperctamt').value = totaltwo;
		document.getElementById('sgstperctamt').value = totaltwo;
		//document.getElementById('tc_cost').value = totalthree;
		
		//$('#tc_cost').val(total2+total/2);
	   }
	   if(document.getElementById('igst1').checked)
	   {
		document.getElementById('gstperctamt').value = total;
		$('#tc_cost').val(total2);
	   }
	   else{
		document.getElementById('gstperctamt').value = 0;
	   }
       //$('#gstperctamt').val(total);
       $('#tc_cost').val(total2);
      // $('#pc_cost').on('input', function(){
//             total += parseFloat(this.value);
//             $('#tc_cost').val(total);
//         });
    });
    
    
    
    $("#pc_cost, #gstperctamt, #oc_cost2").on('input', function(){
        var a = parseFloat(document.getElementById('pc_cost').value);
        var b = parseFloat(document.getElementById('oc_cost2').value);
        var c = parseFloat(document.getElementById('gstperctamt').value);
        var total1 = (a+c);
        //var total = (a-b);
        $('#tc_cost').val(total1);
        var total = (a-b);
        $('#profitonmargin').val(total);
        var profitperct = (a-b)/b*100;
        $('#profitpercentage').val(profitperct);
    });
    
    $("#profitpercentage, #oc_cost2").on('input', function(){
        var a = parseFloat(document.getElementById('profitpercentage').value);
        var b = parseFloat(document.getElementById('oc_cost2').value);
        //var c = parseFloat(document.getElementById('pc_cost').value);
        var total = (a*b/100);
        $('#profitonmargin').val(total);
        $('#oc_cost2').each(function(){
                total += parseFloat(this.value);
                document.getElementById('pc_cost').value = total;
                document.getElementById('tc_cost').value = total;
            });
             
            //  var total2 = (a*b/100)+b;
            //  $('#pc_cost').val(total2);
    });
    