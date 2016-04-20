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
    
<!--    Import statements for PHP   -->
    <?php
        include "common.php";
    ?>

	<body>
		<?= getHeader() ?>

		<div class="welcomeButtons">
			<h1>Welcome!</h1>
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
