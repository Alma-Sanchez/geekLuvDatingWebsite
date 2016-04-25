<!DOCTYPE html>
<html>
<?php include "common.php" ?>
    <?= getHead() ?>
    <body>
    <?= getHeader() ?>
    
    <h3>Matches for User</h3>
    
<?php
//    echo $_SERVER["PHP_SELF"];
//    echo "<br>";
    $name = $_POST["fullName"];
    $names = explode(" ", $name);
    $userProfile = getUserProfile($name);
    $matches = getMatches($userProfile);
    
    if (count($matches) > 0) {
        // Render matches.
        print_r("Good news, you have " . count($matches) . " matches.");
    } else {
        print_r("No matches meet your criteria.");
    }
    
    
//    $singlesContents = fread($singlesHandler, 1000000);
?>
        
    <?= getFooter() ?>
    </body>
</html>
