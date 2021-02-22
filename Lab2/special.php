<!DOCTYPE html>
<html>
<body>

<center><h1>Special Number</h1></center>
<hr width="50%" size='10' noshade><br>
<center>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	Enter Number: <input type="number" name="num"><br>
    <input type="submit"><br><br>
	<hr width="50%" size='10' noshade><br>
</form>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// taking input and storing it in variable
	$n = htmlspecialchars($_REQUEST['num']);
	if(empty($n)) {
		echo "Please fill the input!<br>";
	}
	else {
		// finding sum and multiplication of digits of number
		$t = $n;
		$add=0;
		$mul=1;
		while($t>0) {
			$add += $t%10;
			$mul *= $t%10;
			$t = intdiv($t, 10);
		}
		
		// checking condition for special number
		if($add+$mul==$n) {
			echo "$n is a special number.<br>";
		}
		else {
			echo "$n is not a special number.<br>";
		}
	}
	unset($n);
}

?>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

</center>
</body>
</html>