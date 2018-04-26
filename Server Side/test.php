<?php
	$x = 2.5;
	$y = shell_exec("python php_python.py $x");
	echo $y;
 	// echo (string)$result;
?>