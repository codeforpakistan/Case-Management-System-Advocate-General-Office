<!-- Main Content -->
<div class="page-wrapper">
<div class="container-fluid">



<!-- Title -->
<div class="row heading-bg">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h5 class="txt-dark">Add Case Decision</h5>
</div>

<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
<li><a href="index.html">Dashboard</a></li>
<li><a  class="active"><span>Case</span></a></li>
<li class="active"><span>Add Decision</span></li>
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

<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="row">

<div class="col-md-12">
<div class="form-wrap ">
<form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>AdminDashboard/submit_decision/" class="form-horizontal">
<div class="form-body form-center">										
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">Wp Case No</label>
<div class="col-md-6">
<input type="text" name="title" readonly="readonly" value="<?= $case_info[0]->case_no;?>" class="form-control" placeholder="">
<!-- <span class="help-block"> This is inline help </span>  -->
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
<input type="text" name="title" readonly="readonly" value="<?= $case_info[0]->title;?>" class="form-control" placeholder="">
<!-- <span class="help-block"> This is inline help </span>  -->
</div>
</div>
</div>
<!--/span-->
</div>
<div class="row">
<div class="col-md-12">
<div class="form-group ">
<label class="control-label col-md-3">Case Decision</label>
<div class="col-md-6">
<select class="form-control" name="case_decision">
<?php $i=1;foreach($getDecions as $decision_info) { ?>
<option value="<?= $decision_info->title;?>"><?= $decision_info->title;?></option>
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
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">Decision Date</label>
<div class="col-md-6">
<input type="date" name="decision_date" class="form-control" value="<?php echo date("Y-m-d");?>" placeholder="">
<!-- <span class="help-block"> This is inline help </span>  -->
</div>
</div>
</div>
<!--/span-->
</div>
<div class="row">
<div class="col-md-12">
<div class="form-group ">
<label class="control-label col-md-3">Remarks / Action </label>
<div class="col-md-6">
<input type="text" name="remarks" class="form-control" placeholder="">

</div>
</div>
</div>
<!--/span-->
</div>
<!-- /Row -->
<div class="row">
<div class="col-md-12">
<div class="form-group ">
<label class="control-label col-md-3">Judgment</label>
<div class="col-md-6">
<input type="file" name="docs_file" accept="doc|docx|jpeg|jpg|png|pdf" class="form-control" placeholder="">

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


<input type="hidden" name="case_id" value="<?php echo $this->uri->segment(3);?>">

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