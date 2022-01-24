<link href="<?php echo base_url(); ?>public/vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css" />




<div class="page-wrapper">
  <div class="container-fluid pt-25">

     <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Summary</h5>
            </div>
        </div>

    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-default card-view pa-0">
          <div class="panel-wrapper collapse in">
            <a href="">
              <div class="panel-body pa-0">
                <div class="sm-data-box">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                        <span class="txt-dark block counter"><span class="counter-anim"><?php echo $getTotalCases; ?></span></span>
                        <span class="weight-500 uppercase-font block ">Total Cases</span>
                      </div>
                      <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                        <i class="icon-layers data-right-rep-icon txt-light-grey"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          </a>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-default card-view pa-0">
          <div class="panel-wrapper collapse in">
            <a href="">
              <div class="panel-body pa-0">
                <div class="sm-data-box">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                        <span class="txt-dark block counter"><span class="counter-anim"><?php echo $getPendingCases; ?></span></span>
                        <span class="weight-500 uppercase-font block">Pending Cases</span>
                      </div>
                      <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                        <i class="icon-layers data-right-rep-icon txt-light-grey"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-default card-view pa-0">
          <div class="panel-wrapper collapse in">
            <a href="">
              <div class="panel-body pa-0">
                <div class="sm-data-box">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                        <span class="txt-dark block counter"><span class="counter-anim"><?php echo $getdecidedCases; ?></span></span>
                        <span class="weight-500 uppercase-font block">Decided Cases</span>
                      </div>
                      <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                        <i class="icon-layers data-right-rep-icon txt-light-grey"></i>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
          </div>
          </a>
        </div>
      </div>
    </div>


    <?php
    $role_type = $this->session->userdata('role');
    $branch_id = $this->session->userdata('branch_id');
    $user_id = $this->session->userdata('id');

    if (($role_type == 1) && ($branch_id == 0)) {


      $this->db->select("*");
      $this->db->order_by('id', "DESC");
      //$this->db->where("record_id",$get_auditsalarypaid_staffvalues['id']);
      $querybranches = $this->db->get('branch');
      $querygetBranches = $querybranches->result();
      foreach ($querygetBranches as $getbraches) {
    ?>

<div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">
				<?php echo $getbraches->title; ?>
				
				</h5>
            </div>
        </div>
        <!-- /Row -->
        <!--<div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default card-view pa-0" style="background:#2ecd99;">
              <div class="panel-wrapper collapse in">
                <a href="">
                  <div class="panel-body pa-0">
                    <div class="sm-data-box">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-xs-12 text-center pl-0 pr-0 data-wrap-right">
                            <span class="txt-dark block counter"><span class="counter-anim">
                                <?php
                                $this->db->select("*");
                                $this->db->from("manage_cases");
                                $this->db->where("branch_id", $getbraches->id);
                                $this->db->order_by('id', "DESC");
                                echo $getbranchCount = $this->db->get()->num_rows();
                                ?>

                              </span></span>
                            <span class=" uppercase-font block "><?php echo $getbraches->title; ?></span>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              </a>
            </div>
          </div>
        </div>-->

    <div class="row">
          <div class="col-lg-4">
            <div class="panel panel-default card-view pa-0" >
              <div class="panel-wrapper collapse in">
                <a href="">
                  <div class="panel-body pa-0">
                    <div class="sm-data-box">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-xs-12 text-center pl-0 pr-0 data-wrap-right">
                            <span class="txt-dark block counter"><span class="counter-anim">
                                <?php
                                $this->db->select("*");
                                $this->db->from("manage_cases");
                                $this->db->where("branch_id", $getbraches->id);
                                $this->db->order_by('id', "DESC");
                                echo $getbranchCount = $this->db->get()->num_rows();
                                ?>

                              </span></span>
                            <span class=" uppercase-font block ">Total Cases</span>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              </a>
            </div>
          </div>
        
          <?php
          $this->db->select("*");
          $this->db->where("branch_id", $getbraches->id);
          $this->db->order_by('id', "DESC");
          $querycats = $this->db->get('case_categories');
          $querygetCategories = $querycats->result();
          foreach ($querygetCategories as $getCategories) {
          ?>

            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
              <div class="panel panel-default card-view pa-0">
                <div class="panel-wrapper collapse in">
                  <a href="">
                    <div class="panel-body pa-0">
                      <div class="sm-data-box">
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-xs-9 text-center pl-0 pr-0 data-wrap-left">
                              <span class="txt-dark block counter"><span class="counter-anim">
                                  <?php
                                  $this->db->select("*");
                                  $this->db->from("manage_cases");
                                  $this->db->where("branch_id", $getbraches->id);
                                  $this->db->where("case_cateid", $getCategories->id);
                                  $this->db->order_by('id', "DESC");
                                  echo $getbranchCount = $this->db->get()->num_rows();
                                  ?>
                                </span></span>
                              <span class="weight-500 uppercase-font block "><?php echo $getCategories->title; ?></span>
                            </div>
                            <div class="col-xs-3 text-center  pl-0 pr-0 data-wrap-right">
                              <i class="icon-layers data-right-rep-icon txt-light-grey"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                </a>
              </div>
            </div>

          <?php
          }
          ?>


        </div>

      <?php
      }
    } else {
      ?>
      
      <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">
				<?php
				$get_branch_name = $this->db->select('*')->from('branch')->where('id', $branch_id)->get();
                            echo $get_branch_name->row('title');
				 ?>
				
				</h5>
            </div>
        </div>
      
      

      <!--<div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default card-view pa-0" style="background:#2ecd99;">
            <div class="panel-wrapper collapse in">
              <a href="">
                <div class="panel-body pa-0">
                  <div class="sm-data-box">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-xs-12 text-center pl-0 pr-0 data-wrap-right">
                          <span class="txt-dark block counter"><span class="counter-anim">
                              <?php
                              $this->db->select("*");
                              $this->db->from("manage_cases");
                              $this->db->where("branch_id", $branch_id);
                              $this->db->order_by('id', "DESC");
                              echo $getbranchCount = $this->db->get()->num_rows();
                              ?>
                            </span></span>
                          <span class=" uppercase-font block ">
                            <?php
                            $get_branch_name = $this->db->select('*')->from('branch')->where('id', $branch_id)->get();
                            echo $get_branch_name->row('title');
                            ?>
                          </span>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
            </div>
            </a>
          </div>
        </div>
      </div>-->

      <div class="row">

        <?php
        $this->db->select("*");
        $this->db->where("branch_id", $branch_id);
        $this->db->order_by('id', "DESC");
        $querycats = $this->db->get('case_categories');
        $querygetCategories = $querycats->result();
        foreach ($querygetCategories as $getCategories) {
        ?>
        
        
        
        
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default card-view pa-0">
              <div class="panel-wrapper collapse in">
                <a href="">
                  <div class="panel-body pa-0">
                    <div class="sm-data-box">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-xs-9 text-center pl-0 pr-0 data-wrap-left">
                            <span class="txt-dark block counter"><span class="counter-anim">
                                <?php
                              $this->db->select("*");
                              $this->db->from("manage_cases");
                              $this->db->where("branch_id", $branch_id);
                              $this->db->order_by('id', "DESC");
                              echo $getbranchCount = $this->db->get()->num_rows();
                              ?>
                              </span></span>
                            <span class="weight-500 uppercase-font block ">Total Cases</span>
                          </div>
                          <div class="col-xs-3 text-center  pl-0 pr-0 data-wrap-right">
                            <i class="icon-layers data-right-rep-icon txt-light-grey"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              </a>
            </div>
          </div>
        
        
        
        
        

          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default card-view pa-0">
              <div class="panel-wrapper collapse in">
                <a href="">
                  <div class="panel-body pa-0">
                    <div class="sm-data-box">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-xs-9 text-center pl-0 pr-0 data-wrap-left">
                            <span class="txt-dark block counter"><span class="counter-anim">
                                <?php
                                $this->db->select("*");
                                $this->db->from("manage_cases");
                                $this->db->where("branch_id", $branch_id);
                                $this->db->where("case_cateid", $getCategories->id);
                                $this->db->order_by('id', "DESC");
                                echo $getbranchCountUser = $this->db->get()->num_rows();
                                ?>
                              </span></span>
                            <span class="weight-500 uppercase-font block "><?php echo $getCategories->title; ?></span>
                          </div>
                          <div class="col-xs-3 text-center  pl-0 pr-0 data-wrap-right">
                            <i class="icon-layers data-right-rep-icon txt-light-grey"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              </a>
            </div>
          </div>

        <?php
        }
        ?>


      </div>
    <?php
    }
    ?>





    <div style="height:500px;" class="row">
      <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
        <div class="panel panel-default card-view">
          <div class="panel-heading">
            <div class="pull-left">
              <h6 class="panel-title txt-dark">Total Cases Report</h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <!-- <div id="morris_extra_bar_chart" class="morris-chart"></div> -->
            <canvas id="myChart"></canvas>
          </div>
        </div>
      </div>

    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
      var xValues = ["WP cases", "Bail Cases", "App 12(2)", "CMs", "Total", "Pending", "Completed"];
      var yValues = [55, 49, 44, 24, 80, 30, 50];
      var barColors = ["green", "orange", "blue", "yellow", "brown", "cyan", "magenta"];

      new Chart("myChart", {
        type: "bar",
        data: {
          labels: xValues,
          datasets: [{
            backgroundColor: barColors,
            data: yValues
          }]
        },
        options: {
          legend: {
            display: false
          },
          title: {
            display: true,
            text: "Total Cases And Branch wise cases "
          }
        }
      });
    </script>





    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>public/vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>public/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Data table JavaScript -->
    <script src="<?php echo base_url(); ?>public/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="<?php echo base_url(); ?>public/dist/js/jquery.slimscroll.js"></script>



    <!-- Progressbar Animation JavaScript -->
    <script src="<?php echo base_url(); ?>public/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>public/vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>



    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>public/vendors/bower_components/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>public/vendors/bower_components/morris.js/morris.min.js"></script>




    <!-- Init JavaScript -->
    <script src="<?php echo base_url(); ?>public/dist/js/init.js"></script>
    <!-- <script src="<?php echo base_url(); ?>public/dist/js/dashboard6-data.js"></script> -->


    </body>

    </html>