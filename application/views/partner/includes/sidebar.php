    <div class="<?php echo $this->uri->segment(2) == 'dashboard' ? 'col-md-2' : 'col-md-1'?>" id="sidebarCol">
<!--</div>-->
    <div id="sidebar" class="sdBar" style="display:<?php echo $this->uri->segment(2) == 'dashboard' ? 'block' : 'none' ?>">
    <div class="sidebar-header">
      <!--<h3>Bootstrap Sidebar</h3>-->
      <?php if(!empty($logo)) { ?>
      <a class="navbar-brand" href="<?php echo base_url(PARTNER); ?>/dashboard"><img src="<?php echo base_url(); ?>uploads/partner_logo/<?php echo $logo;?>" alt="logo" style="width:135px; padding-bottom:-10px;"/></a>
      <?php }else {?>
      <!--<a class="navbar-brand" href="<?php //echo base_url(PARTNER); ?>/dashboard"><img src="<?php //echo base_url(); ?>hotelhomepage/images/logo-1.png" alt="logo" style="width:135px; padding-bottom:-10px;"/></a>-->
      <?php }?>
    </div>
    <ul class="list-unstyled components" style="margin-top:85px;">
        <li>
          <a href="<?php echo base_url(PARTNER) ?>/dashboard" style="background:<?php echo $this->uri->segment(2) == 'dashboard' ? 'white' : '#174583' ?>;color:<?php echo $this->uri->segment(2) == 'dashboard' ? '#174583' : 'white'?>"><i class="fa fa-tachometer" aria-hidden="true" style="padding-right:10px;"></i>Dashboard</a>
        </li>
    </ul>
    <ul class="list-unstyled components" id="sidemenu" style="margin-top:;">
        <li class="topSubMenu">
        <a href="#invtrySubmenu" data-toggle="collapse" aria-expanded="false" id="cntmngmt"><i class="fa fa-database" aria-hidden="true" style="padding-right:10px;"></i>Contacts Management</a>
        <div>
        <ul class="collapse list-unstyled" id="invtrySubmenu">
          <li class="">
            <a href="<?php echo base_url(PARTNER) ?>/viewHotel">Hotel</a>
          </li>
          <li>
            <a href="<?php echo base_url(PARTNER) ?>/viewVendor">Vendor</a>
          </li>
          <li>
            <a href="<?php echo base_url(PARTNER) ?>/viewClient">Client</a>
          </li>
        </ul>
        </div>
        </li>
    <!--</ul>-->
    <?php if($roleId == ROLE_ADMIN) {?>
    <?php if($query_management == 1) {?>
    <!--<ul class="list-unstyled components" style="">-->
         <!--<p style="font-size:13px;"><strong>Queries</strong></p>-->
        <li class="topSubMenu">
            <a href="<?php echo base_url(PARTNER) ?>/viewQuery"><i class="fa fa-laptop" aria-hidden="true" style="padding-right:10px;"></i>Queries</a>
        </li>
    <!--</ul>-->
    <?php } else { ?>
    <!--<ul class="list-unstyled components" style="">-->
        <li>
        <a data-toggle="collapse" aria-expanded="false"><i class="fa fa-laptop" aria-hidden="true" style="padding-right:10px;"></i>Queries<span class="badge badge-info" style="top: auto; margin-left: 10px;">NA</span></a>
        </li>
    <!--</ul>-->
    <?php }?>
        <li class="topSubMenu">
            <a href="#itinerarymenu" data-toggle="collapse" aria-expanded="false" id="bkngmnu"><i class="fa fa-file-image-o" aria-hidden="true" style="padding-right:10px"></i>Itinerary Managment</a>
            <div>
                <ul class="collapse list-unstyled" id="itinerarymenu">
                    <li><a href="<?php echo base_url(PARTNER) ?>/makeItinerary">Make Itinerary</a></li>
                    <li><a href="<?php echo base_url(PARTNER) ?>/viewPartnerItinerary">View Itinerary</a></li>
                </ul>
            </div>
        </li>
    <!--<ul class="list-unstyled components">-->
        <!--<p style="font-size:13px;"><strong>Bookings</strong></p>-->
        <li class="topSubMenu">
        <a href="#bkngmenu" data-toggle="collapse" aria-expanded="false" id="bkngmnu"><i class="fa fa-calendar" aria-hidden="true" style="padding-right:10px"></i>Bookings</a>
        <div>
        <ul class="collapse list-unstyled" id="bkngmenu">
        <li>
            <a href="#htBookingSubmenu" data-toggle="collapse" aria-expanded="false">Hotel Bookings</a>
            <ul class="collapse list-unstyled" id="htBookingSubmenu">
                <li><a href="<?php echo base_url(PARTNER) ?>/ViewWaitingHotelPackagesforAdmin">Queued</a></li>
                <li><a href="<?php echo base_url(PARTNER) ?>/ViewsavedHotelPackagesforAdmin">Confirmed</a></li>
                <li><a href="<?php echo base_url(PARTNER) ?>/ViewCancelledHotelPackagesInadmin">Cancelled</a></li>
                <li><a href="#">Rejected</a></li>
            </ul>
        </li>
        <li>
            <a href="#PakBookingSubmenu" data-toggle="collapse" aria-expanded="false">Package Bookings</a>
            <ul class="collapse list-unstyled" id="PakBookingSubmenu">
                <li><a href="#">Queued</a></li>
                <li><a href="#">Confirmed</a></li>
                <li><a href="#">Cancelled</a></li>
                <li><a href="#">Rejected</a></li>
            </ul>
        </li>
        </ul>
        </div>
        </li>
    <!--</ul>-->
    <!--<ul class="list-unstyled components" style="">-->
        <!--<p style="font-size:13px;"><strong>Accounts</strong></p>-->
        <li class="topSubMenu">
            <a href="#AcntSubmenu" data-toggle="collapse" aria-expanded="false" id="accntmnu"><i class="fa fa-calculator" aria-hidden="true" style="padding-right:10px;"></i>Accounts</a>
        <div>
        <ul class="collapse list-unstyled" id="AcntSubmenu">
        <?php if($accounts_management == 1) {?>
        <li><a href="<?php echo base_url(PARTNER) ?>/newPaymentVoucher">Make Voucher</a></li>
        <li>
        <a href="#accountsSubmenu" data-toggle="collapse" aria-expanded="false">Ledgers</a>
        <ul class="collapse list-unstyled" id="accountsSubmenu">
          <li><a href="<?php echo base_url(PARTNER) ?>/getAllVendorLedger">Vendor Ledger</a></li>
          <li><a href="<?php //echo base_url(PARTNER)?>">Party Ledger</a></li>
          <li><a href="<?php echo base_url(PARTNER) ?>/getAllGeneralLedger">General Ledger</a></li>
        </ul>
        </li>
        <?php }else {?>
        <li>
        <a href="#accountsSubmenu" data-toggle="collapse" aria-expanded="false">Ledgers<span class="badge badge-info" style="top: auto; margin-left: 10px;">NA</span></a>
        </li>
        <?php }?>
        </ul>
        </div>
        </li>
    <!--</ul>-->
    <!--<ul class="list-unstyled components" style="">-->
        <?php if($tourcard_management == 1) {?>
        <li class="topSubMenu">
            <a href="#TourCrdSubmenu" data-toggle="collapse" aria-expanded="false" id="turcardmnu"><i class="fa fa-print" aria-hidden="true" style="padding-right:10px;"></i>Tour Card</a>
            <div>
            <ul class="collapse list-unstyled" id="TourCrdSubmenu">
                <li><a href="<?php echo base_url(PARTNER) ?>/viewAllTourCard">Other Tour Cards</a></li>
                <li><a href="<?php echo base_url(PARTNER) ?>/NewTourCard">Make Tour Card</a></li>
            </ul>
            </div>
        </li>
        <?php }else {?>
        <li>
            <a href="" data-toggle="collapse" aria-expanded="false">Tour Card<span class="badge badge-info" style="top: auto; margin-left: 10px;">NA</span></a>
        </li>
        <?php }?>
        
    <!--</ul>-->
    <!--<ul class="list-unstyled components" style="">-->
        <li class="topSubMenu">
        <a href="#empSubmenu" data-toggle="collapse" aria-expanded="false" id="empmnu"><i class="fa fa-fw fa-user" style="padding-right:10px;"></i>Employees</a>
        <div>
        <ul class="collapse list-unstyled" id="empSubmenu">
          <li><a href="<?php echo base_url(PARTNER) ?>/addEmployee">Add New Employee</a></li>
          <li><a href="<?php echo base_url(PARTNER) ?>/viewEmployee">View Employee</a></li>
        </ul>
        </div>
        </li>
    <!--</ul>-->
    <?php }?>
   
    <?php if($roleId == ROLE_EMPLOYEE) {?>
     <!--<ul class="list-unstyled components" style="margin-top:;">-->
        <li class="topSubMenu">
        <a href="#empbkngmenu" data-toggle="collapse" aria-expanded="false" id="embkngmnu"><i class="fa fa-calendar" aria-hidden="true" style="padding-right:10px"></i>Bookings</a>
        <div>
        <ul class="collapse list-unstyled" id="empbkngmenu">
        <li>
            <a href="#emphtBookingSubmenu" data-toggle="collapse" aria-expanded="false">Hotel Bookings</a>
            <ul class="collapse list-unstyled" id="emphtBookingSubmenu">
                <li><a href="<?php echo base_url(PARTNER) ?>/ViewsavedHotelPackagesinQue">Queued</a></li>
                <li><a href="<?php echo base_url(PARTNER) ?>/ViewsavedHotelPackages">Confirmed</a></li>
                <li><a href="<?php echo base_url(PARTNER) ?>/ViewCancelledHotelPackages">Cancelled</a></li>
                <li><a href="#">Rejected</a></li>
            </ul>
        </li>
        <li>
            <a href="#empPakBookingSubmenu" data-toggle="collapse" aria-expanded="false">Package Bookings</a>
            <ul class="collapse list-unstyled" id="empPakBookingSubmenu">
                <li><a href="<?php echo base_url(PARTNER) ?>/ViewConfirmedPackagesinQue">Queued</a></li>
                <li><a href="#">Confirmed</a></li>
                <li><a href="#">Cancelled</a></li>
                <li><a href="#">Rejected</a></li>
            </ul>
        </li>
        </ul>
        </div>
        </li>
    <!--</ul>-->
    <?php if($query_management == 1) {?>
    <!--<ul class="list-unstyled components" style="margin-top:;">-->
        <li class="topSubMenu">
            <a href="#empqrymenu" data-toggle="collapse" aria-expanded="false" id="emQuerymnu"><i class="fa fa-laptop" aria-hidden="true" style="padding-right:10px;"></i>Queries</a>
            <div>
            <ul class="collapse list-unstyled" id="empqrymenu">
               <li><a href="<?php echo base_url(PARTNER) ?>/queryInHand">Query In Hand</a></li>
               <li><a href="<?php echo base_url(PARTNER) ?>/confirmedQuery">Confirmed Query</a></li>
               <li><a href="<?php echo base_url(PARTNER) ?>/canceledQuery">Cancelled Query</a></li>
            </ul>
            </div>
        </li>
    <!--</ul>-->
    <?php } else { ?>
    <!--<ul class="list-unstyled components" style="margin-top:;">-->
        <li>
            <a href="#empqrymenu" data-toggle="collapse" aria-expanded="false"><i class="fa fa-laptop" aria-hidden="true" style="padding-right:10px;"></i>Queries<span class="badge badge-info" style="top: auto; margin-left: 10px;">NA</span></a>
        </li>
    <!--</ul>-->
    <?php }?>
    <?php if($tourcard_management == 1) {?>
    <!--<ul class="list-unstyled components" style="margin-top:;">-->
        <li class="topSubMenu">
            <a href="#empTCmenu" data-toggle="collapse" aria-expanded="false" id="emptrcmnu"><i class="fa fa-calculator" aria-hidden="true" style="padding-right:10px;"></i>Tour Card</a>
            <div>
            <ul class="collapse list-unstyled" id="empTCmenu">
                <li><a href="<?php echo base_url(PARTNER) ?>/viewOtherTourCard">Other Tour Card</a></li>
            </ul>
            </div>
        </li>
    <!--</ul>-->
    <?php }else {?>
    <!--<ul class="list-unstyled components" style="margin-top:;">-->
        <li>
            <a href="#empTCmenu" data-toggle="collapse" aria-expanded="false"><i class="fa fa-calculator" aria-hidden="true" style="padding-right:10px;"></i>Tour Card<span class="badge badge-info" style="top: auto; margin-left: 10px;">NA</span></a>
        </li>
    </ul>
    <?php }?>
    
    <?php }?>
  </div>
  
  <!--sidebar2-->
  
    <div id="sidebar2" style="display:<?php echo $this->uri->segment(2) == 'dashboard' ? 'none' : 'block' ?>">
    <div class="sidebar-header">
      <!--<h3>Bootstrap Sidebar</h3>-->
      <a class="" href="<?php echo base_url(PARTNER); ?>/dashboard"><img src="<?php echo base_url(); ?>assets/images/LiD.png" alt="logo" style="width:34px; margin-top:;"/></a>
    </div>
    
    <ul class="list-unstyled components" style="margin-top:; text-align:center;">
      <!--<p>Dummy Heading</p>-->
      <li style="padding:15px;">
          <i class="fa fa-tachometer" aria-hidden="true" style="font-size:28px; color:white;"></i>
      </li>
      <li class="" style="padding: 15px;">
        <i class="fa fa-database" aria-hidden="true" style="font-size:28px; color:white;"></i>
        
      </li>
      <li style="padding: 15px;">
        <!--<a href="#">About</a>-->
        <i class="fa fa-fw fa-laptop" aria-hidden="true" style="font-size:28px; color:white;"></i>
        
      </li>
      <li style="padding: 15px;">
        <i class="fa fa-calculator" aria-hidden="true" style="font-size:28px; color:white;"></i>
        
      </li>
      <?php //if($roleId == ROLE_ADMIN) {?>
      <li style="padding: 15px;">
        <i class="fa fa-fw fa-user" aria-hidden="true" style="font-size:28px; color:white;"></i>
      </li>
      
      <?php //}?>
    </ul>

    <!--<ul class="list-unstyled CTAs">-->
    <!--  <li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to the article</a></li>-->
    <!--</ul>-->
  </div>
  </div>
  <style>
  #sidebar {
  height:100%;
  /*min-width: 230px;*/
  /*max-width: 230px;*/
  background: #174583;
  color: #fff;
  transition: all 0.5s;
  position:fixed;
  overflow-y:scroll;
  z-index:1;
}

