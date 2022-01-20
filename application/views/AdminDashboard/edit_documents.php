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

                                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>AdminDashboard/update_case_docs/" class="form-horizontal">
                                            <div class="form-body form-center">


                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Wp Case No</label>
                                                            <div class="col-md-6">
                                                                <input type="text" name="title" readonly="readonly" value="<?= $case_info[0]->case_no; ?>" class="form-control" placeholder="">
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
                                                                <select class="form-control" name="docsname">


                                                                    <option value="Judgement">Judgement</option>
                                                                    <option value="Order Sheet">Order Sheet</option>
                                                                    <option value="Comments / Reply">Comments / Reply</option>
                                                                    <option value="CMs/Rejoinder">CMs/Rejoinder</option>
                                                                    <option value="WP File">WP File</option>




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

                                            <input type="hidden" name="case_id" value="<?php echo $this->uri->segment(3); ?>">
                                            <input type="hidden" name="docs_id" value="<?php echo $this->uri->segment(4); ?>">


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