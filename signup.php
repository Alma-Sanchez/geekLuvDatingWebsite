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
		
		<meta charset="utf-8"/>
		
		<link href="heart.gif" type="image/gif" rel="shortcut icon" />
		<link href="Geekluv.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<div id="bannerarea">
			<img src="nerdxing.jpg" alt="banner logo" /> <br />
			where meek geeks meet
		</div>
		<form action="signup">
		<fieldset>
			<legend>Sign up below:</legend>
			Name: <input type="text" ></input><br>
			Gender: <input type="radio" name="gender" value="female"></input>Female
				<input type="radio" name="gender" value="male"></input>Male <br>
				Age <select value="selectAge" >
					<?php
						for($i=18; $i<=79;$i++){
							echo "<option value='$i'>$i</option>";
						}
					?>
				</select>
				<input type="text" ></input> <a href="https://www.16personalities.com/free-personality-test">(Don't know your type?)</a><br>
				Favorite OS: <select>
					<option value="windows">Windows</option>
					<option value="Linux">Linux</option>
					<option value="Mac">Mac</option>
				</select>
				<br>
				Seeking age: 
				<select value="minAge">	
					<?php
						for($i=18; $i<=79;$i++){
							echo "<option value='$i'>$i</option>";
						}
					?>
				</select>
				to
				<select value="maxAge">	
					<?php
						for($i=18; $i<=79;$i++){
							echo "<option value='$i'>$i</option>";
						}
					?>
				</select><br><br>
				<input type="submit" value="Sign Up!" class="check-mates-btn"></input>
		</fieldset>
		</form>
	</body>
</html>