#sidebar2 {
  height:100%;
  min-width: 70px;
  max-width: 70px;
  background: #174583;
  color: #fff;
  transition: all 0.5s;
  position:fixed;
  /*overflow-y:scroll;*/
  /*overflow-x:scroll;*/
}

.sdBar::-webkit-scrollbar {
    width: 10px;
}

.sdBar::-webkit-scrollbar-track {
    background-color: #174583;
    border-radius: 100px;
}
 
.sdBar::-webkit-scrollbar-thumb {
    background-color: #eaa730;
    border-radius: 100px;
}

#sidebar a,
#sidebar a:hover,
#sidebar a:focus {
  color:white;
  /*background:white;*/
}

#sidebar.active {
  margin-left: -250px;
}

#sidebar .sidebar-header {
  /*padding: 20px;*/
  background: #174583;
  color:white;
}

#sidebar2 .sidebar-header {
  padding: 20px;
  background: #174583;
  color:white;
}

.topSubMenu {
    border-bottom: 0.5px solid #47748b;
}
#sidebar ul.components {
  /*padding: 20px 0;*/
  border-bottom: 1px solid #47748b;
}

#sidebar2 ul.components {
  padding: 20px 0;
  border-bottom: 1px solid #47748b;
}

#sidebar ul p {
  color: #fff;
  padding: 10px;
}

