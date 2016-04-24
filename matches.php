<!DOCTYPE html>
<html>
<?php include "common.php" ?>
    <?= getHead() ?>
    <body>
        <?= getHeader() ?>
        <form action="matches-submit.php" method="post">
            <fieldset>
                <legend>Returning User</legend>
                Full name:
                <input type="text" name="fullName"><br><br>
                <input type="submit" value="View Your Matches">
            </fieldset>
        </form>
        <?= getFooter() ?>
    </body>
</html>