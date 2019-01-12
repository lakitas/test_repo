<?php

require_once "Plateau.php";

/**
 * 
 */
class TestPlateau
{
	
	private $pass_test;
	private $error_board = array();

	public function __construct() {

		$this->pass_test = true;

		$pass_test = $this->test_out_of_bounds();

	}

	private function test_out_of_bounds():bool {
		
		try {

			$plateau = new Plateau(-1, -2);
			
		} catch (Exception $e) {

			$this->error_board[] = $e->getMessage();
			
		}

		return true;

	}

	public function get_passable():bool {

		return $this->pass_test;

	}

}

?>