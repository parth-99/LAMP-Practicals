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
		// finding sum of all divisors of number
		$suma = 0;
		for($i=1; $i<=sqrt($n); ++$i) {
			if($n%$i==0) {
				if($i!=($n/$i))
					$suma += $i+($n/$i);
				else
					$suma += $i;
			}
		}
		
		// checking condition of deficient number
		if($suma<2*$n) {
			echo "$n is Deficient number<br><br>Sum of divisors = $suma<br>Deficieny = ".(2*$n-$suma)."<br>";
		}
		else {
			echo "$n is not Deficient number<br>";
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