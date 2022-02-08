<base href="<?php echo base_url(); ?>public/">
<!-- Main Content -->
<div class="page-wrapper clearfix">
<div class="container-fluid pt-25 " style="width:85%; float:right;">

<!-- Title -->
<div class="row heading-bg">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h5 class="txt-dark">Case Information</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
<li><a href="index.html">Dashboard</a></li>
<li><a href="#"><span>case</span></a></li>
<li class="active"><span>case view</span></li>
</ol>
</div>
<!-- /Breadcrumb -->
</div>
<!-- /Title -->

<!-- Row -->
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="pull-left">
<!-- <h6 class="panel-title txt-dark">Case Information</h6> -->
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<ul class="nav nav-tabs">

<?php
$tab = $this->uri->segment(4); 
if($tab == "")
{
?>
<li class="active"><a data-toggle="tab" href="#case_info">Case Basic Info</a></li>
<?php	
}
else
{
?>
<li><a data-toggle="tab" href="#case_info">Case Basic Info</a></li>
<?php	
}
?>

<?php
if($tab == "docs")
{
?>
<li class="active"> <a data-toggle="tab" href="#case_document">Case Documents</a></li>
<?php
}
else
{
?>
<li> <a data-toggle="tab" href="#case_document">Case Documents</a></li>
<?php	
}
?>



<?php
if($tab == "hearing")
{
?>
<li class="active"><a data-toggle="tab" href="#case_hearing">Case Hearings</a></li>
<?php
}
else
{
?>
<li><a data-toggle="tab" href="#case_hearing">Case Hearings</a></li>
<?php	
}
?>






<li><a data-toggle="tab" href="#linked_case">Case Link</a></li>
<li><a data-toggle="tab" href="#case_decision">Case Decision</a></li>




</ul>
<div class="tab-content">
<?php
if($tab == "")
{
?>
<div id="case_info" class="tab-pane fade in active">
<?php
}
else
{
?>
<div id="case_info" class="tab-pane fade">
<?php	
}
?>

<div class="row">

<div class="col-md-12">
<div class="panel panel-default card-view">
    <div class="panel-heading">
        <div class="pull-left">
        </div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 justify-content-center">
                    <div class="form-wrap">
                        <form action="#" class="form-vertical text-left">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 ">

                                                <?php
                                                $case_cateid = $case_info[0]->case_cateid;
                                                $caseCateqry = $this->db->select('*')->from('case_categories')->where('id', $case_cateid)->get();
                                                echo $caseCateqry->row('title');
                                                ?>
                                                No :-</label>
                                            <div class="col-md-6">
                                                <p class="" style="line-height:16px;margin-top:10px; font-weight:bold;">
                                                    <?= $case_info[0]->case_no; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3 txt-dark">Title :-</label>
                                        <div class="col-md-6">
                                            <p style="line-height:16px;margin-top:10px; font-weight:bold;">
                                                <?= $case_info[0]->title; ?> VS <?= $case_info[0]->stateorgovt; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 ">Department :-</label>
                                        <div class="col-md-6">
                                            <p class="" style="line-height:16px;margin-top:10px; font-weight:bold;">
                                                <?php
                                                foreach ($getcase_dept as $casedept) {
                                                    echo $casedept->department_name;
                                                    echo " , ";
                                                }
                                                ?>


                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 ">Advocate for Petitioner :-</label>
                                        <div class="col-md-6">
                                            <p class="" style="line-height:16px;margin-top:10px; font-weight:bold;">
                                                <?= $case_info[0]->petitioner_advocate; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 ">Respondent(s) :-</label>
                                        <div class="col-md-6">
                                            <p class="" style="line-height:16px;margin-top:10px; font-weight:bold;">
                                                <?= $case_info[0]->respondent; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!-- /Row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">Advocate for Respondent(s) :-</label>
                                        <div class="col-md-6">
                                            <p style="line-height:16px;margin-top:10px; font-weight:bold;">
                                                <?= $case_info[0]->advocate_respondent; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 ">Focal Person :-</label>
                                        <div class="col-md-6">
                                            <p class="" style="line-height:16px;margin-top:10px; font-weight:bold;">
                                                <?= $case_info[0]->focalperson; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 ">Court :-</label>
                                        <div class="col-md-6">
                                            <p class="" style="line-height:16px;margin-top:10px; font-weight:bold;">
                                                <?php
                                                $court_id = $case_info[0]->court_id;
                                                $court_qry = $this->db->select('*')->from('court')->where('id', $court_id)->get();
                                                echo $court_qry->row('title');
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 ">Branch :-</label>
                                        <div class="col-md-6">
                                            <p class="" style="line-height:16px;margin-top:10px; font-weight:bold;">
                                                <?php
                                                $branch_id = $case_info[0]->court_id;
                                                $branch_qry = $this->db->select('*')->from('branch')->where('id', $branch_id)->get();
                                                echo $branch_qry->row('title');
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 ">Case Filing Date</label>
                                        <div class="col-md-6">
                                            <p class="" style="line-height:16px;margin-top:10px; font-weight:bold;">
                                                <?= date("d-m-Y", strtotime($case_info[0]->Filling_date)); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 ">Case Year</label>
                                        <div class="col-md-6">
                                            <p class="" style="line-height:16px;margin-top:10px; font-weight:bold;">
                                                <?= $case_info[0]->year; ?>
                                            </p>
                                        </div>
                                    </div>
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
</div>


