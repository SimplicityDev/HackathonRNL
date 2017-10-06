<?php
	/**
	 * Object represents table 'users' 
	 */
	class Users extends DataManager{
		
		private $id;
		private $Username;
		private $FirstName;
		private $LastName;
		private $Password;
		private $Email;
		private $Logintoken;
		private $Level;
		private $Lastlogin;
		private $PasswordCheck;

		function __construct($pdo, $id = null) {
			$this->Class = $this;
			parent::__construct();
			if (!empty($id)) {
				$result = $this->Select(1);
				foreach ($result as $row ) {
					$this->id = $row['id'];
					$this->Username = $row['Username'];
					$this->FirstName = $row['FirstName'];
					$this->LastName = $row['LastName'];
					$this->Password = $row['Password'];
					$this->Email = $row['Email'];
					$this->Logintoken = $row['Logintoken'];
					$this->Level = $row['Level'];
					$this->Lastlogin = $row['Lastlogin'];
				}
			}
		}

		function Save() {
			if (empty($this->id)) {
				$this->Insert();
			}else {
				$this->Update();
			}
		}

		function Login() {
		// get user's hash
		$tempPass = $this->Password;
		$this->Password = null;
			$result = $this->Select(1,(array('Username', " = ", $this->Username)))[0];
			$this->id = $result['id'];
			$this->Level = $result['Level'];

			if (Password_verify($tempPass, $result['Password'])) {

				$this->Lastlogin = date("Y-m-d H:i:s"); 

				$this->Logintoken = hash('sha512', date('Y-m-d').$_SERVER['HTTP_USER_AGENT']);

				$_SESSION['UserID'] = $this->id;
				$_SESSION['Logintoken'] = $this->Logintoken;

				$this->GenerateCredentials();

				$this->Update();
				return true;
			}else{
				return false;
			}
		}

		function LoginCheck() 
		{
			if (isset($_SESSION['Logintoken'])) 
			{
				$this->Logintoken = $_SESSION['Logintoken'];
				$result = $this->Select(1, array('Logintoken','=',$this->Logintoken));
				if ($this->rowCount() == 1) 
				{	
					$timestamp = date('Y-m-d');
					$user_browser = $_SERVER['HTTP_USER_AGENT'];

					$Login_Check = hash('sha512', $timestamp.$user_browser);

					if ($Login_Check == $this->Logintoken){
						return true;
					}
					else {
						return false;
					}
				} else 
				return false;         
			} else 
			return false;
		}

		// Only use with new customer
		function GenerateCredentials() {
			$options = [
			'cost' => 12,
			];
			$this->Password = password_hash($this->Password, PASSWORD_BCRYPT, $options);

		}


		public function GetID()
		{
			return $this->id;
		}

		public function GetFirstName()
		{
			return $this->FirstName;
		}

		public function SetFirstName($FirstName)
		{
			if ($this->is_Char_Only($FirstName) && $this->is_minlength($FirstName, 2)) {
				$this->FirstName = $FirstName;
				return true;
			}else {
				return false;
			}
		}

		public function GetLastName()
		{
			return $this->LastName;
		}

		public function SetLastName($LastName)
		{
			if($this->is_Char_Only($LastName) && $this->is_minlength($LastName,2)) {
				$this->LastName = $LastName;
				return true;
			}else {
				return false;
			}
		}

		public function GetAdres()
		{
			return $this->Adres;
		}

		public function SetAdres($Adres)
		{
			$this->Adres = $Adres;
		}

		public function GetZipCode()
		{
			return $this->ZipCode;
		}

		public function SetZipCode($ZipCode)
		{	
			if ($this->is_NL_PostalCode($ZipCode)) {
				$this->ZipCode = $ZipCode;
				return true;
			}else {
				return false;
			}
		}

		public function GetCity() {
			return $this->City;
		}

		public function SetCity($City) {
			if ($this->is_Char_Only($City)) {
				$this->City = $City;
				return true;
			}else {
				return false;
			}
		}

		public function GetTelNr() {
			return $this->TelNr;
		}

		public function SetTelNr($TelNr) {
			if ($this->is_NL_Telnr($TelNr)) {
				$this->TelNr = $TelNr;
				return true;
			}else {
				return false;
			}
		}

		public function GetEmail() {
			return $this->Email;
		}

		public function SetEmail($Email) {
			if($this->is_Email($Email)) {
				$this->Email = $Email;
				return true;
			}else {
				return false;
			}
		}

		public function GetUsername() {
			return $this->Username;
		}

		public function SetUsername($Username) {
			if (!empty($Username)) {
				$this->Username = $Username;
				return true;
			}else {
				return false;
			}

			if($this->is_Username_Unique($Username)) {
				$this->Username = $Username;
				return true;
			}else {
				return false;	
			}
		}

		public function GetPassword() {
			return $this->Password;
		}

		public function SetPassword($Password) {
			if (!empty($Password)) {
				$this->Password = $Password;
				return true;
			}else {
				return false;
			}

			if ($this->is_minlength($Password, 6)) {
				$this->Password = $Password;
				return true;
			}else {
				return false;
			}
		}

		public function GetPasswordCheck() {
			return $this->PasswordCheck;
		}

		public function SetPasswordCheck($PasswordCheck) {
			if ($this->Password == $PasswordCheck) {
				$this->PasswordCheck = $PasswordCheck;
				return true;
			} else{
				return false;
			}
		}

		public function GetLevel()
		{
			return $this->Level;
		}

		public function SetLevel($Level)
		{
			$this->Level = $Level;
		}

		public function GetLastLogin() {
			return $this->Lastlogin;
		}
		/* END OF GETTERS AND SETTERS */

	}
?>
