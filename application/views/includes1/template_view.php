<body>
<!-- Preloader -->
<div class="preloader-it">
<div class="la-anim-1"></div>
</div>
<!-- /Preloader -->
<div class="wrapper theme-1-active pimary-color-green">
<!-- Top Menu Items -->
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="mobile-only-brand pull-left">
<div class="nav-header pull-left">
<div class="logo-wrap">
<a href="index.html">
<img class="brand-img" style="height:40px;width:40px;" src="<?php echo base_url(); ?>public/images/logo.jpg" alt="brand"/>
<span class="brand-text"Advocate General></span>
</a>
</div>
</div>	
<!-- <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a> -->

<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
</div>
<div id="mobile_only_nav" class="mobile-only-nav pull-right">
<ul class="nav navbar-right top-nav pull-right">

<li class="dropdown auth-drp">
<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown">Admin</span><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div></a>
<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
<li>
<a href="<?php echo base_url()?>AdminDashboard/profile"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
</li>
</li>
<li class="divider"></li>
<li>
<a href="<?php echo base_url()?>AuthController/logout"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
</li>
</ul>
</li>
</ul>
</div>
</nav>


<div class="fixed-sidebar-left">
<?php $this->load->view("includes/sidebar");?>
</div>



</div>
</div>
<?php $this->load->view($page); ?>


