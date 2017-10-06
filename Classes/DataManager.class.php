<?php 
class DataManager extends DatabaseManager
{

	protected $Class;

	function __construct()
	{
		parent::__construct();
	}

	function is_email($Invoer)
	{
		return (bool)(preg_match("^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$^",$Invoer));
	}

	function is_minlength($Invoer, $MinLengte)
	{
		return (strlen($Invoer) >= (int)$MinLengte);
	}

	function is_NL_PostalCode($Invoer)
	{
		return (bool)(preg_match('#^[1-9][0-9]{3}\h*[A-Z]{2}$#i', $Invoer));
	}

	function is_NL_Telnr($Invoer)
	{
		return (bool)(preg_match('#^0[1-9][0-9]{0,2}-?[1-9][0-9]{5,7}$#', $Invoer) 
			&& (strlen(str_replace(array('-', ' '), '', $Invoer)) == 10));
	}

	function is_Char_Only($Invoer)
	{
		return (bool)(preg_match("/^[a-zA-Z ]*$/", $Invoer)) ;
	}

	function is_Username_Unique($Invoer)
	{
		$this->getAllFromTable('users', array(array('Inlognaam', '=', $Invoer)));

		if ($this->rowCount() == 1) 
			return false;
		else
			return true;
	}

	function Insert() {
		$data = $this->GetClassDataFromReflection();

		$this->InsertIntoTable($data[0],$data[1]);
	}

	function Update() {
		$data = $this->GetClassDataFromReflection();
		$Conditions = reset($data[1]);

		$this->updateAllFromTable($data[0],$data[1], array($Conditions));
	}
	function Select($Assoc = null, $Conditions = null) {
		$data = $this->GetClassDataFromReflection();
		if (!empty($Conditions)) {
			$Conditions = array($Conditions);
		}		

		return $this->getAllFromTable($data[0], $data[1], $Conditions, NULL, $Assoc);
	}

	function Delete() {
		$data = $this->GetClassDataFromReflection();

		echo $select_id = max($data[1]);

		$this->InsertIntoTable($data[0],$select_id);
	}


	/**
	* REFLECTION TEST INSTANCE
	**/

	function GetClassDataFromReflection() {
		$ClassName = get_class($this->Class);

		$reflection = new ReflectionClass($this->Class);
		$reflection->getMethods();
		$properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED | ReflectionProperty::IS_PRIVATE);
		foreach ($properties as $property ) {
			if ($property->class === $ClassName) {
				$prop = $reflection->getproperty($property->name);
				$prop->setAccessible(true);
				$propValue = $prop->getValue($this->Class);
				//var_dump($$reflection);
				if (sizeof($propValue) >= 2) {
					if ($propValue != null) {
						$propValue = $this->array_flatten($propValue);
						foreach ($propValue as $key => $value) {
							$Conditions[] = array($key ,'=', $value);;
						}
					}else {
						$Conditions[] = null;
					}
				}else{
					// single variable
					if ($propValue != null) {
						$Conditions[] = array($property->name, '=', $propValue);
					}else {
						$Conditions[] = null;
					}
				}
			}
		}

		$Conditions = array_filter($Conditions, function($var){return !is_null($var);} );
		$Conditions = array_values($Conditions);

		return $result = array($ClassName, $Conditions);
	}

	function array_flatten($array) { 
		if (!is_array($array)) { 
			return false; 
		} 
		$result = array(); 
		foreach ($array as $key => $value) { 
			if (is_array($value)) { 
				$result = array_merge($result, $this->array_flatten($value)); 
			} 
			else { 
				$result[$key] = $value; 
			} 
		} 
		return $result; 
	} 
}

?>