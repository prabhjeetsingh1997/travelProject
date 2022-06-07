<?php  
error_reporting(0);
?>
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content">
<ol class="breadcrumb">
   <li><a href="<?php echo base_url(ADMIN_URL) ?>/dashboard">Home</a></li>
   <li><a href="#">Workout Management</a></li>
</ol>
<div class="page-heading">
   <h1>Workout</h1>
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
            <!-- SELECT2 EXAMPLE -->
            <div class="row">
            <div class="col-md-4">
            <div class="box box-default">
                
                <div id="status"></div>
                <div class="tab-content">
                    <form role="form" method="POST" name="search_data" id="search_data">
                    <input type="hidden" name="searchrooms" id="searchrooms" value="1"/>
                    <input type="hidden" name="queryNumber" id="queryNumber" value="<?php echo $qn; ?>" />
                    <div class="box-body">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="userPhone">Query type</label>
                                    <select class="form-control" name="queryType" id="queryType">
                                        <option value="">Select</option>
                                        <option value="Hotel">Hotel</option>
                                        <option value="Package">Package</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-12 packageField">
                                <div class="form-group">
                                    <label for="search">Country</label>
                                    <select class="form-control select2" name="country[]" id="itcountry" multiple="multiple"> 
                                        <option value="">--Select Country--</option>
                                        <?php  if(!empty($countries)){
                                            foreach ($countries as $country) { ?>
                                            <option value="<?php echo $country->id ?>"><?php echo $country->country_name; ?></option> 
                                        <?php }
                                            }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 packageField">
                                <div class="form-group">
                                    <label for="search">State</label>
                                    <select class="form-control select2" name="state[]" id="itstate" multiple="multiple" data-placeholder="Select a State">
                                        <option value="">--Select State--</option>
                                        
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-12 packageField">
                                <div class="form-group">
                                    <label for="search">City</label>
                                    <select class="form-control select2" name="city[]" id="itcity" multiple="multiple" data-placeholder="Select a City">
                                        <option value="">--Select City--</option>
                                    
                                        </select>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-12 hotelField" id="destinationDiv">
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
                            
                            <div class="col-md-12 hotelField" id="destinationDiv">
                                <div class="form-group">
                                    <label for="query_no">State</label>
                                    
                                    <select class="form-control" name="state_id" id="state_id">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 hotelField" id="destinationDiv">
                                <div class="form-group">
                                    <label for="query_no">City</label>
                                    
                                    <select class="form-control" name="city_id" id="city_id">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-12" id="startdateDiv">
                                <div class="form-group">
                                    <div class="form-group">
                                    <label for="query_no">Check-in</label>
                                    <div class='input-group date' >
                                    <input type='text' class="form-control" name="startdate" id="startdate"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                    </div>
                                </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12" id="enddateDiv">
                                <div class="form-group">
                                    <div class="form-group">
                                    <label for="query_no">Check-out</label>
                                    <div class='input-group date' >
                                    <input type='text' class="form-control" name="enddate" id="enddate"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                    </div>
                                </div>
                                </div>
                            </div>
                        
                            
                            <div class="col-md-12" id="stayDurationDiv">
                                <div class="form-group">
                                    <label for="userPhone">Nights</label>
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
                                            <label for="userPhone">Adults(12+)</label>
                                            <select class="form-control" name="adults[]" id="adults_1">
                                                <?php echo $alloptions; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="userPhone">Infant(0-2)</label>
                                            <select class="form-control" rel="1" name="infants[]" id="infants_1">
                                                <option value="0">0</option>
                                                <?php echo $alloptionsCh; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="userPhone">Child(2-12)</label>
                                            <select class="form-control selchild" rel="1" name="child[]" id="child_1">
                                                <option value="0">0</option>
                                                <?php echo $alloptionsCh; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2" id="childAgeBox_1" style="display:none; padding-left:0">
                                        <div class="form-group">
                                            <label for="userPhone">Child Age</label>
                                            <input type="text" class="form-control" name="child_age[]" id="child_age_1" /> 
                                        </div>
                                    </div>
                                    <div class="col-md-1 removeRooms" style="font-size: 20px;padding: 0;margin-top: 27px;color: red;display: none;" id="rRoom_1">
                                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-12 text-right" style="font-size: 21px;cursor:pointer" id="add_more_rooms">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </div>
                            
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="button" class="btn btn-primary" name="searchDataBtn" id="searchDataBtn">Search Hotel</button>
                    </div>
                </form>
                
                
        
            </div>
        </div>
        </div>
        <div id="resultData">
        <div class="col-md-8">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div id="status1"></div>
                    <div id="searchType" style="font-size:20px;border-bottom: 1px solid #EEE;padding-bottom: 5px;">
                    <span>Hotel</span>
                    
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
                            <select class="form-control select2" name="nameSearch" id="nameSearch" data-placeholder="Search By Hotel Name">
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
        </section>
