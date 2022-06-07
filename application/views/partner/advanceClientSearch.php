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
                          <th><input type="checkbox" id="ckbCheckAll"> Select All</th>
                          <th>ClientId</th>
                          <th>src</th>
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
                      if (!empty($result)) {
                            foreach ($result as $client) { ?>
                                <tr>
                                <td><input type="checkbox" class="checkBoxClass" id="Checkbox1" name="mass_delete" value="<?php echo $client->id; ?>"></td>
                                <td><?php echo "lidc00".$client->id; ?></td>
                                <td><?php echo $client->src; ?></td>
                                <td><?php echo $client->client_name;?></td>
                                <td><?php echo $client->client_email;?></td>
                                <td><?php echo $client->client_number; ?></td>
                                <td><?php echo $client->organization; ?></td>
                                <td><?php echo $client->company_email; ?></td>
                                <td>
                                    <a href="<?php echo base_url(PARTNER) ?>/editClient/<?php echo $client->id; ?>" data-toggle="tooltip" data-placement="top" title="Edit Client"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a class="deleteVendor" href="<?php echo base_url(PARTNER) ?>/deleteClient/<?php echo $client->id; ?>" data-toggle="tooltip" data-placement="top" title="Delete Client"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                                </tr>
                      <?php } ?>      
                       <?php }else{ ?>
                        <div>No Record Founds.</div>
                      <?php } ?>        
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
        });
      });
</script>