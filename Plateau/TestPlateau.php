<?php

require_once "Plateau.php";

/**
 * 
 */
class TestPlateau
{
	
	private $pass_test;

	public function __construct() {

		$this->pass_test = true;

		$pass_test = $this->test_non_numeric();
		$pass_test = $this->test_out_of_bounds();

	}

	private function test_out_of_bounds():bool {
		
		$plateau = new Plateau(-1, -2);

		return true;

	}

	private function test_non_numeric():bool {

		try {

			$plateau = new Plateau("test", "test");

			return true;
			
		} catch (Exception $e) {

			return true;
			
		}

	}

}

?>