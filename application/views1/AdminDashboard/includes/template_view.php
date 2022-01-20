<style type="text/css">

.wrapper.theme-1-active.pimary-color-green .fixed-sidebar-left .side-nav > li > a.active, .wrapper.theme-2-active.pimary-color-green .fixed-sidebar-left .side-nav > li > a.active, .wrapper.theme-3-active.pimary-color-green .fixed-sidebar-left .side-nav > li > a.active, .wrapper.theme-4-active.pimary-color-green .fixed-sidebar-left .side-nav > li > a.active, .wrapper.theme-5-active.pimary-color-green .fixed-sidebar-left .side-nav > li > a.active, .wrapper.theme-6-active.pimary-color-green .fixed-sidebar-left .side-nav > li > a.active 
{
    color: #fff;
    background: #2ecd99;
}


.fixed-sidebar-left .side-nav li a:hover {
    width: 100%;
    color: #fff;
    background: #2ecd99;

} 





</style>


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
<div class="">
<a href="<?php echo base_url(); ?>AdminDashboard">
<img class="brand-img" style="height:60px;width:60px; position:absolute;" src="<?php echo base_url(); ?>public/images/logo.jpg" alt="brand"/>

</a>
</div>
</div>	
<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-40 " href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>

<span style=" font-size:22px; font-weight:bold;margin-left:20px;">
Advocate General Office Khyber Pakhtunkhwa, Peshawar
</span>

<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
</div>
<div id="mobile_only_nav" class="mobile-only-nav pull-right">
<ul class="nav navbar-right top-nav pull-right">

<li class="dropdown auth-drp">
<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown">Welcome <strong>Rehan Alvi</strong> - Super Admin &nbsp;&nbsp;</span><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div></a>
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
<?php $this->load->view("AdminDashboard/includes/sidebar");?>
</div>
</div>
<?php $this->load->view($page); ?>





