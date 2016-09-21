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
<!--        Number of words in password <input name="slider_num" type='range' value="5" min="1" max="9" onchange="updateTextInput(this.num_words);">
		<input class="invisible" name="num_words" type='text' id='num_words' value='5'><br>
-->
		Number of words in password <input type='number' name='num_words'><br>
        Number of words in database <input type='number' name='database_size'> /5000<br>
        Use numbers <input type='checkbox' name='numbers'><br>
        Use symbols <input type='checkbox' name='symbols'><br>

        <input type='submit' value='Generate!'>

        <?php if(isset($error)): ?>
            <div class='error'><?php echo $error; ?></div>
        <?php endif ?>

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