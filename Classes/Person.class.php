<?php
	/**
	 * Object represents table 'users' 
	 */
	class Person extends DataManager{
		
		private $Id;
		private $FirstName;
		private $LastName;
		private $Sofi;
		private $Adress;
		private $Organisation;
		private $Password;
		private $Postalcode;
		private $Logintoken;

		function __construct($pdo, $id = null) {
			$this->Class = $this;
			parent::__construct();
			if (!empty($id)) {
				$result = $this->Select(1);
				foreach ($result as $row ) {
					$this->Id = $row['Id'];
					$this->Name = $row['Name'];
					$this->Sofi = $row['Sofi'];
					$this->Adress = $row['Adress'];
					$this->Organisation = $row['Organisation'];
					$this->Password = $row['Password'];
					$this->Postalcode = $row['Postalcode'];
					$this->Logintoken = $row['Logintoken'];
					
				}
			}
		}

		function Save() {
			if (empty($this->Id)) {
				$this->Insert();
			}else {
				$this->Update();
			}
		}

		public function GetID()
		{
			return $this->Id;
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
			return $this->Adress;
		}

		public function SetAdres($Adress)
		{
			$this->Adress = $Adress;
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

		public function GetPhone() {
			return $this->Phone;
		}

		public function SetPhone($Phone) {
			if ($this->is_NL_Telnr($Phone)) {
				$this->Phone = $Phone;
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
		/* END OF GETTERS AND SETTERS */

	}
	?>
