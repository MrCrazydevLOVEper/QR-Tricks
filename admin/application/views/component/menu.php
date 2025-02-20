<div class="navbar-custom">
   <div class="container-fluid titlebar">
      <ul class="list-unstyled topnav-menu float-right mb-0">
         <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle rounded-circle-cust mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
               <i data-feather="more-vertical"></i>
               <!-- <img style="width: 22px;" src="<?php echo base_url();?>assets/img/user.png" alt="user-image" class="rounded-circle-cust" > -->
               <span class="pro-user-name ml-1">
               <i class="mdi mdi-chevron-down"></i> 
               </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
               <!-- item-->
               <a href="<?php echo base_url();?>AdminController/logout" class="dropdown-item notify-item">
               <i style="width: 22px; height: 17px;margin-right: 4px" data-feather="power"></i>
               <span> Logout</span>
               </a>
            </div>
         </li>
      </ul>
      <!-- LOGO -->
      <div class="logo-box">
         <a href="index.html" class=" logo-dark text-center">
            <span class="logo-sm">
               <img src="<?php echo base_url()?>assets/img/logo png.png" alt="" width="60%">
               <!-- <span class="logo-lg-text-light">UBold</span> -->
            </span>
            <span class="logo-lg">
               <img src="<?php echo base_url()?>assets/img/logo png.png" alt="" width="60%">
               <!-- <span class="logo-lg-text-light">U</span> -->
            </span>
         </a>
         <a href="#" class="logo logo-light text-center">
         <span class="logo-sm">
         <img src="<?php echo base_url()?>assets/img/logo png.png" alt="" width="60%">
         </span>
         <span class="logo-lg">
         <img src="<?php echo base_url()?>assets/img/logo png.png" alt="" width="60%">
         </span>
         </a>
      </div>
      <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
         <li>
            <button class="button-menu-mobile waves-effect waves-light">
               <i class="fa fa-bars"></i>
            </button>
         </li>
         <li>
            <!-- Mobile menu toggle (Horizontal Layout)-->
            <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
               <div class="lines">
                  <span></span>
                  <span></span>
                  <span></span>
               </div>
            </a>
            <!-- End mobile menu toggle-->
         </li>
      </ul>
      <div class="clearfix"></div>
   </div>
</div>
<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu titlebar">
   <div class="h-100" data-simplebar>
      <!-- User box -->
      <div class="user-box text-center">
         <img src="../assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme"
            class="rounded-circle avatar-md">
         <div class="dropdown">
            <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
               data-toggle="dropdown"></a>
            <div class="dropdown-menu user-pro-dropdown">
               <!-- item-->
               <a href="<?php echo base_url();?>MyCon/logout" class="dropdown-item notify-item">
               <i class="fe-log-out mr-1"></i>
               <span>Logout</span>
               </a>
            </div>
         </div>
         <p class="text-muted">Admin Head</p>
      </div>
      <!--- Sidemenu -->
      <div id="sidebar-menu">
         <ul id="side-menus">

            <li><a class="sidebar-link waves-effect waves-dark" href="<?php echo base_url() ?>AdminController/homeView" aria-expanded="false"><i class="fa fa-th font-15 avatar-title"></i><span> Dashboard </span></a></li>

            <li><a class="sidebar-link waves-effect waves-dark" href="<?php echo base_url() ?>AdminController/Users" aria-expanded="false"><i class="fa fa-users font-15 avatar-title"></i><span> Users </span></a></li> 

            <li><a class="sidebar-link waves-effect waves-dark" href="<?php echo base_url() ?>AdminController/Invitation" aria-expanded="false"><i class="fa fa-envelope-open  font-15 avatar-title"></i><span> Invitation List </span></a></li> 

            <li><a class="sidebar-link waves-effect waves-dark" href="<?php echo base_url() ?>AdminController/userInvitation" aria-expanded="false"><i class="fa fa-folder-open  font-15 avatar-title"></i><span> User Invitations </span></a></li> 

            <li><a class="sidebar-link waves-effect waves-dark" href="<?php echo base_url() ?>AdminController/pageInsight" aria-expanded="false"><i class="fa fa-feed  font-15 avatar-title"></i><span> Page Insight </span></a></li> 

            <li><a class="sidebar-link waves-effect waves-dark" href="<?php echo base_url() ?>AdminController/gift" aria-expanded="false"><i class="fa fa-gift  font-15 avatar-title"></i><span> Gift </span></a></li> 


            <!-- <li id="maindept2">
               <a href="#abcd2" data-toggle="collapse">
                  <i class="fa fa-users font-15 avatar-title"></i><span> Customer </span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down" style="float:right;">
                     <polyline points="6 9 12 15 18 9"></polyline>
                  </svg>
               </a>
               <div class="collapse" id="abcd2">
                  <ul class="nav-second-level">
                     <li id="subdept1"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>AdminController/CustomerList" aria-expanded="false">Customer List</a> </li> 
                     <li id="subdept1"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>AdminController/CustomerInvoiceList" aria-expanded="false">Customer Invoice</a> </li> 
                  </ul>
               </div>
            </li> -->

            <!-- <li id="maindept3" ><a class="sidebar-link waves-effect waves-dark sidebar-link active" href="<?php echo base_url() ?>AdminController/OurInfo" aria-expanded="false"><i class="fa fa-industry font-15 avatar-title"></i><span> Our Info </span></a></li>

            <li id="maindept4" ><a class="sidebar-link waves-effect waves-dark sidebar-link active" href="<?php echo base_url() ?>AdminController/OurTax" aria-expanded="false"><i class="fa fa-bars font-15 avatar-title"></i><span> Our Tax </span></a></li>

            <li id="maindept5" ><a class="sidebar-link waves-effect waves-dark sidebar-link active" href="<?php echo base_url() ?>AdminController/Hsnno" aria-expanded="false"><i class="fa fa-cubes font-15 avatar-title"></i><span> HSNNO </span></a></li> -->

            <!-- <li id="maindept6">
               <a href="#abcd3" data-toggle="collapse">
                  <i class="fa fa-money font-15 avatar-title"></i><span> Credit </span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down" style="float:right;">
                     <polyline points="6 9 12 15 18 9"></polyline>
                  </svg>
               </a>
               <div class="collapse" id="abcd3">
                  <ul class="nav-second-level">
                     <li id="subdept1"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>AdminController/CustomerPaymentList" aria-expanded="false">Customer Payment</a> </li> 
                     <li id="subdept1"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>AdminController/CustomerInvoicePaymentList/paid" aria-expanded="false"> Payment List </a></li> 
                  </ul>
               </div>
            </li> -->

         </ul>
      </div>
      <!-- End Sidebar -->
      <div class="clearfix"></div>
   </div>
   <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->           
<div class="modal fade" id="notificationmodel" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-md" role="document">
      <div class="modal-content modal-col-green card">
         <div class="modal-body body" style="background-color:white;">
            <div class="card">
               <form class="form-horizontal" name="Main_Department_Form" id="Main_Department_Form">
                  <div class="card-body">
                     <h4 class="card-title">Notification </h4>
                     <p id="notificationcontentmsg"></p>
                  </div>
                  <div class="border-top">
                     <div class="card-body" style="float:right;">
                        <!-- <button type="button" class="btn btn-primary" id="Main_Department_Button">Submit</button> -->
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>