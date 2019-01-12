<?php

	require_once "./Plateau/TestPlateau.php";
	require_once "./Rover/TestRover.php";
	require_once "./Command/TestCommand.php";

	try{

		$test_plateau = (new TestPlateau())->get_passable();
		$test_rover = (new TestRover())->get_passable();
		$test_commands = (new TestCommand())->get_passable();

		if ($test_commands === false) {
			echo "Failed command test.\xA";
		}

		if ($test_rover === false) {
			
			echo "Failed rover test.\xA";

		}

		if ($test_plateau === false) {
			
			echo "Failed plateau test.\xA";

		}

		if ($test_commands === true
		 && $test_rover === true 
		 && $test_plateau === true
		) {
			
			echo "Passed all tests successfully.\xA";
		
		}

	} catch (Exception $e) {

		echo "{$e->getMessage()} \xA";

	}

?>