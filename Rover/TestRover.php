<?php
	
	define("__ROOT__", dirname(dirname(__FILE__)));
	require_once "Rover.php";
	require_once __ROOT__ . "/Plateau/Plateau.php";

	/**
	 * 
	 */
	class TestRover
	{

		private $test_pass;
		private $error_board = array();
		
		function __construct() {
			
			$this->test_pass = false;

			$this->test_pass = $this->test_move_out_of_bounds(); 

		}

		private function test_move_out_of_bounds():bool {

			try {

				$plateau = new Plateau(3, 3);
				$rover = new Rover([1, 0, "S"]);

				$rover->move("M", $plateau);
				
			} catch (Exception $e) {

				$this->error_board[] = $e->getMessage();
				
			}

			return true;

		}

		public function get_passable():bool {

			return $this->test_pass;

		}

	}

?>