	<!-- Main Content -->
	<div class="page-wrapper clearfix">
		<div class="container-fluid pt-25 " style="width:85%; float:right;">

			<!-- Title -->
			<div class="row heading-bg">
				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<h5 class="txt-dark">List Users</h5>
				</div>
				<!-- Breadcrumb -->
				<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					<ol class="breadcrumb">
						<li><a href="index.html">Dashboard</a></li>
						<li><a href="#"><span>Users</span></a></li>
						<li class="active"><span>List Users</span></li>
					</ol>
				</div>
				<!-- /Breadcrumb -->
				<div class="col-md-3 col-md-offset-9">
					<a href="<?php echo base_url() . 'AdminDashboard/add_user'; ?>"> <button class="btn btn-success btn-anim  btn-xs" style="float:right;">Add New</button></a>
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
										<table id="example" class="table table-hover display  pb-30">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Email</th>
													<th>Branch</th>
													<th>Role</th>
													<th>Action</th>

												</tr>
											</thead>

											<tbody>
												<?php $counter = 1;
												foreach ($list_users as $userinfo) { ?>
													<tr>
														<td><?= $counter; ?></td>
														<td><?= $userinfo->name; ?></td>
														<td><?= $userinfo->email; ?></td>
														<td>
															<?php
															$branch_id = $userinfo->branch_id;
															$get_branch = $this->db->select('*')->from('branch')->where('id', $branch_id)->get();
															echo $get_branch->row('title');
															?>
														</td>
														<td>
															<?php
															$role_id = $userinfo->role_id;
															$get_role = $this->db->select('*')->from('role')->where('id', $role_id)->get();
															echo $get_role->row('name');
															?>
														</td>
														<td class="text-navy">
															<a href='<?php echo base_url(); ?>AdminDashboard/edit_user/<?= $userinfo->id; ?>'>
																<i class=" btn btn-success btn-anim  btn-xs fa fa-edit"></i></a>
															<a onclick="return confirm('Sure to Delete...?')" href="<?php echo base_url(); ?>AdminDashboard/deleteusers/<?= $userinfo->id; ?>">
																<i class=" btn btn-danger btn-anim  btn-xs fa fa-trash"></i></a>
														</td>
													</tr>
												<?php $counter++;
												} ?>

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
		<?php $this->load->view('AdminDashboard/includes/base_footer') ?>