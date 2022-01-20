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
<form method="post" action="<?php echo base_url(); ?>AdminDashboard/search_case/" class="form-horizontal">
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
<select class="form-control" name="case_category_id">
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
    <input type="date" class="form-control" placeholder="" name="start_date">
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
    <input type="date" class="form-control" placeholder="" name="end_date">
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


<!-- Row -->
<div class="row">

<div class="col-sm-12">
<div class="panel panel-default card-view">
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="table-wrap">
<div class="table-responsive">
<table id="example" class="table table-hover display  pb-30" >
<thead>
<tr>
<th>S.No</th>
<th>Case No</th>
<th>Title</th>
<th>Department</th>
<!--<th>Court</th>
<th>Branch</th>-->
<th>Case Category</th>
<th>Case Date</th>
<th align="right" style="text-align:center;">Action</th>


</tr>
</thead>

<tbody>

<?php $i=1;foreach ($getSearchCases as $search_case_info) { ?>
<tr>
<td><?php echo $i;?></td>
<td><?= $search_case_info->case_no;?>-<?= $search_case_info->year;?></td>
<td><?= $search_case_info->case_title;?> <strong>vs</strong> <?= $search_case_info->stateorgovt;?></td>


<td>

<?php
$this->db->select("*");
$this->db->where("case_id",$search_case_info->case_id);
$Officerquery = $this->db->get('case_department');
$getOfficers= $Officerquery->result();
foreach ($getOfficers as $officerInfo) 
{
 echo $officerInfo->department_name;
 echo ", ";
}
?>

</td>
<!--<td><?= $search_case_info->court_title;?></td>
<td><?= $search_case_info->branch_title;?></td>-->
<td><?= $search_case_info->category_title;?></td>

<th width="10%"><?= date("d-m-Y",strtotime($search_case_info->Filling_date));?></th>
<td align="right" width="30%">
<a  class="btn btn-primary btn-anim  btn-xs" id="casebtns" href='<?php echo base_url(); ?>AdminDashboard/case_view/<?= $search_case_info->case_id;?>'>View Case</a>
<a class="btn btn-primary btn-anim  btn-xs" id="casebtns" href="<?php echo base_url(); ?>AdminDashboard/add_case_documents/<?= $search_case_info->case_id;?>">Documents</a>
<a class="btn btn-primary btn-anim  btn-xs" id="casebtns" href="<?php echo base_url(); ?>AdminDashboard/add_hearing/<?= $search_case_info->case_id;?>">Hearing</a>

<p style="clear:both; height:5px; font-size:0;">&nbsp;</p>



<?php
if(($search_case_info->decision_status) == 1)
{
?>
<a class="btn btn-primary btn-anim  btn-xs" id="casebtns" href="<?php echo base_url(); ?>AdminDashboard/case_view/<?= $search_case_info->case_id;?>/#decisionLink">View Decision</a>
<a class="btn btn-primary btn-anim  btn-xs" id="casebtns" href="<?php echo base_url(); ?>AdminDashboard/edit_case_decision/<?= $search_case_info->case_id;?>">Edit Decision</a>
<?php
}
else if(($search_case_info->decision_status) == 0)
{
?>
<a class="btn btn-primary btn-anim  btn-xs" id="casebtns" href="<?php echo base_url(); ?>AdminDashboard/add_case_decision/<?= $search_case_info->case_id;?>">Add Decision</a>
<?php
}
?>



<a class="btn btn-primary btn-anim  btn-xs" id="casebtns" href='<?php echo base_url(); ?>AdminDashboard/edit_case/<?= $search_case_info->case_id;?>'>Edit Case</a>

<!--<a class="btn btn-primary btn-anim  btn-xs" id="casebtns" href='<?php echo base_url(); ?>AdminDashboard/list_case_documents'>View Documents</a>
<a class="btn btn-primary btn-anim  btn-xs" id="casebtns" href='<?php echo base_url(); ?>AdminDashboard/list_hearing'>View Hearing</a>-->


</td>

</tr>
<?php 
$i++;
}
?>




</tbody>
</table>
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