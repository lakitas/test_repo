<?php

/**
 * 
 */
class Plateau
{

	private $width;
	private $height;
	
	function __construct(int $width, int $height)
	{

		$valid = $this->valid_bounds($width, $height);

		if ($valid["valid"]) {
			
			$this->width = $width;
			$this->height = $height;
		
		} else {

			throw new Exception($valid["msg"]);

		}

	}

	/*
	*
	*/
	private function valid_bounds(int $width, int $height): array
	{

		$error = array(
			"valid" => true,
			"msg" => ""
		);
	
		if (!is_numeric($width) || !is_numeric($height)) {
			
			$error["valid"] = false;
			$error["msg"] = "Wrong type for either width or height.";

		}elseif ($width < 0 || $height < 0) {
			
			$error["valid"] = false;
			$error["msg"] = "Wrong values for either width or height.";
		
		}

		return $error;

	}

	/**
	*
	*/
	public function check_boundaries($new_coordinates=array()): bool {

		foreach ($new_coordinates as $index => $value) {
				
			if ($value > $this->width) {
				return false;
			} elseif ($value > $this->height) {
				return false;
			} elseif ($value < 0) {
				return false;
			}

		}

		return true;

	}

}

?>