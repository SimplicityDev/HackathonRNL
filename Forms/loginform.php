<div class="container-login">
		<div class="login-row">
			<div class="col-4" id="LoginForm">
				<?php 
				if (isset($Alert)) { 
				        Alert($Alert); 
				    }
				 ?>
				<div id="login_page" class="login-page">
					<div class="form">
						<form id="register_form" class="register-form" method="POST" action="">
						<h3>Reset</h3>
							<input type="text" placeholder="email address" name="Email" />
							<input id="btnReset" type="submit" class="btn" value="Reset" name="submit" />
							<p class="message">
								If your email is associated to an account registred to this site you will recieve instructions on how to reset your password.
								<br />
								<br />
								Know your password?
								<a href="#">Sign In</a>
							</p>
						</form>
						<form id="login_form" action="dashboard.php" method="POST" class="login-form">
							<h3>Login</h3>
							<input name="Username" id="username" type="text" placeholder="username" />
							<input name="Password" id="password" type="Password" placeholder="password" />
							<input id="btnLg" type="submit" class="btn" value="Sign in" name="submit" />
							<p class="message">
								Forgot password?
								<a href="#">Request reset</a>
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
</div>

<script>
	$('.message a').click(function() {
		$('form').animate({
			height: "toggle",
			opacity: "toggle"
		}, "slow");
	});
</script>