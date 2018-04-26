
<!-- Side Navbar -->
<nav class="side-navbar">
  <div class="side-navbar-wrapper">
    <!-- Sidebar Header    -->
    <div class="sidenav-header d-flex align-items-center justify-content-center">
      <!-- User Info-->
      <div class="sidenav-header-inner text-center"><img src="<?php echo base_url(); ?>/assets/images/avatar-1.jpg" alt="person" class="img-fluid rounded-circle">
        <h2 class="h5">Rady Y</h2>
      </div>
      <!-- Small Brand information, appears on minimized sidebar-->
      <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>R</strong><strong class="text-primary">Y</strong></a></div>
    </div>
    <!-- Sidebar Navigation Menus-->
    <div class="main-menu">
      <ul id="side-main-menu" class="side-menu list-unstyled">                  
        <li><a href="<?php echo base_url(); ?>welcome/location"> <i class="mdi mdi-map"></i>Location</a></li>
        <li><a href="<?php echo base_url(); ?>welcome/list_room"> <i class="mdi mdi-home-heart"></i>List Room</a></li>
        <li><a href="<?php echo base_url(); ?>welcome/request_validate"> <i class="mdi mdi-swap-vertical"></i>Request</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="page">
  <!-- navbar-->
  <header class="header">
    <nav class="navbar">
      <div class="container-fluid">
        <div class="navbar-holder d-flex align-items-center justify-content-between">
          <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="mdi mdi-menu"> </i></a><a href="#" class="navbar-brand">
              <div class="brand-text d-none d-md-inline-block"><span>Meeting Room&nbsp;</span><strong class="text-primary">management</strong></div></a>
             <!--  <img id="profile-img" class="profile-img-card" src="<?php echo base_url(); ?>assets/images/logo_meeting.png" /> -->
          </div>
          <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
            <!-- Notifications dropdown-->
            <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="mdi mdi-bell-ring-outline" style="font-size: 16px;"></i><span class="badge badge-warning">12</span></a>
              <ul aria-labelledby="notifications" class="dropdown-menu">
                <li><a rel="nofollow" href="#" class="dropdown-item"> 
                    <div class="notification d-flex justify-content-between">
                      <div class="notification-content"><i class="fa fa-envelope"></i>You have 6 new messages </div>
                      <div class="notification-time"><small>4 minutes ago</small></div>
                    </div></a></li>
                <li><a rel="nofollow" href="#" class="dropdown-item"> 
                    <div class="notification d-flex justify-content-between">
                      <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                      <div class="notification-time"><small>4 minutes ago</small></div>
                    </div></a></li>
                <li><a rel="nofollow" href="#" class="dropdown-item"> 
                    <div class="notification d-flex justify-content-between">
                      <div class="notification-content"><i class="fa fa-upload"></i>Server Rebooted</div>
                      <div class="notification-time"><small>4 minutes ago</small></div>
                    </div></a></li>
                <li><a rel="nofollow" href="#" class="dropdown-item"> 
                    <div class="notification d-flex justify-content-between">
                      <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                      <div class="notification-time"><small>10 minutes ago</small></div>
                    </div></a></li>
                <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-bell"></i>view all notifications</strong></a></li>
              </ul>
            </li>
            <!-- Messages dropdown-->
            <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="mdi mdi-email" style="font-size: 16px;"></i><span class="badge badge-info">10</span></a>
              <ul aria-labelledby="notifications" class="dropdown-menu">
                <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                    <div class="msg-profile"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                    <div class="msg-body">
                      <h3 class="h5">Jason Doe</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                    </div></a></li>
                <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                    <div class="msg-profile"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                    <div class="msg-body">
                      <h3 class="h5">Frank Williams</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                    </div></a></li>
                <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                    <div class="msg-profile"> <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                    <div class="msg-body">
                      <h3 class="h5">Ashley Wood</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                    </div></a></li>
                <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-envelope"></i>Read all messages</strong></a></li>
              </ul>
            </li>
            <!-- Log out-->
            <li class="nav-item"><a href="login.html" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="mdi mdi-logout"></i></a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
