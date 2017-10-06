<?php
	/**
	 * Object represents table 'projects'
	 */
	class Projects extends DatabaseManager{
		
		private $id;
		private $title;
		private $createdOn;
		private $desc;
		private $headerImage;
		private $employer;
		private $sitepagesId;

		private $data;

		function __construct($pdo, $id = null){
			$this->Class = $this;

			parent::__construct();

			if (!empty($id)) {
				$result = $this->Select(1, array('id', '=' ,$id));
				foreach ($result as $row) {
					$this->data[key($row)] = $row[key($row)];
				}
			}
		}

		function GetAll() {
			return $this->GetAllFromTable('projects');
		}

		function SetTitle($Title) {
			if (!empty($Title)) {
				$this->title = $Title;
				return true;
			}else{
				return false;
			}
		}

		function SetDesc($desc) {
			if (!$this->is_minlength($desc, 2)) {
				return true;
			}else{
				return false;
			}
		}

		function SetHeaderImg($headerImg) {
			if (!$this->validateImage($headerImg)) {
				return true;
			}else{
				return false;
			}
		}

		function Save() {
			if (!isset($this->data['id'])) {
				$this->Insert();
			}else {
				$this->Update();
			}
		}
	}
?>