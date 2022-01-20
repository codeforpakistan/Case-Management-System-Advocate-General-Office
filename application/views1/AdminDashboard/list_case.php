<style type="text/css">
#casebtns {padding:3px 10px;}
</style>
<div class="page-wrapper">
<div class="container-fluid">

<!-- Title -->
<div class="row heading-bg">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h5 class="txt-dark">List Cases</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
<li><a href="index.html">Dashboard</a></li>
<li><a href="#"><span>Case</span></a></li>
<li class="active"><span>List Cases</span></li>
</ol>
</div>
<!-- /Breadcrumb -->

<div class="col-md-3 col-md-offset-9">
<a href="<?php echo base_url().'AdminDashboard/add_case'; ?>">  <button class="btn btn-success btn-anim btn-xs pull-right">Add New </button></a>
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
<table id="example" class="table table-hover display  pb-30" >
<thead>
<tr>
<th>S.No</th>
<th>Title</th>
<th>Case No</th>
<th>Department</th>
<th>Court</th>
<th>Branch</th>
<th>Case Date</th>
<th align="right" style="text-align:center;">Action</th>


</tr>
</thead>

<tbody>

<?php $i=1;foreach ($getCases as $case_info) { ?>
<tr>
<td><?php echo $i;?></td>
<td><?= $case_info->case_title;?> <strong>vs</strong> <?= $case_info->stateorgovt;?></td>
<td><?= $case_info->case_no;?></td>

<td>

<?php
$this->db->select("*");
$this->db->where("case_id",$case_info->case_id);
$Officerquery = $this->db->get('case_department');
$getOfficers= $Officerquery->result();
foreach ($getOfficers as $officerInfo) 
{
 echo $officerInfo->department_name;
 echo ", ";
}
?>

</td>
<td><?= $case_info->court_title;?></td>
<td><?= $case_info->branch_title;?></td>

<th><?= date("d-m-Y",strtotime($case_info->Filling_date));?></th>
<td align="right" width="30%">
<a class="btn btn-primary btn-anim  btn-xs" id="casebtns" href="<?php echo base_url(); ?>AdminDashboard/add_case_documents/<?= $case_info->case_id;?>"> Add Documents</a>
<a class="btn btn-primary btn-anim  btn-xs" id="casebtns" href="<?php echo base_url(); ?>AdminDashboard/add_hearing/<?= $case_info->case_id;?>">Add Hearing</a>

<p style="clear:both; height:5px; font-size:0;">&nbsp;</p>



<?php
if(($case_info->decision_status) == 1)
{
?>
<a class="btn btn-primary btn-anim  btn-xs" id="casebtns" href="<?php echo base_url(); ?>AdminDashboard/case_view/<?= $case_info->case_id;?>/#decisionLink">View Decision</a>
<?php
}
else if(($case_info->decision_status) == 0)
{
?>
<a class="btn btn-primary btn-anim  btn-xs" id="casebtns" href="<?php echo base_url(); ?>AdminDashboard/add_case_decision/<?= $case_info->case_id;?>">Add Decision</a>
<?php
}
?>



<a class="btn btn-primary btn-anim  btn-xs" id="casebtns" href='#'>Edit Case</a>

<!--<a class="btn btn-primary btn-anim  btn-xs" id="casebtns" href='<?php echo base_url(); ?>AdminDashboard/list_case_documents'>View Documents</a>
<a class="btn btn-primary btn-anim  btn-xs" id="casebtns" href='<?php echo base_url(); ?>AdminDashboard/list_hearing'>View Hearing</a>-->

<a  class="btn btn-primary btn-anim  btn-xs" id="casebtns" href='<?php echo base_url(); ?>AdminDashboard/case_view/<?= $case_info->case_id;?>'>View Case</a>
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




