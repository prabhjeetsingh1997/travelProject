<div class="col-md-11" id="contentCol">
<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
<div class="page-content" style="margin-top:;">
   <ol class="breadcrumb">
      <li><a href="<?php echo base_url(PARTNER) ?>/dashboard">Home</a></li>
      <li><a href="#">Client</a></li>
   </ol>
   <div class="page-heading">
      <h1>All Client</h1>
      <div class="options">
      <a href="<?php echo base_url(PARTNER) ?>/addClient" class="btn btn-primary" role="button">Add Client</a>
      
      <?php if($roleId == ROLE_ADMIN) {?>
      
        <button class="btn btn-danger" id="massDelete">Mass Delete</button>
      <?php } else { 
      }?>
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
                          <h2>Client</h2>
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
                          <th><input type="checkbox" id="ckbCheckAll"> Sel.</th>
                          <th>ClientId</th>
                          <th>Src</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>organization</th>
                          <th>Company Email</th>
                          <th>Action</th>        
                        </tr>
                      </thead>
                      <tbody id="myTabledata">
                      <?php
                      if (!empty($clientDetails)) {
                            foreach ($clientDetails as $client) { ?>
                                <tr>
                                <td><input type="checkbox" class="checkBoxClass" id="Checkbox1" name="mass_delete" value="<?php echo $client->id; ?>"></td>
                                <td><?php echo "TWZC00".$client->id; ?></td>
                                <td><?php echo $client->src;?></td>
                                <td><?php echo $client->client_name;?></td>
                                <td><?php echo $client->client_email;?></td>
                                <td><?php echo $client->client_number; ?></td>
                                <td><?php echo $client->organization; ?></td>
                                <td><?php echo $client->company_email; ?></td>
                                <td>
                                    <a href="<?php echo base_url(PARTNER) ?>/editClient/<?php echo $client->id; ?>" data-toggle="tooltip" data-placement="top" title="Edit Client"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <?php if($roleId == ROLE_ADMIN) {?>
                            
                                
                                <a class="deleteVendor" href="<?php echo base_url(PARTNER) ?>/deleteClient/<?php echo $client->id; ?>" data-toggle="tooltip" data-placement="top" title="Delete Client"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    
                               
                             <?php } else  { ?>
                                    
                                 <?php echo ""; ?>
                                 
                              <?php } ?>
                             
                                </td>
                                </tr>
                      <?php } ?>      
                       <?php }else{ ?>
                        <div>No Record Founds.</div>
                      <?php } ?>        
                        </tbody>
                        </table>
                          <div class="panel-footer">
                            <div class="col-md-12 text-center simple-pagination" id="addedpagination">
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
        <h4 class="modal-title" id="modalHead">Employee Details</h4>
      </div>
      <div class="modal-body" id="mdetail">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Advance Searcch  Pop Up-->
<div id="advanceSearchPopup" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs" style="">

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
                    <input type="text" name="ad_organization" id="ad_organization" class="form-control" placeholder="Enter Organization">
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
<!-- #page-content -->
<?php
    if ($this->uri->segment(2) == 'viewClient') { ?>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/form-ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/demo/pagejs/partner/viewClient.js"></script>
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

    $(function () {
        $('#tableData').DataTable({
          "paging"      : false,
          "lengthChange": true,
          "searching"   : true,
          "info"        : false,
          "autoWidth"   : false,
          "bSort"       : false,
           responsive : true,
        });
      });
      
   
</script>

