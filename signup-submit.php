<!DOCTYPE html>
<html>
<?php include "common.php" ?>
    <?= getHead() ?>
    <body>
        <?= getHeader() ?>
		<?php
        	/*====================
				Patterns to check for
			=====================*/
			$namePattern = '(([A-Z][a-z]+\s[A-Z]([\']?)([a-z]?)([A-Z]?)[a-z]+))';
			$typePattern = '([A-Z]{4})';
		
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				// check name
				if(empty($_POST["name"]) || !preg_match($namePattern, $_POST["name"])){
					$nameError = "Please correctly type your name";
				}	else{
					$name = $_POST["name"];
					$nameError = "";
				}	
				// check gender
				if(empty($_POST["gender"])){
					$genderError ="Please select a gender";
				}else{
					$gender = $_POST["gender"];
					$genderError = "";
				}

					//check to make sure type is filled out
				if(empty($_POST["type"]) || !preg_match($typePattern, $_POST["type"])){
					$typeError = "Please enter a type.";
				}else{
					$type = "type number " . $_POST["type"];
				}

				// Don't need to check os, age or seeking age since there's a default selected default
			}
		?>

		<?php
			$name = $gender = $age = $type = $os = $minAge = $maxAge = "";
			$name = $_POST["name"];
			$gender = $_POST["gender"];
			$age = $_POST["age"];
			$type = $_POST["type"];
			$os = $_POST["os"];
			$minAge = $_POST["minAge"];
			$maxAge = $_POST["maxAge"];
		?>
		<p>
			<?php echo "Welcome to GeekLuv $name! <br> Now you can <a href='matches.php'>login </a> to find your perfect match!"; 
			?>	
		</p>
		<!-- Write sign up stuff to singles2.txt-->
		<?php
			$outputFile = fopen("singles2.txt","") or die("Unable to open file!");
			$textToAdd = "$name,$\n";
		?>

		<!-- =====================================
			Need to add information to the end of file 
		==============================================-->
		<?= getFooter(); ?>

	</body>
</html>