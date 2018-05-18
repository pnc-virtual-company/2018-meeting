
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="<?php echo base_url(); ?>location"><img src="<?php echo base_url(); ?>assets/images/logo_menu.png" alt="" style="max-width:100%; height:auto;"></a>
  <!-- Sidebar toggle button--><a class="app-sidebar__toggle mdi mdi-menu mdi-24px" href="#" data-toggle="sidebar" aria-label="Hide Sidebar" id="hide_menu" style="display: none;"></a>
  <!-- Navbar Right Menu-->
  <ul class="app-nav">
    <!--Notification Menu-->
    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications" style="
    margin-top: 10px;
"><i class="mdi mdi-light mdi-bell-ring mdi-24px"></i></a>
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
    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu" style="
    margin-top: 10px;
"><i class="mdi mdi-light mdi-settings mdi-24px  "></i></a>
      <ul class="dropdown-menu settings-menu dropdown-menu-right">
        <li><a class="dropdown-item" href="page-user.html"><i class="mdi mdi-account mdi-24px"></i> Profile</a></li>
        <li><a class="dropdown-item" href="<?php echo base_url(); ?>connection/logout"><i class="mdi mdi-logout mdi-24px"></i> Logout</a></li>
      </ul>
    </li>
  </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <ul class="app-menu" id="menu_leftsidebar">
    <li><a class="app-menu__item" href="#"><i class="app-menu__icon mdi mdi-book-open-page-variant mdi-24px"></i><span class="app-menu__label">&nbsp;Book Rooms</span></a></li>
    
    <!-- <li><a class="app-menu__item active" href="<?php// echo base_url(); ?>location/"><i class="app-menu__icon mdi mdi-map mdi-light mdi-24px"></i><span class="app-menu__label">Location</span></a></li> -->
   
   <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon mdi mdi-account-multiple mdi-light mdi-24px"></i><span class="app-menu__label">&nbsp;Meeting Rooms</span><i class="treeview-indicator mdi mdi-arrow-right-drop-circle-outline"></i></a>
     <ul class="treeview-menu" style="background-color: #026aab;">
      <?php foreach ($list_location as $row): ?>
          <li><a class="treeview-item" href="<?php echo base_url(); ?>room/list_room?loc_id=<?php echo $row->loc_id; ?>&loc_name=<?php echo $row->loc_name; ?>"><i class="mdi mdi-map-marker"></i>&nbsp;<?php echo $row->loc_name; ?>&nbsp;</a></li>
      <?php endforeach ?>
    </ul>
   </li>
    <li><a class="app-menu__item" href="<?php echo base_url(); ?>booking/"><i class="app-menu__icon mdi mdi-content-paste mdi-light mdi-24px"></i><span class="app-menu__label">My Reservations</span></a></li>
 
    <li><a class="app-menu__item" href="<?php echo base_url(); ?>booking/request_validate"><i class="app-menu__icon mdi mdi-repeat mdi-light mdi-24px"></i><span class="app-menu__label">Request</span></a></li>


   
  </ul>
</aside>
<main class="app-content" style="background-color: #ffffff;">

