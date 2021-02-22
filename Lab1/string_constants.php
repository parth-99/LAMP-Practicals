<center><h1>PHP String Functions and PHP Constants</h1></center>
<hr width="50%" size='10' noshade><br>

<?php

echo "<hr size='3' noshade>";
echo "<h3>Different string functions<br></h3>";
$s1 = "My name is Parth";
$s2 = "My Roll No. is 18BCE219";
echo "strlen() =========> Length of string '$s1' = ".strlen($s1)."<br>";
echo "strrev() =========> Reverse of string '$s1' = ".strrev($s1)."<br>";
echo "str_word_count() ==> Word count of string '$s1' = ".str_word_count($s1)."<br>";
echo "strpos() =========> Position of 'Parth' in '$s1' = ".strpos($s1, "Parth")."<br>";
echo "str_replace() =====> String replacement of '$s1' (replacing Parth with Parth Shah) = ".str_replace("Parth", "Parth Shah", $s1)."<br>";

echo "<h3>Finding the last occurence of a particular string<br></h3>";
$s3 = "The sound of sound is sound.";
$s4 = "sound";
echo "Position of last occurence of '$s4' in '$s3' is ".(strlen($s3)-strlen($s4)-strpos(strrev($s3), strrev($s4)))."<br>";

echo "<hr size='3' noshade>";
echo "<h3>Constants case sensitive<br></h3>";
define("MOD1", 1000000007, false);
echo "MOD1 value in global scope = ".MOD1."<br>";
function func1() {
	echo "MOD1 value in local scope = ".MOD1."<br>";
	echo "mod2 value in local scope = ".mod2."<br>";
}
func1();

echo "<hr size='3' noshade>";
echo "<h3>Constants case insensitive<br></h3>";
define("MOD2", 1000000007, true);
echo "MOD2 value in global scope = ".MOD2."<br>";
echo "moD2 value in global scope = ".moD2."<br>";
function func2() {
	echo "MOD2 value in local scope = ".MOD2."<br>";
	echo "mod2 value in local scope = ".mod2."<br>";
}
func2();
?>