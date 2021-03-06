<style type="text/css">
	.select2-container--default.select2-container--focus .select2-selection--multiple {
		border: solid black 1px;
		outline: 0;
		height: auto;
	}

	.select2-container--default .select2-selection--multiple {
		background-color: #ffffff;
		border: 1px solid rgba(0, 0, 0, 0.1);
		-webkit-border-radius: 2px;
		border-radius: 2px;
		cursor: text;
		max-height: auto !important;
	}

	.select2-selection--multiple {
		overflow: hidden !important;
		height: auto !important;
	}
</style>



<!-- Main Content -->
<div class="page-wrapper clearfix">
	<div class="container-fluid pt-25 " style="width:85%; float:right;">


		<br />


		<?php

		if (isset($success)) {
		?>
			<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success . </strong> <?php echo $success; ?>
			</div>
		<?php
		} else if (isset($error)) {
		?>
			<div class="alert alert-danger alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Error . </strong> <?php echo $error; ?>
			</div>
		<?php
		}
		?>



		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Add Case</h5>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<?php foreach ($branch as $branch_name) { ?>
					<h5 class="txt-dark"><?php echo $branch_name->title; ?></h5>
				<?php } ?>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-4 col-sm- col-md-8 col-xs-12 ">
				<ol class="breadcrumb">
					<li><a href="index.html">Dashboard</a></li>
					<li><a class="active"><span>Case</span></a></li>
					<li class="active"><span>Add Case</span></li>
				</ol>
			</div>
			<!-- /Breadcrumb -->

			<div class="col-md-3 col-md-offset-9">
				<a href="<?php echo base_url() . 'AdminDashboard/list_case'; ?>"> <button class="btn btn-success btn-anim  btn-xs" style="float:right;">List Case</button></a>
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

												<?php if ($this->session->userdata('role') == 1 * 1) {
												?>
													<div class="row">
														<div class="col-md-12">
															<div class="form-group ">
																<label class="control-label col-md-3">Select Branch</label>
																<div class="col-md-6">
																	<select required class="branch_id form-control" name="branch_id" onChange="get_categories();" id="branch_id">
																		<option value="">--Select--</option>
																		<?php foreach ($getbranches as $branch_info) { ?>
																			<option value="<?= $branch_info->id; ?>"><?= $branch_info->title; ?></option>
																		<?php } ?>

																	</select>

																	<!-- <span class="help-block">Select Role For User</span>  -->
																</div>
															</div>
														</div>


														<!--/span-->
													</div>
													<?php
												} else {
													if ($this->session->userdata('role') != 1 * 1) {
													?>
														<input id="branch_id1" class="branch_id" type="hidden" name="branch_id" value="<?php echo $this->session->userdata('branch_id'); ?>">
													<?php } ?>
													<script>
														window.onload = function select_cat1() {

															var branch_id = "<?= $this->session->userdata('branch_id') ?>";
															show_fields(branch_id);
															if (branch_id != '') {
																$.ajax({
																	url: "<?php echo base_url(); ?>AdminDashboard/fetch_caseCategories",
																	method: "POST",
																	beforeSend: function() {
																		$("#userstatus").html('<img src="<?php echo base_url(); ?>/assets/images/loading.gif">');
																	},
																	data: {
																		branch_id: branch_id
																	},
																	success: function(data) {
																		////$("#userstatus").fadeOut(); 
																		$('#case_cateid').html(data);
																	}
																});
															} else {
																$("#userstatus").text('Please Select.');
															}

														}
													</script>

												<?php
												}
												?>

												<div class="row">
													<div class="col-md-12">
														<div class="form-group ">
															<label class="control-label col-md-3">Case Category</label>
															<div class="col-md-6">

																<select required class="form-control" onchange="change_label(this);" name="case_cateid" id="case_cateid">
																	<option value="">--Select--</option>

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
															<label id="case_no" class="control-label col-md-3">Case no</label>
															<div class="col-md-3">
																<input type="text" class="form-control" name="case_no" placeholder="">
															</div>

															<label id="case_no" class="control-label col-md-1">Year</label>
															<div class="col-md-2">
																<select class="form-control" name="year">
																	<?php
																	$year = date("Y");
																	for ($i = $year; $i >= 1995; $i--) {
																	?>
																		<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
																	<?php
																	}
																	?>
																</select>
															</div>
														</div>
													</div>

												</div>


												<div class="row">

													<div id="main_wp_case_no" class="col-md-12" style="display:none;">
														<div class="form-group">
															<label id="linked_case_label" class="control-label col-md-3">WP Case no</label>
															<div class="col-md-3">
																<input type="text" class="form-control" name="mainWp_case_no" placeholder="">
															</div>

															<label class="control-label col-md-1">Year</label>
															<div class="col-md-2">
																<select class="form-control" name="main_case_year">
																	<?php
																	$year = date("Y");
																	for ($i = $year; $i >= 1995; $i--) {
																	?>
																		<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
																	<?php
																	}
																	?>
																</select>
															</div>
														</div>
													</div>
												</div>


												<div class="row">

													<div id="sentence" class="col-md-12" style="display:none;">
														<div class="form-group">
															<label id="case_no" class="control-label col-md-3">Sentence</label>
															<div class="col-md-6">
																<select class="form-control" name="mainYear">
																	<option value="">--Select--</option>
																	<option value="Death Sentence">Death Sentence</option>
																	<option value="Life Sentence">Life Sentence</option>
																	<option value="Short Sentence">Short Sentence</option>

																</select>
															</div>
														</div>
													</div>

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
												<div class="row" id="distt_police" style="display:none;">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label col-md-3">District</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="petitioner_advocate" placeholder="">
																<!-- <span class="help-block"> This is inline help </span>  -->
															</div>

															<label class="control-label col-md-1">Police Station</label>
															<div class="col-md-3">
																<input type="text" class="form-control" name="police_station" placeholder="">
																<!-- <span class="help-block"> This is inline help </span>  -->
															</div>
														</div>
													</div>
												</div>
												<div class="row" id="fir_date" style="display:none;">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label col-md-3">FIR no</label>
															<div class="col-md-2">
																<input type="text" class="form-control" name="fir_no" placeholder="">
																<!-- <span class="help-block"> This is inline help </span>  -->
															</div>

															<label class="control-label col-md-1">Fir Date</label>
															<div class="col-md-3">
																<input type="date" class="form-control" name="fir_date" value="<?php echo date("Y-m-d"); ?>" placeholder="">

															</div>

														</div>
													</div>
												</div>



												<div>
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
													<div class="col-md-12" id="department_div" style="display:block">
														<div class="form-group">
															<label class="control-label col-md-3">Department</label>
															<div class="col-md-6">

																<!--<select class="form-control multi-select" name="department_id">-->

																<select class="form-control select2 select2-multiple select2-container--focus select2-container--open" name="department_id[]" multiple="multiple">

																	<?php foreach ($getdepartments as $department_info) { ?>
																		<option value="<?= $department_info->id; ?>"><?= $department_info->title; ?></option>
																	<?php } ?>
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
																	<?php } ?>

																</select>
																<!-- <span class="help-block">Select Role For User</span>  -->
															</div>
														</div>
													</div>
													<!--/span-->


													<div class="row">
														<div class="col-md-12">
															<div class="form-group">
																<label class="control-label col-md-3">Case Filing Date</label>
																<div class="col-md-6">
																	<input type="date" class="form-control" name="Filling_date" value="<?php echo date("Y-m-d"); ?>" placeholder="">
																	<!-- <span class="help-block"> This is inline help </span>  -->
																</div>
															</div>
														</div>
														<!--/span-->
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



												<!--<div  class="col-md-12">
