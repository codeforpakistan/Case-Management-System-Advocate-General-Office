<!-- Main Content -->
<div class="page-wrapper">
<div class="container-fluid">

<!-- Title -->
<div class="row heading-bg">
<div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
<h5 class="txt-dark">Edit Case Hearing</h5>
</div>
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<?php foreach ($branch as $branch_name) { ?>
<h5 class="txt-dark"><?php echo $branch_name->title;?></h5>
<?php }?>
</div>
<!-- Breadcrumb -->

<div class="col-lg-4 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
<li><a href="index.html">Dashboard</a></li>
<li><a  class="active"><span>Case</span></a></li>
<li class="active"><span>Edit Case Hearing</span></li>
</ol>
</div>
<!-- /Breadcrumb -->
<div class="col-md-3 col-md-offset-9">
<a href="<?php echo base_url().'AdminDashboard/add_hearing/'.$this->uri->segment(3); ?>">  <button class="btn btn-success btn-anim  btn-xs" style="float:right;">Add Hearing</button></a>
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
<div class="form-wrap">
<form method="post" enctype="multipart/form-data" action="<?php echo base_url().'AdminDashboard/submit_edit_hearing/'.$this->uri->segment(4);?>" class="form-horizontal">
<div class="form-body">										


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
<div class="form-group">
<label class="control-label col-md-3">Hearing Date</label>
<div class="col-md-6">
<input type="date" class="form-control" value="<?php foreach($gethearing_docs as $hearing_info){echo $hearing_info->hearing_date;} ?>" name="hearing_date">
<!-- <span class="help-block"> This is inline help </span>  -->
</div>
</div>
</div>
<!--/span-->
</div>
<div class="row">
<div class="col-md-12">
<div class="form-group ">
<label class="control-label col-md-3">Next Date</label>
<div class="col-md-6">
<input type="date" class="form-control" value="<?php foreach($gethearing_docs as $hearing_info){echo $hearing_info->next_hearing_date;} ?>" name="next_hearing_date">

</div>
</div>
</div>
<!--/span-->
</div>









<!-- /Row -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">Law Officer</label>
<div class="col-md-6">
<select class="form-control select2 select2-multiple" name="lawOfficers[]" multiple="multiple">


<?php foreach ($Lawofficers as $officer_info) { ?>
<option <?php foreach($hearing_lawofficer as $lawofficer_info){if($lawofficer_info->law_officer_id == $officer_info->id){ echo "selected";}} ?>  value="<?= $officer_info->id;?>"><?= $officer_info->name;?></option>
<?php 
}
?>


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
<label class="control-label col-md-3">Remarks</label>
<div class="col-md-6">
<input type="text" class="form-control" name="remarks" value="<?php foreach($gethearing_docs as $hearing_info){echo $hearing_info->remarks;} ?>" placeholder="">
<!-- <span class="help-block"> This is inline help </span>  -->
</div>
</div>
</div>
<!--/span-->
</div>
<!-- /Row -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">Order Sheet</label>
<div class="col-md-6">
<input type="file" class="form-control" value="<?php foreach($gethearing_docs as $hearing_info){echo $hearing_info->docs_filename;} ?>" placeholder="" accept="doc|docx|jpeg|jpg|png|pdf" name="docs_file">
<!-- <span class="help-block"> This is inline help </span>  -->
</div>
</div>
</div>
<!--/span-->

</div>
<!-- /Row -->
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