<?php
if($tab == "docs")
{
?>
<div id="case_document" class="tab-pane fade in active">
<?php
}
else
{
?>
<div id="case_document" class="tab-pane fade">
<?php	
}
?>


<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="row">
    <br>
    <h3 class="text-center">Add Documents</h3>
    <br>
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

<div class="row">

<div class="col-sm-12">
<div class="panel panel-default card-view">
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="example1" class="table table-hover display  pb-30">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Title</th>
                                <th>Upload Date</th>
                                <th>Document</th>

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


<?php
if($tab == "hearing")
{
?>
<div id="case_hearing" class="tab-pane fade in active">
<?php
}
else
{
?>
<div id="case_hearing" class="tab-pane fade">
<?php	
}
?>

<div class="col-md-12">
<div class="panel panel-default card-view">

<div class="panel-wrapper collapse in">
    <div class="panel-body">
        <div class="row">
            <br>
            <h3 class="text-center">Add Hearing</h3>
            <br>
            <div class="col-md-12">
                <div class="form-wrap">
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>AdminDashboard/submit_add_hearing/" class="form-horizontal">
                        <div class="form-body">


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
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Hearing Date</label>
                                        <div class="col-md-6">
                                            <input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" name="hearing_date">
                                            <!-- <span class="help-block"> This is inline help </span>  -->
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">Next Date</label>
                                        <div class="col-md-6">
                                            <input type="date" class="form-control" value="" name="next_hearing_date">


                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>









                            <!-- /Row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Law Officer</label>
                                        <div class="col-md-6">
                                            <select class="form-control select2 select2-multiple" name="lawOfficers[]" multiple="multiple">


                                                <?php foreach ($Lawofficers as $officer_info) { ?>
                                                    <option value="<?= $officer_info->id; ?>"><?= $officer_info->name; ?></option>
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
                                        <label class="control-label col-md-3">Remarks</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="remarks" placeholder="">
                                            <!-- <span class="help-block"> This is inline help </span>  -->
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!-- /Row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Order Sheet</label>
                                        <div class="col-md-6">
                                            <input type="file" class="form-control" placeholder="" accept="doc|docx|jpeg|jpg|png|pdf" name="docs_file">
                                            <!-- <span class="help-block"> This is inline help </span>  -->
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->

                            </div>
                            <!-- /Row -->
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
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default card-view">
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table id="example1" class="table table-hover display  pb-30">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Title</th>
                                <th>Hearing Date</th>
                                <th>Next Date</th>
                                <th>Law Officers</th>
                                <th>Remarks</th>
                                <th>Order Sheet</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($gethearing_docs as $hearinginfo) {
                            ?>

                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td>Case Hearing</td>
                                    <td><?= date("d-m-Y", strtotime($hearinginfo->hearing_date)); ?></td>
                                    <td><?= date("d-m-Y", strtotime($hearinginfo->next_hearing_date)); ?></td>
                                    <td>
                                        <?php
                                        $this->db->select("*");
                                        $this->db->where("hearing_id", $hearinginfo->id);
                                        $Officerquery = $this->db->get('hearing_lawofficers');
                                        $getOfficers = $Officerquery->result();
                                        foreach ($getOfficers as $officerInfo) {
                                            echo $officerInfo->officer_name;
                                            echo ", ";
                                        }
                                        ?>

                                    </td>
                                    <td><?= $hearinginfo->remarks; ?></td>
                                    <th><a target="_blank" href="<?php echo base_url(); ?>assets/casedocs/<?= $hearinginfo->docs_filename; ?>">View File</a></th>


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
<div id="linked_case" class="tab-pane fade">
<div class="row">
<div class="col-md-12">
<div class="panel panel-default card-view">

    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="row">

                <div class="col-md-12 justify-content-center">
                    <div class="form-wrap">
                        <h5>


                            <?php
                            $linked_case_id =  $case_info[0]->linked_case_id;
                            if ($linked_case_id == 0) {
                                echo "<h5>Case is not Linked.</h5>";
                            } else {
                            ?>
                                <h5>Case is Linked With Following Case.</h5><br />

                                <a href="<?php echo base_url(); ?>AdminDashboard/case_view/<?= $linked_case_id; ?>">
                                    <?php
                                    $linkedcase_qry = $this->db->select('*')->from('manage_cases')->where('id', $linked_case_id)->get();
                                    echo "<p style='text-transform:capitalize; font-weigth:bold;'>Click to View Details - ";
                                    echo $linkedcase_qry->row('title') . " VS " . $linkedcase_qry->row('stateorgovt');
                                    echo "</p>";

                                    ?>
                                </a>
                            <?php
                            }

                            ?>


                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<div id="case_decision" class="tab-pane fade">
<?php
if (empty($decision_info)) {
?>

<div class="panel-wrapper collapse in">
<div class="panel-body">
    <div class="row">

        <div class="col-md-12">
            <br>
            <h3 class="text-center">Add Decision</h3>
            <br>
            <div class="form-wrap ">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>AdminDashboard/submit_decision/" class="form-horizontal">
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
                                    <label class="control-label col-md-3">Case Decision</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="case_decision">
                                            <?php $i = 1;
                                            foreach ($getDecions as $decision_info) { ?>
                                                <option value="<?= $decision_info->title; ?>"><?= $decision_info->title; ?></option>
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
                                    <label class="control-label col-md-3">Decision Date</label>
                                    <div class="col-md-6">
                                        <input type="date" name="decision_date" class="form-control" value="<?php echo date("Y-m-d"); ?>" placeholder="">
                                        <!-- <span class="help-block"> This is inline help </span>  -->
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">Remarks / Action </label>
                                    <div class="col-md-6">
                                        <input type="text" name="remarks" class="form-control" placeholder="">

                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!-- /Row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">Judgment</label>
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

                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php
} else {
?>
<div class="row">

<div class="col-md-12">
    <div class="panel panel-default card-view">
        <div class="panel-heading">

        </div>
        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <div class="row">

                    <div class="col-md-12 justify-content-center">
                        <div class="form-wrap">
                            <form action="#" class="form-vertical text-left">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3 txt-dark">Case Decicion :-</label>
                                                <div class="col-md-6">
                                                    <p style="line-height:16px;margin-top:10px; font-weight:bold;">
                                                        <?= $decision_info[0]->case_decision; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!-- /Row -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3">Date :-</label>
                                                <div class="col-md-6">
                                                    <p style="line-height:16px;margin-top:10px; font-weight:bold;">
                                                        <?= date("d-m-Y", strtotime($decision_info[0]->decision_date)); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!-- /Row -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 ">Remarks</label>
                                                <div class="col-md-6">
                                                    <p class="" style="line-height:16px;margin-top:10px; font-weight:bold;">
                                                        <?= $decision_info[0]->remarks; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!-- /Row -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 ">Judgment File</label>
                                                <div class="col-md-6">
                                                    <p class="" style="line-height:16px;margin-top:10px; font-weight:bold;">
                                                        <a target="_blank" href="<?php echo base_url(); ?>assets/casedocs/<?= $decision_info[0]->docs_filename; ?>">View File</a>
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!-- /Row -->

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
<?php
}
?>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- /Row -->


</div>
<!-- </div> -->
<!-- /Row -->



<?php $this->load->view('AdminDashboard/includes/base_footer') ?>