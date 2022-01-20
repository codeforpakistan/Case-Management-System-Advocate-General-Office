<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid">


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
            <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Link Case</h5>
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
                    <li class="active"><span>Link Case</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->

        </div>
        <!-- /Title -->
        <!-- Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default card-view">

                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-12 container">
                                    <div class="form-wrap ">
                                        <form action="<?php echo base_url(); ?>AdminDashboard/submit_link_cases/" method="post" class="form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">COC case</label>
                                                            <div class="col-md-6">
                                                                <select class="form-control select2" name="coc_case_id">
                                                                    <option>Select</option>
                                                                    <?php
                                                                    foreach ($getCases as $case_info) { ?>
                                                                        <option value="<?= $case_info->case_id; ?>"><?= $case_info->case_title; ?> VS <?= $case_info->states; ?> - WP(<?= $case_info->case_no; ?>) - <?= $case_info->dept_title; ?> - <?= $case_info->court_title; ?> - <?= $case_info->branch_title; ?> </option>
                                                                    <?php
                                                                    }
                                                                    ?>
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
                                                            <label class="control-label col-md-3">Previous case</label>
                                                            <div class="col-md-6">
                                                                <select class="form-control select2" name="previous_case_id">
                                                                    <option>Select</option>
                                                                    <option <?php
                                                                            foreach ($getCases as $case_info) { ?> <option value="<?= $case_info->case_id; ?>"><?= $case_info->case_title; ?> VS <?= $case_info->states; ?> - WP(<?= $case_info->case_no; ?>) - <?= $case_info->dept_title; ?> - <?= $case_info->court_title; ?> - <?= $case_info->branch_title; ?> </option>
                                                                <?php
                                                                            }
                                                                ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->

                                                </div>
                                                <!-- /Row -->
                                                <div class="col-md-12">
                                                    <div class="form-actions mt-10">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-offset-3 col-md-9">
                                                                        <button type="submit" class="btn btn-success  mr-10">Link Cases</button>
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

</div>


<div class="row">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Linked Cases Details</h5>
    </div>
</div>

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
                                        <th>COC Case</th>
                                        <th>Previous Cases</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $counter = 1;
                                    foreach ($getLinkCases as $LinkCases) { ?>
                                        <tr>
                                            <td><?php echo $counter; ?></td>
                                            <td><?php
                                                $coc_case_id = $LinkCases->coc_case_id;
                                                $getcoc = $this->db->select('*')->from('manage_cases')->where('id', $coc_case_id)->get();
                                                echo $getcoc->row('title');
                                                echo " VS ";
                                                echo $getcoc->row('states');
                                                ?></td>
                                            <td><?php
                                                $previous_case_id = $LinkCases->previous_case_id;
                                                $getprev = $this->db->select('*')->from('manage_cases')->where('id', $previous_case_id)->get();
                                                echo $getprev->row('title');
                                                echo " VS ";
                                                echo $getcoc->row('states');
                                                ?></td>
                                            <td class="">
                                                <a class="btn btn-success btn-anim  btn-xs" href='#'>Edit</a>
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















<!-- /Main Content -->