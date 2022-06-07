<div class="" id="forgotPass">
    <div class="container" style="margin-top: 30px;">
        <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        $send = $this->session->flashdata('send');
        $notsend = $this->session->flashdata('notsend');
        $unable = $this->session->flashdata('unable');
        $invalid = $this->session->flashdata('invalid');
        if($error)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $this->session->flashdata('error'); ?>                    
            </div>
        <?php }

        if($send)
        {
            ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $send; ?>                    
            </div>
        <?php }

        if($notsend)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $notsend; ?>                    
            </div>
        <?php }
        
        if($unable)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $unable; ?>                    
            </div>
        <?php }

        if($invalid)
        {
            ?>
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $invalid; ?>                    
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-md-3"></div>
            
                <div class="col-md-6 thumbnail" style="border:1px solid grey;">
                    <h3 class="text-center"> Reset Password</h3>
                    <div class="spacer30"></div>
                    <form action="<?php //echo base_url() ?>" method="post">
                      <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Email" name="login_email" required />
                        <span class="glyphicon glyphicon-envelope form-control-feedback" style="top:0px;"></span>
                      </div>
          
                      <div class="row">
                        <div class="col-xs-8">
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                          <input type="submit" class="btn btn-primary btn-block btn-flat" value="Submit" />
                        </div><!-- /.col -->
                      </div>
                    </form>
                    <a href="<?php //echo base_url() ?>" style="color:#2c3e50;">Login</a><br>
                </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>