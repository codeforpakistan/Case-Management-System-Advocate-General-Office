<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">



        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Add Case Documents</h5>
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
                    <li><a class="active"><span>Case</span></a></li>
                    <li class="active"><span>Add Documents</span></li>
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

                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-wrap ">
                                        <br />

                                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>AdminDashboard/submit_case_documents/" class="form-horizontal">
                                            <div class="form-body form-center">


                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Wp Case No</label>
                                                            <div class="col-md-3">
                                                                <input type="text" name="title" readonly="readonly" value="<?= $case_info[0]->case_no; ?>" class="form-control" placeholder="">
                                                            </div>

                                                            <label class="control-label col-md-1">Year</label>

                                                            <div class="col-md-2">
                                                                <input type="text" name="title" readonly="readonly" value="<?= $case_info[0]->year; ?>" class="form-control" placeholder="">
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Title</label>
                                                            <div class="col-md-6">
                                                                <input type="text" name="title" readonly="readonly" value="<?= $case_info[0]->title; ?>" class="form-control" placeholder="">
                                                                <!-- <span class="help-block"> This is inline help </span>  -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">Document Name</label>
                                                            <div class="col-md-6">
                            <select required class="form-control" name="docsname">


                                <!--<option value="Judgement">Judgement</option>-->
                                <option value="">--Select--</option>
                                
                                <option value="Comments / Reply">Comments / Reply</option>
                                <option value="CMs/Rejoinder">CMs/Rejoinder</option>
                                <option value="WP File">WP File</option>
								<option value="Other Documents">Other Documents</option>



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
                                                            <label class="control-label col-md-3">Document Date</label>
                                                            <div class="col-md-6">
                                                                <input type="date" value="<?php echo date("Y-m-d"); ?>" name="docs_date" class="form-control" placeholder="">
                                                                <!-- <span class="help-block"> This is inline help </span>  -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">Document</label>
                                                            <div class="col-md-6">
                                                                <input type="file" required="required" name="docs_file" accept="doc|docx|jpeg|jpg|png|pdf" class="form-control" placeholder="">

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

                                            <input type="hidden" name="case_id" value="<?php echo $this->uri->segment(3); ?>">


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
                                                <th>S.No</th>
                                                <th>Title</th>
                                                <th>Upload Date</th>
                                                <th>Document</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($getcase_docs as $caseinfo) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?= $caseinfo->docsname; ?></td>
                                                    <td><?= date("d-m-Y", strtotime($caseinfo->docs_date)); ?></td>
                                                    <th>
                                                        <a target="_blank" href="<?php echo base_url(); ?>assets/casedocs/<?= $caseinfo->docs_filename; ?>">
                                                            View File</a>
                                                    </th>
                                                    <td class="">
                                                        <a class="btn btn-success btn-anim  btn-xs" href='<?php echo base_url(); ?>AdminDashboard/edit_case_documents/<?php echo $this->uri->segment(3); ?>/<?= $caseinfo->id; ?>'>Edit</a>
                                                    </td>

                                                </tr>
                                            <?php $i++;
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



    </div>



    <!-- /Main Content -->