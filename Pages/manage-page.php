<?php 
$id = isset($_GET['id']) ? $_GET['id'] : null;
$template = new Template($DBM->GetPDO());

$Alert = array();
$Form = null;

if (strpos($page,'project')) {
	$Form = 'Forms/ProjectForm.php';
	$class = new Projects($DBM->GetPDO(), $id);
}elseif (strpos($page,'blogpost')) {
	$Form = 'Forms/BlogpostForm.php';
	$class = new Blogposts($DBM->GetPDO(), $id);
}elseif (strpos($page,'page')) {
	$Form = 'Forms/PageForm.php';
	$class = new Sitepage($DBM->GetPDO(), $id);
}else{
	$Form = 'pages/404.php';
	array_push($Alert, 'Error');
	array_push($Alert, 'You have managed to screw up the page indexing...good job mate');
}


if (isset($_POST['submit'])) {
	$CheckOnErr = false;
	$Alert = array();
	switch ($_POST['submit']) {
		case 'Back':
		header("location:javascript://history.go(-1)");
		break;
		case 'Add':
		case 'Change':
		if (!$class->SetTitle($_POST['Title'])) {
			array_push($Alert, 'Error');
			array_push($Alert, 'You must enter a title');

			$CheckOnErr = true;
		}
		if (!$class->SetTitle($_POST['Name'])) {
			array_push($Alert, 'Error');
			array_push($Alert, 'You must enter a name');

			$CheckOnErr = true;
		}
		if (!$class->SetDesc($_POST['Desc'])) {
			array_push($Alert, 'Error');
			array_push($Alert, 'You must enter a description');

			$CheckOnErr = true;
		}
		if (!$class->SetHeaderImg($_POST['HeaderImg'])) {
			array_push($Alert, 'Error');
			array_push($Alert, "You must use a valid image, the image can't be lager than 2mb and must be one in of the following formats: <br /> <b>.png .jpg .jpeg .gif</b> ");

			$CheckOnErr = true;
		}
		if (strpos($page, 'project')) {
			if (!$class->SetEmployer($_POST['Employer'])) {
				array_push($Alert, 'Error');
				array_push($Alert, 'You must enter an employer');

				$CheckOnErr = true;
			}
		}

		if ($template->id != null) {
			if (!$template->verifyFile()) {
				array_push($Alert, 'Error');
				array_push($Alert, 'The file uploaded was not a template file');
			}else {
					// try selecting template from folder AND from database
				if (!$template->SelectTemplate($_POST['template'])) {
					// if template isn't found in database or in the folder
					if ($template->Upload()) {
						// if all other checks are a go try uploading the file 
					}
				}
			}

		}else{
			// select defoult template
		}

		// if at any point, errors are catched, display the form
		if ($CheckOnErr) {
			require $Form;
		}else { 
			// save data to database (look into storing data into different tables)
			array_push($Alert, 'Success');
			array_push($Alert, 'Succesfully saved <b>'.$class->GetTitle().'</b>');
			$class->Save();
		}
		break;
		case 'Del':
		array_push($Alert, 'Success');
		array_push($Alert, 'Succesfully deleted <b>'.$class->GetTitle().'</b>');
		$class->Delete();
		break;
	}

}else {
	require $Form;
}

?>