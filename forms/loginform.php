<div class="container-login">
		<div class="login-row">
			<div class="col-4" id="LoginForm">
				<div id="login_page" class="login-page">
					<div class="form">
						<form id="register_form" class="register-form" method="POST" action="">
						<h3>reset</h3>
							<input type="text" placeholder="email address" name="Email" />
							<input id="btnReset" type="submit" class="btn" value="Reset" name="submit" />
							<p class="message">
								If your email is associated to an account registred to this site you will recieve instructions on how to reset your password.
								<br />
								<br />
								Know your password?
								<a href="#">Inloggen</a>
							</p>
						</form>
						<form id="login_form" action="" method="POST" class="login-form">
							<h3>Login</h3>
							<input name="Username" id="username" type="text" placeholder="username" />
							<input name="Password" id="password" type="Password" placeholder="password" />
							<input id="btnLg" type="submit" class="btn" value="Inloggen" name="submit" />
							<p class="message">
								Wachtwoord vergeten?
								<a href="#">Reset wachtwoord</a>
								<br />
								<a href="gemeente-login">Login gemeente</a>
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