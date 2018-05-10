
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="<?php echo base_url(); ?>/normal/location"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" style="max-width:100%; height:auto;"></a>
  <!-- Sidebar toggle button--><a class="app-sidebar__toggle mdi mdi-menu mdi-24px" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
  <!-- Navbar Right Menu-->
  <ul class="app-nav">
    <!--Notification Menu-->
    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="mdi mdi-light mdi-bell-ring mdi-24px"></i></a>
      <ul class="app-notification dropdown-menu dropdown-menu-right">
        <li class="app-notification__title">You have 4 new notifications.</li>
        <div class="app-notification__content">
          <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
              <div>
                <p class="app-notification__message">Lisa sent you a mail</p>
                <p class="app-notification__meta">2 min ago</p>
              </div></a></li>
          
         
        </div>
        <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
      </ul>
    </li>
    <!-- User Menu-->
    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="mdi mdi-light mdi-settings mdi-24px  "></i></a>
      <ul class="dropdown-menu settings-menu dropdown-menu-right">
        <li><a class="dropdown-item" href="page-user.html"><i class="mdi mdi-account mdi-18px"></i> Profile</a></li>
        <li><a class="dropdown-item" href="<?php echo base_url(); ?>connection/login"><i class="mdi mdi-logout mdi-18px"></i> Logout</a></li>
      </ul>
    </li>
  </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <ul class="app-menu" id="menu_leftsidebar">
    <li><a class="app-menu__item active" href="<?php echo base_url(); ?>normal/location"><i class="app-menu__icon mdi mdi-map mdi-light mdi-18px"></i><span class="app-menu__label">Location</span></a></li>
   
    <li><a class="app-menu__item" href="<?php echo base_url(); ?>normal/all_room" ><i class="app-menu__icon mdi mdi-home mdi-light mdi-18px"></i><span class="app-menu__label">List Room</span></a></li>

   <!--  <li><a class="app-menu__item" href="<?php echo base_url(); ?>normal/request_validate"><i class="app-menu__icon mdi mdi-swap-vertical mdi-light mdi-18px"></i><span class="app-menu__label">Request</span></a></li> -->

    <li><a class="app-menu__item" href="<?php echo base_url(); ?>normal/select_room_request"><i class="app-menu__icon mdi mdi-library-books mdi-light mdi-18px"></i><span class="app-menu__label">My Booking Room</span></a></li>
    <li><a class="app-menu__item" href="<?php echo base_url(); ?>normal/occupancyRate" ><i class="app-menu__icon mdi mdi-chart-areaspline mdi-light mdi-18px"></i><span class="app-menu__label">Occupancy Rate</span></a></li>
    
  </ul>
</aside>
<main class="app-content" style="background-color: #ffffff;">

