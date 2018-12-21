<?php

	/**
	*
	*/
	class Rover {

		const COMPASS = array("N", "E", "S", "W");
		var $coordinates = array();
		var $height_bound;
		var $width_bound;

		public function __construct($coordinates=array(), $height_bound=0, $width_bound=0) {

			$this->coordinates = $coordinates;
			$this->height_bound = $height_bound;
			$this->width_bound = $width_bound;

		}

		public function get_coordinates() {

			return $this->coordinates;

		}

		private function set_coordinates($coordinates=array()) {

			$this->coordinates = $coordinates;

		}

		/**
		* 
		*/
		public function move($movement="") {

			switch($movement) {
				case "L":

				case "R":

					$this->strafe($movement);
					break;

				case "M":

					$this->take_a_step();
					break;

				default:
					//echo "Movement {$movement} is not a valid moveset. Please try another.\xA";
					break;
			}

		}

		/**
		*
		*/
		private function strafe($direction="") {

			$current_index = array_search(trim($this->coordinates[2]), self::COMPASS);

			$new_index = -1;

			if ($direction === "R") {
				if ($current_index === 3) {

					$new_index = 0;

				} else {

					$new_index = $current_index + 1;

				}

			} elseif ($direction === "L") {
				
				if ($current_index === 0) {
					
					$new_index = 3;

				} else {

					$new_index = $current_index - 1;

				}

			}

			$this->coordinates[2] = self::COMPASS[$new_index];

		}

		/**
		*
		*/
		private function take_a_step() {

			$new_coordinates = $this->coordinates;
			
			switch (trim($new_coordinates[2])) {
				case "N":
					$new_coordinates[1]++;
					break;

				case "E":
					$new_coordinates[0]++;
					break;

				case "S":
					$new_coordinates[1]--;
					break;

				case "W":
					$new_coordinates[0]--;
					break;
				
				default:
					break;
			}

			$this->check_boundaries($new_coordinates);

		}

		/**
		*
		*/
		private function check_boundaries($new_coordinates=array()) {

			foreach ($new_coordinates as $index => $value) {
				
				if (is_numeric($value)) {
					
					if ($value > $this->width_bound) {
						$new_coordinates[$index] = $this->width_bound;
					} elseif ($value > $this->height_bound) {
						$new_coordinates[$index] = $this->height_bound;
					} elseif ($value < 0) {
						$new_coordinates[$index] = 0;
					}

				}

			}

			$this->set_coordinates($new_coordinates);

		}

	}

?>