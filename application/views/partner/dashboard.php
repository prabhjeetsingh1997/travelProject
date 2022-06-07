<div class="col-md-10" style="margin-top:;">
<div id="wrapper" style="margin-top:;">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
   <div class="page-content" style="margin-top:100px;"> 
   
      <!--<ol class="breadcrumb">-->
      <!--   <li class=""><a href="index.html">Home</a></li>-->
      <!--   <li class="active"><a href="index.html">Dashboard</a></li>-->
      <!--</ol>-->
      <!--<div class="page-heading">-->
      <!--   <h1>Dashboard</h1>-->
      <!--   <div class="options">-->
      <!--      <div class="btn-toolbar">-->
      <!--         <a href="#" class="btn btn-default"><i class="fa fa-fw fa-wrench"></i></a>-->
      <!--      </div>-->
      <!--   </div>-->
      <!--</div>-->
      <?php if($roleId == ROLE_ADMIN) { ?>
      <div class="container">
            <div class="row">
               <!--<div class="col-md-3">-->
               <!--   <div class="amazo-tile tile-success">-->
               <!--      <div class="tile-heading">-->
               <!--         <div class="title">Add Inventory</div>-->
               <!--         <div class="secondary">past 28 days</div>-->
               <!--      </div>-->
               <!--      <div class="tile-body">-->
               <!--         <div class="content">$75,800</div>-->
               <!--      </div>-->
               <!--      <div class="tile-footer">-->
               <!--         <span class="info-text text-right">13.4% <i class="fa fa-level-up"></i></span>-->
               <!--         <div id="sparkline-revenue" class="sparkline-line"></div>-->
               <!--      </div>-->
               <!--   </div>-->
               <!--</div>-->
               <!--<div class="col-md-3">-->
               <!--   <div class="amazo-tile tile-info" href="#">-->
               <!--      <div class="tile-heading">-->
               <!--         <div class="title">Queries</div>-->
               <!--         <div class="secondary">orders this month</div>-->
               <!--      </div>-->
               <!--      <div class="tile-body">-->
               <!--         <div class="content">3,690</div>-->
               <!--      </div>-->
               <!--      <div class="tile-footer">-->
               <!--         <span class="info-text text-right">82% of 4,500</span>-->
               <!--         <div class="progress">-->
               <!--            <div class="progress-bar" style="width: 82%"></div>-->
               <!--         </div>-->
               <!--      </div>-->
               <!--   </div>-->
               <!--</div>-->
               <!--<div class="col-md-3">-->
               <!--   <div class="amazo-tile tile-white">-->
               <!--      <div class="tile-heading">-->
               <!--         <div class="title">Tour Card</div>-->
               <!--         <div class="secondary">past 28 days</div>-->
               <!--      </div>-->
               <!--      <div class="tile-body">-->
               <!--         <span class="content">407</span>-->
               <!--      </div>-->
               <!--      <div class="tile-footer text-center">-->
               <!--         <span class="info-text text-right" style="color: #f04743">13.4% <i class="fa fa-level-down"></i></span>-->
               <!--         <div id="sparkline-item" class="sparkline-bar"></div>-->
               <!--      </div>-->
               <!--   </div>-->
               <!--</div>-->
               <!--<div class="col-md-3">-->
               <!--   <div class="amazo-tile tile-white">-->
               <!--      <div class="tile-heading">-->
               <!--         <span class="title">Accounts</span>-->
               <!--         <span class="secondary">past 28 days</span>-->
               <!--      </div>-->
               <!--      <div class="tile-body">-->
               <!--         <span class="content">$9,500</span>-->
               <!--      </div>-->
               <!--      <div class="tile-footer">-->
               <!--         <span class="info-text text-right" style="color: #94c355">9.2% <i class="fa fa-level-up"></i></span>-->
               <!--         <div id="sparkline-commission" class="sparkline"></div>-->
               <!--      </div>-->
               <!--   </div>-->
               <!--</div>-->
            </div>
 
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <!--<li data-target="#carousel-example-generic" data-slide-to="0" ></li>-->
      <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <!--<div class="item active">-->
      <!--  <img src="<?php //echo base_url();?>/assets/images/banner-1.jpg" style="width:100%; height:500px">-->
      <!--</div>-->
      <div class="item active">
        <img src="<?php echo base_url();?>/assets/images/banner-2.jpg" style="width:100%; height:500px">
      </div>
      <div class="item">
        <img src="<?php echo base_url();?>/assets/images/banner-3.jpg" style="width:100%; height:500px">
      </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

</div>
      
      <?php } ?>
      <!-- .container-fluid -->
       <?php if($roleId == ROLE_EMPLOYEE) { ?>
      
    <div class="container">
 
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <!--<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>-->
      <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <!--<div class="item active">-->
      <!--  <img src="<?php //echo base_url();?>/assets/images/banner-1.jpg" style="width:100%; height:500px">-->
      <!--</div>-->
      <div class="item active">
        <img src="<?php echo base_url();?>/assets/images/banner-2.jpg" style="width:100%; height:500px">
      </div>
      <div class="item">
        <img src="<?php echo base_url();?>/assets/images/banner-3.jpg" style="width:100%; height:500px">
      </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>

    </div>
  
      <?php } ?>
      <!-- .container-fluid -->
   </div>
   <!-- #page-content -->
