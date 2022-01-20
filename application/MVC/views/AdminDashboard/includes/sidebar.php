<?php
if($this->session->userdata('role')==1*1)
{
?>
<ul class="nav navbar-nav side-nav  nicescroll-bar">
<li class="navigation-header">
<span>Main</span> 
<i class="zmdi zmdi-more"></i>
</li>


<li>
<a class="active" href="<?php echo base_url(); ?>AdminDashboard"><div class="pull-left"><i class="zmdi zmdi-flag mr-20"></i><span class="right-nav-text">Home</span></div><div class="clearfix"></div></a>
</li>


<li>
<a href="<?php echo base_url(); ?>AdminDashboard/search"><div class="pull-left"><i class="zmdi zmdi-search data-right-rep-icon mr-20"></i><span class="right-nav-text">Search</span></div><div class="clearfix"></div></a>

</li>

<li>
<a href="javascript:void(0);" data-toggle="collapse" data-target="#user"><div class="pull-left"><i class="zmdi zmdi-accounts-alt mr-20"></i><span class="right-nav-text">Users</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
<ul id="user" class="collapse collapse-level-1">
<li>
<a class="active-page" href="<?php echo base_url(); ?>AdminDashboard/add_user ">Add User</a>
</li>
<li>
<a class="active-page" href="<?php echo base_url(); ?>AdminDashboard/list_user ">List User</a>
</li>

</ul>
</li>
<li>
<a  href="javascript:void(0);" data-toggle="collapse" data-target="#branches"><div class="pull-left"><i class="zmdi zmdi-city-alt mr-20"></i><span class="right-nav-text">Branch</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
<ul id="branches" class="collapse collapse-level-1">
<li>
<a class="active-page" href="<?php echo base_url(); ?>AdminDashboard/add_branch ">Add Branch</a>
</li>
<li>
<a class="active-page" href="<?php echo base_url(); ?>AdminDashboard/list_branch">List Branch</a>
</li>

</ul>
</li>

<li>
<a href="javascript:void(0);" data-toggle="collapse" data-target="#departments"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Department</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
<ul id="departments" class="collapse collapse-level-1">

<li>
<a class="active-page" href="<?php echo base_url(); ?>AdminDashboard/add_department ">Add Department</a>
</li>
<li>
<a class="active-page" href="<?php echo base_url(); ?>AdminDashboard/list_department ">List Department</a>
</li>

</ul>
</li>

<li>
<a href="javascript:void(0);" data-toggle="collapse" data-target="#courts"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Courts</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
<ul id="courts" class="collapse collapse-level-1">
<li>
<a class="active-page" href="<?php echo base_url(); ?>AdminDashboard/add_court">Add Court</a>
</li>
<li>
<a class="active-page" href="<?php echo base_url(); ?>AdminDashboard/list_court">List Court</a>
</li>

</ul>
</li>

<li>
<a href="javascript:void(0);" data-toggle="collapse" data-target="#decision"><div class="pull-left"><i class="icon-layers data-right-rep-icon mr-20"></i><span class="right-nav-text">Decision Type</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
<ul id="decision" class="collapse collapse-level-1">
<li>
<a class="active-page" href="<?php echo base_url(); ?>AdminDashboard/add_decision_type">Add Decision Type</a>
</li>
<li>
<a class="active-page" href="<?php echo base_url(); ?>AdminDashboard/list_decision_type">List Decision Type</a>
</li>


</ul>
</li>

<li>
<a href="javascript:void(0);" data-toggle="collapse" data-target="#case_category"><div class="pull-left"><i class="icon-layers data-right-rep-icon mr-20"></i><span class="right-nav-text">Case Category</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
<ul id="case_category" class="collapse collapse-level-1">
<li>
<a class="active-page" href="<?php echo base_url(); ?>AdminDashboard/add_case_category">Add case Category</a>
</li>
<li>
<a class="active-page" href="<?php echo base_url(); ?>AdminDashboard/list_case_categories">List case Category</a>
</li>


</ul>
</li>

<li>
<a href="javascript:void(0);" data-toggle="collapse" data-target="#cases"><div class="pull-left"><i class="icon-layers data-right-rep-icon mr-20"></i><span class="right-nav-text">Cases</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
<ul id="cases" class="collapse collapse-level-1">
<li>
<a class="active-page" href="<?php echo base_url(); ?>AdminDashboard/add_case">Add Case</a>
</li>
<li>
<a class="active-page" href="<?php echo base_url(); ?>AdminDashboard/list_case">List Case</a>
</li>

<!--<li>
<a class="active-page" href="<?php echo base_url(); ?>AdminDashboard/add_hearing">Add Hearing</a>
</li>

<li>
<a class="active-page" href="<?php echo base_url(); ?>AdminDashboard/case_view">Case view</a>
</li>

<li>
<a class="active-page" href="<?php echo base_url(); ?>AdminDashboard/link_case">Link Case</a>
</li>
-->



</ul>
</li>

</ul>

<?php
}
?>

<!-- ////////////////////////Side Bar for IT staff    -->


<?php
if($this->session->userdata('role')==1*3)
{
?>
<ul class="nav navbar-nav side-nav  nicescroll-bar">
<li class="navigation-header">
<span>Main</span> 
<i class="zmdi zmdi-more"></i>
</li>


<li>
<a class="active" href="<?php echo base_url(); ?>AdminDashboard"><div class="pull-left"><i class="zmdi zmdi-flag mr-20"></i><span class="right-nav-text">Home</span></div><div class="clearfix"></div></a>
</li>


<li>
<a href="<?php echo base_url(); ?>AdminDashboard/search"><div class="pull-left"><i class="zmdi zmdi-search data-right-rep-icon mr-20"></i><span class="right-nav-text">Search</span></div><div class="clearfix"></div></a>

</li>

<li>
<a href="javascript:void(0);" data-toggle="collapse" data-target="#cases"><div class="pull-left"><i class="icon-layers data-right-rep-icon mr-20"></i><span class="right-nav-text">Cases</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
<ul id="cases" class="collapse collapse-level-1">
<li>
<a class="active-page" href="<?php echo base_url(); ?>AdminDashboard/add_case">Add Case</a>
</li>
<li>
<a class="active-page" href="<?php echo base_url(); ?>AdminDashboard/list_case">List Case</a>
</li>

<!--<li>
<a class="active-page" href="<?php echo base_url(); ?>AdminDashboard/add_hearing">Add Hearing</a>
</li>

<li>
<a class="active-page" href="<?php echo base_url(); ?>AdminDashboard/case_view">Case view</a>
</li>

<li>
<a class="active-page" href="<?php echo base_url(); ?>AdminDashboard/link_case">Link Case</a>
</li>
-->



</ul>
</li>

</ul>

<?php
}
?>

<!-- ////////////////////////Side Bar for IT staff    -->