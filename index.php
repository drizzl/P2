<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>XKCD Password Generator</title>
    <?php require 'logic.php'; ?>

    <style>
        section {
            margin:25px 0px;
			font-weight: bold;
        }
		.block {
			display: block;
		}
    </style>

</head>
<body>

    <h1>XKCD Password Generator</h1>

    <form method='POST' action='index.php'>
	
		<?php if (isset($nw_error)||isset($db_error)||isset($val_error)): ?>
		<p style="color:red">Fields in red are invalid</p>
		<?php endif; ?>

		<p style="color:<?php echo (isset($nw_error) ? "red":"black") ?>">Number of words in password <input type='number' name='num_words' value="<?php echo $num_words?>"> (1-9)</p>
		<p style="color:<?php echo (isset($db_error) ? "red":"black") ?>">Number of words in database <input type='number' name='database_size' value="<?php echo $database_size?>">/5000 most commonly used words</p>
		<?php if (isset($val_error)) echo '<p style="color:red"> Database must be bigger than number of words!</p>'?>
        <p> 
			Include Numbers <br>
				<label class="block"> <input type='radio' name='numbers' value="No" <?php if (!isset($numbers)||$numbers=="No") echo "checked"?> >No</label>
				<label class="block"> <input type='radio' name='numbers' value="Starting" <?php if (isset($numbers)&&$numbers=="Starting") echo "checked"?> >Starting</label>
				<label class="block"> <input type='radio' name='numbers' value="Ending" <?php if (isset($numbers)&&$numbers=="Ending") echo "checked"?> >Ending</label>
				<label class="block"> <input type='radio' name='numbers' value="Between" <?php if (isset($numbers)&&$numbers=="Between") echo "checked"?> >Between Words</label>
		</p>
        <p> 
			Use symbols <br>
				<label class="block"> <input type='radio' name='symbols' value="No" <?php if (!isset($symbols)||$symbols=="No") echo "checked"?> >No</label>
				<label class="block"> <input type='radio' name='symbols' value="Starting" <?php if (isset($symbols)&&$symbols=="Starting") echo "checked"?> >Starting</label>
				<label class="block"> <input type='radio' name='symbols' value="Ending" <?php if (isset($symbols)&&$symbols=="Ending") echo "checked"?> >Ending</label>
				<label class="block"> <input type='radio' name='symbols' value="Between" <?php if (isset($symbols)&&$symbols=="Between") echo "checked"?> >Between Words</label>
		</p>

        <input type='submit' value='Generate!'>

    </form>

	<?php if(isset($password)): ?>
    <section>
        Password:<?php echo htmlentities($password)?>
    </section>
	<?php endif ?>

    <footer>
        Word dictionary care of <a href='http://www.wordfrequency.info/'>http://www.wordfrequency.info</a>
    </footer>

</body>
</html>