$(function(){
    
});
    // $(document).on('click',".maketourcard",function(){
    //   $("#TourCard").modal();
    //   var id = $(this).attr('rel');
	//   $("#trc_no").val('TC0'+id);
      
	// });
	 
	// $('#selpackage').on('change', function() {
    //   if ( this.value == 'hotel')
      
    //   {
    //     $("#ifhotel").show();
    //   }
    //   else
    //   {
    //     $("#ifhotel").hide();
    //   }
    //  });
    // $('#selpackage').on('change', function() {
    //   if ( this.value == 'package')
     
    //   {
    //     $("#ifpackage").show();
    //   }
    //   else
    //   {
    //     $("#ifpackage").hide();
    //   }
    //  });
     
    // $('#selpackage').on('change', function() {
    //   if ( this.value == 'other')
    //   {
    //     $("#ifother").show();
    //   }
    //   else
    //   {
    //     $("#ifother").hide();
    //   }
	//  });
	
	$('#selpackage').on('change', function() {
		if( this.value == 'other')
		{
		  $("#ifother").show();
		}
		else
		{
		  $("#ifother").hide();
		}
	   });

	$('#cgst1').click(function(){

		$("#cgstlabel").show();
		$("#igstlabel").hide();
		$("#gstperctamt").val(0);
		$("#gstperctamt").hide();
		$("#cgstperctamt").show();
		$("#sgstdiv").show();

	});

	$('#igst1').click(function(){
		$("#cgstlabel").hide();
		$("#igstlabel").show();
		$("#gstperctamt").show();
		$("#cgstperctamt").val(0);
		$("#cgstperctamt").hide();
		$("#sgstperctamt").val(0);
		$("#sgstdiv").hide();
		
	});
	    
        $(document).ready(function(){
            
            $(".FC_cost").keypress(function (e) {
              //if the letter is not digit then display error and don't type anything
              if(e.which != 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
              //display error message
              //$("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
             }
            });
            
            $('#bkgdate').datepicker({
				format:'dd/mm/yyyy'
            }).datepicker("setDate", "today");
            
            var newDate = '';
			var nextDate = '';
			var nextNewDate = '';
			var dateStart = $('#startdate').datepicker({
				//startDate: new Date(),
				format:'dd/mm/yyyy'
			})
			.on('changeDate', function(ev){
				nextNewDate = new Date(ev.date);
				nextNewDate.setDate(nextNewDate.getDate() + 1);
				//console.log(nextNewDate);
				//alert(nextNewDate.getDate());
				dateEnd.datepicker('setStartDate', nextNewDate);
				dateStart.datepicker('hide');
				//alert(nextNewDate);
				
				newDate = new Date(ev.date);
				//newendDate = new Date(ev.date)
				nextDate = new Date(ev.date);
				
				//newendDate.setDate(newendDate.getDate() + 1);
				nextDate.setDate(nextDate.getDate() + 15);
				//alert(nextDate);
				var currDate1 = nextNewDate.getDate();
				var currDate15 = nextDate.getDate()+15;
				var currMonth = nextNewDate.getMonth()+1;
				var currYear = nextNewDate.getFullYear();
				
				//var dateStr1 = currMonth + "/" + currDate1  + "/" + currYear;
				
				currDate1 = currDate1 > 9 ? "" + currDate1: "0" + currDate1;
				currMonth = currMonth > 9 ? "" + currMonth: "0" + currMonth;
				//currDate15 = currDate15 > 9 ? "" + currDate15: "0" + currDate15;
				
				var dateStr = currDate1 + "/" + currMonth + "/" + currYear;
				
				$("#enddate").val(dateStr);  
				$("#enddate").parent().attr('data-date',dateStr);
				$("#enddate").datepicker('setDate', dateStr);
				// $("#enddate").datepicker({
				//   startDate: new Date(),
				//   format:'dd/mm/yyyy'
				// });
				
				var date1 = newDate;
				var date2 = nextNewDate; //$('#enddate').val();
				
				//console.log(date1);
				//console.log(date2);
				
				//var date2 = new Date(ev.date);
				var timeDiff = Math.abs(date2.getTime() - date1.getTime());
				var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
				diffDays = diffDays;
				//alert(diffDays);
				$("#stayDuration").val(diffDays);
				//////////////////////////
				var start_date = $('#startdate').val();
				
				var start_date1=start_date.split('/');
			    var dateStr1 = start_date1[1] + "/" + start_date1[0] + "/" + start_date1[2];
				
		         //alert(dateStr1);
		        $("#firstdate_1").val(start_date);
		        $("#firstdate_1").datepicker('setDate', start_date);
		        $("#firstdate_1").datepicker('setStartDate', start_date);
		     
		        $("#check_in_1").val(start_date);
		        $("#check_in_1").datepicker('setDate', start_date);
		        $("#check_in_1").datepicker('setStartDate', start_date);
			    $("#check_out_1").datepicker('setStartDate', start_date);
			 
				//dateEnd.focus();
			});

			var dateEnd = $('#enddate')
			.datepicker({
			    startDate: new Date(),
				format:'dd/mm/yyyy'
			})
			.on('changeDate', function(ev){
				dateStart.datepicker('setEndDate', ev.date);
				
				//var date1 = $('#startdate').val();
				var date1 = newDate; //new Date(date1);
				
				var date2 = new Date(ev.date);
				var timeDiff = Math.abs(date2.getTime() - date1.getTime());
				var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
				diffDays = diffDays;
				//alert(diffDays);
				$("#stayDuration").val(diffDays);
				
				$("#firstdate_1").datepicker('setEndDate', ev.date);
				$("#check_in_1").datepicker('setEndDate', ev.date);
				$("#check_out_1").datepicker('setEndDate', ev.date);
				dateEnd.datepicker('hide');
				
			});
			
			$("#firstdate_1").datepicker({
		        format:'dd/mm/yyyy',
		        //startDate: new Date()
		    }).on('changeDate', function(ev){
		        
		        //var frstdatval = ('#firstdate_1').val();
		        $("#check_in_1").val(ev.date);
		        $("#check_in_1").datepicker('setDate', ev.date);
		        //$("#check_in_1").datepicker('setStartDate', ev.date);
		        $("#firstdate_1").datepicker('hide');
		    });
		    $("#check_in_1").datepicker({
		        format:'dd/mm/yyyy',
		        //startDate: new Date()
		    });
		    
		    $('#check_out_1').datepicker({
                format:'dd/mm/yyyy'
            }).on('changeDate', function(ev){
                $('#check_out_1').datepicker('hide');
            });
			
			
		    $("#checkInTime_1").timepicker({
			   showInputs: false,
			   showSeconds: false,
			   defaultTime: false,
			   showMeridian: true
		    });
			
		    $("#checkOutTime_1").timepicker({
			   showInputs: false,
			   showSeconds: false,
			   showMeridian: true,
			   defaultTime: false
		    });
            
        });
        
 
        $('#stayDuration').on('change', function(){
				var val = $(this).val();
				//alert(val);
				var checkInDate = $('#startdate').val();
				var dateStr = checkInDate.split('/');
				checkInDate = dateStr[1]+'/'+dateStr[0]+'/'+dateStr[2];
				//alert(checkInDate);
				
				var month = dateStr[1];
				
				var days = daysInMonth(month,dateStr[2]);
				//alert(days);
				
				checkInDate = new Date(checkInDate);
				//alert(checkInDate);
				var currDate1 = checkInDate.getDate()+parseInt(val);
				//alert(currDate1);
				
				if(currDate1 > days)
				{
					currDate1 = currDate1 - days;
				    var currMonth = checkInDate.getMonth()+2;
				}
				else{
					 currMonth = checkInDate.getMonth()+1;
				}
				var currYear = checkInDate.getFullYear();
				
				currDate1 = currDate1 > 9 ? "" + currDate1: "0" + currDate1;
			     currMonth = currMonth > 9 ? "" + currMonth: "0" + currMonth;
				 //currDate15 = currDate15 > 9 ? "" + currDate15: "0" + currDate15;
				
				 dateStr = currDate1 + "/" + currMonth + "/" + currYear;
				//alert(dateStr);

				//checkout.val(newDate);
				$("#enddate").val(dateStr);
				$("#enddate").parent().attr('data-date',dateStr);
				$("#enddate").datepicker('setDate', dateStr);
				
			});
			function daysInMonth(month,year) {
			return new Date(year, month, 0).getDate();
		}
        
  
		function calculate_other_price(){
            var cost = [];
			      var i = 0;
			      $("[id='oc_cost1']").each(function(){
      			cost[i] = $(this).val();
      			i++;
			      })
			var total = 0;
			for (var i = 0; i < cost.length; i++) {
    			total += cost[i] << 0;
			}
			
			$("#oc_cost2").val(total);
			$("#pc_cost").val(total);
			$("#tc_cost").val(total);

			 }
             
    
    $("#pc_cost").on('input', function(){
        var pcvalue =  $('#pc_cost').val();
        var ocvalue =  $('#oc_cost2').val();
       
        if(document.getElementById('gstinclchkbx').checked){
            $("#excl18onSC").attr("checked", false);
            $("#excl18onSC").attr("disabled", true);
            $("#excl18onPC").attr("disabled", true);
            $("#excl5onPC").attr("disabled", true);
            $("#18onSC").attr("checked", "checked");
            
            if(document.getElementById('18onSC').checked){
               var sumofocpc = parseFloat(pcvalue-ocvalue);
               var divtobe = parseFloat(100+18);
               var totGSt = Math.round(sumofocpc*100/divtobe);
               var finalGst = Math.round(sumofocpc-totGSt);
               var totprofit = Math.round(sumofocpc - finalGst);
               var cgstIgst = parseFloat(finalGst/2);
               $("#nwIGST").val(finalGst);
               $("#nwProfit").val(totprofit);
               $("#nwtotalPcCost").val(pcvalue);
               $("#nwCGST").val(cgstIgst);
               $("#nwSGST").val(cgstIgst);
            }else if(document.getElementById('18onPC').checked){
                var sumofocpc2 = parseFloat(pcvalue-ocvalue);
                var divtobe2 = parseFloat(100+18);
                var totGSt2 = Math.round(pcvalue*100/divtobe2);
                var finalGst2 = Math.round(pcvalue-totGSt2);
                var totprofit2 = Math.round(sumofocpc2-finalGst2);
                
                $("#nwIGST").val(finalGst2);
                $("#nwProfit").val(totprofit2);
                $("#nwtotalPcCost").val(pcvalue);
                var cgstIgst = parseFloat(finalGst2/2);
                $("#nwCGST").val(cgstIgst);
                $("#nwSGST").val(cgstIgst);
            }else if(document.getElementById('5onPC').checked){
                var sumofocpc3 = parseFloat(pcvalue-ocvalue);
                var divtobe3 = parseFloat(100+5);
                var totGSt3 = Math.round(pcvalue*100/divtobe3);
                var finalGst2 = Math.round(pcvalue-totGSt3);
                var totprofit3 = Math.round(sumofocpc3-finalGst2);
                $("#nwIGST").val(finalGst2);
                $("#nwProfit").val(totprofit3);
                $("#nwtotalPcCost").val(pcvalue);
                var cgstIgst = parseFloat(finalGst2/2);
                $("#nwCGST").val(cgstIgst);
                $("#nwSGST").val(cgstIgst);
            }
        }else{
            $("#excl18onSC").attr("checked", "checked");
            $("#excl18onSC").attr("disabled", false);
            $("#excl18onPC").attr("disabled", false);
            $("#excl5onPC").attr("disabled", false);
            $("#18onSC").attr("checked", false);
            $("#18onSC").attr("disabled", true);
            $("#18onPC").attr("disabled", true);
            $("#5onPC").attr("disabled", true);
            if(document.getElementById('excl18onSC').checked){
            var sumofprofit = parseFloat(pcvalue - ocvalue);
            var totGSt = Math.round(sumofprofit*18/100);
            $("#nwIGST").val(totGSt);
            $("#nwProfit").val(sumofprofit);
            var totPakCost = parseFloat(pcvalue) + parseFloat(totGSt);
            $("#nwtotalPcCost").val(totPakCost);
            var totcgstsgst = parseFloat(totGSt/2);
            $("#nwCGST").val(totcgstsgst);
            $("#nwSGST").val(totcgstsgst);
            
            }else if(document.getElementById('excl18onPC').checked){
                
                var sumofprofit = parseFloat(pcvalue - ocvalue);
                var totGSt = Math.round(pcvalue*18/100);
                $("#nwIGST").val(totGSt);
                $("#nwProfit").val(sumofprofit);
                var totPakCost = parseFloat(pcvalue) + parseFloat(totGSt);
                $("#nwtotalPcCost").val(totPakCost);
                var totcgstsgst = parseFloat(totGSt/2);
                $("#nwCGST").val(totcgstsgst);
                $("#nwSGST").val(totcgstsgst);
                
            }else if(document.getElementById('excl5onPC').checked){
                
                var sumofprofit = parseFloat(pcvalue - ocvalue);
                var totGSt = Math.round(pcvalue*5/100);
                $("#nwIGST").val(totGSt);
                $("#nwProfit").val(sumofprofit);
                var totPakCost = parseFloat(pcvalue) + parseFloat(totGSt);
                $("#nwtotalPcCost").val(totPakCost);
                var totcgstsgst = parseFloat(totGSt/2);
                $("#nwCGST").val(totcgstsgst);
                $("#nwSGST").val(totcgstsgst);
            }
            
        }
    });
    
    $("#18onSC").on('click', function(){
        
        var pcvalue =  $('#pc_cost').val();
        var ocvalue =  $('#oc_cost2').val();
        var sumofocpc = parseFloat(pcvalue-ocvalue);
        var divtobe = parseFloat(100+18);
        var totGSt = Math.round(sumofocpc*100/divtobe);
        var finalGst = Math.round(sumofocpc-totGSt);
        var totprofit = Math.round(sumofocpc - finalGst);
        $("#nwIGST").val(finalGst);
        $("#nwProfit").val(totprofit);
        $("#nwtotalPcCost").val(pcvalue);
        var cgstIgst = parseFloat(finalGst/2);
        $("#nwCGST").val(cgstIgst);
        $("#nwSGST").val(cgstIgst);
    });
    
    $("#18onPC").on('click', function(){
        
        $("#18onSC").attr("checked", false);
        
        var pcvalue =  $('#pc_cost').val();
        var ocvalue =  $('#oc_cost2').val();
        var sumofocpc2 = parseFloat(pcvalue-ocvalue);
        var divtobe2 = parseFloat(100+18);
        var totGSt2 = Math.round(pcvalue*100/divtobe2);
        var finalGst2 = Math.round(pcvalue-totGSt2);
        var totprofit2 = Math.round(sumofocpc2-finalGst2);
        $("#nwIGST").val(finalGst2);
        $("#nwProfit").val(totprofit2);
        $("#nwtotalPcCost").val(pcvalue);
        var cgstIgst = parseFloat(finalGst2/2);
        $("#nwCGST").val(cgstIgst);
        $("#nwSGST").val(cgstIgst);
    });
    
    $("#5onPC").on('click', function(){
       
        $("#18onSC").attr("checked", false);
        var pcvalue =  $('#pc_cost').val();
        var ocvalue =  $('#oc_cost2').val();
        var sumofocpc3 = parseFloat(pcvalue-ocvalue);
        var divtobe3 = parseFloat(100+5);
        var totGSt3 = Math.round(pcvalue*100/divtobe3);
        var finalGst2 = Math.round(pcvalue-totGSt3);
        var totprofit3 = Math.round(sumofocpc3-finalGst2);
        $("#nwIGST").val(finalGst2);
        $("#nwProfit").val(totprofit3);
        $("#nwtotalPcCost").val(pcvalue);
        var cgstIgst = parseFloat(finalGst2/2);
        $("#nwCGST").val(cgstIgst);
        $("#nwSGST").val(cgstIgst);
    });
    
    $("#gstexclchkbx").on('click', function(){
        document.getElementById('excl18onSC').checked = 'checked';
        $("#excl18onSC").attr('disabled', false);
        $("#excl18onPC").attr('disabled', false);
        $("#excl5onPC").attr('disabled', false);
        //document.getElementById('18onSC').checked = 'false';
        $("#18onSC").attr('disabled', true);
        $("#18onPC").attr('disabled', true);
        $("#5onPC").attr('disabled', true);
        $("#gstinclcheked").css("display","none");
        $("#gstexclcheked").css("display","block");
        
        var pcvalue =  $('#pc_cost').val();
        var ocvalue =  $('#oc_cost2').val();
        if(document.getElementById('excl18onSC').checked){
            var sumofprofit = parseFloat(pcvalue - ocvalue);
            var totGSt = Math.round(sumofprofit*18/100);
            $("#nwIGST").val(totGSt);
            $("#nwProfit").val(sumofprofit);
            var totPakCost = parseFloat(pcvalue) + parseFloat(totGSt);
            $("#nwtotalPcCost").val(totPakCost);
            var totcgstsgst = parseFloat(totGSt/2);
            $("#nwCGST").val(totcgstsgst);
            $("#nwSGST").val(totcgstsgst);
        }
        
    });
    
    $("#gstinclchkbx").on('click', function(){
        document.getElementById('18onSC').checked = 'checked';
        $("#18onSC").attr('disabled', false);
        $("#18onPC").attr('disabled', false);
        $("#5onPC").attr('disabled', false);
        //document.getElementById('excl18onSC').checked = false;
        $("#excl18onSC").attr('disabled', true);
        $("#excl18onPC").attr('disabled', true);
        $("#excl5onPC").attr('disabled', true);
        $("#gstinclcheked").css("display","block");
        $("#gstexclcheked").css("display","none");
        
        var pcvalue =  $('#pc_cost').val();
        var ocvalue =  $('#oc_cost2').val();
        if(document.getElementById('18onSC').checked){
            var sumofocpc = parseFloat(pcvalue-ocvalue);
            var divtobe = parseFloat(100+18);
            var totGSt = Math.round(sumofocpc*100/divtobe);
            var finalGst = Math.round(sumofocpc-totGSt);
            var totprofit = Math.round(sumofocpc - finalGst);
            var cgstIgst = parseFloat(finalGst/2);
            $("#nwIGST").val(finalGst);
            $("#nwProfit").val(totprofit);
            $("#nwtotalPcCost").val(pcvalue);
            $("#nwCGST").val(cgstIgst);
            $("#nwSGST").val(cgstIgst);
        }
    });
    
    
    $("#excl18onSC").on('click', function(){
        
        var pcvalue =  $('#pc_cost').val();
        var ocvalue =  $('#oc_cost2').val();
        var sumofprofit = parseFloat(pcvalue - ocvalue);
        var totGSt = Math.round(sumofprofit*18/100);
        $("#nwIGST").val(totGSt);
        $("#nwProfit").val(sumofprofit);
        var totPakCost = parseFloat(pcvalue) + parseFloat(totGSt);
        $("#nwtotalPcCost").val(totPakCost);
        var totcgstsgst = parseFloat(totGSt/2);
        $("#nwCGST").val(totcgstsgst);
        $("#nwSGST").val(totcgstsgst);
    });
    
    $("#excl18onPC").on('click', function(){
        $("#excl18onSC").attr("checked", false);
        
        var pcvalue =  $('#pc_cost').val();
        var ocvalue =  $('#oc_cost2').val();
        var sumofprofit = parseFloat(pcvalue - ocvalue);
        var totGSt = Math.round(pcvalue*18/100);
        $("#nwIGST").val(totGSt);
        $("#nwProfit").val(sumofprofit);
        var totPakCost = parseFloat(pcvalue) + parseFloat(totGSt);
        $("#nwtotalPcCost").val(totPakCost);
        var totcgstsgst = parseFloat(totGSt/2);
        $("#nwCGST").val(totcgstsgst);
        $("#nwSGST").val(totcgstsgst);
    });
     
    $("#excl5onPC").on('click', function(){
        $("#excl18onSC").attr("checked", false);
        
        var pcvalue =  $('#pc_cost').val();
        var ocvalue =  $('#oc_cost2').val();
        var sumofprofit = parseFloat(pcvalue - ocvalue);
        var totGSt = Math.round(pcvalue*5/100);
        $("#nwIGST").val(totGSt);
        $("#nwProfit").val(sumofprofit);
        var totPakCost = parseFloat(pcvalue) + parseFloat(totGSt);
        $("#nwtotalPcCost").val(totPakCost);
        var totcgstsgst = parseFloat(totGSt/2);
        $("#nwCGST").val(totcgstsgst);
        $("#nwSGST").val(totcgstsgst);
    });
    
    
        
$(function(){
   
    
});