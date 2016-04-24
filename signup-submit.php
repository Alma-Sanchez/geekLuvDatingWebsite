<!DOCTYPE html>
<html>
<?php include "common.php" ?>
   <!--  <?= getHead() ?> -->
    <body>
        <?= getHeader() ?>
	
	<p>
			<?php echo "Welcome to GeekLuv $name! <br> Now you can <a href='matches.php'>login </a> to find your perfect match!"; 
			?>	
	</p>
<?php
	// Write sign up stuff to singles2.txt
	function addProfile($name,$gender,$age,$type,$minAge,$maxAge,$seekingGender){
		$outputFile = fopen("singles2.txt","a") or die("Unable to open file!");
		echo fread($outputFile, filesize("singles2.txt"));
		$textToAdd = "$name,$gender,$age,$type,$minAge,$maxAge,$seekingGender\n";
		fwrite($outputFile,$textToAdd);
		fclose($outputFile);
		echo	"<p> 'Welcome to GeekLuv $name! <br> Now you can <a href='matches.php'>login </a> to find your perfect match! </p>";
	}
?>

		<!-- =====================================
			Need to add information to the end of file 
		==============================================-->
		<?= getFooter(); ?>

	</body>
</html>