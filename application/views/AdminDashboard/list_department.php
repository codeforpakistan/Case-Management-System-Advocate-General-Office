<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">

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
                <h5 class="txt-dark">List Department</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="#"><span>Depatments</span></a></li>
                    <li class="active"><span>List Departments</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
            <div class="col-md-3 col-md-offset-9">
                <a href="<?php echo base_url() . 'AdminDashboard/add_department'; ?>"> <button class="btn btn-success btn-anim  btn-xs" style="float:right;">Add New</button></a>
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
                                                <th>Description</th>
                                                <th>Action</th>


                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $counter = 1;
                                            foreach ($list_department as $deptinfo) { ?>
                                                <tr>
                                                    <td><?= $counter; ?></td>
                                                    <td><?= $deptinfo->title; ?></td>
                                                    <td><?= $deptinfo->description; ?></td>
                                                    <td class="text-navy">
                                                        <a href='<?php echo base_url(); ?>AdminDashboard/edit_department/<?= $deptinfo->id; ?>'>
                                                            <i class=" btn btn-success btn-anim  btn-xs fa fa-edit"></i>
                                                        </a>
                                                        <a onclick="return confirm('Sure to Delete...?')" href="<?php echo base_url(); ?>AdminDashboard/deletedepartments/<?= $deptinfo->id; ?>">
                                                            <i class=" btn btn-danger btn-anim  btn-xs fa fa-trash"></i></a>
                                                    </td>

                                                </tr>
                                            <?php
                                                $counter++;
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