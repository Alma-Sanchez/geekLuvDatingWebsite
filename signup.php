<!DOCTYPE html>
<html>
<?php
      include "common.php";
 ?>
	<?= getHead(); ?>
	<body>
		<?= getHeader(); ?>
		<?php 
			// include 'signup-submit.php';
			$name = $gender = $age = $type = $os = $minAge = $maxAge = $seekingGender = $error = " ";
			/*Patterns to check for */
			$namePattern = '(([A-Z][a-z]+\s[A-Z]([\']?)([a-z]?)([A-Z]?)[a-z]+))';
			$typePattern = '([A-Z]{4})';
			$filledOut = 0;

				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					// check name
					if(empty($_POST["name"]) || !preg_match($namePattern, $_POST["name"])){
						$error .= "Please enter or correctly type your name. <br>";
					}	else{
						$name = $_POST["name"];
						$filledOut++;
					}	
					// check gender
					if(empty($_POST["gender"])){
						$error .= "Please select a gender. <br>";
					}else{
						$gender = $_POST["gender"];
						$filledOut++;
					}
					//check to make sure type is filled out
					if(empty($_POST["type"]) || !preg_match($typePattern, $_POST["type"])){
						$error .= "Please enter a type. <br>";
					}else{
						$type = $_POST["type"];
						$filledOut++;
					}

					if(empty($_POST["seekingGender"])){
						$error .= "Please select a gender you'd like to date <br>";
					}else{
						$seekingGender = $_POST["seekingGender"];
						$filledOut++;
					}
					if(4 <= $filledOut ){
						// Don't need to check os, age or seeking age since there's a default selected default
						$age = $_POST["age"];
						$os = $_POST["os"];
						$minAge = $_POST["minAge"];
						$maxAge = $_POST["maxAge"];
						header('Location: signup-submit.php');
						exit();
						
						// addProfile($name,$gender,$age,$type,$minAge,$maxAge,$seekingGender);
					}
				} 	
		?>

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
			<fieldset>
				<legend>Sign up below:</legend>

				<span class="error"> <?php echo $error ?> </span>
				
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