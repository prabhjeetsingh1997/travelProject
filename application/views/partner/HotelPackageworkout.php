<?php  
error_reporting(0);
?>
<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
   <li><a href="#">Hotel Package</a></li>
</ol>
<div class="page-heading">
   <!--<h1>Workout</h1>-->
    <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        if($error)
        {
        ?>
            <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $error; ?>                    
            </div>
        <?php }
        $success = $this->session->flashdata('success');
        if($success)
        {
        ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $success; ?>                    
            </div>
        <?php } ?>
   <div class="options">
   </div>
</div>
    <section class="content">
        <!------->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <!--<div class="box box-default">-->
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                           <div id="collapse1" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <form role="form" method="POST" name="search_data" id="search_data">
                                    <input type="hidden" name="searchrooms" id="searchrooms" value="1"/>
                                    <input type="hidden" name="queryNumber" id="queryNumber" value="<?php echo $qn; ?>" />
                                    <input type="hidden" name="queryid" id="queryid" value="<?php echo $query->id; ?>"/>
                                    <input type="hidden" name="queryname" id="queryname" value="<?php echo $query->person_name; ?>"/>
                                    <input type="hidden" name="emp_id" id="emp_id" value="<?php echo $emp_id; ?>"/>
                                    <input type="hidden" name="emp_name" id="emp_name" value="<?php echo $emp_name; ?>"/>
                                    <input type="hidden" name="emp_mobile" id="emp_mobile" value="<?php echo $emp_mobile; ?>"/>
                                    <input type="hidden" name="emp_mail" id="emp_mail" value="<?php echo $emp_mail; ?>"/>
                                    <input type="hidden" name="queryType" id="queryType" value="Hotel">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                        <div class="col-md-4 hotelField" id="destinationDiv">
                                            <div class="form-group">
                                            <label for="query_no">Country</label>
                                            <select class="form-control" name="country_id" id="country_id">
                                             <option value="">Select</option>
                                             <?php  if(!empty($countries)){
                                             foreach ($countries as $country) { ?>
                                             <option value="<?php echo $country->id ?>"><?php echo $country->country_name; ?></option> 
                                             <?php }
                                              }?>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 hotelField" id="destinationDiv">
                                            <div class="form-group">
                                                <label for="query_no">State</label>
                                                <select class="form-control" name="state_id" id="state_id">
                                                  <option value="">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 hotelField" id="destinationDiv">
                                            <div class="form-group">
                                                <label for="query_no">City</label>
                                                <select class="form-control" name="city_id" id="city_id">
                                                 <option value="">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-4" id="startdateDiv">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                     <label for="query_no">Check-in</label>
                                                     <div class='input-group date'>
                                                       <input type='text' class="form-control" name="startdate" id="startdate"/>
                                                        <span class="input-group-addon">
                                                          <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                     </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="enddateDiv">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                     <label for="query_no">Check-out</label>
                                                     <div class='input-group date'>
                                                       <input type='text' class="form-control" name="enddate" id="enddate" value=""/>
                                                        <span class="input-group-addon">
                                                          <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                     </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="stayDurationDiv">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                     <label for="userPhone">Night(s)</label>
                                                     <select class="form-control" name="stayDuration" id="stayDuration">
                                                        <option value="">Select</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                     </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div id="prsnInfo">
                                                <div id="room1">
                                                    <div class="col-md-12" id="numOfRoomDiv">
                                                     <label for="userPhone">Room <span class="roomNumber">1</span></label>
                                                    </div>
                                
                                                    <div class="col-md-3">
                                                       <div class="form-group">
                                                        <?php
                                                           $alloptions = '';
                                                           $childAge = '';
                                                           for($i=0; $i<=60; $i++)
                                                            {
                                                              if($i<=12)
                                                              {
                                                              if($i>0)
                                                              {
                                                              if($i<6)
                                                              {
                                                                $alloptions .= '<option value="'.$i.'">'.$i.'</option>';
                                                              }
                                                              if($i<5)
                                                              {
                                                                $alloptionsCh .= '<option value="'.$i.'">'.$i.'</option>';
                                                              }
                                                              }
                                                                $childAge .= '<option value="'.$i.'">'.$i.'</option>';
                                                              }
                                                            }
                                                        ?>
                                                        <label for="userPhone">Adult(s) (12+Years)</label>
                                                          <select class="form-control totadults" name="adults[]" id="adults_1">
                                                            <?php echo $alloptions; ?>
                                                          </select>
                                                         </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                         <label for="userPhone">Infant(s) (0-2Years)</label>
                                                         <select class="form-control totinfants" rel="1" name="infants[]" id="infants_1">
                                                            <option value="0">0</option>
                                                            <?php echo $alloptionsCh; ?>
                                                         </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="userPhone">Kid(s) (2-12Years)</label>
                                                            <select class="form-control selchild" rel="1" name="child[]" id="child_1">
                                                             <option value="0">0</option>
                                                              <?php echo $alloptionsCh; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                    
                                                    <div class="col-md-2" id="childAgeBox_1" style="display:none; padding-left:0">
                                                        <div class="form-group">
                                                           <label for="userPhone">Kid(s) Age</label>
                                                           <input type="text" class="form-control" name="child_age[]" id="child_age_1" placeholder="ex:1,2,3,4"/> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 text-right" style="font-size: 21px;cursor:pointer" id="add_more_rooms">
                                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-md-1 removeRooms" style="font-size: 20px;padding: 0;margin-top: 27px;color: red;display: none;" id="rRoom_1">
                                                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-primary pull-right" name="searchDataBtn" id="searchDataBtn">Search Hotel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                           </div>
                           <div class="panel-heading">
                            <h5 class="panel-title" id="searched_data">
                                <!--<span><span id="searchedcity"></span><span id="searchednightsanddate"> </span><span id="searchedrooms"><i class="fa fa-shower" aria-hidden="true"></i> 1 Room </span><span id="searchedroomsadultandchilds"><i class="fa fa-users" aria-hidden="true"></i> 2 Adults + 1 Child</span></span>-->
                             <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="float:right"></a>
                            </h5>
                           </div>
           
                        </div>
                    </div> 
                  <!--</div>-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="resultData">
                        <div class="col-md-12">
                            <div class="box box-default">
                                <div class="box-header with-border">
                                <div id="status1"></div>
                                <div id="searchType" style="font-size:20px;border-bottom: 1px solid #EEE;padding-bottom: 5px;">
                                  <span>Filters</span>
                    
                                  <span id="hotel_rating" style="font-size:15px; float:right;">
                                   <div class="form-group form-inline">
                                    <label for="userPhone">Sort By Rating: </label>
                                    <select class="form-control" name="ratingFilter" id="ratingFilter">
                                    </select>
                                   </div>
                                  </span>
                                  <span id="hotelnameFilter" style="font-size:15px;float:right;margin-right: 158px;">
                                   <div class="form-group form-inline">
                                     <label for="userPhone">Search By Hotel Name: </label>
                                     <select class="form-control select2" name="nameSearch" id="nameSearch" data-placeholder="Search By Hotel Name" style="width:200px;">
                                      <option value="">--Select City--</option>
                                     </select>
                                   </div>
                                  </span>
                        
                                </div>

                                  <div id="searchData" style="padding:15px 0;">
                        
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
        <!------->
            <!-- SELECT2 EXAMPLE -->
            
        
        </section> 
