<?php 
$id = isset($_GET['id']) ? $_GET['id'] : null;

$editUser = new Users($DBM->GetPDO(),$id);
$CheckOnErr = false;

if (isset($_POST['Submit'])) {

	$submit = $_POST['Submit'];
	$role = $_POST['role'];
	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$Email = $_POST['Email'];
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	$RetypePassword = $_POST['RetypePassword'];

	echo "ballz";
	$editConditions = array('Change', 'Add');

	if (isset($editConditions[$submit])) { 	
		if (!$editUser->SetLevel($role)) {
			array_push($Alert, 'Error');
			array_push($Alert, 'User must have a valid role');

			$CheckOnErr = true;
		}
		if (!$editUser->SetFirstName($FirstName)) {
			array_push($Alert, 'Error');
			array_push($Alert, 'You do have a name right?');

			$CheckOnErr = true;
		}
		if (!$editUser->SetLastName($LastName)) {
			array_push($Alert, 'Error');
			array_push($Alert, "Enter the user's last name");

			$CheckOnErr = true;

		}
		if (!$editUser->SetEmail($Email)) {
			array_push($Alert, 'Error');
			array_push($Alert, 'Emailadress invalid');

			$CheckOnErr = true;

		}
		if (!$editUser->SetUsername($Username)) {
			array_push($Alert, 'Error');
			array_push($Alert, 'Invalid username, please enter another one');

			$CheckOnErr = true;
		}
		if (!$editUser->SetPassword($Password)) {
			array_push($Alert, 'Error');
			array_push($Alert,'Invalid password');	

			$CheckOnErr = true;
		}
		if (!$editUser->setRetypePassword($RetypePassword)) {
			array_push($Alert, 'Error');
			array_push($Alert, "The passwords don't match");

			$CheckOnErr = true;
		}
		if ($CheckOnErr) {
			require 'Forms/editUserForm.php';
		}else{
			$editUser->save();
			unset($editUser->data['RetypePassword']);
			unset($editUser->data['Logintoken']);
			unset($editUser->data['Lastlogin']);
			array_push($Alert, 'Success');
			array_push($Alert, 'Userdata saved succesfully');
			require 'Forms/editUserForm.php';

		}

	}elseif ($submit == 'Delete') {
		?>
		<div class="container">
			<div class="row">
				<div class="onhalf">
					<h3>Are you sure you want to delete <?php $editUser->GetFirstName(); ?></h3>
					<hr />

					<form action="" method="post">
						<input type="submit" name="submit" value="Yes" />
						<input type="submit" name="submit" value="No" />
					</form>
				</div>	
			</div>
		</div>
		<?php
		switch ($_POST['submit']) {
			case 'Yes':
			$editUser->Delete();

			array_push($Alert, 'Success');
			array_push($Alert, 'User deleted');
			break;
			case 'No':
			array_push($Alert, 'User not deleted');
			array_push($Alert, 'Success');

			RedirectToPage(1.5,'user-overview');
		}
	}
}else{
	require 'Forms/editUserForm.php';
}

?>