<!-- Main Content -->
<div class="page-wrapper">
<div class="container-fluid">



<!-- Title -->
<div class="row heading-bg">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h5 class="txt-dark">Add Decision Type</h5>
</div>

<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
<li><a href="index.html">Dashboard</a></li>
<li><a href="index.html">Decision</a></li>
<li class="active"><span>Add Decision Type</span></li>
</ol>
</div>
<!-- /Breadcrumb -->
<div class="col-md-3 col-md-offset-9">
<a href="<?php echo base_url().'AdminDashboard/list_Decision_type'; ?>">  <button class="btn btn-success btn-anim  btn-xs" style="float:right;">List Decision Type</button></a>
</div>
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
<form method="post" action="<?php echo base_url(); ?>AdminDashboard/add_decision_types/" class="form-horizontal">
<div class="form-body">										
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">Decision Type Name</label>
<div class="col-md-6">
<input type="text" name="title" class="form-control" placeholder="">
<!-- <span class="help-block"> This is inline help </span>  -->
</div>
</div>
</div>
<!--/span-->
</div>
<div class="row">
<div class="col-md-12">
<div class="form-group ">
<label class="control-label col-md-3">Description</label>
<div class="col-md-6">
<input type="text" name="description" class="form-control" placeholder="">

</div>
</div>
</div>
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