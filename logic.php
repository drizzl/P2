<?php

function error_validation ($nw, $db) {
	global $nw_error;
	global $db_error;
	global $val_error;
	
	if ($nw <= 0 || $nw > 9) $nw_error = 1;
	if ($db <= 0 || $db > 5000) $db_error = 1;
	if ($db < $nw) $val_error = 1;
}

# the array of words
$dictionary = [];

#Initialize symbol array with static data
$symbol_arr = array('`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', 
				 '_', '+', '=', '\\', '|', ']', '}', '{', '[', '"', "'", ';', ':', 
				 ',', '<', '&','>', '.', '/', '?');

#This code section checks to see if the dictionary has been loaded from
# the text file yet. If not, load it from the file and store on _POST variable.
if (!isset($_POST["dictionary"])) {

	$file_handle = fopen("resources" . DIRECTORY_SEPARATOR . "dictionary.csv", "r");
	$word_count = 0;
	while(!feof($file_handle)) {
		$line = fgetcsv($file_handle);
		$dictionary[$word_count] = $line[1];
		$word_count++;
	}
	
	$_POST["dictionary"] = $dictionary;
}

/*First we check to see if the num_words field has been filled out.
 That is how we know that the form has been submitted.*/
if (isset($_POST["num_words"])) {
	
	#set the variables, so that they default after post
	$num_words = $_POST["num_words"];
	$database_size = $_POST["database_size"];
	if (isset($_POST["numbers"])) $numbers = $_POST["numbers"];
	if (isset($_POST["symbols"])) $symbols = $_POST["symbols"];

	#Check for any errors
	error_validation($num_words, $database_size);

	if (!isset($nw_error) && !isset($db_error) && !isset($val_error)) {
		#Now we take only the requested number of words out of the "database"
		$password_arr = [];
		for ($i = 0; $i<$database_size; $i++) {
			$password_arr[$i] = $dictionary[$i];
		}

		#$password_arr now contains the requested word pool. We shuffle them to randomize.
		shuffle($password_arr);

		$password = '';
		#if they want to start with numbers and symbols, add them now
		if (isset($numbers)&&$numbers=="Starting") $password .= rand(0,99);
		if (isset($symbols)&&$symbols=="Starting") $password .= $symbol_arr[rand(0,31)];

		$word_count=0;
		#Now we only keep the first X words to create the password.
		foreach($password_arr as $value) {
			
			#ucfirst will capitalize the first letter, to make it more readable
			$password .= ucfirst($value);

			$word_count++;
			if ($word_count==$num_words) break; #if we have the whole password, exit.
			
			if (isset($numbers)&&$numbers=="Between") $password .= rand(0,99);
			if (isset($symbols)&&$symbols=="Between") $password .= $symbol_arr[rand(0,31)];
		}

		#add random numbers and symbols if requested
		if (isset($numbers)&&$numbers=="Ending") $password .= rand(0, 99);
		if (isset($symbols)&&$symbols=="Ending") $password .= $symbol_arr[rand(0, 31)];
	}
}