<!DOCTYPE html>
<html>
	<!--
	Homework 6 (Geekluv)
	This provided file is the front page that links to two of the files
	you are going to write, signup.php and matches.php.
	You can modify this file as necessary to move redundant code out to common.php.
	-->
    
<!--    Import statements for PHP   -->
    <?php
        include "common.php";
    ?>
    
    <?= getHead() ?>

	<body>
		<?= getHeader() ?>

		<div class="welcomeButtons">
			<h2>Welcome!</h2>
			<ul>
				<li>
					<a href="signup.php" class="sign-up-btn">
						Sign up for a new account
					</a>
				</li>
				<br>
				<li>
					<a href="matches.php" class="check-mates-btn">
						<img src="heartbig.gif" alt="icon" />
						Check your matches 
					</a>
				</li>
			</ul>
		</div>
        
        <?= getFooter() ?>
	</body>
</html>
