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
	"I believe in you. You can do this. You have the power",
	"What the fuck did you just fucking type about me, you little bitch? I’ll have you know I graduated top of my class at MIT, and I’ve been involved in numerous secret raids with Anonymous, and I have over 300 confirmed DDoSes. I am trained in online trolling and I’m the top hacker in the entire world. You are nothing to me but just another virus host. I will wipe you the fuck out with precision the likes of which has never been seen before on the Internet, mark my fucking words. You think you can get away with typing that shit to me over the Internet? Think again, fucker. As we chat over IRC I am tracing your IP with my damn bare hands so you better prepare for the storm, maggot. The storm that wipes out the pathetic little thing you call your computer. You’re fucking dead, kid. I can be anywhere, anytime, and I can hack into your files in over seven hundred ways, and that’s just with my bare hands. Not only am I extensively trained in hacking, but I have access to the entire arsenal of every piece of malware ever created and I will use it to its full extent to wipe your miserable ass off the face of the world wide web, you little shit. If only you could have known what unholy retribution your little “clever” comment was about to bring down upon you, maybe you would have held your fucking fingers. But you couldn’t, you didn’t, and now you’re paying the price, you goddamn idiot. I will shit code all over you and you will drown in it. You’re fucking dead, kiddo.");

# pick a random error
$r = rand(0, count($errors));
if($r == 9)
{
	# set location
	header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
}
echo $errors[$r];
?>