</div>

<style>

/*    p {*/
/*  font-family: 'Poppins', sans-serif;*/
/*  font-size: 1.1em;*/
/*  font-weight: 300;*/
/*  line-height: 1.7em;*/
/*  color: #999;*/
/*}*/

/*a,*/
/*a:hover,*/
/*a:focus {*/
/*  text-decoration: none;*/
/*  transition: all 0.3s;*/
/*}*/

/*.navbar {*/
/*  padding: 15px 10px;*/
/*  background: #fff;*/
/*  border: none;*/
/*  border-radius: 0;*/
/*  margin-bottom: 40px;*/
/*  box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);*/
/*}*/

/*.navbar-btn {*/
/*  box-shadow: none;*/
/*  outline: none !important;*/
/*  border: none;*/
/*}*/

/*.line {*/
/*  width: 100%;*/
/*  height: 1px;*/
/*  border-bottom: 1px dashed #ddd;*/
/*  margin: 40px 0;*/
/*}*/


/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

/*#wrapper {*/
/*  display: flex;*/
/*  align-items: stretch;*/
/*}*/

/*#sidebar {*/
/*  min-width: 250px;*/
/*  max-width: 250px;*/
/*  background: #174583;*/
/*  color: #fff;*/
/*  transition: all 0.3s;*/
/*}*/

/*#sidebar a,*/
/*#sidebar a:hover,*/
/*#sidebar a:focus {*/
/*  color:white;*/
  /*background:white;*/
/*}*/

/*#sidebar.active {*/
/*  margin-left: -250px;*/
/*}*/

/*#sidebar .sidebar-header {*/
/*  padding: 20px;*/
/*  background: #174583;*/
/*  color:white;*/
/*}*/

/*#sidebar ul.components {*/
/*  padding: 20px 0;*/
/*  border-bottom: 1px solid #47748b;*/
/*}*/

/*#sidebar ul p {*/
/*  color: #fff;*/
/*  padding: 10px;*/
/*}*/

/*#sidebar ul li a {*/
/*  padding: 10px;*/
/*  font-size: 1.1em;*/
/*  display: block;*/
/*}*/

/*#sidebar ul li a:hover {*/
/*  color: #174583;*/
/*  background: #fff;*/
/*}*/

/*#sidebar ul li.active > a,*/
/*a[aria-expanded="true"] {*/
/*  color: white;*/
/*  background: #174583;*/
/*}*/

/*a[data-toggle="collapse"] {*/
/*  position: relative;*/
/*}*/

/*a[aria-expanded="false"]::before,*/
/*a[aria-expanded="true"]::before {*/
/*  content: '\f063';*/
/*  display: block;*/
/*  position: absolute;*/
/*  right: 20px;*/
/*  font-family: 'FontAwesome';*/
/*  font-size: 0.6em;*/
/*}*/

/*a[aria-expanded="true"]::before {*/
/*  content: '\f062';*/
/*}*/

/*ul ul a {*/
/*  font-size: 0.9em !important;*/
/*  padding-left: 30px !important;*/
  /*background: #6d7fcc;*/
/*}*/

/*ul.CTAs {*/
/*  padding: 20px;*/
/*}*/

/*ul.CTAs a {*/
/*  text-align: center;*/
/*  font-size: 0.9em !important;*/
/*  display: block;*/
/*  border-radius: 5px;*/
/*  margin-bottom: 5px;*/
/*}*/

/*a.download {*/
/*  background: #fff;*/
/*  color: #7386D5;*/
/*}*/

/*a.article,*/
/*a.article:hover {*/
/*  background: #6d7fcc !important;*/
/*  color: #fff !important;*/
/*}*/


/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

/*#content {*/
/*  padding: 20px;*/
/*  min-height: 100vh;*/
/*  transition: all 0.3s;*/
/*}*/

/*#content p a {*/
/*  color:*/
/*}*/


/* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */

/*@media (max-width: 768px) {*/
/*  #sidebar {*/
/*    margin-left: -250px;*/
/*  }*/
/*  #sidebar.active {*/
/*    margin-left: 0;*/
/*  }*/
/*  #sidebarCollapse span {*/
/*    display: none;*/
/*  }*/
/*}*/
</style>