<!DOCTYPE html>
<html>
<head>
    <title> الحي المتعلم </title>

   
   <?php include("head.php");?>


    <meta charset="UTF-8">
    <style>
    body{
	margin:0;
	color:http://localhost/;
	background:#c8c8c8;
	font:600 16px/18px 'Open Sans',sans-serif;
}
*,:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}

.login-wrap{
	width:100%;
	margin:auto;
	max-width:925px;
	min-height:1000px;
	position:relative;
 	box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
}
.login-html{
	width:100%;
	height:100%;
	position:absolute;
	padding:90px 70px 50px 70px;
	background:#343a40;
}
.login-html .sign-in-htm,
.login-html .sign-up-htm{
	top:0;
	left:0;
	right:0;
	bottom:0;
	position:absolute;
	transform:rotateY(180deg);
	backface-visibility:hidden;
	transition:all .4s linear;
}
.login-html .sign-in,
.login-html .sign-up,
.login-form .group .check{
	display:none;
}
.login-html .tab,
.login-form .group .label,
.login-form .group .button{
	text-transform:uppercase;
}
.login-html .tab{
	font-size:22px;
	margin-right:15px;
	padding-bottom:5px;
	margin:0 15px 10px 0;
	display:inline-block;
	border-bottom:2px solid transparent;
}
.login-html .sign-in:checked + .tab,
.login-html .sign-up:checked + .tab{
	color:#fff;
	border-color:#1161ee;
}
.login-form{
	min-height:345px;
	position:relative;
	perspective:1000px;
	transform-style:preserve-3d;
}
.login-form .group{
	margin-bottom:15px;
}
.login-form .group .label,
.login-form .group .input,
.login-form .group .button{
	width:100%;
	color:#fff;
	display:block;
}
.login-form .group .input,
.login-form .group .button{
	border:none;
	padding:15px 20px;
	border-radius:25px;
	background:#212529;
}
.login-form .group input[data-type="password"]{
	text-security:circle;
	-webkit-text-security:circle;
}
.login-form .group .label{
	color:#aaa;
	font-size:12px;
}
.login-form .group .button{
	background:#6c757d;
}
.login-form .group label .icon{
	width:15px;
	height:15px;
	border-radius:2px;
	position:relative;
	display:inline-block;
	background:rgba(255,255,255,.1);
}
.login-form .group label .icon:before,
.login-form .group label .icon:after{
	content:'';
	width:10px;
	height:2px;
	background:#fff;
	position:absolute;
	transition:all .2s ease-in-out 0s;
}
.login-form .group label .icon:before{
	left:3px;
	width:5px;
	bottom:6px;
	transform:scale(0) rotate(0);
}
.login-form .group label .icon:after{
	top:6px;
	right:0;
	transform:scale(0) rotate(0);
}
.login-form .group .check:checked + label{
	color:#fff;
}
.login-form .group .check:checked + label .icon{
	background:#1161ee;
}
.login-form .group .check:checked + label .icon:before{
	transform:scale(1) rotate(45deg);
}
.login-form .group .check:checked + label .icon:after{
	transform:scale(1) rotate(-45deg);
}
.login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{
	transform:rotate(0);
}
.login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
	transform:rotate(0);
}

.hr{
	height:2px;
	margin:60px 0 50px 0;
	background:#212529;
}
.foot-lnk{
	text-align:center;
}
    </style>
</head>
<body>
    <?php include("header.php");?>

       <?php
if(isset($_POST["u_id_number"])){
    
include("conn.php");
  
  $pass = password_hash($_POST["password"], PASSWORD_BCRYPT);
    
     mysqli_query($conn,"INSERT INTO users (u_fullname,id_number,u_mobile,u_email,u_neighborhood,u_education) VALUES ('$_POST[name]','$_POST[u_id_number]','$_POST[number]','$_POST[email]','$_POST[NB]','$_POST[education]')");
    
}

?>
    
    
    
    
    <br><br><br><br><br><br><br>
    <div class="container">
        <div class="card">
            <div class="card-body">
    
    
    
    
    
    
    
    <form method="post">
    
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked=""><label for="tab-1" class="tab"> دخول </label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"> تسجيل </label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
                    
					<label for="user" class="label"> رقم الهويه </label>
					<input id="user" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">  كلمة المرور </label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked="">
					<label for="check"><span class="icon"></span> تذكرني </label>
				</div>
				<div class="group">
					<input type="submit" class="button" value=" دخول ">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot"> هل نسيت كلمة المرور؟ </a>
				</div>
			</div>
			<div class="sign-up-htm">
                
                            <div class="group">
					<label for="user" class="label">االأسم كامل</label>
					<input id="user" name="name" type="text" class="input">
				</div>
                 <div class="group">
					<label for="user" class="label"> السجل المدني </label>
					<input id="user" name="id_number" type="text" class="input">
				</div>

			  <div class="group">
					<label for="user" class="label"> رقم الجوال </label>
					<input id="user" name="number" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">  كلمة المرور </label>
					<input id="pass" name="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label"> تأكيد كلمة المرور </label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">  البريد الإلكتروني </label>
					<input id="pass" name="email" type="text" class="input">
				</div>
                <div class="group">
					<label for="user" class="label"> الحي </label>
					<input id="user" name="NB" type="text" class="input">
				</div>
                <div class="group">
					<label for="user" class="label"> المؤهل </label>
					<input id="user" name="education" type="text" class="input">
				</div>
              
				<div class="group">
					<input type="submit" class="button" value=" تسجيل ">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">مسجل مسبقا؟ سجل دخولك من هنا 
				</label></div>
			</div>
		</div>
	</div>
</div>
        </form>
</div>
		</div>
	</div>
    
    
</body>
</html>
