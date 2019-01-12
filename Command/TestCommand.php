<?php

	define("__ROOT__", dirname(dirname(__FILE__)));
	require_once "Command.php";

	/**
	 * 
	 */
	class TestCommand
	{

		private $test_pass;
		private $error_board = array();
		
		public function __construct()
		{

			$this->test_pass = false;
			
			$this->test_pass = $this->test_strafe_direction_zero();

			$this->test_pass = false;

			$this->test_pass = $this->test_strafe_direction_random();
		
		}

		private function test_strafe_direction_zero():bool {

			try {

				$command_center = new Command();
				$command_center->strafe("L", [0, 0, "E"]);

			} catch (Exception $e) {

				$this->error_board[] = $e->getMessage();

			}

			return true;

		}

		private function test_strafe_direction_random():bool {

			try {

				$command_center = new Command();
				$command_center->strafe("Test", [1, 1, "Test"]);
				
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