<?php

	require_once __ROOT__ . "/Compass/Compass.php";

/**
 * 
 */
class Command
{

	/**
	*
	*/
	public function strafe(string $direction="", array $coordinates = array()):string {

		$current_index = array_search(trim($coordinates[2]), Compass::$map);

		if ($current_index !== false) {
			
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

		} else {

			throw new Exception("Error finding the right direction.");
			

		}

		return Compass::$map[$new_index];

	}

		/**
		*
		*/
		public function take_a_step(array $new_coordinates):array {
			
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

					throw new Exception("Error. Cannot step in that direction.");
					break;
			}

			return $new_coordinates;

		}

}

?>