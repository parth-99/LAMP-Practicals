<!DOCTYPE html>
<html>
<body>

<center><h1>Kaprekar Number</h1></center>
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
		// first counting number of digits in number
		$square = $n**2;
		$t = $square;
		$count = 0;
		while($t>0) {
			$count++;
			$t = intdiv($t, 10);
		}
		
		// finding left part and right part of square of number
		$right = 0;
		$left = 0;
		$pow = 1;
		$count = intdiv($count+1, 2);
		
		// for right part
		while($count--) {
			$right += ($square%10)*$pow;
			$square = intdiv($square, 10);
			$pow *= 10;
		}
		$pow = 1;
		
		// for left part
		while($square>0) {
			$left += ($square%10)*$pow;
			$square = intdiv($square, 10);
			$pow *= 10;
		}
		echo "Number = $n, Its square = ".($n**2)."<br>";
		echo "Left sum = $left, Right sum = $right<br><br>";
		
		// checking condition of Kaprekar number
		if($left+$right==$n) {
			echo "$n is a Kaprekar number.<br>";
		}
		else {
			echo "$n is not a Kaprekar number.<br>";
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