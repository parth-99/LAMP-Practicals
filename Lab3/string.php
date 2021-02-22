<!DOCTYPE html>
<html>
<body>

<center><h1>String Functions</h1></center>
<hr width="50%" size='10' noshade><br>
<center>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	Enter Main String: <input size="50" type="text" name="str1" value="<?php if(isset($_POST['str1'])) echo $_POST['str1'];?>"><br>
	Enter Search String: <input size="50" type="text" name="str2" value="<?php if(isset($_POST['str2'])) echo $_POST['str2'];?>"><br>
	Enter Replace String: <input size="50" type="text" name="str3" value="<?php if(isset($_POST['str3'])) echo $_POST['str3'];?>"><br><br>
    <input type="submit" name="action" value="Find Occurences">&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" name="action" value="Replace String"><br><br>
	<hr width="50%" size='10' noshade><br>
</form>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$string = htmlspecialchars($_REQUEST['str1']);
	$search = htmlspecialchars($_REQUEST['str2']);
	$replace = htmlspecialchars($_REQUEST['str3']);
	
	if($_POST['action']=="Find Occurences") {
		
		if(empty($string) or empty($search)) {
			echo "Please fill both the inputs. *(Main String and Search String)<br>";
		}
		else if(strlen($string)<strlen($search)){
			echo "Please enter valid strings. *(Main String is smaller than Search String)<br>";
		}
		else {
			echo "First occurence of '$search' in '$string' is at => ".strpos($string, $search)."<br><br>";
			echo "Last occurence of '$search' in '$string' is at => ".strrpos($string, $search)."<br><br>";
			echo "Total number of '$search' in '$string' is => ".substr_count($string, $search)."<br>";
			$which = array("1st", "2nd", "3rd");
			$next = 0;
			for($i=0;$i<substr_count($string, $search);$i++) {
				if($i+1<=3) echo $which[$i]." ";
				else echo ($i+1)."th ";
				$temp = strpos($string, $search, $next);
				echo "occurence is at => $temp.<br>";
				$next = $temp+strlen($search);
			}
		}
	}
	
	else if($_POST['action']=="Replace String") {
		
		if(empty($string) or empty($search) or empty($replace)) {
			echo "Please fill all the 3 inputs. *(Main String, Search String and Replace String)<br>";
		}
		else if(strlen($string)<strlen($replace)){
			echo "Please enter valid strings. *(Main String is smaller than Replace String)<br>";
		}
		else {
			if(substr_count($string, $search)==0) {
				echo "!!!!!!!!!! <b>ERROR</b> !!!!!!!!!!<br>Search String is not present in Main String, so no replacement can occur.<br>";
			}
			else {
				$new_string = str_replace($search, $replace, $string, $count);
				echo "Main string is replaced and count is $count.<br><br>";
				echo "Original String => $string<br>";
				echo "Replaced String => $new_string";
			}
		}
	}
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