</div>
<?php
    //if($this->uri->segment(2) == 'workout') { ?>
    <script src="<?php echo base_url(); ?>asset/plugins/select2/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>jquery-validation/dist/jquery.validate.js"></script>
<?php
    //}
?>
<script type="text/javascript">
$(document).ready(function(){
    
    $(".select2").select2();
    //$(".packageField").hide();

    $(document).on('click','.removeRooms', function(){
        $(this).parent().remove();
            var count = $("#searchrooms").val();
			count--;
			$("#searchrooms").val(count);
			if(count < 5){
			    $("#add_more_rooms").css("display","block");
			}else{
			    $("#add_more_rooms").css("display","none");
			}
        var r=1;
        $(".roomNumber").each(function(){
            $(this).html(r);
            r++;
        });
    });

    $(document).on('change', ".selchild", function(){
        var number = $(this).attr('rel');
        if(parseInt($(this).val()) > 0)
        {
            $("#childAgeBox_"+number).show();
        }
    });

    $("#add_more_rooms").click(function(){
        var totRooms = $("#searchrooms").val();
        
        totRooms++
        
        if(totRooms > 1)
        {
            $(this).attr('style','font-size: 21px;cursor:pointer');
        }
        
            var html = '<div id="room'+totRooms+'"><div class="col-md-12" id="numOfRoomDiv"><label for="userPhone">Room <span class="roomNumber">'+totRooms+'</span></label></div><div class="col-md-3"><div class="form-group"><select class="form-control totadults" name="adults[]" id="adults_'+totRooms+'"><?php echo $alloptions; ?></select></div></div><div class="col-md-3"><div class="form-group"><select class="form-control totinfants" rel="'+totRooms+'" name="infants[]" id="infants_'+totRooms+'"><option value="0">0</option><?php echo $alloptionsCh; ?></select></div></div><div class="col-md-3"><div class="form-group"><select class="form-control selchild" rel="'+totRooms+'" name="child[]" id="child_'+totRooms+'"><option value="0">0</option><?php echo $alloptionsCh; ?></select></div></div><div class="col-md-2" id="childAgeBox_'+totRooms+'" style="display:none; padding-left:0;"><div class="form-group"><input placeholder="ex:1,2,3,4" type="text" class="form-control" name="child_age[]" id="child_age_'+totRooms+'" /></div></div><div class="col-md-1 removeRooms" style="font-size: 20px;padding: 0;margin-top: 4px;color: red; cursor:pointer;" id="rRoom_'+totRooms+'"><i class="fa fa-minus-circle" aria-hidden="true"></i></div></div>';    
        
            $("#prsnInfo").append(html);
            $("#searchrooms").val(totRooms);
            
        if(totRooms == 5)
        {
            $("#add_more_rooms").css("display","none");
        }
       
            
        $("#totrooms").val(totRooms);
        
        var r=1;
        $(".roomNumber").each(function(){
            $(this).html(r);
            r++;
        });
            
    });

    var newDate = '';
    var nextDate = '';
    var nextNewDate = '';
    var dateStr = '';
    var dateStart = $('#startdate')
    .datepicker({
        startDate: new Date(),
        format:'dd/mm/yyyy'
    })
    .on('changeDate', function(ev){
        nextNewDate = new Date(ev.date);
        nextNewDate.setDate(nextNewDate.getDate() + 1);
        dateEnd.datepicker('setStartDate', nextNewDate);
        //alert(nextNewDate);
        dateStart.datepicker('hide');
        newDate = new Date(ev.date)
        nextDate = new Date(ev.date)
        nextDate.setDate(nextDate.getDate() + 15);
        var currDate1 = nextNewDate.getDate();
        var currDate15 = nextDate.getDate()+15;
        var currMonth = nextNewDate.getMonth()+1;
        var currYear = nextNewDate.getFullYear()
        currDate1 = currDate1 > 9 ? "" + currDate1: "0" + currDate1;
        currMonth = currMonth > 9 ? "" + currMonth: "0" + currMonth;
        var dateStr = currDate1 + "/" + currMonth + "/" + currYear;
        $("#enddate").val(dateStr);
        $("#enddate").parent().attr('data-date', dateStr);
        $("#enddate").datepicker('setDate', dateStr);
        var date1 = newDate;
        var date2 = nextNewDate;
        var timeDiff = Math.abs(date2.getTime() - date1.getTime());
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
        diffDays = diffDays;
        $("#stayDuration").val(diffDays);
    });
    
    
    var dateEnd = $('#enddate')
    .datepicker({
        //startDate: '18/08/2021',
        format:'dd/mm/yyyy'
    })
    .on('changeDate', function(ev){
        //alert(dateStr);
        dateStart.datepicker('setEndDate', ev.date);
        var date1 = newDate;
        var date2 = new Date(ev.date);
        var timeDiff = Math.abs(date2.getTime() - date1.getTime());
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
        diffDays = diffDays;
        $("#stayDuration").val(diffDays);
        dateEnd.datepicker('hide');
    });
    
    $("#stayDuration").change(function(){
        var val = $(this).val();
        var checkInDate = $('#startdate').val();
        var dateStr = checkInDate.split('/');
        var checkInDate = dateStr[1]+'/'+dateStr[0]+'/'+dateStr[2];
        var month = dateStr[1];
        var days = daysInMonth(month,dateStr[2]);
        var checkInDate = new Date(checkInDate);
        var currDate1 = checkInDate.getDate()+parseInt(val);
        if(currDate1 > days)
        {
            var currDate1 = currDate1 - days;
            var currMonth = checkInDate.getMonth()+2;
        }
        else{
            var currMonth = checkInDate.getMonth()+1;
        }
        var currYear = checkInDate.getFullYear()
        currDate1 = currDate1 > 9 ? "" + currDate1: "0" + currDate1;
        currMonth = currMonth > 9 ? "" + currMonth: "0" + currMonth;
        var dateStr = currDate1 + "/" + currMonth + "/" + currYear;
        $("#enddate").val(dateStr);
        $("#enddate").parent().attr('data-date', dateStr);
        $("#enddate").datepicker('setDate', dateStr);
    });

    $(document).on('change','#nameSearch',function(){
        var val = $(this).val();
        //alert(val);
        if(val == 'all')
        {
            $(".hotelBox").show();  
        }
        else{
            $(".hotelBox").hide();
            $("#hotel_"+val).show();
        }
    });
    
    $(document).on('change','#ratingFilter',function(){
        var val = $(this).val();
        //alert(val);
        if(val == 'all')
        {
            $(".hotelBox").show();  
        }
        else{
            $(".hotelBox").hide();
            $(".hotelrating_"+val).show();
        }
        
    });

    $(document).on('click','#searchDataBtn',function(){
        // if($("#queryType").val() == '')
        // {
        //     swal('Oops!','please select Query Type', 'error');
        //     return false;
        // }
        
        if($("#queryType").val() == 'Hotel')
        {
            if($("#country_id").val() == '')
            {
                swal('Oops!','please select Country', 'error');
                return false;
            }
            if($("#state_id").val() == '')
            {
                swal('Oops!','please select State', 'error');
                return false;
            }
            if($("#city_id").val() == '')
            {
                swal('Oops!','please select City', 'error');
                return false;
            }
        }
        
        if($("#startdate").val() == '')
        {
            swal('Oops!','please Start Date', 'error');
            return false;
        }
        $.ajax({
            type:"POST",
            url:"<?php echo base_url(PARTNER); ?>/searchWorkout",
            data:$("#search_data").serialize(),
            beforeSend:function(){
                $("#custom-loader").css("display","block");
            },
            success:function(html){
                var city_id = $("#city_id").find("option:selected").text();
                var startdate = $("#startdate").val();
                var stayDuration = $("#stayDuration").find("option:selected").text();
                var enddate = $("#enddate").val();
                var searchrooms = $("#searchrooms").val();
                var totaladults = 0;
                $(".totadults").each(function(){
                    totaladults += Number($(this).find('option:selected').val());
                })
                var kids = '';
                var totalKids = 0;
                $(".selchild").each(function(){
                    totalKids += Number($(this).find('option:selected').val());
                    kids = totalKids+" Kid(s)";
                    //totalkids += kids;
                })
                
                var totalinfants = 0;
                $(".totinfants").each(function(){
                    totalinfants += Number($(this).find('option:selected').val());
                })
                if(totalKids !== 0 && totalinfants !== 0){
                    $("#searched_data").html("<span><span><i class='fa fa-globe' aria-hidden='true'></i>"+" "+city_id+", </span><span><i class='fa fa-moon-o' aria-hidden='true'></i>"+" "+stayDuration+" Night(s)"+" ("+startdate+" - "+enddate+"), </span><span><i class='fa fa-home' aria-hidden='true'></i>"+" "+searchrooms+" Room(s)"+"</span>, <span><i class='fa fa-users' aria-hidden='true'></i>"+" "+totaladults+" Adult(s), "+kids+", "+totalinfants+" Infant(s)</span></span><a class='btn btn-sm btn-info' data-toggle='collapse' data-parent='#accordion' href='#collapse1' style='float:right; color:white;'>Modify Search</a>");
                }
                else if(totalKids === 0  && totalinfants !== 0){
                    $("#searched_data").html("<span><span><i class='fa fa-globe' aria-hidden='true'></i>"+" "+city_id+", </span><span><i class='fa fa-moon-o' aria-hidden='true'></i>"+" "+stayDuration+" Night(s)"+" ("+startdate+" - "+enddate+"), </span><span><i class='fa fa-home' aria-hidden='true'></i>"+" "+searchrooms+" Room(s)"+"</span>, <span><i class='fa fa-users' aria-hidden='true'></i>"+" "+totaladults+" Adult(s), "+" "+totalinfants+" Infant(s)</span></span><a class='btn btn-sm btn-info' data-toggle='collapse' data-parent='#accordion' href='#collapse1' style='float:right; color:white;'>Modify Search</a>");
                }
                else if(totalinfants === 0 && totalKids !== 0){
                    $("#searched_data").html("<span><span><i class='fa fa-globe' aria-hidden='true'></i>"+" "+city_id+", </span><span><i class='fa fa-moon-o' aria-hidden='true'></i>"+" "+stayDuration+" Night(s)"+" ("+startdate+" - "+enddate+"), </span><span><i class='fa fa-home' aria-hidden='true'></i>"+" "+searchrooms+" Room(s)"+"</span>, <span><i class='fa fa-users' aria-hidden='true'></i>"+" "+totaladults+" Adult(s), "+" "+kids+"</span></span><a class='btn btn-sm btn-info' data-toggle='collapse' data-parent='#accordion' href='#collapse1' style='float:right; color:white;'>Modify Search</a>");
                }
                else{
                    $("#searched_data").html("<span><span><i class='fa fa-globe' aria-hidden='true'></i>"+" "+city_id+", </span><span><i class='fa fa-moon-o' aria-hidden='true'></i>"+" "+stayDuration+" Night(s)"+" ("+startdate+" - "+enddate+"), </span><span><i class='fa fa-home' aria-hidden='true'></i>"+" "+searchrooms+" Room(s)"+"</span>, <span><i class='fa fa-users' aria-hidden='true'></i>"+" "+totaladults+" Adult(s)</span></span><a class='btn btn-sm btn-info' data-toggle='collapse' data-parent='#accordion' href='#collapse1' style='float:right; color:white;'>Modify Search</a>");
                }
                
                
                //$("#searchednightsanddate").text("<i class='fa fa-moon-o' aria-hidden='true'></i>"+" "+stayDuration+" Night(s)"+" ("+startdate+" - "+enddate+")");
                var collapsediv = document.getElementById("collapse1");
                collapsediv.classList.remove("in");
                
                var htmlArr = html.split('$abc#$');
                
                $("#searchData").html(htmlArr[0]);
                $("#ratingFilter").html(htmlArr[1]);
                $("#nameSearch").html(htmlArr[2]);
            },
            complete: function() {
                $("#custom-loader").css("display","none");
            }
        });
    });
    
    $("#country_id").change(function(){
		var base_url = "<?php echo base_url(PARTNER); ?>";
        var country_id = $(this).val();
        //alert(country_id);
        $.ajax({
		    type: 'POST',
		    url: base_url+'/getStateByCountry',
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
    
    $("#state_id").on('change',function(){
		var base_url = "<?php echo base_url(PARTNER); ?>";
        var state_id = $(this).val();
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

    
});

function daysInMonth(month,year) {
    return new Date(year, month, 0).getDate();
}
</script>