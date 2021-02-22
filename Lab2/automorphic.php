<!DOCTYPE html>
<html>
<body>

<center><h1>Automorphic Number</h1></center>
<hr width="50%" size='10' noshade><br>
<center>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	Enter Number: <input type="number" name="num"><br>
    <input type="submit"><br><br>
	<hr width="50%" size='10' noshade><br>
</form>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// taking input and storing in variable
	$n = htmlspecialchars($_REQUEST['num']);
	if(empty($n)) {
		echo "Please fill the input!<br>";
	}
	else {
		$square = $n**2;
		$temp = $n;
		$tempsquare = $square;
		$f=0;
		// finding whether last digits of square are matching or not
		while($temp!=0) {
			if($temp%10 != $tempsquare%10) {
				$f=1;
				break;
			}
			$temp = intdiv($temp, 10);
			$tempsquare = intdiv($tempsquare, 10);
		}
		
		echo "Num = $n and its square = $square<br><br>";
		echo ($f?"$n is Not":"$n is")." Automorphic Number.<br>";
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