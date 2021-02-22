<!DOCTYPE html>
<html>
<body>

<center><h1>Amicable Numbers</h1></center>
<hr width="50%" size='10' noshade><br>
<center>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	Enter first Number: <input type="number" name="fno"><br>
	Enter second Number: <input type="number" name="sno"><br>
    <input type="submit"><br><br>
	<hr width="50%" size='10' noshade><br>
</form>

<?php
// function to find sum of all divisors
function sumofdiv($x) {
	$suma=1;
	for($i=2; $i<=sqrt($x); ++$i) {
		if($x%$i==0) {
			$suma += $i+($x/$i);
		}
	}
	return $suma;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// taking 2 inputs and storing in variables
	$x = htmlspecialchars($_REQUEST['fno']);
	$y = htmlspecialchars($_REQUEST['sno']);
	if(empty($x) or empty($y)) {
		echo "Please fill both the inputs!<br>";
	}
	else {
		$sumx = sumofdiv($x);
		$sumy = sumofdiv($y);
		echo $x." and ".$y." are <br>";
		echo (($sumx==$y and $sumy==$x)?"Amicable Numbers":"Not Amicable Numbers");
	}
	unset($x);
	unset($y);
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