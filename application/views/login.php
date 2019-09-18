
<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


	<!-- Custom Theme files -->
	<link href="<?=base_url()?>css/style13.css" rel="stylesheet" type="text/css" media="all" />
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- //Custom Theme files -->

	<!-- web font -->
	<link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
	<!-- //web font -->


	<style>
p{
	width:100%;
}
	</style>


</head>


<body>

<!-- main -->
<div class="w3layouts-main"> 
	<div class="bg-layer">
		<h1><b>IndiaSmart<span style="color:#f16224">Hub</span></b></h1>
		<!---728x90--->

		<div class="header-main" style="background: #f16224;">
			<div class="main-icon">
				<!--<span class="fa fa-eercast"></span>-->
				<img src="<?=base_url()?>images/ish-white-100x100-1.png" style="">
				<br>
				<br>
			</div>
			
			<div class="header-left-bottom">
				<form method="post" action="<?=base_url()?>dashboard">
					<center><span style="color:#000000;font-size: 24px;font-weight: bold;"><?=$this->session->flashdata('Error');?></span></center>
					
					<div style="width:100%;">
						<b><?=form_error('email')?></b>
						
					</div>
					
					<div class="icon1">

						<span class="fa fa-user"></span>
						<input type="email" name="email" placeholder="yourname@yourmail.com"/>

					</div>

					<div style="width:100%;">
						<b><?=form_error('pass')?></b>
					</div>

					
					<div class="icon1">
						<span class="fa fa-lock"></span>
						<input type="password" name="pass" placeholder="Enter your password"/>
						
					</div>
					
					<div class="login-check">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i> Keep me logged in</label>
					</div>
					<div class="bottom">
					<button class="btn" style="background:#190d08;" type="submit"
					name="submit">Log In</button>
					</div>
				</form>	
			</div>
			
		</div>
		<!---728x90--->

	
	</div>
</div>	
<!-- //main -->

</body>

</html>