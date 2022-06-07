<?php 
$page = $this->uri->segment(3);
if($page == '') {
    $page = 1;
}
$to = $page * $record_per_page;
$from = $to - ($record_per_page-1);
?>
<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
      <li><a href="#">Query</a></li>
   </ol>
   <div class="page-heading">
      <h1>All Query</h1>
      <div class="options">
      <a href="<?php echo base_url(PARTNER) ?>/addQuery" class="btn btn-primary" role="button">Add Query</a>
      <a href="<?php echo base_url(PARTNER) ?>/exportQuery" class="btn btn-success" role="button">Export Query</a>
      <a href="<?php echo base_url(PARTNER) ?>/importQuery" class="btn btn-warning" role="button">Import Query</a>
      <button class="btn btn-danger" id="massDelete">Mass Delete</button>
      <button class="btn btn-info massPush" id="massPush">Mass Push</button>
      <button class="btn btn-warning advanceSearch" id="advanceSearch">Advance Search</button>
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
   <?php if($count_rows<1) { ?>
       <div class="alert alert-danger alert-dismissable fade in float-left width100" >
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Message!:</strong> <?php echo 'No result found'; ?>
       </div>
    <?php  } else {  ?> 
   <div class="container-fluid" id="advancetable">
      <div class="row">
         <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h2>Query</h2>
                  <div class="custom_per_page" style="position: absolute;right: 250px;">
                    <select class="form-control" name="record_per_page" style="width: 100% !important;margin-top: 7px;" id="record_per_page">
                          <option value="10" <?php if($record_per_page == 10){ echo "selected"; }?>>10</option>
                          <option value="25" <?php if($record_per_page == 25){ echo "selected"; }?>>25</option>
                          <option value="50" <?php if($record_per_page == 50){ echo "selected";}?>>50</option>
                          <option value="100" <?php if($record_per_page == 100){ echo "selected";}?>>100</option>
                          <option value="500" <?php if($record_per_page == 500){ echo "selected";}?>>500</option>
                      </select>
                    </div>
                  <div class="panel-ctrls">
                  </div>
               </div>
               <div class="panel-body panel-no-padding">
                  <table class="table table-bordered table-hover" id="tableData">
                     <thead>
                        <tr>
                           <th>Sel.<input type="checkbox" id="ckbCheckAll" /></th>
                            <th>Query No.</th>
                            <th>src</th>
                            <th>Person Name</th>
                            <th>Contact No</th>
                            <th>Destination</th>
                            <th>Remark</th>
                            <th>Details & Reason</th>
                            <th>Status</th>
                            <th>Query Date</th>
                            <th>Handler</th>
                            <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if(!empty($queryDetails)){
                           foreach ($queryDetails as $query) { ?>
                           <tr class="odd gradeX">
                             <td><?php if($query->status != 2 && $query->status != 3){ ?>
                                 <input type="checkbox" class="checkBoxClass" id="Checkbox1" name="mass_delete" value="<?php echo $query->id; ?>" />
                             <?php }?>
                            </td>
                            
                           <td><?php echo 'TWZQ00'.$query->id; ?></td>
                           <td><?php echo $query->src; ?></td>
                           <td><?php echo $query->person_name; ?></td>
                           <td><?php echo $query->contact_no; ?></td>
                           <td><?php echo $query->destination; ?></td>
                           <td><?php echo $query->message; ?></td>
                           <td align="center">
                               <div id="detail_<?php echo $query->id; ?>" style="display:none; text-align: justify;">
                                   <h4 align="center" style="margin-top: 0px;">Details:</h4>
                                   <div><table border="1" cellspacing="1" cellpadding="1" style="width:100%;"><tbody><tr>
                                      <td style="width:60%;">Email:</td>
                                      <td style="min-width:40%"><?php echo $query->email; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Travel Dates :</td>
                                      <td><?php if($query->travel_date == ""){ echo $query->travel_date; }else{ echo date('d/m/Y', strtotime($query->travel_date)); } ?></td>
                                    </tr>
                                    <tr>
                                      <td>Nights :</td>
                                      <td><?php echo $query->nights; ?></td>
                                    </tr>
                                    <tr>
                                      <td>No. of Pax :</td>
                                      <td><?php echo $query->pax_no; ?></td>
                                    </tr>
                                    <tr>
                                      <td>No. of Rooms Reqd. :</td>
                                      <td><?php echo $query->no_of_rooms; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Hotel Category :</td>
                                      <td><?php echo $query->hotel_category; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Vehicle Reqd. :</td>
                                      <td><?php echo $query->vehicle; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Meal Plan :</td>
                                      <td><?php echo $query->meal_plan; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Other Req. :</td>
                                      <td><?php echo $query->other; ?></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                              </div>
                              <?php if($query->status == 3) { ?>
                                  <div id="cdetail_<?php echo $query->id; ?>" style="display:none; text-align: justify;">
                                   <div><?php echo $query->cancel_reason; ?></div>
                                  </div>
                                  <button type="button" rel="<?php echo $query->id; ?>" class="btn btn-info btn-sm viewCancelDetail" data-toggle="tooltip" data-placement="top" title="View Cancelation Reason"><i class="fa fa-eye"></i></button>
                              <?php } ?>
                           <button type="button" rel="<?php echo $query->id; ?>" class="btn btn-info btn-sm viewEmployeeDetail" data-toggle="tooltip" data-placement="top" title="View Query Details"><i class="fa fa-eye"></i></button>
                            <?php $chkQuery = array_count_values(array_column($Allqueries, 'contact_no'))[$query->contact_no];?>
                                <?php if($chkQuery > 1) {?>
                                <button type="button" rel="<?php echo $query->id; ?>" class="btn btn-danger btn-sm viewExistDetail" data-toggle="tooltip" data-placement="top" title="View Details"><i class="fa fa-eye"></i></button>
                                <div id="existDetaildiv_<?php echo $query->id; ?>" style="display:none; text-align: justify;">
                                    <table border="1" cellspacing="1" cellpadding="1" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Query Date</th>
                                                <th>Name</th>
                                                <th>Destination</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php foreach($Allqueries as $existArr) {
                                          if($query->contact_no == $existArr->contact_no) {?>
                                            <tr>
                                              <td><?php echo date('d/m/Y h:i a', strtotime($existArr->query_date)); ?></td>
                                              <td><?php echo $existArr->person_name; ?></td>
                                              <td><?php echo $existArr->destination; ?></td>
                                            </tr>
                                    <?php } 
                                    }?>
                                        </tbody>
                                    </table>
                                </div>
                              <?php } else{ ?>
                           
                              <?php }?>
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
                            <td><?php echo date('d/m/Y h:i a', strtotime($query->query_date)); ?></td>
                            <td><?php if ($query->handler_id != 0) {
                                echo $query->query_handled_by;
                            }else{
                              echo "UnAssigned";
                            } ?></td>
                            <td>
                              <a href="<?php echo base_url(PARTNER) ?>/editQuery/<?php echo $query->id; ?>" data-toggle="tooltip" data-placement="top" title="Edit Query"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <?php if ($query->status = 2 && $query->status = 3) { ?>
                              <a class="deleteVendor" id="delete" href="<?php echo base_url(PARTNER) ?>/deleteQuery/<?php echo $query->id; ?>" data-toggle="tooltip" data-placement="top" title="Delete Query"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            <?php } ?>
                           <?php if ($query->handler_id == 0) { ?>
                             <a class="viewpartnerEmployee" data-toggle="tooltip" rel="<?php echo $query->id; ?>" data-placement="top" title="Push Query"><i class="fa fa-share" aria-hidden="true"></i></a>
                            <?php }else{
                              if($query->status = 2 && $query->status = 3){ ?>
                                  <a class="deleteVendor" data-toggle="tooltip" href="<?php echo base_url(PARTNER) ?>/UndoPushQuery/<?php echo $query->id; ?>" data-placement="top" title="Undo Push Query"><i class="fa fa-undo" aria-hidden="true"></i></a>
                              <?php } ?>
                              <?php } ?>
                           </td>
                        </tr>
                        <?php }
                        }else{ ?>
                        <div>No Record Founds.</div>
                        <?php } ?>
                        
                     </tbody>
                  </table>
                  <div class="panel-footer">
                      <div class="col-md-12 text-center simple-pagination" id="addedpagination">
                       <div style="float: left;">showing <?php echo $from ?> to <?php echo $to; ?> queries of <?php echo $total_records; ?> queries.</div>
                                    <?php echo $pagination; ?>
                      </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
    <?php }?>
   <!-- .container-fluid -->
