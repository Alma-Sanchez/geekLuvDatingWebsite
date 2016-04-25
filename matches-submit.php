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
        echo "You cannot be found in the database. <br>";
        echo "Return to the front page and sign up, or check the spelling.";
    } else {
        $matches = getMatches($userProfile);
        if (count($matches) > 0) {
            // Render matches.
            echo "Good news, you have " . count($matches) . " matches.";
            for ($i = 0; $i < count($matches); $i++) {
                echo displayProfile($matches[$i]);
            }
        } else {
            echo "No matches meet your criteria.";
        }
    }
?>
        
    <?= getFooter() ?>
    </body>
</html>
