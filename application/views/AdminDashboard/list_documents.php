<!-- Main Content -->
<div class="page-wrapper clearfix">
    <div class="container-fluid pt-25 " style="width:85%; float:right;">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Cases Documents</h5>
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
                    <li class="active"><span>Case Documents </span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
            <div class="col-md-12 ">
                <a href="<?php echo base_url() . 'AdminDashboard/list_case'; ?>"> <button class="btn btn-success btn-anim btn-xs pull-left">list case</button></a>
                <a href="<?php echo base_url() . 'AdminDashboard/add_case_documents'; ?>"> <button class="btn btn-success btn-anim btn-xs pull-right">Add New</button></a>
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
                                                <th>S.No</th>
                                                <th>Title</th>
                                                <th>Upload Date</th>
                                                <th>Document</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Title</th>
                                                <th>Upload Date</th>
                                                <th>Document</th>
                                                <th>Action</th>

                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php for ($i = 1; $i <= 15; $i++) { ?>

                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td>CMs/rejoinder</td>
                                                    <td>16/12/2021</td>
                                                    <th><a href="#">ordersheet.pdf</a></th>
                                                    <td class="">
                                                        <a class="btn btn-success btn-anim  btn-xs" href='#'>Edit</a>
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
    <?php $this->load->view('AdminDashboard/includes/base_footer') ?>