</div>

<div id="qDetail" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs" style="">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="modalHead">Query Detail</h4>
      </div>
      <div class="modal-body" id="mdetail">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> 

<div id="cDetail" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs" style="">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="cmodalHead">Cancelation Reason</h4>
      </div>
      <div class="modal-body" id="cdetail">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="empDetail" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs" style="">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="empModel">Query Details</h4>
      </div>
      <div class="modal-body" id="empdetail">
        <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(PARTNER); ?>">
        <input type="hidden" name="query_id" id="query_id">
        <label>Please Select Employee To Assign Query</label>
        <?php if (!empty($partnerEmployee)) { ?>
            <select name="pushed_employee" class="form-control" id="pushed_employee" required="true">
            <option value="0">Select Employee</option>
            <?php foreach ($partnerEmployee as $emp) { ?>
                <option value="<?php echo $emp->id; ?>"><?php echo ucfirst($emp->name); ?></option>
            <?php } ?>
            </select>
         <?php }else{ ?>
          <div>No Employee Added Yet.</div>
        <?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary" id="assignEmp">Sumbit</button>
      </div>
    </div>

  </div>
</div>

<div id="existDetail" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs" style="">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="">Details</h4>
      </div>
      <div class="modal-body" id="existDEtail">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="pushDetail" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs" style="">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="pushModel">Query Details</h4>
      </div>
      <div class="modal-body" id="pusheddetail">
        <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(PARTNER); ?>">
        <input type="hidden" name="push_query_id" id="push_query_id">
        <label>Please Select Employee To Assign Query</label>
        <?php if (!empty($partnerEmployee)) { ?>
            <select name="pushed_mass_employee" class="form-control" id="pushed_mass_employee" required="true">
            <option value="0">Select Employee</option>
            <?php foreach ($partnerEmployee as $emp) { ?>
                <option value="<?php echo $emp->id; ?>"><?php echo ucfirst($emp->name); ?></option>
            <?php } ?>
            </select>
         <?php }else{ ?>
          <div>No Employee Added Yet.</div>
        <?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary" id="assignPushEmp">Sumbit</button>
      </div>
    </div>

  </div>
</div>
<!-- #page-content -->

<!-- Advance Searcch  Pop Up-->
<div id="advanceSearchPopup" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md modal-lg modal-xs" style="">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="advanceSearchTitle">Advance Search</h4>
      </div>
      <div class="modal-body" id="advanceSearchBody">
        <form id="advanceSearchForm">
        <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(PARTNER); ?>">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4">
                    <input type="text" name="ad_name" id="ad_name" class="form-control" placeholder="Enter Person Name">
                </div>
                <div class="col-md-4">
                    <input type="text" name="ad_email" id="ad_email" class="form-control" placeholder="Enter Email">
                </div>
                <div class="col-md-4">
                    <input type="text" name="ad_number" id="ad_number" class="form-control" placeholder="Enter Mobile No.">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4">
                    <input type="text" name="ad_destination" id="ad_destination" class="form-control" placeholder="Enter Destination">
                </div>
                <div class="col-md-4">
                    <select name="ad_handler" class="form-control" id="ad_handler">
                        <option value="">Select Handler</option>
                        <option value="0">Unassigned Query</option>
                        <?php foreach ($partnerEmployee as $emp) { ?>
                            <option value="<?php echo $emp->id; ?>"><?php echo ucfirst($emp->name); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="date" name="ad_date" id="ad_date" class="form-control" placeholder="Select Date">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4">
                    <input type="text" name="ad_queryid" id="ad_queryid" class="form-control" placeholder="Enter Query Id after TWZQ00">
                </div>
                <div class="col-md-4">
                    <select name="ad_status" class="form-control" id="ad_status">
                        <option value="">Select Status</option>
                        <option value="1">In Hand</option>
                        <option value="2">Confirmed</option>
                        <option value="3">Cancelled</option>
                        <option value="4">Open</option>
                    </select>
                </div>
            </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary" id="advanceSearchSumbit">Search</button>
      </div>
    </div>

  </div>
</div>

<?php
    if($this->uri->segment(2) == 'viewQuery') { ?>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/form-ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/pagejs/partner/viewQuery.js"></script>
<?php
    }
?>
<script type="text/javascript">


    $("#record_per_page").change(function () {
        var per_page = $("#record_per_page").val();
        var base_url = "<?php echo base_url(PARTNER); ?>"
        $.ajax({
            type:"POST",
            url:base_url+'/updateRecordPerPage',
            data:{page_per_record:per_page},    // multiple data sent using ajax
            beforeSend:function() {
                $("#custom-loader").css("display","block");
            },
            success: function(html)
            {
                if(html == 1)
                {
                    location.reload();
                }
                else
                {
                    location.reload();
                }
            },
            complete: function() {
                $("#custom-loader").css("display","none");
            }
        });
    });

    // $(document).ready(function () {
    //       $('#tableData').DataTable({
    //       "paging"      : false,
    //       "lengthChange": true,
    //       "searching"   : true,
    //       "info"        : false,
    //       "autoWidth"   : false,
    //       "bSort"       : false,
    //       "responsive"  : true,
           
    //     });
    // $('.deleteVendor').on('click', function () {
    //      $('#tableData').DataTable({
    //          "stateSave": true,
    //          fndraw(false)
    //          DataTable.ajax.reload(null,false);
            
    //      });
    // });

    //  });
    $(document).on('click',".viewExistDetail",function(){
      	$("#existDetail").modal();
      	var id = $(this).attr('rel');
      	//$("#cmodalHead").html('Cancelation Reason: <strong>'+id+'</strong>');
      	$("#existDEtail").html($("#existDetaildiv_"+id).html());
	});
  
      
</script>