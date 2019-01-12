<?php

	try{

		require_once "./Plateau.php";
		require_once "./Rover.php";

		$input = "5 5
		1 2 N
		LMLMLMLMM
		3 3 E
		MMRMMRMRRM";

		$input_list = explode(PHP_EOL, $input);

		$plateau = new Plateau($input_list[0][0], $input_list[0][2]);

		foreach ($input_list as $line => $contents) {
			if ($line === 0) {
				$bounds = explode(" ", $contents);
			} elseif ($line % 2 === 0) {
				$moveset = trim($contents);
			} else {
				$coordinates = explode(" ", trim($contents));
			}

			if (!empty($moveset)) {

				$rover_to_move = new Rover($coordinates);

				$moves = str_split($moveset);
				
				foreach ($moves as $index => $move) {

					if (!empty($move)) {
						$rover_to_move->move($move, $plateau);
					}
				}

				$moveset = "";
				$rovers[] = $rover_to_move;

			}

		}

		$rovers[0]->get_coordinates();

		foreach ($rovers as $rover) {
			$rover->pretty_print();
		}

	} catch (Exception $e) {

		echo $e->getMessage() . "\xA";

	}

?>