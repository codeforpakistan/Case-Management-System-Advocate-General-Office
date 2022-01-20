<!-- Main Content -->
<div class="page-wrapper">
<div class="container-fluid">

<!-- Title -->
<div class="row heading-bg">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h5 class="txt-dark">Profile</h5>
</div>

<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
<li><a href="index.html">Dashboard</a></li>
<li><a  class="active"><span>Profile</span></a></li>
<!-- <li class="active"><span>Add Court</span></li> -->
</ol>
</div>
<!-- /Breadcrumb -->

</div>
<!-- /Title -->					
<!-- Row -->
<div class="row">

<div class="col-md-12">
<div class="panel panel-default card-view">
<!-- <div class="panel-heading">
<div class="pull-left">
<h6 class="panel-title txt-dark">Add User</h6>
</div>
<div class="clearfix"></div>
</div> -->
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="row">

<div class="col-md-12">
<div class="form-wrap">
<form action="#" class="form-horizontal">
<div class="form-body">										
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3">Name :-</label>
<div class="col-md-9">
<p style="line-height:16px;margin-top:10px; font-weight:bold;">
<?php echo $this->session->userdata('name');?>
</p>
</div>
</div>
</div>
<!--/span-->
<div class="col-md-6">
<div class="form-group ">
<label class="control-label col-md-3">Email :-</label>
<div class="col-md-9">
<p style="line-height:16px;margin-top:10px; font-weight:bold;">
<?php echo $this->session->userdata('email');?>
</p>
</div>
</div>
</div>
<!--/span-->
</div>
<!-- /Row -->
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3">Role :-</label>
<div class="col-md-9">
<p style="line-height:16px;margin-top:10px; font-weight:bold;">
Super Admin
</p>
</div>
</div>
</div>
<!--/span-->
<!--<div class="col-md-6">
<div class="form-group ">
<label class="control-label col-md-3">Role :-</label>
<div class="col-md-9">

</div>
</div>
</div>-->
<!--/span-->
</div>
<!-- /Row -->

</div>

</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- /Row -->



</div>



<!-- /Main Content -->