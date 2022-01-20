<!-- Main Content -->
<div class="page-wrapper">
<div class="container-fluid">

<br />

<?php 
$error = $this->session->flashdata('error');
$success = $this->session->flashdata('success');
if(isset($success))
{
?>
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Success . </strong> <?php echo $success;?>
</div>
<?php
}
else if(isset($error))
{
?>
<div class="alert alert-danger alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error . </strong> <?php echo $error;?>
</div>
<?php	
}
?>


<div class="row heading-bg">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h5 class="txt-dark">List Branches</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
<li><a href="index.html">Dashboard</a></li>
<li><a href="#"><span>Branch</span></a></li>
<li class="active"><span>List Branches</span></li>
</ol>
</div>
<!-- /Breadcrumb -->
<div class="col-md-3 col-md-offset-9">
<a href="<?php echo base_url().'AdminDashboard/add_branch'; ?>">  <button class="btn btn-success btn-anim  btn-xs" style="float:right;">Add New</button></a>
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
<th>#</th>
<th>Name</th>
<th>Description</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php $counter = 1; foreach ($list_branch as $branchinfo){ ?>
<tr>
<td><?= $counter;?></td>
<td><?= $branchinfo->title;?></td>
<td><?= $branchinfo->description;?></td>
<td class="text-navy">
<a href='#'>
<i class="fa fa-edit"></i>
</a>
<a onclick="return confirm('Sure to Delete...?')" href="<?php echo base_url(); ?>AdminDashboard/deletebranches/<?= $branchinfo->id;?>">
<i class="fa fa-trash" style="color:red;"></i></a>
</td>

</tr>
<?php $counter++;}?>



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



