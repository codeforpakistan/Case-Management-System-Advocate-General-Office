<!-- Main Content -->
<div class="page-wrapper">
<div class="container-fluid">

<!-- Title -->
<div class="row heading-bg">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h5 class="txt-dark">Search</h5>
</div>

<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
<li><a href="index.html">Dashboard</a></li>
<li><a  class="active"><span>Search</span></a></li>
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
<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>AdminDashboard/submit_search/">
<div class="form-body">										
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3">Case No</label>
<div class="col-md-9">
    
<select class="form-control select2" name="case_no">
<option value="">---Select---</option>
<?php
foreach ($getCases as $case_info) { ?>
<option value="<?= $case_info->case_id;?>"><?= $case_info->case_no;?> </option>
<?php 
}
?>
</select>   
    
</div>
</div>
</div>
<!--/span-->
<div class="col-md-6">
<div class="form-group ">
<label class="control-label col-md-3">Title</label>
<div class="col-md-9">
<select class="form-control select2" name="title">
<option value="">---Select---</option>
<?php
foreach ($getCases as $case_info) { ?>
<option value="<?= $case_info->case_id;?>"><?= $case_info->case_title;?> VS <?= $case_info->stateorgovt;?> </option>
<?php 
}
?>
</select>
    
</div>
</div>
</div>
<!--/span-->
</div>










<div class="row">


<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3">Case Category</label>
<div class="col-md-9">
<select class="form-control" name="case_cateid">
<option value="">---Select---</option>
<?php foreach ($getCategories as $category) {?>
    
<option value="<?= $category->id;?>"><?= $category->title;?></option>
<?php 
}
?>
</select>
</div>
</div>
</div>


<!--/span-->
<div class="col-md-6">
<div class="form-group ">
<label class="control-label col-md-3">Case Branch</label>
<div class="col-md-9">
<select class="form-control" name="branch_id">
<option value="">---Select---</option>
<?php foreach ($getbranches as $branch) {?>   
<option value="<?= $branch->id;?>"><?= $branch->title;?></option>
<?php 
}
?>
</select>
</div>
</div>
</div>
<!--/span-->
</div>
<!-- /Row -->

<!-- Row -->
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3">Department</label>
<div class="col-md-9">
<select class="form-control" name="department_id">
<option value="">---Select---</option>
<?php foreach ($getdepartments as $dept) {?>   
<option value="<?= $dept->id;?>"><?= $dept->title;?></option>
<?php 
}
?>
</select>
</div>
</div>
</div>
<!--/span-->
<div class="col-md-6">
<div class="form-group ">
<label class="control-label col-md-3">Law Officer</label>
<div class="col-md-9">

<select class="form-control" name="law_officer_id">
<option value="">---Select---</option>
<?php foreach ($getusers as $user) {?>   
<option value="<?= $user->id;?>"><?= $user->name;?></option>
<?php 
}
?>
</select>
</div>
</div>
</div>
<!--/span-->
</div>


<div class="row">

<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3">Court Name</label>
<div class="col-md-9">
<select class="form-control" name="court_id">
<option value="">---Select---</option>
<?php foreach ($getcourts as $court) {?>   
<option value="<?= $court->id;?>"><?= $court->title;?></option>
<?php 
}
?>
</select>
</div>
</div>
</div>


<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3">Year</label>
<div class="col-md-9">
<select class="form-control" name="year">
<option value="">---Select---</option>
<?php
$year = date("Y");
for($i=$year;$i>=1995;$i--)
{
?>
<option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php 
}
?>
</select>
</div>
</div>
</div>








</div>





<!-- /Row -->
<!-- Row -->
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3">From Date</label>
<div class="col-md-9">
    <input type="date" class="form-control" placeholder="">
    <!-- <span class="help-block"> This is inline help </span>  -->
</div>
</div>
</div>


<!-- Row -->

<!-- /Row -->





<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3">To Date</label>
<div class="col-md-9">
    <input type="date" class="form-control" placeholder="">
    <!-- <span class="help-block"> This is inline help </span>  -->
</div>
</div>
</div>







</div>
<!-- /Row -->

</div>
<div class="form-actions mt-10">
<div class="row">
<div class="col-md-6">
<div class="row">
<div class="col-md-offset-3 col-md-9">
    <button type="submit" class="btn btn-success  mr-10">Search</button>								
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