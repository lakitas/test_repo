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
		
		$this->width = $width;
		$this->height = $height;

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