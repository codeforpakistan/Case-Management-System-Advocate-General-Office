<!-- Main Content -->
<div class="page-wrapper">
<div class="container-fluid">

<!-- Title -->
<div class="row heading-bg">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h5 class="txt-dark">Add Case</h5>
</div>

<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
<li><a href="index.html">Dashboard</a></li>
<li><a  class="active"><span>Case</span></a></li>
<li class="active"><span>Add Case</span></li>
</ol>
</div>
<!-- /Breadcrumb -->
<div class="col-md-3 col-md-offset-9">
<a href="<?php echo base_url().'AdminDashboard/list_case'; ?>">  <button class="btn btn-success btn-anim  btn-xs" style="float:right;">List Case</button></a>
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
<form action="<?php echo base_url(); ?>AdminDashboard/add_cases/" method="post" class="form-horizontal">
<div class="form-body">


<div class="row">
<div class="col-md-12">
<div class="form-group ">
<label class="control-label col-md-3">Select Branch</label>
<div class="col-md-6">
<select required class="form-control" name="branch_id">
<option value="">--Select--</option>
<?php foreach ($getbranches as $branch_info) { ?>
<option value="<?= $branch_info->id; ?>"><?= $branch_info->title; ?></option>
<?php }?>

</select>
<!-- <span class="help-block">Select Role For User</span>  -->
</div>
</div>
</div>
<!--/span-->
</div>




<div class="row">
<div class="col-md-12">
<div class="form-group ">
<label class="control-label col-md-3">Case Category</label>
<div class="col-md-6">

<select required class="form-control" onchange="change_label(this);" name="case_cateid" id="case_cateid">
<option value="">--Select--</option>
<?php foreach ($getCategories as $cate_info) { ?>
<option value="<?= $cate_info->id; ?>"><?= $cate_info->title; ?></option>
<?php }?>

</select>
<!-- <span class="help-block">Select Role For User</span>  -->
</div>
</div>
</div>
<!--/span-->
</div>









<div class="row">
<div class="col-md-12">
<div class="form-group ">
<label id="case_no" class="control-label col-md-3">Case no</label>
<div class="col-md-6">
<input type="text" class="form-control" name="case_no" placeholder="">

</div>
</div>
</div>
<!--/span-->
</div>


										
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">Title</label>
<div class="col-md-6">
<input type="text" class="form-control" name="title" placeholder="">
<!-- <span class="help-block"> This is inline help </span>  -->
</div>
</div>
</div>
<!--/span-->
</div>


<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"></label>
<div class="col-md-6">
<!--<input type="text" class="form-control" name="states" placeholder="">-->
VS

</div>
</div>
</div>
<!--/span-->
</div>



<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">State / Govt</label>
<div class="col-md-6">
<!--<input type="text" class="form-control" name="states" placeholder="">-->

<input type="radio" name="stateorgovt" value="Government">&nbsp;&nbsp;&nbsp;Government &nbsp;&nbsp;&nbsp;
<input type="radio" name="stateorgovt" value="State">&nbsp;&nbsp;&nbsp;State

</div>
</div>
</div>
<!--/span-->
</div>

<!-- /Row -->

<!-- /Row -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">Advocate For Petitioner</label>
<div class="col-md-6">
<input type="text" class="form-control" name="petitioner_advocate" placeholder="">
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
<label class="control-label col-md-3">Respondent(s)</label>
<div class="col-md-6">
<input type="text" class="form-control" name="respondent" placeholder="">

</div>
</div>
</div>
<!--/span-->
</div>


<div class="row">
<div class="col-md-12">
<div class="form-group ">
<label class="control-label col-md-3">Advocate for Respondent(s)</label>
<div class="col-md-6">
<input type="text" class="form-control" name="advocate_respondent" placeholder="">

</div>
</div>
</div>
<!--/span-->
</div>






<!-- /Row -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">Department</label>
<div class="col-md-6">

<!--<select class="form-control multi-select" name="department_id">-->

<select class="form-control select2 select2-multiple"  name="department_id[]"  multiple="multiple">

<?php foreach ($getdepartments as $department_info) { ?>
<option value="<?= $department_info->id; ?>"><?= $department_info->title;?></option>
<?php }?>
</select>
<!-- <span class="help-block">Select Role For User</span>  -->
</div>
</div>
</div>
<!--/span-->
</div>


<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">Focal Person</label>
<div class="col-md-6">
<input type="text" class="form-control" name="focalperson" placeholder="">
<!-- <span class="help-block"> This is inline help </span>  -->
</div>
</div>
</div>
<!--/span-->
</div>



<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">Court</label>
<div class="col-md-6">
<select class="form-control" name="court_id">
<?php foreach ($getcourts as $court_info) { ?>
<option value="<?= $court_info->id; ?>"><?= $court_info->title; ?></option>
<?php }?>

</select>
<!-- <span class="help-block">Select Role For User</span>  -->
</div>
</div>
</div>
<!--/span-->
</div>



















<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">Case Filing Date</label>
<div class="col-md-6">
<input type="date" class="form-control" name="Filling_date" value="<?php echo date("Y-m-d");?>" placeholder="">
<!-- <span class="help-block"> This is inline help </span>  -->
</div>
</div>
</div>
<!--/span-->
<div class="col-md-12">
<div class="form-group ">
<label class="control-label col-md-3">Year</label>
<div class="col-md-6">
<select class="form-control" name="year">
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







<div class="col-md-12">
<div class="form-group ">
<label class="control-label col-md-3">Government is Petitioner</label>
<div class="col-md-6">
<input type="checkbox" name="government_petitioner" value="Yes">

</div>
</div>
</div>




<div id="link_case" class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">Previous case</label>
<div class="col-md-6">
<select class="form-control select2" name="linked_case_id">
<option>Select</option>
<?php
foreach ($getCases as $case_info) { ?>
<option value="<?= $case_info->case_id;?>"><?= $case_info->case_title;?> VS <?= $case_info->stateorgovt;?> - WP(<?= $case_info->case_no;?>) - <?= $case_info->court_title;?> - <?= $case_info->branch_title;?> </option>
<?php 
}
?>
</select>	
</div>
</div>
</div>



<!--/span-->
</div>									


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
<script>
function change_label(sel)
{
	if(sel.value != ""){
	var category_name = sel.options[sel.selectedIndex].text;
	document.getElementById("case_no").innerHTML=category_name+" no";
	}
	else
	{
		document.getElementById("case_no").innerHTML="case no";
	}
	if(sel.value == 1)
	{
		document.getElementById("link_case").style.display = 'none';
	}
	else
	{
		document.getElementById("link_case").style.display = 'block';
	}
	
}

</script>