#sidebar ul li a {
  padding: 10px;
  font-size: 12px;
  display: block;
}

#sidebar ul li a:hover {
  color: #174583;
  background: #fff;
}

#sidebar ul li.active > a,
a[aria-expanded="true"] {
  color: white;
  background: #174583;
}

a[data-toggle="collapse"] {
  position: relative;
}

a[aria-expanded="false"]::before,
a[aria-expanded="true"]::before {
  content: '\f105';
  display: block;
  position: absolute;
  right: 20px;
  font-family: 'FontAwesome';
  font-size: 1em;
}

a[aria-expanded="true"]::before {
  content: '\f107';
}

ul ul a {
  font-size: 12px !important;
  padding-left: 30px !important;
  /*background: #6d7fcc;*/
}

ul.CTAs {
  padding: 20px;
}

ul.CTAs a {
  text-align: center;
  font-size: 0.9em !important;
  display: block;
  border-radius: 5px;
  margin-bottom: 5px;
}

a.download {
  background: #fff;
  color: #7386D5;
}

a.article,
a.article:hover {
  background: #6d7fcc !important;
  color: #fff !important;
}
/* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */

@media screen and (max-width: 768px) {
  #sidebar {
    margin-left: -250px;
    display:none;
  }
  
  #sidebar2 {
    display:none;
  }
  
  #sidebar.active {
    margin-left: 0;
  }
  
  #sidebarCollapse span {
    display: none;
  }
}
  </style>
  <?php if($this->uri->segment(2) == 'dashboard') {?>
  
    <script>
        // $('#sidemenu li').on("click", function(e) {
        //   //$('#sidemenu li').not(this).find('div').hide();
        //   $('#sidemenu li').not(this).find('a').addClass('collapsed');
        //   $('#sidemenu li').not(this).find('ul').removeClass('in');
        //   //$(this).find('div').toggle();
        //   //$("sidemenu li[data-toggle='collapse']").not(this).addClass('collapsed');
        //   //$("sidemenu li[data-toggle='collapse']").not(this).next('ul').removeClass('in');
        // });
        $("#cntmngmt").on("click", function(){
           $('#bkngmnu').addClass('collapsed');
           $('#bkngmenu').removeClass('in');
           $('#accntmnu').addClass('collapsed');
           $('#AcntSubmenu').removeClass('in');
           $('#turcardmnu').addClass('collapsed');
           $('#TourCrdSubmenu').removeClass('in');
           $('#empmnu').addClass('collapsed');
           $('#empSubmenu').removeClass('in');
        });
        
         $("#bkngmnu").on("click", function(){
           $('#cntmngmt').addClass('collapsed');
           $('#invtrySubmenu').removeClass('in');
           $('#accntmnu').addClass('collapsed');
           $('#AcntSubmenu').removeClass('in');
           $('#turcardmnu').addClass('collapsed');
           $('#TourCrdSubmenu').removeClass('in');
           $('#empmnu').addClass('collapsed');
           $('#empSubmenu').removeClass('in');
        });
         $("#accntmnu").on("click", function(){
           $('#bkngmnu').addClass('collapsed');
           $('#bkngmenu').removeClass('in');
           $('#cntmngmt').addClass('collapsed');
           $('#invtrySubmenu').removeClass('in');
           $('#turcardmnu').addClass('collapsed');
           $('#TourCrdSubmenu').removeClass('in');
           $('#empmnu').addClass('collapsed');
           $('#empSubmenu').removeClass('in');
        });
         $("#turcardmnu").on("click", function(){
           $('#bkngmnu').addClass('collapsed');
           $('#bkngmenu').removeClass('in');
           $('#accntmnu').addClass('collapsed');
           $('#AcntSubmenu').removeClass('in');
           $('#cntmngmt').addClass('collapsed');
           $('#invtrySubmenu').removeClass('in');
           $('#empmnu').addClass('collapsed');
           $('#empSubmenu').removeClass('in');
        });
         $("#empmnu").on("click", function(){
           $('#bkngmnu').addClass('collapsed');
           $('#bkngmenu').removeClass('in');
           $('#accntmnu').addClass('collapsed');
           $('#AcntSubmenu').removeClass('in');
           $('#turcardmnu').addClass('collapsed');
           $('#TourCrdSubmenu').removeClass('in');
           $('#cntmngmt').addClass('collapsed');
           $('#invtrySubmenu').removeClass('in');
        });
        
        $("#embkngmnu").on("click", function(){
            $("#emQuerymnu").addClass('collapsed');
            $("#empqrymenu").removeClass('in');
            $("#emptrcmnu").addClass('collapsed');
            $("#empTCmenu").removeClass('in');
        });
        $("#emQuerymnu").on("click", function(){
            $("#embkngmnu").addClass('collapsed');
            $("#empbkngmenu").removeClass('in');
            $("#emptrcmnu").addClass('collapsed');
            $("#empTCmenu").removeClass('in');
        });
        $("#emptrcmnu").on("click", function(){
            $("#emQuerymnu").addClass('collapsed');
            $("#empqrymenu").removeClass('in');
            $("#emptrcmnu").addClass('collapsed');
            $("#empTCmenu").removeClass('in');
        });
//empbkngmenu
        
    </script>
  <?php }else{?>
  <script>
    $("document").ready(function(){
        $("#sidebar2").mouseenter(over);
        $("#sidebar").mouseleave(out);
        function over()
        {
            $("#sidebar").css("display","block");
            $("#sidebar").css("transition","all 0.5s");
            $("#sidebar2").css("display","none");
            $("#sidebarCol").removeClass("col-md-1").addClass("col-md-2");
            $("#contentCol").removeClass("col-md-11").addClass("col-md-10");
        }
        function out()
        {
            $("#sidebar").css("display","none");
            $("#sidebar2").css("display","block");
            $("#sidebar2").css("transition","all 0.5s");
            $("#sidebarCol").removeClass("col-md-2").addClass("col-md-1");
            $("#contentCol").removeClass("col-md-10").addClass("col-md-11");
        }
        
        // $('#sidemenu li').on("click", function(e) {
        //   //$('#sidemenu li').not(this).find('div').hide();
        //   $('#sidemenu li').not(this).find('a').addClass('collapsed');
        //   $('#sidemenu li').not(this).find('ul').removeClass('in');
        //   //$(this).find('div').toggle();
        //   //$("sidemenu li[data-toggle='collapse']").not(this).addClass('collapsed');
        //   //$("sidemenu li[data-toggle='collapse']").not(this).next('ul').removeClass('in');
        // });
        
        $("#cntmngmt").on("click", function(){
           $('#bkngmnu').addClass('collapsed');
           $('#bkngmenu').removeClass('in');
           $('#accntmnu').addClass('collapsed');
           $('#AcntSubmenu').removeClass('in');
           $('#turcardmnu').addClass('collapsed');
           $('#TourCrdSubmenu').removeClass('in');
           $('#empmnu').addClass('collapsed');
           $('#empSubmenu').removeClass('in');
        });
        
        $("#bkngmnu").on("click", function(){
           $('#cntmngmt').addClass('collapsed');
           $('#invtrySubmenu').removeClass('in');
           $('#accntmnu').addClass('collapsed');
           $('#AcntSubmenu').removeClass('in');
           $('#turcardmnu').addClass('collapsed');
           $('#TourCrdSubmenu').removeClass('in');
           $('#empmnu').addClass('collapsed');
           $('#empSubmenu').removeClass('in');
        });
         $("#accntmnu").on("click", function(){
           $('#bkngmnu').addClass('collapsed');
           $('#bkngmenu').removeClass('in');
           $('#cntmngmt').addClass('collapsed');
           $('#invtrySubmenu').removeClass('in');
           $('#turcardmnu').addClass('collapsed');
           $('#TourCrdSubmenu').removeClass('in');
           $('#empmnu').addClass('collapsed');
           $('#empSubmenu').removeClass('in');
        });
         $("#turcardmnu").on("click", function(){
           $('#bkngmnu').addClass('collapsed');
           $('#bkngmenu').removeClass('in');
           $('#accntmnu').addClass('collapsed');
           $('#AcntSubmenu').removeClass('in');
           $('#cntmngmt').addClass('collapsed');
           $('#invtrySubmenu').removeClass('in');
           $('#empmnu').addClass('collapsed');
           $('#empSubmenu').removeClass('in');
        });
         $("#empmnu").on("click", function(){
           $('#bkngmnu').addClass('collapsed');
           $('#bkngmenu').removeClass('in');
           $('#accntmnu').addClass('collapsed');
           $('#AcntSubmenu').removeClass('in');
           $('#turcardmnu').addClass('collapsed');
           $('#TourCrdSubmenu').removeClass('in');
           $('#cntmngmt').addClass('collapsed');
           $('#invtrySubmenu').removeClass('in');
        });
        
        $("#embkngmnu").on("click", function(){
            $("#emQuerymnu").addClass('collapsed');
            $("#empqrymenu").removeClass('in');
            $("#emptrcmnu").addClass('collapsed');
            $("#empTCmenu").removeClass('in');
        });
        $("#emQuerymnu").on("click", function(){
            $("#embkngmnu").addClass('collapsed');
            $("#empbkngmenu").removeClass('in');
            $("#emptrcmnu").addClass('collapsed');
            $("#empTCmenu").removeClass('in');
        });
        $("#emptrcmnu").on("click", function(){
            $("#emQuerymnu").addClass('collapsed');
            $("#empqrymenu").removeClass('in');
            $("#emptrcmnu").addClass('collapsed');
            $("#empTCmenu").removeClass('in');
        });
        
    });
        
  </script>
  <?php }?>