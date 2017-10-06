<?php 
$id = isset($_GET['id']) ? $_GET['id'] : null;
$project = new Projects($DBM->GetPDO(), $id);

$template = new Template($DBM->GetPDO());

if (isset($_POST['submit'])) {
	$CheckOnErr = false;
	$Alert = array();
	switch ($_POST['submit']) {
		case 'Back':
			header("location:javascript://history.go(-1)");
		break;
		case 'Add':
		case 'Change':
			if (!SetTitle($_POST['Title'])) {
				array_push($Alert, 'Error');
				array_push($Alert, 'You must enter a title for the project');

				$CheckOnErr = true;
			}
			if (SetName($_POST['Name'])) {
				array_push($Alert, 'Error');
				array_push($Alert, 'You must enter a title for the project');

				$CheckOnErr = true;
			}
			if (SetDesc($_POST['Desc'])) {
				array_push($Alert, 'Error');
				array_push($Alert, 'You must enter a title for the project');

				$CheckOnErr = true;
			}
			if (SetHeaderImg($_POST['HeaderImg'])) {
				array_push($Alert, 'Error');
				array_push($Alert, "You must use a valid image, the image can't be lager than 2mb and must be one in of the following formats: <br /> <b>.png .jpg .jpeg .gif</b> ");

				$CheckOnErr = true;
			}
			if (SetEmployer($_POST['Employer'])) {
				array_push($Alert, 'Error');
				array_push($Alert, 'You must enter an employer for your project');

				$CheckOnErr = true;
			}

			if ($CheckOnErr) {
				require 'Forms/ProjectForm.php';
			}else {
				array_push($Alert, 'Success');
				array_push($Alert, 'Succesfully processed project <b>'.$project->__get('name').'</b>');
				$project->Save();
			}
			break;
		case 'Del':
			array_push($Alert, 'Success');
			array_push($Alert, 'Succesfully deleted project <b>'.$project->__get('name').'</b>');

			$project->Delete();
			break;
	}

}else {
	require 'Forms/ProjectForm.php';
}

?>