<?php

$value1 = rand(1,10);
$value2 = rand(1,10);

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title></title>
<meta name="description" content="Flintstone is a Dashboard & Admin Site Responsive Template by hencework." />
<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Flintstone Admin, Flintstoneadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
<meta name="author" content="hencework"/>

<!-- Favicon -->
<link rel="shortcut icon" href="favicon.ico">
<link rel="icon" href="<?php echo base_url();?>public/favicon.ico" type="image/x-icon">

<!-- vector map CSS -->
<link href="<?php echo base_url();?>public/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>



<!-- Custom CSS -->
<link href="<?php echo base_url();?>public/dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body onload="document.form1.email.focus();">
<!--Preloader-->
<div class="preloader-it">
<div class="la-anim-1"></div>
</div>
<!--/Preloader-->


<!-- Main Content -->
<div class="page-wrapper pa-0 ma-0 auth-page ">





<div class="">
<!-- Row -->
<div class="table-struct full-width full-height">
<div class="" style="margin-top:2%;">
<div class="auth-form  ml-auto mr-auto">
<div class="row">
<div class="col-sm-12 col-xs-12">
<div class="text-center">
<p align="center">    
<img class="img-responsive" src="<?php echo base_url();?>public/images/logo.jpg" alt="brand"/>
</p>                                        
</div>	

<h5 class="text-center txt-dark mb-10">Advocate General Office Khyber Pakhtunkhwa, Peshawar</5>
<h6 class="text-center nonecase-font txt-grey">Admin Log In</h6>




<p id="formstatus" style="color:#f00;"></p>
	
<div class="form-wrap">
<form method="POST" action="<?php echo $action ?>" name='form1' onsubmit='return formValidation();'>
<div class="form-group">
<label class="control-label mb-10" for="exampleInputEmail_2">Email address</label>
<input type="text" name="email" id="email" class="form-control" placeholder="Email">
</div>
<div class="form-group">
<label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>					
<div class="clearfix"></div>
<input type="password" name="password" id="password" class="form-control" placeholder="Password">
</div>



<table width="463">

<tr>
<td width="55">Sum of</td>
<td width="90"><input type="text" name="value1" id="value1" value="<?php echo $value1;?>" class="form-control" readonly style="width:90px;">
</td>
<td width="38">and</td>

<td width="90"><input type="text" name="value2" id="value2" value="<?php echo $value2;?>" class="form-control" readonly style="width:90px;"></td>

<td width="16">=</td>

<input type="hidden" name="sumvalue" id="sumvalue" value="<?php echo $value1+$value2;?>">

<td width="146"><input type="number" name="totalsum" id="totalsum" class="form-control" style="width:90px;"></td>

</tr>

</table>


<br>
<br>




<div class="form-group text-center">
<button type="submit" class="btn btn-info btn-success btn-rounded">Sign in</button>
<button type="reset" class="btn btn-info btn-success btn-rounded">Reset</button>
</div>
</form>
</div>
</div>	
</div>
</div>
</div>
</div>
<!-- /Row -->	
</div>

</div>
<!-- /Main Content -->

<!-- /#wrapper -->

<!-- JavaScript -->

<!-- jQuery -->
<script src="<?php echo base_url();?>public/vendors/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>public/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>public/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

<!-- Slimscroll JavaScript -->
<script src="<?php echo base_url();?>public/dist/js/jquery.slimscroll.js"></script>

<!-- Init JavaScript -->
<script src="<?php echo base_url();?>public/dist/js/init.js"></script>
</body>
</html>


<script type='text/javascript'>
function formValidation()
{
	
	
var email = $('#email').val();
var password = $('#password').val();

var value1 = $('#value1').val();
var value2 = $('#value2').val();
var sumvalue = $('#sumvalue').val();
var totalsum = $('#totalsum').val();

var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

if(email == "")
{
var text = "Please Enter Email Address";
document.getElementById("formstatus").innerHTML = text;
return false;	
}
else if (!email.match(mailformat)) 
{
var text = "Please Enter Valid Email Address";
document.getElementById("formstatus").innerHTML = text;
return false;
}
else if(password == "")
{
var text = "Please Enter Password";
document.getElementById("formstatus").innerHTML = text;
return false;
}
else if(sumvalue != totalsum)
{
var text = "Invalid Sum Value.";
document.getElementById("formstatus").innerHTML = text;
return false;		
}
else
{	
return true;	
}

}

</script>





