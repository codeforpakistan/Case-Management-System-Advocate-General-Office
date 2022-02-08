<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<style type="text/css">
#casebtns {
padding: 5px 5px;
}
</style>
<div class="page-wrapper clearfix">
<div class="container-fluid pt-25 " style="width:85%; float:right;">

<!-- Title -->
<div class="row heading-bg">
<div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
<h5 class="txt-dark">List Cases</h5>
</div>
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<?php foreach ($branch as $branch_name) { ?>
<h5 class="txt-dark"><?php echo $branch_name->title; ?></h5>
<?php } ?>
</div>
<!-- Breadcrumb -->
<div class="col-lg-4 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
<li><a href="index.html">Dashboard</a></li>
<li><a href="#"><span>Case</span></a></li>
<li class="active"><span>List Cases</span></li>
</ol>
</div>
<!-- /Breadcrumb -->

<div class="col-md-3 col-md-offset-9">
<a href="<?php echo base_url() . 'AdminDashboard/add_case'; ?>"> <button class="btn btn-success btn-anim btn-xs pull-right">Add New </button></a>
</div>
</div>
<!-- /Title -->

<!-- Row -->
<div class="row">

<div class="col-sm-12">
<div class="panel panel-default card-view">
<div class="panel-wrapper collapse in">


<div class="panel-body">



<div class="table-wrap">
<div class="table-responsive">

<input id="myInput" type="text" placeholder="Search.." style="float:right;">

<table id="example111" class="table">
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

<tbody id="myTable">

<?php $i = 1;
foreach ($getCases as $case_info) { ?>
<tr>
<td><?php echo $i; ?></td>
<td><?= $case_info->case_no; ?>-<?= $case_info->year; ?></td>
<td><?= $case_info->case_title; ?> <strong>vs</strong> <?= $case_info->stateorgovt; ?></td>


<td>

<?php
$this->db->select("*");
$this->db->where("case_id", $case_info->case_id);
$Officerquery = $this->db->get('case_department');
$getOfficers = $Officerquery->result();
foreach ($getOfficers as $officerInfo) {
echo $officerInfo->department_name;
echo ", ";
}
?>

</td>
<!--<td><?= $case_info->court_title; ?></td>
<td><?= $case_info->branch_title; ?></td>-->
<td><?= $case_info->category_title; ?></td>

<th width="10%"><?= date("d-m-Y", strtotime($case_info->Filling_date)); ?></th>
<td align="right" width="30%">
<a class="btn btn-primary btn-anim  btn-xs" id="casebtns" href='<?php echo base_url(); ?>AdminDashboard/case_view/<?= $case_info->case_id; ?>'>View Case</a>
<a class="btn btn-primary btn-anim  btn-xs" id="casebtns" href="<?php echo base_url(); ?>AdminDashboard/add_case_documents/<?= $case_info->case_id; ?>">Documents</a>
<a class="btn btn-primary btn-anim  btn-xs" id="casebtns" href="<?php echo base_url(); ?>AdminDashboard/add_hearing/<?= $case_info->case_id; ?>">Hearing</a>

<p style="clear:both; height:5px; font-size:0;">&nbsp;</p>



<?php
if (($case_info->decision_status) == 1) {
?>
<a class="btn btn-primary btn-anim  btn-xs" id="casebtns" href="<?php echo base_url(); ?>AdminDashboard/case_view/<?= $case_info->case_id; ?>/#decisionLink">View Decision</a>
<a class="btn btn-primary btn-anim  btn-xs" id="casebtns" href="<?php echo base_url(); ?>AdminDashboard/edit_case_decision/<?= $case_info->case_id; ?>">Edit Decision</a>
<?php
} else if (($case_info->decision_status) == 0) {
?>
<a class="btn btn-primary btn-anim  btn-xs" id="casebtns" href="<?php echo base_url(); ?>AdminDashboard/add_case_decision/<?= $case_info->case_id; ?>">Add Decision</a>
<?php
}
?>



<a class="btn btn-primary btn-anim  btn-xs" id="casebtns" href='<?php echo base_url(); ?>AdminDashboard/edit_case/<?= $case_info->case_id; ?>'>Edit Case</a>

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



<div class="row">
<div class="col-md-8"><strong style="font-size:14px;">Total Records : <?php echo $getCountRecords;?></strong></div>
<div class="col-md-4">
<div class="pagination_links" style="float:right;"> 
<?php echo $links; ?> 
</div> 
</div>
</div>






</div>
</div>
<!-- /Row -->
</div>





<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>







<?php $this->load->view('AdminDashboard/includes/base_footer') ?>