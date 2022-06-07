<?php if(count($result) > 0){ ?>
      <div class="row">
         <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h2>Search Query</h2>
                  <div class="panel-ctrls">
                  </div>
               </div>
               <div class="panel-body panel-no-padding">
                  <table id="example" class="table table-bordered table-hover" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th><input type="checkbox" id="ckbCheckAll" />Select All</th>
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
                     <?php if(!empty($result)){
                           foreach ($result as $query) { ?>
                           <tr class="odd gradeX">
                             <td><?php if($query->status != 2 && $query->status != 3){ ?>
                                 <input type="checkbox" class="checkBoxClass" id="Checkbox1" name="mass_delete" value="<?php echo $query->id; ?>" />
                             <?php } ?>
                            </td>
                           <td><?php echo 'TWZQ00'.$query->id; ?></td>
                           <td><?php echo $query->src; ?></td>
                           <td><?php echo $query->person_name; ?></td>
                           <td><?php echo $query->contact_no; ?></td>
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
                                      <td><?php echo $query->travel_date; ?></td>
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
                                </table>
                              </div>
                              </div>
                              <?php if ($query->status == 3) { ?>
                                  <div id="cdetail_<?php echo $query->id; ?>" style="display:none; text-align: justify;">
                                   <div><?php echo $query->cancel_reason; ?></div>
                                  </div>
                                  <button type="button" rel="<?php echo $query->id; ?>" class="btn btn-info btn-sm viewCancelDetail" data-toggle="tooltip" data-placement="top" title="View Cancelation Reason"><i class="fa fa-eye"></i></button>
                              <?php } ?>
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
                            <td><?php echo date('d/m/Y', strtotime($query->query_date)); ?></td>
                            <td><?php if($query->handler_id != 0) {
                                echo $query->query_handled_by;
                            }else{
                              echo "UnAssigned";
                            } ?></td>
                            <td>
                              <a href="<?php echo base_url(PARTNER) ?>/editQuery/<?php echo $query->id; ?>" data-toggle="tooltip" data-placement="top" title="Edit Query"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <?php if ($query->status != 2 && $query->status != 3) { ?>
                              <a class="deleteVendor" href="<?php echo base_url(PARTNER) ?>/deleteQuery/<?php echo $query->id; ?>" data-toggle="tooltip" data-placement="top" title="Delete Query"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            <?php } ?>
                           <?php if($query->handler_id == 0 || $query->handler_id == '') { ?>
                             <a class="viewpartnerEmployee" data-toggle="tooltip" rel="<?php echo $query->id; ?>" data-placement="top" title="Push Query"><i class="fa fa-share" aria-hidden="true"></i></a>
                            <?php }else{
                              if($query->status != 2 && $query->status != 3){ ?>
                                  <a class="deleteVendor" data-toggle="tooltip" href="<?php echo base_url(PARTNER) ?>/UndoPushQuery/<?php echo $query->id; ?>" data-placement="top" title="Undo Push Query"><i class="fa fa-undo" aria-hidden="true"></i></a>
                              <?php }
                              } ?>
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
<?php }else{ ?>
    <tr class="search-sf"><td class="text-muted" colspan="10">No record found.</td></tr>
<?php }?>
<script type="text/javascript">
    $(function () {
        $('#example').DataTable({
          "paging"      : true,
          "lengthChange": false,
          "searching"   : false,
          "info"        : true,
          "autoWidth"   : true,
          "bSort"       : false,
          "bStateSave"  : true,
          "pagingType"  : "first_last_numbers"
        });
      });
</script>