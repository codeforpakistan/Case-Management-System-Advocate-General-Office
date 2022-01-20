<!-- Main Content -->
<div class="page-wrapper">
<div class="container-fluid">

<!-- Title -->
<div class="row heading-bg">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h5 class="txt-dark">Cases Hearings</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
<li><a href="index.html">Dashboard</a></li>
<li><a href="#"><span>Case</span></a></li>
<li class="active"><span>Case Hearings </span></li>
</ol>
</div>
<!-- /Breadcrumb -->
<div class="col-md-12 ">
<a href="<?php echo base_url().'AdminDashboard/list_case'; ?>">  <button class="btn btn-success btn-anim btn-xs pull-left">list case</button></a> 
<a href="<?php echo base_url().'AdminDashboard/add_hearing'; ?>">  <button class="btn btn-success btn-anim btn-xs pull-right">Add New</button></a>
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
<table id="example" class="table table-hover display  pb-30" >
<thead>
<tr>
<th>S.No</th>
<th>Title</th>
<th>Hearing Date</th>
<th>Next Date</th>
<th>Law Officers</th>
<th>Remarks</th>
<th>Order Sheet</th>
<th>Action</th>


</tr>
</thead>
<tfoot>
<tr>
<th>S.No</th>
<th>Title</th>
<th>Hearing Date</th>
<th>Next Date</th>
<th>Law Officers</th>
<th>Remarks</th>
<th>Order Sheet</th>
<th>Action</th>

</tr>
</tfoot>
<tbody>
<?php for($i=1;$i<=15;$i++){ ?>

<tr>
<td><?php echo $i ?></td>
<td>ABC vs Home Department</td>
<td>16/12/2021</td>
<td>23/12/2021</td>
<td>Adv Shah Muhammad Khan</td>
<td>Decision will be announced on next date</td>
<th><a href="#">ordersheet.pdf</a></th>
<td  class="">
<a  class="btn btn-success btn-anim  btn-xs" href='#'>Edit</a>
</td>

</tr>
<?php } ?>




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




