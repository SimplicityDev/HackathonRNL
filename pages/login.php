<?php 
if (isset($_POST['submit'])) {
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];

	$DBM->query('SELECT * FROM Person WHERE Username = :Username');

	$DBM->bind(':Username', $Username);
	$Userdata = array();

	$result = $DBM->resultset()[0];
	var_dump($result);
	if ($result != null) {
		foreach ($result as $row => $value) {
			$Userdata[$row] = $value;
		}
		$_SESSION['Userdata'] = $Userdata;
		RedirectToPage(null,'dashboard');
		require 'forms/loginform.php';	

	}else{
		require 'forms/loginform.php';	
	}


}else{
	require 'forms/loginform.php';
}
 ?>