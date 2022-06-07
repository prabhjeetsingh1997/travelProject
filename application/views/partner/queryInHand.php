<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
      <li><a href="#">QueryIn Hand</a></li>
   </ol>
   <div class="page-heading">
      <h1>Query In Hand</h1>
      <div class="options">
          <!--<a href="<?php //echo base_url(PARTNER) ?>/addQuery" class="btn btn-primary" role="button">Add Query</a>-->
      <?php $this->load->helper('form'); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                        </div>
                    </div>
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
      </div>
   </div>
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h2>Query In Hand</h2>
                  <div class="panel-ctrls">
                  </div>
               </div>
               <div class="panel-body panel-no-padding">
                 <table style="position: absolute;top: -52px;left: 681px;">
                     <tr data-column="9">
                       <td>
                         <select id='searchByColor' class="form-control">
                           <option value=''>-- Sort By Color--</option>
                           <option value='#00FF00'>Green</option>
                           <option value='orange'>Orange</option>
                           <option value='#FF6347'>Red</option>
                           <option value='#00FFFF'>Blue</option>
                         </select>
                       </td>
                     </tr>
                   </table>
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" data-order=''>
                     <thead>
                        <tr>
                            <th>Query No.</th>
                            <th>Person Name</th>
                            <th>Contact No</th>
                            <th style="display: none;">Query Color</th>
                            <th>Destination</th>
                            <th>Remark</th>
                            <th>Details</th>
                            <th>Status</th>
                            <th>Query Date</th>
                            <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if(!empty($inHandQuery)){
                           foreach ($inHandQuery as $query) { ?>
                           <tr class="odd gradeX" style="background-color: <?php echo $query->query_color; ?>; font-weight:<?php if(empty($query->message)){ echo "bold"; }else{ echo "unset";}?>; ">
                           <td><?php echo 'TWZQ00'.$query->id; ?></td>
                           <td><?php echo $query->person_name; ?></td>
                           <td><?php echo $query->contact_no; ?></td>
                           <td style="display: none;"><?php echo $query->query_color; ?></td>
                           <td><?php echo $query->destination; ?></td>
                           <td><?php echo $query->message; ?></td>
                           <td align="center">
                               <div id="detail_<?php echo $query->id; ?>" style="display:none; text-align: justify;">
                                   <h4 align="center" style="margin-top: 0px;">Details :</h4>
                                   <div><table border="1" cellspacing="1" cellpadding="1" style="width:100%;"><tbody><tr>
                                      <td style="width:60%;">Email:</td>
                                      <td style="min-width:40%"><?php echo $query->email; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Travel Dates:</td>
                                      <td><?php if($query->travel_date == ""){ echo $query->travel_date; }else{ echo date('d/m/Y', strtotime($query->travel_date)); } ?></td>
                                    </tr>
                                    <tr>
                                      <td>Nights:</td>
                                      <td><?php echo $query->nights; ?></td>
                                    </tr>
                                    <tr>
                                      <td>No. of Pax:</td>
                                      <td><?php echo $query->pax_no; ?></td>
                                    </tr>
                                    <tr>
                                      <td>No. of Rooms Reqd.:</td>
                                      <td><?php echo $query->no_of_rooms; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Hotel Category:</td>
                                      <td><?php echo $query->hotel_category; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Vehicle Reqd.:</td>
                                      <td><?php echo $query->vehicle; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Meal Plan:</td>
                                      <td><?php echo $query->meal_plan; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Other Req.:</td>
                                      <td><?php echo $query->other; ?></td>
                                    </tr>
                                  </tbody>
                                </table></div>
                              </div>
                           <button type="button" rel="<?php echo $query->id; ?>" class="btn btn-info btn-sm viewEmployeeDetail" data-toggle="tooltip" data-placement="top" title="View Query Details"><i class="fa fa-eye"></i></button>
                           </td>
                            <td><?php if ($query->status == 1) {
                                          echo "In Hand";
                                      }elseif($query->status == 2){
                                          echo "Confirmed";
                                      }elseif ($query->status == 3) {
                                        echo "Cancelled";
                                      }else{
                                        echo "Open";
                                      } ?>
                                        
                            </td>
                            <td><?php echo date('Y-m-d H:i a', strtotime($query->query_date)); ?></td>
                            <td>   
                            <a href="<?php echo base_url(PARTNER) ?>/editQuery/<?php echo $query->id; ?>" data-toggle="tooltip" data-placement="top" title="Edit Query"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="deleteVendor" href="<?php echo base_url(PARTNER) ?>/queryStatusConfirmed/<?php echo $query->id; ?>" data-toggle="tooltip" data-placement="top" title="Confirmed Query"><i class="fa fa-check-circle" aria-hidden="true"></i></a>
                            <a class="viewpartnerEmployee" data-toggle="tooltip" rel="<?php echo $query->id; ?>" data-placement="top" title="Cancel Query"><i class="fa fa-times" aria-hidden="true"></i></a>
                            <a class="markColor" data-toggle="tooltip" rel="<?php echo $query->id; ?>" data-placement="top" title="Mark Color"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            <a href="<?php echo base_url(PARTNER) ?>/PartnerPackageworkout/<?php echo $query->id; ?>" data-toggle="tooltip" data-placement="top" title="Package Workout" style="font-size:14px;"><i class="fa fa-calculator" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php }
                        } ?>
                        
                     </tbody>
                  </table>
                  <div class="panel-footer"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- .container-fluid -->
