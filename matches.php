<!DOCTYPE html>
<html>
<?php include "common.php" ?>
    <?= getHead() ?>
    <body>
        <?= getHeader() ?>
        <div id="viewMatchesDiv" method="get">
            <form action="matches-submit.php">
                Full name:
                <input type="text" name="name"><br>
                <input type="submit" value="View Your Matches">
            </form>
        </div>
        <div id="returningUserLabel">
            Returning User
        </div>
        <?= getFooter() ?>
    </body>
</html>