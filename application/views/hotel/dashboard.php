<div id="wrapper">
<div id="layout-static">
<div class="static-content-wrapper">
<div class="static-content">
   <div class="page-content">
      <!--<ol class="breadcrumb" style="background-color:white;">-->
      <!--   <li class=""><a href="index.html">Home</a></li>-->
      <!--   <li class="active"><a href="index.html">Dashboard</a></li>-->
      <!--</ol>-->
      <div class="page-heading" style="background-color:white;">
         <h1>Dashboard</h1>
         <div class="options">
            <div class="btn-toolbar">
               <a href="<?php echo base_url(HOTEL) ?>/addHotel" class="btn btn-primary" role="button">Add Hotel</a>
            </div>
         </div>
      </div>
      <div class="container-fluid">
         <div data-widget-group="group1">
            <div class="row">
               <div class="col-md-4 mydivoutermulti" id="">
                  <div class="amazo-tile tile-success divtobeblured">
                     <div class="tile-heading" style="background-color:;">
                        <div class="title">Active Hotels</div>
                        <div class="secondary">Total <?php echo $totalactive;?></div>
                     </div>
                     <div class="tile-body" style="background-color:white;">
                        <!--<div class="content">-->
                            <table id="" class="table table-striped table-bordered" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Hotel</th>
                                        <th>City</th>
                                        <th>Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($partners_hotelactive)) {
                                        foreach($partners_hotelactive as $hotel){
                                    ?>
                                    <tr>
                                        <td><?php echo $hotel->hotel_name; ?></td>
                                        <td><?php echo $hotel->city_name; ?></td>
                                        <td><?php if($hotel->hotel_star == 1){echo '<i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i>';}
                                         if($hotel->hotel_star == 2){
                                             echo '<i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i>';
                                         }
                                         if($hotel->hotel_star == 3){
                                             echo '<i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i>';
                                         }
                                         if($hotel->hotel_star == 4){
                                             echo '<i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i>';
                                         }
                                         if($hotel->hotel_star == 5){
                                             echo '<i class="fa fa-star" aria-hidden="true"style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i>';
                                         }
                                        ?></td>
                                    </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <!--</div>-->
                        
                     </div>
                     
                  </div>
                  <a class="btn btn-success buttonoverlapmulti" id=" " href="<?php echo base_url(HOTEL) ?>/viewActiveHotel">View More</a>
               </div>
               <div class="col-md-4 mydivoutermulti">
                  <div class="amazo-tile tile-white divtobeblured">
                     <div class="tile-heading" style="background-color:#e51c23;">
                        <div class="title" style="color:white;">Inactive Hotel</div>
                        <div class="secondary" style="color:white;">Total <?php echo $totalinactive; ?></div>
                     </div>
                     <div class="tile-body">
                       <table id="" class="table table-striped table-bordered" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Hotel</th>
                                        <th>City</th>
                                        <th>Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($partners_hotelinactive)) {
                                        foreach($partners_hotelinactive as $hotel){
                                    ?>
                                    <tr>
                                        <td><?php echo $hotel->hotel_name; ?></td>
                                        <td><?php echo $hotel->city_name; ?></td>
                                        <td><?php if($hotel->hotel_star == 1){echo '<i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i>';}
                                         if($hotel->hotel_star == 2){
                                             echo '<i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i>';
                                         }
                                         if($hotel->hotel_star == 3){
                                             echo '<i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i>';
                                         }
                                         if($hotel->hotel_star == 4){
                                             echo '<i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i>';
                                         }
                                         if($hotel->hotel_star == 5){
                                             echo '<i class="fa fa-star" aria-hidden="true"style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i>';
                                         }
                                        ?></td>
                                    </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        
                     </div>
                     
                  </div>
               <!--</div>-->
               <!--<div class="col-md-3">-->
                   
                  <a class="btn buttonoverlapmulti" style="background-color:#e51c23; color:white;" id=" " href="<?php echo base_url(HOTEL) ?>/viewInactiveHotel">View More</a>
               </div>
               <div class="col-md-4 mydivoutermulti">
                  <div class="amazo-tile tile-white divtobeblured">
                     <div class="tile-heading" style="background-color:#009688;">
                        <div class="title" style="color:white;">All Hotel</div>
                        <div class="secondary">Total <?php echo $totalhotels; ?></div>
                     </div>
                     <div class="tile-body">
                       <table id="" class="table table-striped table-bordered" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Hotel</th>
                                        <th>City</th>
                                        <th>Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($partners_hotel)) {
                                        foreach($partners_hotel as $hotel){
                                    ?>
                                    <tr>
                                        <td><?php echo $hotel->hotel_name; ?></td>
                                        <td><?php echo $hotel->city_name; ?></td>
                                        <td><?php if($hotel->hotel_star == 1){echo '<i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i>';}
                                         if($hotel->hotel_star == 2){
                                             echo '<i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i>';
                                         }
                                         if($hotel->hotel_star == 3){
                                             echo '<i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i>';
                                         }
                                         if($hotel->hotel_star == 4){
                                             echo '<i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i>';
                                         }
                                         if($hotel->hotel_star == 5){
                                             echo '<i class="fa fa-star" aria-hidden="true"style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i><i class="fa fa-star" aria-hidden="true" style="color:#f5e642"></i>';
                                         }
                                        ?></td>
                                    </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        
                     </div>
                     
                  </div>
               <!--</div>-->
               <!--<div class="col-md-3">-->
                   
                  <a class="btn buttonoverlapmulti" style="background-color:#009688; color:white;" id=" " href="<?php echo base_url(HOTEL) ?>/viewHotel">View More</a>
               </div>
            </div>
         </div>
         <?php if($totalhotels == 0) {?>
         <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
    
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                    <h3 class="modal-title">Welcome <?php echo $name;?></h3>
                  </div>
                  <div class="modal-body" style="height:360px; padding:0px;">
                      
                      <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                    <div>
                    <div id="DemoCarousel" class="carousel slide" data-interval="" data-ride="carousel">

                        <ol class="carousel-indicators" style="left:7%;bottom:-35px;">
                            <li data-target="#DemoCarousel" data-slide-to="0" class="active" style="background-color:darkcyan; border-color:darkcyan;"></li>
                            <li data-target="#DemoCarousel" data-slide-to="1" style="background-color:darkcyan; border-color:darkcyan;"></li>
                            <!--<li data-target="#DemoCarousel" data-slide-to="2"></li>-->
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <!--<h2>Slide 1</h2>-->
                                <img src="<?php echo base_url();?>assets/images/welcomebanner1.png">
                                <!--<div class="carousel-caption">-->
                                <!--    <ul style="color:black;">-->
                                <!--        <li>Add properties as much as you can and we will take care of the rest.</li>-->
                                <!--        <li>Submit documents like contract copy & regulatory document<br>and you are all set to go.</li>-->
                                <!--    </ul>-->
                                <!--</div>-->
                            </div>
                            <div class="item">
                                <!--<h2>Slide 2</h2>-->
                                <img src="<?php echo base_url();?>assets/images/welcomebanner2.png">
                                <div class="carousel-caption">
                                    <!--<ul style="color:black;">-->
                                    <!--    <li>Just Wait so we can verify the details after that your property<br>will be active.</li>-->
                                    <!--    <li>Get online bookings, your property will be live and availiable<br>to millions of travellers.</li>-->
                                    <!--</ul>-->
                                    <a href="<?php echo base_url(HOTEL) ?>/addHotel" class="btn" role="button" style="margin-bottom: -41px; margin-left: -122px;">Add Hotel</a>
                                </div>
                            </div>
                            <!--<div class="item">-->
                            <!--    <h2>Slide 3</h2>-->
                            <!--    <div class="carousel-caption">-->
                            <!--        <h3>This is the Third Label</h3>-->
                            <!--        <p>The Content of the Third Slide goes in here</p>-->
                            <!--        -->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                            <!--<a class="carousel-control left" href="#DemoCarousel" data-slide="prev">-->
                            <!--    <span class="glyphicon glyphicon-chevron-left"></span>-->
                            <!--</a>-->
                            <!--<a class="carousel-control right" href="#DemoCarousel" data-slide="next">-->
                            <!--    <span class="glyphicon glyphicon-chevron-right"></span>-->
                            <!--</a>-->
                    </div>
                    
                    <button type="button" class="btn btn-sm btn-warning" style="margin-top: 5px; margin-left: 85%;" data-dismiss="modal">Skip</button>
                    </div>
                  </div>
                  <!--<div class="modal-footer">-->
                  <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Skip</button>-->
                  <!--</div>-->
                </div>
      
              </div>
            </div>
            <?php }else{
            } ?>
      </div>
      <!-- .container-fluid -->
   </div>
   <!-- #page-content -->
</div>

<style>

.buttonoverlapmulti{
z-index: 2;
top: 130px;
display: none;
left: 310px;

}
.mydivoutermulti:hover .divtobeblured{
    filter: blur(2px);
}
.mydivoutermulti{
position: relative;

}
.mydivoutermulti:hover .buttonoverlapmulti{
    position: absolute;
    z-index:0;
    display:block;

}

.item {
    /*background: darkcyan;*/
    text-align: center;
    height: 300px;
    }

    h2 {
        margin: 0;
        color: #888;
        padding-top: 80px;
        font-size: 30px;
    }
    
/*.carousel-caption{*/
/*    left:0;*/
/*    right:0;*/
/*    color:black;*/
/*}*/
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(window).on('load',function(){
    var delayMs = 1500; // delay in milliseconds
    
    setTimeout(function(){
        $('#myModal').modal('show');
    }, delayMs);
    });    

</script>