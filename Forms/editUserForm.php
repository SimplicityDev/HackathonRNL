<div class="container">
	<?php $name = $editUser->__get("FirstName") ." ". $editUser->__get('LastName'); ?>
	<?php if ($page == "add-user") {
		echo "<h1>Add user</h1>";
	}elseif ($page == "edit-user") {
		echo "<h1>Editing user: ".$name."</h1>";
	} ?>
	<hr />
	<div class="on-half">
		<form action="" method="post" class="fieldset">
			<div class="row">
				<div class="six columns">
					<label for="FirstName">Name: </label>
					<input class="u-full-width" type="text" name="FirstName" placeholder="First name" id="FirstName" value="<?php echo $editUser->GetFirstName() ?>" />
				</div>
				<div class="six columns">
					<label for="LastName">Last name: </label>
					<input class="u-full-width" type="text" name="LastName" placeholder="Last name" value="<?php echo $editUser->GetLastName() ?>" />
				</div>
			</div>
			<div class="row">
				<div class="six columns">
					<label>Email: </label>
					<input class="u-full-width" type="email" name="Email" placeholder="example@provider.nl" value="<?php echo $editUser->GetEmail()?>" />
				</div>
				<div class="six columns">
					<label>Last logged in on: </label>
					<p><?php echo $editUser->GetLastLogin() ?></p>
				</div>
			</div>
			<div class="row">
				<div class="six columns">
					<label>Username: </label>
					<input class="u-full-width" type="text" name="Username" placeholder="Username" value="<?php echo $editUser->GetUsername() ?>" />
				</div>
				<div class="six columns">
					<label>Role: </label>
					<select name="role" class="u-full-width">
						<option selected disabled><b>Select a role</b></option>
						<option <?php if($editUser->GetLevel() == 999) {echo "selected";}?> value="999">Super-admin</option>
						<option <?php if($editUser->GetLevel() == 777) {echo "selected";}?> value="777">Admin</option>
						<option <?php if($editUser->GetLevel() == 555) {echo "selected";}?> value="555">Editor</option>
						<option <?php if($editUser->GetLevel() == 333) {echo "selected";}?> value="333">User</option>
						<option disabled>---------------------------------</option>
						<option <?php if($editUser->GetLevel() == 000) {echo "selected";}?> value="000"><b>Revoke</b></option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="columns eleven">
					<h5>Reset password</h5>
					<hr />
				</div>
			</div>
			<div class="row">
				<div class="six columns">
					<label>Current password: </label>
					<input class="u-full-width" type="password" name="Password" placeholder="current password" />
				</div>
				<div class="six columns">
					<label>New password: </label>
					<input class="u-full-width" type="password" name="RetypePassword" placeholder="new password" />
				</div>
			</div>
				<div class="row">
					<a href="password-forgotten">Forgot your password?</a>
				</div>
			<br />
			<div class="row">
				<div class="eleven columns">
					<div class="submit-buttons">
						<?php if ($page == "add-user"): ?>
							<input id="Submit" type="Submit" name="Submit" value="Add" class="button-primary form-button">
						<?php endif ?>
						<?php if ($page == "edit-user"): ?>
							<input id="Submit" type="Submit" name="Submit" value="Change" class="button-primary form-button">
						<?php endif ?>
						<a href="user-overview" class="button">Back</a>
					</div>
				</div>
			</div>	
		</form>
	</div>
</div>