<?php
session_start();
    define("TITLE", "Register |Alex's Apartment Search Form");

    include('ApartmentHeader.php');

    if(isset($_POST['register']))
    {
        if( preg_match(('/^[a-zA-Z0-9]+$/'),$_POST['username']) && preg_match(('/[a-zA-Z]/'), $_POST['password']) 
           && preg_match(('/[0-9]/'), $_POST['password']) && preg_match('/^[a-zA-Z0-9]+$/', $_POST['password']) && strlen($_POST['password'])>=4)
        {
            $_SESSION['LoggedIn'] = true;
            header('location: Apartment.php');
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'alert("The information provided does not match our requested criteria. Usernames must be upper/lower case letters and may contain number. A password must be atleast 4 characters long with one letter and one number")';
            echo '</script>';
        }
    }
?>

<form method="post">
    <div id="container1">
        <label for="username">Enter a User Name:</label></br>
        <input type="text" id="username" name="username"></br>
    </div>
    <div id="container2" style="position: relative; left: 140px;">
        </br><label for="password">Choose a password:</label></br>
        <input type="password" id="password" name="password"></br>
        <input type="submit" id="register" name="register" style="background-color: antiquewhite; font-family: Arial, 'Times New Roman'; font-size: 13px;" value="Register">
    </div>

<?php   
    include('ApartmentFooter.php');
?>
