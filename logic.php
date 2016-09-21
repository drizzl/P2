<?php
# the array of words
$dictionary = [];

#Initialize symobl and number arrays with static data
$symbols = array('`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', 
				 '_', '+', '=', '\\', '|', ']', '}', '{', '[', '"', "'", ';', ':', 
				 ',', '<', '>', '.', '/', '?');

/*
if (!isset($_POST["dictionary"])) {
	$file_handle = fopen("resources\dictionary.csv", "r");
	$word_count = 0;
	while(!feof($file_handle)) {
		$line = fgetcsv($file_handle);
		$dictionary[$word_count] = $line[2];
	}
	
	$_POST["dictionary"] = $dictionary;
}
*/

#Test data:
$dictionary[0] = 'One';
$dictionary[1] = 'Two';
$dictionary[2] = 'Three';
$dictionary[3] = 'Four';
$dictionary[4] = 'Five';
$dictionary[5] = 'Six';
$dictionary[6] = 'Seven';
$dictionary[7] = 'Eight';
$dictionary[8] = 'Nine';
$dictionary[9] = 'Ten';


if (isset($_POST["num_words"])) {
	$password_arr = [];
	for ($i = 0; $i<$_POST["num_words"]; $i++) {
		$password_arr[$i] = $dictionary[$i];
	}

	shuffle($password_arr);

	$password = '';
	foreach($password_arr as $value) {
		$password .= $value;
	}
	if (isset($_POST["numbers"])) $password .= rand(0, 100);
	if (isset($_POST["symbols"])) $password .= $symbols[rand(0, 31)];
}


# Use a foreach loop to loop through the contestants array

/*
foreach($_POST as $key => $value) {
	# Some simple form validation
	if(trim($value == '')) {
		$error = 'Please fill out all contestant names.';
		return;
	}
	else if(!ctype_alpha($value)) {
		$error = 'Contestant names may only contain letters; no numbers or symbols.';
		return;
	}
#	Create a variable $coinFlip; set this variable to be either 0 or 1 (i.e. heads or tails)
#	Use PHP's rand() function to randomly pick the 0/1
	$coinFlip = rand(0,1);
	# If the $coinFlip was 1...
	if($coinFlip == 1) {
		# This contestant (i.e. $contestant[$value]) is set to be a "Winner"
		$contestants[$value] = 'Winner';
		# Increment the winner count
		$winnerCount++;
	}
	# Otherwise...
	else {
		# This contestant (i.e $contestant[$value]) is set to be a "Loser"
		$contestants[$value] = 'Loser';
	}
} # End of loop
*/