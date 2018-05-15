<!--
// ------------------------------------------------------------------------------
// Assignment 4 Part 3
// Written by: Alexander Alessi
// -----------------------------------------------------------------------------
-->

<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <title>Forms</title>
    <body>
        <form method="post">
            <label for="fullName">Please enter your full name:</br></label>
            <input type="text" id="fullName" name="fullName"></br>
            
            <label for="phoneNumber"></br>Please enter your phone number:</br></label>
            <input type="text" id="phoneNumber" name="phoneNumber"></br>
            <input type="submit" id="submitForm" name="submitForm"></br>
            <?php
                if(isset($_POST['submitForm']))
                {
                    if(isset($_POST['phoneNumber']))
                    {
                        if(preg_match("/^[0-9][0-9][0-9]\-[0-9][0-9][0-9]\-[0-9][0-9][0-9][0-9]$/", $_POST['phoneNumber']))
                        {
                            echo "</br>The number you have enter is correct";   
                        }
                        else
                            echo "<br>The number you have enter is incorrect";
                    }
                }       
            ?>
        </form>
    </body>
</html>