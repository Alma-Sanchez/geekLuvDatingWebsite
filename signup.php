<!DOCTYPE html>
<html>
	<!--
	Homework 6 (Geekluv)
	This provided file is the front page that links to two of the files
	you are going to write, signup.php and matches.php.
	You can modify this file as necessary to move redundant code out to common.php.
	-->
	
	<head>
		<title>GeekLuv</title>
		
		<meta charset="utf-8" />
		
		<!-- instructor-provided CSS and JavaScript links; do not modify -->
		<link href="heart.gif" type="image/gif" rel="shortcut icon" />
		<link href="Geekluv.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<div id="bannerarea">
			<img src="nerdxing.jpg" alt="banner logo" /> <br />
			where meek geeks meet
		</div>
		<form>
			Name: <input type="text" ></input><br>
			Gender: <input type="radio" name="gender" value="female"></input>Female
				<input type="radio" name="gender" value="male"></input>Male <br>
				Age <select>
					<?php
						for($i; $i<45;$i++){
							echo "<option>$i</option>"
						}
					?>
				</select>
			<br>
		</form>
	</body>
</html>