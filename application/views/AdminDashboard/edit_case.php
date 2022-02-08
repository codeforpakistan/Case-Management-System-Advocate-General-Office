<!-- Main Content -->
<div class="page-wrapper clearfix">
	<div class="container-fluid pt-25 " style="width:85%; float:right;">

		<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Update Case</h5>
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
										<form action="<?php echo base_url(); ?>AdminDashboard/update_cases/" method="post" class="form-horizontal">
											<div class="form-body">

												<?php if ($this->session->userdata('role') == 1 * 1) {
												?>
													<div class="row">
														<div class="col-md-12">
															<div class="form-group ">
																<label class="control-label col-md-3">Select Branch</label>
																<div class="col-md-6">
																	<select required class="form-control" name="branch_id" onChange="get_categories();" id="branch_id">
																		<?php foreach ($getbranches as $branch_info) { ?>
																			<option value="<?= $branch_info->id; ?>" <?php if ($getCasedata[0]->branch_id == $branch_info->id) echo "Selected"; ?>><?= $branch_info->title; ?></option>
																		<?php } ?>

																	</select>
																	<!-- <span class="help-block">Select Role For User</span>  -->
																</div>
															</div>
														</div>
														<!--/span-->
													</div>
												<?php
												} else { ?>
													<script>
														window.onload = function select_cat1() {
															var value = "<?= $this->session->userdata('branch_id') ?>";
															if (value) {
																$('#case_cateid').find('option').each(function() {
																	if ($(this).attr('val') != value) {
																		$(this).hide();
																	} else {


																		$(this).show();
																	}

																});
															}
														}
													</script>
													<input type="hidden" name="branch_id" value="<?php echo $this->session->userdata('branch_id'); ?>">
												<?php
												}
												?>




												<div class="row">
													<div class="col-md-12">
														<div class="form-group ">
															<label class="control-label col-md-3">Case Category</label>
															<div class="col-md-6">

																<?php
																$case_cateid = $getCasedata[0]->case_cateid;
																$get_catname = $this->db->select('*')->from('case_categories')->where('id', $case_cateid)->get();
																$getCatnames = $get_catname->row('title');
																?>


																<select required class="form-control" onchange="change_label(this);" name="case_cateid" id="case_cateid">


																	<?php
																	$this->db->select("*");
																	$this->db->where('branch_id', $getCasedata[0]->case_cateid);
																	$querycat = $this->db->get('case_categories');
																	$querycat = $querycat->result();

																	//echo $this->db->last_query();

																	foreach ($querycat as $catinfo) {
																	?>
																		<option value="<?php echo $catinfo->id; ?>" <?php if ($catinfo->id == $getCasedata[0]->case_cateid) {
																														echo "selected";
																													} ?>><?php echo $catinfo->title; ?></option>
																	<?php
																	}
																	?>




																	<!--<option value="<?= $getCasedata[0]->case_cateid; ?>"><?php echo $getCatnames; ?></option>-->



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
																<input type="text" class="form-control" value="<?= $getCasedata[0]->case_no; ?>" name="case_no" placeholder="">
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
															<label class="control-label col-md-3">Main WP Case no</label>
															<div class="col-md-3">
																<input type="text" class="form-control" name="mainWp_case_no" placeholder="">
															</div>

															<label id="case_no" class="control-label col-md-1">Year</label>
															<div class="col-md-2">
																<select class="form-control" name="mainYear">
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
																<input type="text" class="form-control" name="title" value="<?= $getCasedata[0]->title; ?>" placeholder="">
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


																<?php

																if (($getCasedata[0]->stateorgovt) == "Government") {
																?>
																	<input type="radio" name="stateorgovt" checked="checked" value="Government">&nbsp;&nbsp;&nbsp;Government &nbsp;&nbsp;&nbsp;
																	<input type="radio" name="stateorgovt" value="State">&nbsp;&nbsp;&nbsp;State
																<?php
																} else if (($getCasedata[0]->stateorgovt) == "State") {
																?>
																	<input type="radio" name="stateorgovt" value="Government">&nbsp;&nbsp;&nbsp;Government &nbsp;&nbsp;&nbsp;
																	<input type="radio" checked="checked" name="stateorgovt" value="State">&nbsp;&nbsp;&nbsp;State
																<?php
																}
																?>

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
																<input type="text" class="form-control" value="<?= $getCasedata[0]->petitioner_advocate ?>" name="petitioner_advocate" placeholder="">
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
																<input type="text" class="form-control" value="<?= $getCasedata[0]->respondent ?>" name="respondent" placeholder="">

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
																<input type="text" class="form-control" value="<?= $getCasedata[0]->advocate_respondent ?>" name="advocate_respondent" placeholder="">

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

																<select class="form-control select2 select2-multiple" name="department_id[]" multiple="multiple">
																	<?php
																	foreach ($getdepartments as $department_info) {
																	?>
																		<option <?php foreach ($getCasedepartments as $casedepartment_info) {
																					if ($department_info->id == $casedepartment_info->department_id) {
																						echo "selected";
																					}
																				} ?> value="<?= $department_info->id; ?>"><?= $department_info->title; ?></option>
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
															<label class="control-label col-md-3">Focal Person</label>
															<div class="col-md-6">
																<input type="text" class="form-control" name="focalperson" value="<?= $getCasedata[0]->focalperson; ?>" placeholder="">
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
																		<option value="<?= $court_info->id; ?>" <?php if ($getCasedata[0]->court_id == $court_info->id) echo "Selected"; ?>><?= $court_info->title; ?></option>
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
															<label class="control-label col-md-3">Case Filing Date</label>
															<div class="col-md-6">
																<input type="date" class="form-control" name="Filling_date" value="<?= $getCasedata[0]->Filling_date; ?>" placeholder="">
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
																	for ($i = $year; $i >= 1995; $i--) {
																	?>
																		<option value="<?php echo $i; ?>" <?php if ($getCasedata[0]->year == $i) echo "Selected"; ?>><?php echo $i; ?></option>
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
																<input type="checkbox" name="government_petitioner" <?php if ($getCasedata[0]->government_petitioner == "Yes") echo "Checked"; ?> value="Yes">

															</div>
														</div>
													</div>




													<!--<div id="link_case" class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">Previous case</label>
<div class="col-md-6">
<select class="form-control select2" name="linked_case_id">
<?php
foreach ($getCases as $case_info) { ?>
<option <?php if ($getCasedata[0]->linked_case_id == $case_info->case_id) echo "Selected"; ?> value="<?= $case_info->case_id; ?>"><?= $case_info->case_title; ?> VS <?= $case_info->stateorgovt; ?> - WP(<?= $case_info->case_no; ?>) - <?= $case_info->court_title; ?> - <?= $case_info->branch_title; ?> </option>
<?php
}
?>
</select>	
</div>
</div>
</div>-->



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

											<input type="hidden" name="caseid" value="<?= $getCasedata[0]->id; ?>" />

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
	<?php $this->load->view('AdminDashboard/includes/base_footer') ?>


	<script>
		function change_label(sel) {
			if (sel.value != "") {
				var category_name = sel.options[sel.selectedIndex].text;
				document.getElementById("case_no").innerHTML = category_name + " no";
			} else {
				document.getElementById("case_no").innerHTML = "case no";
			}
			if (sel.value == 1 || sel.value == 2 || sel.value == 3) {
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



		function get_categories() {

			var branch_id = $("#branch_id").val();

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
				$("#userstatus").text('Please Select District.');
			}
		}
	</script>