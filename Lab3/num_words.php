<!DOCTYPE html>
<html>
<body>

<center><h1>Number to Words</h1></center>
<hr width="50%" size='10' noshade><br>
<center>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	Enter Number: <input type="number" name="num" value="<?php if(isset($_POST['num'])) echo $_POST['num']; ?>"><br>
    <input type="submit"><br><br>
	<hr width="50%" size='10' noshade><br>
</form>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$n = htmlspecialchars($_REQUEST['num']);
	if(empty($n)) {
		echo "Please fill the input!<br>";
	}
	else {
		$digit1 = array(1=>'One', 2=>'Two', 3=>'Three', 4=>'Four', 5=>'Five', 6=>'Six', 7=>'Seven', 8=>'Eight', 9=>'Nine');
		$digit2 = array(1=>'Ten', 2=>'Twenty', 3=>'Thirty', 4=>'Forty', 5=>'Fifty', 6=>'Sixty', 7=>'Seventy', 8=>'Eighty', 9=>'Ninety');
		$digit3 = array(0=>'Ten', 1=>'Eleven', 2=>'Twelve', 3=>'Thirteen', 4=>'Fourteen', 5=>'Fifteen', 6=>'Sixteen', 7=>'Seventeen', 8=>'Eighteen', 9=>'Nineteen');
		
		$t = $n;
		$f = 1;
		$g = 1;
		
		$unit = $t%10;
		$t = intdiv($t, 10);
		$tens = $t%10;
		$t = intdiv($t, 10);
		$hund = $t%10;
		$t = intdiv($t, 10);
		$thou = $t%10;
		$t = intdiv($t, 10);
		$tthou = $t%10;
		$t = intdiv($t, 10);
		$lac = $t%10;
		
		echo "$n => ";
		
		if($lac!=0) {
			echo "$digit1[$lac] Lakh ";
		}
			
		if($tthou!=0) {
			if($tthou==1) {
				echo "$digit3[$thou] Thousand ";
			}
			else if($tthou and $thou==0) {
				echo "$digit2[$tthou] Thousand ";
			}
			else {
				echo "$digit2[$tthou] $digit1[$thou] Thousand ";
			}
			$f=0;
		}
				
		if($thou!=0 and $f) {
			echo "$digit1[$thou] Thousand ";
		}

		if($hund!=0) {
			echo "$digit1[$hund] Hundred ";
		}
			
		if($tens!=0) {
			if($tens==1) {
				echo "$digit3[$unit] ";
				$g=0;
			}
			else {
				echo "$digit2[$tens] ";
			}
		}
				
		if($unit!=0 and $g) {
			echo "$digit1[$unit] ";
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

<!--
# ENTER UPTO 6 DIGITS


if(lac!=0):
    print(digit1[lac]," lakh ",sep="",end="")
    
if(tthou!=0):
    if(tthou==1): print(digit3[thou]," thousand ",sep="",end="")
    elif(tthou and thou==0): print(digit2[tthou]," thousand ",sep="",end="")
    else: print(digit2[tthou]," ",digit1[thou]," thousand ",sep="",end="")
    f=0
        
if(thou!=0 and f):
    print(digit1[thou]," thousand ",sep="",end="")

if(hund!=0):
    print(digit1[hund]," hundred ",sep="",end="")
    
if(tens!=0):
    if(tens==1):
        print(digit3[unit]," ",sep="",end="")
        g=0
    else: print(digit2[tens]," ",sep="",end="")
        
if(unit!=0 and g):
    print(digit1[unit],end="")
    
#print(lac,tthou,thou,hund,tens,unit)

-->