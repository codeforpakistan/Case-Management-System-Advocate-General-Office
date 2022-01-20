<!-- Main Content -->
<div class="page-wrapper">
<div class="container-fluid">

<!-- Title -->
<div class="row heading-bg">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h5 class="txt-dark">Add User</h5>
</div>

<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
<li><a href="index.html">Dashboard</a></li>
<li><a  class="active"><span>Add user</span></a></li>
<!-- <li class="active"><span>form-layout</span></li> -->
</ol>
</div>
<!-- /Breadcrumb -->
<div class="col-md-3 col-md-offset-9">
<a href="<?php echo base_url().'AdminDashboard/list_user'; ?>">  <button class="btn btn-success btn-anim  btn-xs" style="float:right;">List users</button></a>
</div>
</div>
<!-- /Title -->					
<!-- Row -->
<div class="row">

<div class="col-md-12">
<div class="panel panel-default card-view">

<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="row ">

<div class="col-xl-12 container" >
<div class="form-wrap">
<form method="post" action="<?php echo base_url(); ?>AdminDashboard/add_users/" class="form-horizontal">
<div class="form-body form-center">								
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">Name</label>
<div class="col-md-6">
<input type="text" name="name" class="form-control" placeholder="">
<!-- <span class="help-block"> This is inline help </span>  -->
</div>
</div>
</div>
<!--/span-->
</div>
<!-- /Row -->
<div class="row">
<div class="col-md-12">
<div class="form-group ">
<label class="control-label col-md-3">Email</label>
<div class="col-md-6">
<input type="email" name="email" class="form-control" placeholder="">

</div>
</div>
</div>
<!--/span-->
</div>
<!-- /Row -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">Password</label>
<div class="col-md-6">
<input type="password" name="password" class="form-control" placeholder="">
</div>
</div>
</div>
<!--/span-->
</div>
<!-- /Row -->
<div class="row">
<div class="col-md-12">
<div class="form-group ">
<label class="control-label col-md-3">Confirm Password</label>
<div class="col-md-6">
<input type="password" name="confirm_password" class="form-control" placeholder="">

</div>
</div>
</div>
<!--/span-->
</div>
<!-- /Row -->




<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">Role</label>
<div class="col-md-6">
<select class="form-control" name="role_id">
<?php foreach ($list_role as $roleinfo){ ?>
<option value="<?= $roleinfo->id;?>"><?= $roleinfo->name;?></option>
<?php }?>
</select>
<!-- <span class="help-block">Select Role For User</span>  -->
</div>
</div>
</div>
<!--/span-->
</div>
<!-- /Row -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">Status</label>
<div class="col-md-6">
<select class="form-control" name="status">
<option value="">Active</option>
<option value="">In Active</option>
</select>

</div>
</div>
</div>
<!--/span-->
</div>
<!-- /Row -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">Branch</label>
<div class="col-md-6">
<select class="form-control" name="branch_id" data-placeholder="Choose a Branch" tabindex="1">
<?php foreach ($list_branch as $branchinfo){ ?>
<option value="<?= $branchinfo->id;?>"><?= $branchinfo->title;?></option>
<?php }?>
</select>
</div>
</div>
</div>
<!--/span-->

<!--/span-->
</div>


<!-- /Row -->



</div>
<div class="form-actions mt-10">
<div class="row">
<div class="col-md-12">
<div class="row">
<div class="col-md-offset-3 col-md-9">
<button type="submit" class="btn btn-success  mr-10">Submit</button>	
<!-- <button type="reset" class="btn btn-success  mr-10">Reset</button>						 -->
</div>
</div>
</div>
<div class="col-md-6"> </div>
</div>
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