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
		<?php
	        include "common.php";
	    ?>
		<?= getHeader(); ?>

		<form action="signup-submit.php" method="POST" enctype="multipart/form-data">
			<fieldset>
				<legend>Sign up below:</legend>
				<span class="error"><?php echo $error ?></span>
				Name: <input type="text" name="name"></input><br>
				
				Gender: 
					<input type="radio" name="gender" value="female"></input>Female
					<input type="radio" name="gender" value="male"></input>Male
					<input type="radio" name="gender" value="male"></input>MF <br>

				Age 
					<select value="selectAge" name="age">
						<?php
							for($i=18; $i<=79;$i++){
								echo "<option value='$i'>$i</option>";
							}
						?>
					</select>
					<br>
				Type:
					<input type="text" name="type"></input> <a href="https://www.16personalities.com/free-personality-test">(Don't know your type?)</a><br>

				Favorite OS: 
					<select name="os">
						<option value="windows" name="os">Windows</option>
						<option value="Linux" name="os">Linux</option>
						<option value="Mac" name="os">Mac</option>
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
					</select><br>
				Interested in: 
					<input type="checkbox" name="seekingGender" value="male"></input>Male
					<input type="checkbox" name="seekingGender" value="female"></input>Female
					<br>
				Upload Profile Picture <input type="file" name="profilePic"></input><br>

				<!-- Submit! -->
				<input type="submit" value="Sign Up!" class="check-mates-btn"></input>
			</fieldset>
		</form>
		<!-- Use function for repetative footer -->
		<?= getFooter() ?>
	</body>
</html>