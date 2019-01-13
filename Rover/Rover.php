<?php

	define("__ROOT__", dirname(dirname(__FILE__)));
	require_once __ROOT__ . "/Plateau/Plateau.php";

	/**
	*
	*/
	class Rover {

		private $coordinates = array();

		public function __construct($coordinates=array()) {

			$this->coordinates = $coordinates;

		}

		public function get_coordinates(): array{

			return $this->coordinates;

		}

		/**
		* 
		*/
		public function move(string $movement="", Plateau $plateau) {
		
			require_once __ROOT__ . "/Command/Command.php";

			$command_center = new Command();

			switch($movement) {
				case "L":

				case "R":

					$this->coordinates[2] = $command_center->strafe($movement, $this->coordinates);
					break;

				case "M":

					$new_coordinates = $command_center->take_a_step($this->coordinates);
					
					if ($plateau->check_boundaries($new_coordinates)) {
						
						$this->coordinates = $new_coordinates;
					
					} else {

						throw new Exception("Error taking a step");
						
					}
					break;

				default:
					throw new Exception("Not a valid moveset.");
					break;
			}

		}

		/*
		*
		*/
		public function pretty_print() {

			echo implode(" ", $this->coordinates);
			echo "\xA<br>";

		}

	}

?>