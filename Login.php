<?php
    define("TITLE", "Login |Alex's Apartment Search Form");

    include('ApartmentHeader.php');
    
    function verifyLoginInfo() {
        $fileContents = file_get_contents('LoginFile.txt');
        
        $users = explode("\n", $fileContents);
        
        return $users;
    }
?>
<?php session_start(); ?>
<link rel="stylesheet" type="text/css" href="Login.css">
<div id="container">
    <div id="innerContainer">
        <form method="post">
            <label for="username">Username:</label></br>
            <input type="text" id="username" name="username"></br>
            </br><label for="password">Password:</label></br>
            <input type="password" id="password" name="password"></br>
            <input type="submit" id="signIn" name="signIn" value="Sign In">
        <?php

        if(!empty($_POST['username']) && !empty($_POST['password']))
        {
            $users = verifyLoginInfo();

            foreach($users as $user)
            {
                //Explode line by line to store the username and password separately in order to test
                $temp = explode(':', $user);
                $username = $temp[0];
                $password = $temp[1];

                if($_POST['username'] == $username)
                {
                    if($_POST['password'] == $password)
                    {
                        header('location: Apartment.php');
                        $_SESSION['LoggedIn'] = true;
                        break;
                    }
                    else
                    {
                        $_SESSION['LoggedIn'] = false;
                    }
                }

            }
        }
        if(isset($_SESSION['LoggedIn']) && !empty($_POST['username']) )
        {
            if($_SESSION['LoggedIn'] === true)
            {
                $_SESSION['message'] = "Welcome " . $_POST['username'];
            }
            else
            {
                echo '<script type="text/javascript">';
                echo 'alert("Incorrect information, please try again")';
                echo '</script>';
            }
        }
        else
        {
            $_SESSION['LoggedIn'] = false;
        }

        if(isset($_POST['Logout']))
        {
            if($_POST['Logout'] == '1')
            {
                $_SESSION['LoggedIn'] = false;
            }
        }
        ?>
        </form>
    </div>
</div>

<?php include('ApartmentFooter.php')?>