</div>
<?php
    if ($this->uri->segment(2) == 'workout') { ?>
    <script src="<?php echo base_url(); ?>asset/plugins/select2/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>jquery-validation/dist/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/pagejs/itinerary.js"></script>
<?php
    }
?>
<script type="text/javascript">
$(document).ready(function(){
    $(".packageField").hide();

    $(document).on('click','.removeRooms', function(){
        $(this).parent().remove();
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

    $("#queryType").change(function(){
        var qtype=$(this).val();
        if(qtype == 'Package'){
            $("#hotel_rating").hide();
            $("#hotelnameFilter").hide();
            $(".packageField").show();
            $(".hotelField").hide();
            $("#searchType span:first").html('Package');
            $("#searchDataBtn").html('Search Package');
        }else{
            $("#hotel_rating").show();
            $("#hotelnameFilter").show();
            $(".packageField").hide();
            $(".hotelField").show();
            $("#searchType span:first").html('Hotel');
            $("#searchDataBtn").html('Search Hotel');
        }
    });

    $("#add_more_rooms").click(function(){
            var totRooms = $("#searchrooms").val();
        totRooms++
        
        if(totRooms > 1)
        {
            $(this).attr('style','font-size: 21px;cursor:pointer');
        }
        
        var html = '<div id="room'+totRooms+'"><div class="col-md-12" id="numOfRoomDiv"><label for="userPhone">Room <span class="roomNumber">'+totRooms+'</span></label></div><div class="col-md-3"><div class="form-group"><select class="form-control" name="adults[]" id="adults_'+totRooms+'"><?php echo $alloptions; ?></select></div></div><div class="col-md-3"><div class="form-group"><select class="form-control" rel="'+totRooms+'" name="infants[]" id="infants_'+totRooms+'"><option value="0">0</option><?php echo $alloptionsCh; ?></select></div></div><div class="col-md-3"><div class="form-group"><select class="form-control selchild" rel="'+totRooms+'" name="child[]" id="child_'+totRooms+'"><option value="0">0</option><?php echo $alloptionsCh; ?></select></div></div><div class="col-md-2" id="childAgeBox_'+totRooms+'" style="display:none; padding-left:0;"><div class="form-group"><input type="text" class="form-control" name="child_age[]" id="child_age_'+totRooms+'" /></div></div><div class="col-md-1 removeRooms" style="font-size: 20px;padding: 0;margin-top: 4px;color: red; cursor:pointer;" id="rRoom_'+totRooms+'"><i class="fa fa-minus-circle" aria-hidden="true"></i></div></div>';
        $("#prsnInfo").append(html);
        $("#searchrooms").val(totRooms);
        
        var r=1;
        $(".roomNumber").each(function(){
            $(this).html(r);
            r++;
        });
            
    });

    var newDate = '';
    var nextDate = '';
    var nextNewDate = '';
    var dateStart = $('#startdate')
    .datepicker({
        startDate: new Date(),
        format:'dd/mm/yyyy'
    })
    .on('changeDate', function(ev){
        nextNewDate = new Date(ev.date);
        nextNewDate.setDate(nextNewDate.getDate() + 1);
        dateEnd.datepicker('setStartDate', nextNewDate);
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
        $("#enddate").parent().attr('data-date',dateStr);
        var date1 = newDate;
        var date2 = nextNewDate;
        var timeDiff = Math.abs(date2.getTime() - date1.getTime());
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
        diffDays = diffDays;
        $("#stayDuration").val(diffDays);
    });

    var dateEnd = $('#enddate')
    .datepicker({
        format:'dd/mm/yyyy'
    })
    .on('changeDate', function(ev){
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
        $("#enddate").parent().attr('data-date',dateStr);
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
        if($("#queryType").val() == '')
        {
            swal('Oops!','please select Query Type', 'error');
            return false;
        }
        
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
        else if($("#queryType").val() == 'Package')
        {
            //alert($("#country").next().children().children().children().find('li').length);
            if($("#itcountry").next().children().children().children().find('li').length <= 1)
            {
                swal('Oops!','please select Country', 'error');
                return false;
            }
            if($("#itstate").next().children().children().children().find('li').length <= 1)
            {
                swal('Oops!','please select State', 'error');
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
            url:"<?php echo base_url(ADMIN_URL); ?>/searchWorkout",
            data:$("#search_data").serialize(),
            beforeSend:function(){
                $("#custom-loader").css("display","block");
            },
            success:function(html){
                
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
});

function daysInMonth(month,year) {
    return new Date(year, month, 0).getDate();
}
</script>