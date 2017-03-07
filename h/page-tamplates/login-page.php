<?php
/*
Template Name: login From
Template Post Type: post, page
*/
ob_start();
?>
<?php get_header(); ?>
<?php 
	if(is_user_logged_in()):
		wp_redirect(home_url().'/account');		
		return;	
	endif;
?>

<!--contact-->
<div class="login-right">
	<div class="container">
		<h3>Login</h3>
		<div class="login-top">
				<ul class="login-icons">
					<li><a href="#" ><i class="facebook"> </i><span>Facebook</span></a></li>
					<li><a href="#" class="twit"><i class="twitter"></i><span>Twitter</span></a></li>
					<li><a href="#" class="go"><i class="google"></i><span>Google +</span></a></li>
					<li><a href="#" class="in"><i class="linkedin"></i><span>Linkedin</span></a></li>
					<div class="clearfix"> </div>
				</ul>
				<div class="form-info">
					<form id='login_form_hv' name='login_form_hv' method='post'>
						<input type="text" class="text" placeholder="user name or Email id" required="" name='usernameoremail'>
						<input type="password"  placeholder="Password" required="" name='userpassword'>
						 <label class="hvr-sweep-to-right">
				           	<input type="submit" value="Login">
				           </label>
					</form>
				</div>
				<div class="form-info">
					<div id='loginnotices'></div>
				</div>
			<div class="create">
				<h4>New To Real Home?</h4>
				<a class="hvr-sweep-to-right" href="register.html">Create an Account</a>
				<div class="clearfix"> </div>
			</div>
	</div>
</div>
</div>
<!--//contact-->



<?php get_footer(); ?>