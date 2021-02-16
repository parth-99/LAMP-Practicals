<center><h1>Understanding Scopes of variables</h1></center>
<hr width="50%" size='10' noshade><br>

<?php
echo "<hr size='3' noshade>";

echo "<h3>Using Global variable inside function using global keyword<br></h3>";
$x = 10;
$y = 20;
function func1() {
	global $x, $y;
	$x += $y;
	echo "x inside func1 = $x<br>";
}
func1();
echo "x outside func1 = $x<br>";
echo "<hr size='3' noshade>";

echo "<h3>Using Global variable inside function using GLOBALS array<br></h3>";
$x = 10;
$y = 20;
function func2() {
	$GLOBALS['x'] += $GLOBALS['y'];
	echo "x inside func2 = ".$GLOBALS['x']."<br>";
}
func2();
echo "x outside func2 = $x<br>";
echo "<hr size='3' noshade>";

echo "<h3>Using same variable name as global variable in local scope<br></h3>";
$x = 10;
$y = 20;
function func3() {
	$x = 30;
	$y = 40;
	echo "Local x value = $x, Local y value = $y<br>";
	echo "Global x value = ".$GLOBALS['x'].", Global y value = ".$GLOBALS['y']."<br>";
}
func3();
echo "<hr size='3' noshade>";

echo "<h3>Updating local variable without using static keyword<br></h3>";
function func4() {
	$x = 30;
	echo "x value inside func4 = $x<br>";
	$x++;
}
func4();
func4();
func4();
echo "<hr size='3' noshade>";

echo "<h3>Updating local variable using static keyword<br></h3>";
function func5() {
	static $x = 30;
	echo "x value inside func5 = $x<br>";
	$x += 5;
}
func5();
func5();
func5();
echo "<hr size='3' noshade>";
?>