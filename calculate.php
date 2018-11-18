<div class="tekst">
			<p>for now...</p>
		</div>
		<?php
		$exit = "";
		if (@$_POST['main']) {
			$num1 = $_POST['num1'];
			$num2 = $_POST['num2'];
			$operation = $_POST['op'];

			$num1 = trim(strip_tags($num1));
			$num2 = trim(strip_tags($num2));
			$resetmess = ' <a href="' . htmlentities($_SERVER["REQUEST_URI"]) . '">
			Reset</a>';

			if ($operation == "+") {
			$ans = $num1 + $num2;
			}
			if ($operation == "-") {
			$ans = $num1 - $num2;
			}
			if ($operation == "*") {
			$ans = $num1 * $num2;
			$operation = "x";
			}
			if ($operation == "/") {
			$ans = $num1 / $num2;
			}
				
			if (strlen($num1) > 10 || strlen($num2) > 10) {
				$exit = ' <p class="error"><strong>Error:</strong>
				You entered a number with 10 and more digits.' . $resetmess . '</p>';
			} else
				
			if (empty($num1) || empty($num2)) {
				$exit = ' <p class="error"><strong>Error:</strong>
				You must enter values.' . $resetmess . '</p>';
			} else
				
			if (!preg_match("([0-9])", $num1) || !preg_match("([0-9])", $num2) || preg_match("([a-z])i", $num1) || preg_match("([a-z])i", $num2)) {
				$exit = ' <p class="error"><strong>Error:</strong>
				You can only enter numbers.' . $resetmess . '</p>';
			}
			
			else {
				$exit = " <p><strong>EXIT: </strong>" . "$num1" . " $operation " . "$num2" . " = " . "$ans $resetmess" . "</p>";
			}
		}
				
		?>
		<div id="main">
			<form action="<?php echo htmlentities($_SERVER["REQUEST_URI"]); ?>" method="post">
				<fieldset>
					<legend>calculator</legend>
					<label for="num1">FIRST number</label>
					<input type="text" id="num1" name="num1" size="8" maxlength="10" value="" />&nbsp;
					<label for="op">Operation</label>
					<select name="op" id="op">
						<option value="+" selected="selected" title="plus">&nbsp;+ </option>
						<option value="-" title="subtraction">&nbsp;-</option>
				        <option value="*" title="multiplication">&nbsp;x </option>
				        <option value="/" title="sharing">&nbsp;/ </option>
				    </select>&nbsp;
				    <label for="br2">SECOND number</label>
				    <input type="text" id="num2" name="num2" size="8" maxlength="10" value="" />&nbsp;
				    <input type="submit" class="button" name="main" value="result"/>
				    <?php
				        echo $exit;
				    ?>
				</fieldset>
			</form>
		</div>
	</body>
	</html>