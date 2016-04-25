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
    
    if ($userProfile === false) {
        print_r("You cannot be found in the database. <br>");
        print_r("Return to the front page and sign up, or check the spelling.");
    } else {
        $matches = getMatches($userProfile);
            if (count($matches) > 0) {
                // Render matches.
                print_r("<div class='center'>Good news, you have " . count($matches) . " matches.</div>");
                for ($i = 0; $i < count($matches); $i++) {
                    print_r(displayProfile($matches[$i]));
                }
            } else {
                print_r("<div class='center'> No matches meet your criteria.</div>");
            }
    }
?>
        
    <?= getFooter() ?>
    </body>
</html>
