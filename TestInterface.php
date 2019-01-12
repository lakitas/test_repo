<?php

	require_once "./Plateau/TestPlateau.php";

	try{

		$test_plateau = new TestPlateau();

	} catch (Exception $e) {

		echo "{$e->getMessage()} \xA";

	}

?>