</div>

<div id="qDetail" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 500px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="modalHead">Query Details</h4>
      </div>
      <div class="modal-body" id="mdetail">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> 

<div id="empDetail" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 500px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="empModel">Cancel Reason</h4>
      </div>
      <div class="modal-body" id="empdetail">
        <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(PARTNER); ?>">
        <input type="hidden" name="query_id" id="query_id">
        <label>Cancelation Reason</label>
        <textarea class="form-control" id="cancel_reason" name="cancel_reason" cols="5" rows="5"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary" id="cancelquery">Sumbit</button>
      </div>
    </div>

  </div>
</div> 

<div id="queryColor" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 500px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="colorModel">Select Color</h4>
      </div>
      <div class="modal-body" id="colordetail">
        <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(PARTNER); ?>">
        <input type="hidden" name="query_id" id="query_id">
        <label>Select Color</label>
       <select class="form-control" id="query_color" name="query_color">
            <option value="">Select Color</option>
            <option value='#00FF00'>Green</option>
            <option value='orange'>Orange</option>
            <option value='#FF6347'>Red</option>
            <option value='#00FFFF'>Blue</option>
       </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary" id="markColor">Sumbit</button>
      </div>
    </div>

  </div>
</div> 
<!-- #page-content -->

<?php
    if ($this->uri->segment(2) == 'queryInHand') { ?>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/form-ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/pagejs/partner/viewQuery.js"></script>
<?php
    }
?>

<script type="text/javascript">

$(document).ready(function() {
   
$('#searchByColor').on('change', function () {
    $('#example').DataTable().columns(3).search( this.value ).draw();
    
});

      $(document).on('click',".viewEmployeeDetail",function(){
      $("#qDetail").modal();
      var id = $(this).attr('rel');
      $("#modalHead").html('Query Detail: <strong>'+id+'</strong>');
      $("#mdetail").html($("#detail_"+id).html());
	});

   	$("#cancelquery").click(function(){
		var query_id = $("#query_id").val();
		var reason = $("#cancel_reason").val();
		var base_url = $("#base_url").val();
		$.ajax({
			type:"POST",
        	url:base_url+'/queryStatusCanceled',
        	data:{qid:query_id, cancel_reasonn:reason},    // multiple data sent using ajax
        	beforeSend:function() {
				$("#custom-loader").css("display","block");
			},
			success: function(html)
			{
				if(html == 1)
			 	{
					swal("Good job!", "Query cancelled Succesfully!","success").then( () => {
					    location.reload();
    					//window.location.href = base_url+'/';
    					
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
});

</script>