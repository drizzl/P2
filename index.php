<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>XKCD Password Generator</title>
    <?php require 'logic.php'; ?>

    <style>
        .error {
            background-color:red;
            color:white;
            padding:5px;
            width:300px;
            margin:5px 0px;
        }
        section {
            margin:25px 0px;
        }
        label {
            display:block;
        }
		.invisible {
			background-color:transparent;
			border: 0px solid;
			outline: none;
			box-shadow: none;
			height: 30px;
			width: 260px;
			vertical-aligh: middle;
		}
    </style>
	
	<script>
	function updateTextInput(val) {
		document.getElementById('num_words').value=val;
	}
	</script>

</head>
<body>

    <h1>XKCD Password Generator</h1>

    <form method='POST' action='index.php'>
	
		<?php if (isset($nw_error)||isset($db_error)): ?>
		<p style="color:red">Fields in red are invalid</p>
		<?php endif; ?>

		<p style="color:<?php echo ($nw_error ? "red":"black") ?>">Number of words in password <input type='number' name='num_words' value="<?php echo $num_words?>"> (1-9)</p>
		<p style="color:<?php echo ($db_error ? "red":"black") ?>">Number of words in database <input type='number' name='database_size' value="<?php echo $database_size?>">/5000 most commonly used words</p>
        Use numbers <input type='checkbox' name='numbers' <?php if (isset($numbers)) echo "checked"?>><br>
        Use symbols <input type='checkbox' name='symbols' <?php if (isset($symbols)) echo "checked"?>><br>

        <input type='submit' value='Generate!'>

    </form>

	<?php if(isset($password)): ?>
    <section>
        Password: <?php echo $password?>
    </section>
	<?php endif ?>

    <footer>
        Word dictionary care of <a href='http://www.wordfrequency.info/'>http://www.wordfrequency.info</a>
    </footer>

</body>
</html>