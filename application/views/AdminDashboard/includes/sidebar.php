<?php
if ($this->session->userdata('role') == 1 * 1) {
?>
    <div class="w3-sidebar bg-dark w3-bar-block" style="width:15%; margin-top:5%;">
        <ul>
            <br>
            <li>
                <a class="w3-bar-item w3-button " href=" <?php echo base_url(); ?>AdminDashboard">Home </a>
            </li>
            <li>
                <a class="w3-bar-item w3-button" href="<?php echo base_url(); ?>AdminDashboard/search">Search</a>
            </li>
            <li>
                <a class="w3-bar-item w3-button" href="<?php echo base_url(); ?>AdminDashboard/list_user">User</a>
            </li>
            <li>
                <a class="w3-bar-item w3-button" href="<?php echo base_url(); ?>AdminDashboard/list_branch">Branches</a>
            </li>
            <li>
                <a class="w3-bar-item w3-button" class="" href="<?php echo base_url(); ?>AdminDashboard/list_case_categories">Case Category</a>
            </li>
            <li>
                <a class="w3-bar-item w3-button" class="" href="<?php echo base_url(); ?>AdminDashboard/list_department ">Departments</a>
            </li>
            <li>
                <a class="w3-bar-item w3-button" class="" href="<?php echo base_url(); ?>AdminDashboard/list_court">Court</a>
            </li>
            <li>
                <a class="w3-bar-item w3-button" href="<?php echo base_url(); ?>AdminDashboard/list_decision_type">Decision Type</a>
            </li>
            <li>
                <a class="w3-bar-item w3-button" href="<?php echo base_url(); ?>AdminDashboard/list_case">Case</a>
            </li>
        </ul>

    </div>
<?php
}
?>

<!-- ////////////////////////Side Bar for IT staff    -->


<?php
if ($this->session->userdata('role') == 1 * 3) {
?>

    <div class="w3-sidebar bg-dark w3-bar-block" style="width:15%; margin-top:5%;">
        <ul>
            <br>
            <li>
                <a class="w3-bar-item w3-button" href="<?php echo base_url(); ?>AdminDashboard">Home </a>
            </li>
            <li>
                <a class="w3-bar-item w3-button" href="<?php echo base_url(); ?>AdminDashboard/search">Search</a>
            </li>
            <li>
                <a class="w3-bar-item w3-button" class="" href="<?php echo base_url(); ?>AdminDashboard/list_case">Case</a>
            </li>

        </ul>
    </div>
<?php
}
?>







<?php
if ($this->session->userdata('role') == 1 * 4) {
?>
    <div class="w3-sidebar bg-dark w3-bar-block" style="width:15%; margin-top:5%;">
        <ul>
            <br>
            <li>
                <a class="w3-bar-item w3-button" href="<?php echo base_url(); ?>AdminDashboard">Home </a>
            </li>
            <li>
                <a class="w3-bar-item w3-button" href="<?php echo base_url(); ?>AdminDashboard/search">Search</a>
            </li>
        </ul>
    </div>

<?php
}
?>