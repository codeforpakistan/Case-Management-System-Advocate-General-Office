<!-- Main Content -->
<div class="page-wrapper clearfix">
    <div class="container-fluid pt-25 " style="width:85%; float:right;">

        <br />

        <?php
        $error = $this->session->flashdata('error');
        $success = $this->session->flashdata('success');
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
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Add Department</h5>
            </div>

            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a class="active"><span>Department</span></a></li>
                    <li class="active"><span>Add Department</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
            <div class="col-md-3 col-md-offset-9">
                <a href="<?php echo base_url() . 'AdminDashboard/list_department'; ?>"> <button class="btn btn-success btn-anim  btn-xs" style="float:right;">List Department</button></a>
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
                                        <form method="post" action="<?php echo base_url(); ?>AdminDashboard/update_department/" class="form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Department Name</label>
                                                            <div class="col-md-6">
                                                                <input type="text" name="title" value="<?= $getdept[0]->title; ?>" class="form-control" placeholder="">
                                                                <!-- <span class="help-block"> This is inline help </span>  -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group ">
                                                            <label class="control-label col-md-3">Description</label>
                                                            <div class="col-md-6">
                                                                <input type="text" name="description" value="<?= $getdept[0]->description; ?>" class="form-control" placeholder="">

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
                                                                <button type="reset" class="btn btn-success  mr-10">Reset</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6"> </div>
                                                </div>
                                            </div>

                                            <input type="hidden" name="deptid" value="<?= $getdept[0]->id; ?>" />

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