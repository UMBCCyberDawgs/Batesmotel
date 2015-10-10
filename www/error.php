<?php

$errors = array("git gud scrub",
	"true grit would be disapointed in you",
	"space jammmmmmmmmmmmmmmmmmmmm",
	"ERROR: flux capacitor not found",
	"o hai dougie",
	"Is that the best you can do?",
	"Can you handle this? Are you sure?",
	"Error: you have an error in your sql statement near ')' on line 42 of universe.php",
	"AND HIS NAME IS JOHN CENA",
	"hi rick");

# pick a random error
$r = rand(0, count($errors));
if($r == 9)
{
	# set location
	header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
}
echo $errors[$r];
?>
