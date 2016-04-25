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
			$name = $gender = $age = $type = $os = " ";
			$minimumAge = "18";
			$maxAge = $seekingGender = $error = " ";
			/*Patterns to check for */
			$namePattern = '(([A-Z][a-z]+\s[A-Z]([\']?)([a-z]?)([A-Z]?)[a-z]+))';
			$typePattern = '([A-Z]{4})';
			$filledOut = 0;

				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					// check name
					if(empty($_POST["name"]) || !preg_match($namePattern, $_POST["name"])){
						$error .= "Please enter or correctly type your name. <br>";
					}	else{
						$filledOut++;
						$name = $_POST['name'];
					}	
					// check gender
					if(empty($_POST["gender"])){
						$error .= "Please select a gender you'd like to date <br>";
					}else if($_POST["gender"] == "M"){
						$gender = "M";
						$filledOut++;
					}else if($_POST["gender"] == "F"){
						$gender = "F";
						$filledOut++;
					}else{
						$gender = "MF";
						$filledOut++;
					}

					// Check to make sure we have an age
					if(isset($_POST['age'])){
						$age = $_POST['age'];
						$filledOut++;	
					}else{
						$error .= "Please tell us your age";
					}
					//check to make sure type is filled out
					if(empty($_POST["type"]) || !preg_match($typePattern, $_POST["type"])){
						$error .= "Please enter a type. <br>";
					}else{
						$filledOut++;
						$type = $_POST['type'];
					}
					// Check for seeking gender
					if(empty($_POST["seekingGender"])){
						$error .= "Please select a gender you'd like to date <br>";
					}else if($_POST["seekingGender"] == "M"){
						$seekingGender = "M";
						$filledOut++;
					}else if($_POST["seekingGender"] == "F"){
						$seekingGender = "F";
						$filledOut++;
					}else{
						$seekingGender = "MF";
						$filledOut++;
					}
					// Check for min seeking age
					if(isset($_POST['maxAge'])){
						$filledOut++;
						$maxAge = $_POST['maxAge'];
					}else{
						$error .= "Please selct a min age";
					}
					// Check for max seeking age
					if(isset($_POST['minimumAge'])){
						$filledOut++;
						$minimumAge = $_POST['minimumAge'];
					}else{
						$error .= "Please selct a min age";
					}
					if(5 <= $filledOut ){
						//Start the session
						session_start();

						//Save post variables in current session in order for other file to be able to access them 
						$_SESSION['name'] = $name;
						$_SESSION['gender'] = $gender;
						$_SESSION['age'] = $age;
						$_SESSION['type'] = $type;	
						$_SESSION['minimumAge'] = $minimumAge;
						$_SESSION['maxAge'] = $maxAge;
						$_SESSION['seekingGender'] = $seekingGender;

						// Call other PHP file if validation passes
						header("Location: signup-submit.php?");
						exit();
						
					}
				} 	
		?>

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
			<fieldset>
				<legend>Sign up below:</legend>

				<span class="error"> <?php print_r($error) ?> </span>
				
				Name: <input type="text" name="name"></input><br>
				
				Gender: 
					<input type="radio" name="gender" value="female"></input>Female
					<input type="radio" name="gender" value="male"></input>Male
					<input type="radio" name="gender" value="male"></input>MF <br>

				Age 
					<select value="selectAge" name="age">
						<?php
							for($i=18; $i<=79;$i++){
								print_r("<option name='age' value='$i'>$i</option>");
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
					<select name="minimumAge" value="minimumAge">	
						<?php
							for($i=18; $i<=79;$i++){
								print_r("<option name='minimumAge' value='$i'>$i</option>");
							}
						?>
					</select>
				to
					<select name="maxAge" value="maxAge">	
						<?php
							for($i=18; $i<=79;$i++){
								print_r("<option name='maxAge' value='$i'>$i</option>");
							}
						?>
					</select><br>
					<br>
				Interested in: 
					<input type="checkbox" name="seekingGender" value="M"></input>Male
					<input type="checkbox" name="seekingGender" value="F"></input>Female
					<input type="checkbox" name="seekingGender" value="MF"></input>Both
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