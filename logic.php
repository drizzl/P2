<?php
# the array of words
$dictionary = [];

#Initialize symobl and number arrays with static data
$symbols = array('`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', 
				 '_', '+', '=', '\\', '|', ']', '}', '{', '[', '"', "'", ';', ':', 
				 ',', '<', '>', '.', '/', '?');


if (!isset($_POST["dictionary"])) {
	$file_handle = fopen("resources\dictionary.csv", "r");
	$word_count = 0;
	while(!feof($file_handle)) {
		$line = fgetcsv($file_handle);
		$dictionary[$word_count] = $line[1];
		$word_count++;
	}
	
	$_POST["dictionary"] = $dictionary;
}



if (isset($_POST["num_words"])) {
	$password_arr = [];
	for ($i = 0; $i<$_POST["database_size"]; $i++) {
		$password_arr[$i] = $dictionary[$i];
	}

	shuffle($password_arr);

	$password = '';
	$word_count=0;
	foreach($password_arr as $value) {
		$password .= ucfirst($value);
		$word_count++;
		if ($word_count==$_POST["num_words"]) break;
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