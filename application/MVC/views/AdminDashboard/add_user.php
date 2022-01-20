<!-- Main Content -->
<div class="page-wrapper">
<div class="container-fluid">

<!-- Title -->
<div class="row heading-bg">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h5 class="txt-dark">Add User</h5>
</div>

<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
<li><a href="index.html">Dashboard</a></li>
<li><a  class="active"><span>Add user</span></a></li>
<!-- <li class="active"><span>form-layout</span></li> -->
</ol>
</div>
<!-- /Breadcrumb -->
<div class="col-md-3 col-md-offset-9">
<a href="<?php echo base_url().'AdminDashboard/list_user'; ?>">  <button class="btn btn-success btn-anim  btn-xs" style="float:right;">List users</button></a>
</div>
</div>
<!-- /Title -->					
<!-- Row -->
<div class="row">

<div class="col-md-12">
<div class="panel panel-default card-view">

<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="row ">

<div class="col-xl-12 container" >
<div class="form-wrap">
<form method="post" action="<?php echo base_url(); ?>AdminDashboard/add_users/" class="form-horizontal">
<div class="form-body form-center">								
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">Name</label>
<div class="col-md-6">
<input type="text" name="name" class="form-control" placeholder="">
<!-- <span class="help-block"> This is inline help </span>  -->
</div>
</div>
</div>
<!--/span-->
</div>
<!-- /Row -->
<div class="row">
<div class="col-md-12">
<div class="form-group ">
<label class="control-label col-md-3">Email</label>
<div class="col-md-6">
<input type="email" name="email" class="form-control" placeholder="">

</div>
</div>
</div>
<!--/span-->
</div>
<!-- /Row -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">Password</label>
<div class="col-md-6">
<input id="pswd" onkeyup="validatePassword()" type="password" name="password" class="form-control" placeholder="">
</div><span id = "message" style="color:red"></span>
</div>
</div>

<!--/span-->
</div>
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3"></label>
<div class="col-md-6">
<input type="checkbox" onclick="showpassword()"> Show Password
</div>
</div>

<!--/span-->
</div>

<!-- /Row -->
<div class="row">
<div class="col-md-12">
<div class="form-group ">
<label class="control-label col-md-3">Confirm Password</label>
<div class="col-md-6">
<input id="confirm_pswd" onkeyup="verifyPassword()" type="password" name="confirm_password" class="form-control" placeholder="">
</div><span id = "confirmmessage" style="color:red"></span> <br><br>
</div>
</div>
<!--/span-->
</div>
<!-- /Row -->




<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">Role</label>
<div class="col-md-6">
<select class="form-control" name="role_id">
<?php foreach ($list_role as $roleinfo){ ?>
<option value="<?= $roleinfo->id;?>"><?= $roleinfo->name;?></option>
<?php }?>
</select>
<!-- <span class="help-block">Select Role For User</span>  -->
</div>
</div>
</div>
<!--/span-->
</div>
<!-- /Row -->
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-3">Status</label>
<div class="col-md-6">
<select class="form-control" name="status">
<option value="">Active</option>
<option value="">In Active</option>
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
<label class="control-label col-md-3">Branch</label>
<div class="col-md-6">
<select class="form-control" name="branch_id" data-placeholder="Choose a Branch" tabindex="1">
<?php foreach ($list_branch as $branchinfo){ ?>
<option value="<?= $branchinfo->id;?>"><?= $branchinfo->title;?></option>
<?php }?>
</select>
</div>
</div>
</div>
<!--/span-->

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
<!-- <button type="reset" class="btn btn-success  mr-10">Reset</button>						 -->
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




<!-- /Main Content -->

<script>
function validatePassword() {  
  var pw = document.getElementById("pswd").value;  
  //check empty password field  
  if(pw == "") {  
     document.getElementById("message").innerHTML = "**Fill the password please!";  
     return false;  
  }  
   
 //minimum password length validation  
  else if(pw.length < 8) {  
     document.getElementById("message").innerHTML = "**Password length must be atleast 8 characters";  
     return false;  
  }  
  
//maximum length of password validation  
  else if(pw.length > 15) {  
     document.getElementById("message").innerHTML = "**Password length must not exceed 15 characters";  
     return false;  
  }
  else
  {
      document.getElementById("message").innerHTML = "";  
     return false;  
  }
}  

function verifyPassword() {  
  var pw = document.getElementById("pswd").value;  
  var cnfrm_pw = document.getElementById("confirm_pswd").value; 
  //check empty password field  
  if(pw != cnfrm_pw) {  
     document.getElementById("confirmmessage").innerHTML = "*Password Do not Match!";  
     return false;  
  }  
  else
  {
      document.getElementById("confirmmessage").innerHTML = "";  
     return false;  
  }
} 


function showpassword() {
  var x = document.getElementById("pswd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>  
  