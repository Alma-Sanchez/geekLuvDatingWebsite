<!DOCTYPE html>
<html>
	<?php include "common.php" ?>
	  <?= getHead() ?> 
  <body>
    <?= getHeader() ?>
		<p>
			<?php 
			//Start the session
			session_start();

		$name = $_SESSION['name'];
		$gender = $_SESSION['gender'];
		$age = $_SESSION['age'];
		$type = $_SESSION['type'];
		$os = $_SESSION['os'];
		$minimumAge = $_SESSION['minimumAge'];
		$maxAge = $_SESSION['maxAge'];
		$seekingGender = $_SESSION['seekingGender'];

		

			print_r("<div class='center'>Welcome to GeekLuv $name! <br> Now you can <a href='matches.php'>login</a> to find your perfect match!</div>"); 

			//Unset the useless session variable
			unset($_SESSION['POST']);
			
			addProfile($name,$gender,$age,$type,$os,$minimumAge,$maxAge,$seekingGender);
			?>	
		</p>
		<?php
			// Write sign up stuff to singles2.txt
			function addProfile($name,$gender,$age,$type,$os,$minimumAge,$maxAge,$seekingGender){
				$outputFile = fopen("singles2.txt","a") or die("Unable to open file!");
				echo fread($outputFile, filesize("singles2.txt"));
				$textToAdd = "$name,$gender,$age,$type,$os,$minimumAge,$maxAge,$seekingGender\n";
				fwrite($outputFile,$textToAdd);
				fclose($outputFile);
			}

			//Unset the useless session variable
			unset($_SESSION['POST']);
		?>

		<!-- =====================================
			Need to add information to the end of file 
		==============================================-->
		<?= getFooter(); ?>

	</body>
</html>