<div id="link_case" class="form-group">
<label class="control-label col-md-3">Previous case</label>
<div class="col-md-6">
<select class="form-control select2" name="linked_case_id">
<option>Select</option>
<?php
foreach ($getCases as $case_info) { ?>
<option value="<?= $case_info->case_id; ?>"><?= $case_info->case_title; ?> VS <?= $case_info->stateorgovt; ?> - WP(<?= $case_info->case_no; ?>) - <?= $case_info->court_title; ?> - <?= $case_info->branch_title; ?> </option>
<?php
}
?>
</select>	
</div>
</div>
</div>-->


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
	<?php $this->load->view('AdminDashboard/includes/base_footer') ?>


	<!-- /Main Content -->
	<script>
		function change_label(sel) {
			if (sel.value != "") {
				var branch_id = $("#branch_id").val();
				if (branch_id == 4) {
					document.getElementById("linked_case_label").innerHTML = "wp case no";
				} else if (branch_id == 2) {
					document.getElementById("linked_case_label").innerHTML = "CRA case no";
				} else if (branch_id == 1) {
					document.getElementById("linked_case_label").innerHTML = "BA case no";
				}

				var category_name = sel.options[sel.selectedIndex].text;
				document.getElementById("case_no").innerHTML = category_name + " no";
			} else {
				document.getElementById("case_no").innerHTML = "case no";
			}
			if (sel.value == 1 || sel.value == 2 || sel.value == 3 || sel.value == 27 || sel.value == 28 || sel.value == 29 || sel.value == 30 || sel.value == 24) {
				document.getElementById("main_wp_case_no").style.display = 'block';
			} else {

				// var branch = document.getElementById("branch_id").value;
				// alert($branch);
				document.getElementById("main_wp_case_no").style.display = 'none';
			}
			if (sel.value == 19) {
				document.getElementById("sentence").style.display = 'block';
			} else {
				document.getElementById("sentence").style.display = 'none';
			}

		}

		$(document).ready(function() {
			var branch_id = $("#user_branch_id").val();
			get_categories(branch_id);

		});


		function get_categories(branch_id) {
			// show_fields(branch_id);
			var branch_id = $("#branch_id").val();
			show_fields(branch_id);
			if (branch_id != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>AdminDashboard/fetch_caseCategories",
					method: "POST",
					beforeSend: function() {
						$("#userstatus").html('<img src="<?php echo base_url(); ?>/assets/images/loading.gif">');
					},
					data: {
						branch_id: branch_id
					},
					success: function(data) {
						////$("#userstatus").fadeOut(); 
						$('#case_cateid').html(data);
					}
				});
			} else {
				$("#userstatus").text('Please Select.');
			}
		}

		function show_fields(branch_id) {
			// var branch_id = $("#branch_id").val();
			if (branch_id == 1) {
				document.getElementById("distt_police").style.display = 'block';
				document.getElementById("fir_date").style.display = 'block';
				document.getElementById("department_div").style.display = 'none';
			} else {
				document.getElementById("distt_police").style.display = 'none';
				document.getElementById("fir_date").style.display = 'none';
				document.getElementById("department_div").style.display = 'block';
			}

		}
	</script>