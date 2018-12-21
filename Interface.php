<?php

	echo "Welcome to the NASA Rover console command line!\xA";
	$input = readline("Please start by choosing input from either commands or file(type <command> or <file>): ");

	while (empty($input)
		|| ($input !== "command" && $input !== "file")
	) {
		$input = readline("Please choose corrent input from either commands or file(type <command> or <file>): ");
	}

	if ($input === "command") {
		
		//TODO: implement read from command line.
		echo "CLI not yet implemented... Continuing with read from file.\xA";

	}

	try {

		$filepath = readline("Please specify path to text file with the instructions:");
		$extented_filepath = "./{$filepath}";

		if (empty($filepath)) {
			throw new Exception("Empty filepath!");
		}

		if (file_exists($extented_filepath)) {
			$filepath = $extented_filepath;
		}
		elseif (!file_exists($filepath)) {
			throw new Exception("Filepath does not exist!");
		}

		$file = file($filepath);
		$moveset = "";
		$rovers = array();

		foreach ($file as $line => $contents) {
			if ($line === 0) {
				$bounds = explode(" ", $contents);
			} elseif ($line % 2 === 0) {
				$moveset = trim($contents);
			} else {
				$coordinates = explode(" ", $contents);
			}

			require_once './Rover.php';

			if (!empty($moveset)) {

				$rover_to_move = new Rover($coordinates, $bounds[0], $bounds[1]);

				$moves = str_split($moveset);
				
				foreach ($moves as $index => $move) {

					if (!empty($move)) {
						$rover_to_move->move($move);
					}
				}

				$moveset = "";
				$rovers[] = $rover_to_move;

			}

		}

		foreach ($rovers as $index => $rover) {
			$print_out = implode(" ", $rover->get_coordinates());
			echo "{$print_out}\xA";
		}
		
	} catch (Exception $e) {
		
		echo $e->getMessage() . "\xA";

	}

?>