<!DOCTYPE html>
<html>
<?php include "common.php" ?>
    <?= getHead() ?>
    <body>
        <?= getHeader() ?>
		<?php
			$name = $gender = $age = $type = $os = $minAge = $maxAge = $seekingGender ="";
			$error = ""; 
		?>
		<?php
        	/*====================
				Patterns to check for
			=====================*/
			$namePattern = '(([A-Z][a-z]+\s[A-Z]([\']?)([a-z]?)([A-Z]?)[a-z]+))';
			$typePattern = '([A-Z]{4})';
		
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				// check name
				if(empty($_POST["name"]) || !preg_match($namePattern, $_POST["name"])){
					$error += "Please enter or correctly type your name. <br>";
				}	else{
					$name = $_POST["name"];
				}	
				// check gender
				if(empty($_POST["gender"])){
					$error += "Please select a gender. <br>";
				}else{
					$gender = $_POST["gender"];
				}

				//check to make sure type is filled out
				if(empty($_POST["type"]) || !preg_match($typePattern, $_POST["type"])){
					$error += "Please enter a type. <br>";
				}else{
					$type = $_POST["type"];
				}

				if(empty($_POST["seekingGender"])){
					$error += "Please select a gender you'd like to date";
				}else{
					$seekingGender = $_POST["seekingGender"];
				}

				// Don't need to check os, age or seeking age since there's a default selected default
				$age = $_POST["age"];
				$os = $_POST["os"];
				$minAge = $_POST["minAge"];
				$maxAge = $_POST["maxAge"];

			}
			echo $error;
		?>

		<p>
			<?php echo "Welcome to GeekLuv $name! <br> Now you can <a href='matches.php'>login </a> to find your perfect match!"; 
			?>	
		</p>
		<!-- Write sign up stuff to singles2.txt-->
		<?php
			// $outputFile = fopen("singles2.txt","") or die("Unable to open file!");
			// $textToAdd = "$name,$\n";
		?>

		<!-- =====================================
			Need to add information to the end of file 
		==============================================-->
		<?= getFooter(); ?>

	</body>
</html>