<?php

$errors = array("git gud scrub",
	"true grit would be disapointed in you",
	"space jammmmmmmmmmmmmmmmmmmmm",
	"ERROR: flux capacitor not found",
	"o hai dougie",
	"Is that the best you can do?",
	"Can you handle this? Are you sure?",
	"Error: you have an error in your sql statement near ')' on line 42 of universe.php",
	"error: your sql injections suck",
	"hi there",
	"all your base are belong to us",
	"I expected better from you.",
	"My dog could hack better",
	"u srs",
	"I believe in you. You can do this. You have the power"
	);

# pick a random error
$r = rand(0, count($errors)-1);
#if($r == 9)
#{
	# set location
	#header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
#}
echo "Command (or SQL injection) failed!<br /><br />";
echo $errors[$r];
?>
