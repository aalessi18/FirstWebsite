<!--
// -----------------------------------------------------------------------------
// Written by: Alexander Alessi
// -----------------------------------------------------------------------------
-->

<?php

    if(isset($_COOKIE['visits']))
    {
        echo "Hello, this is the " . $_COOKIE['visits'] . " time that you are visiting my webpage";
    }
    else
    {
        $_COOKIE['visits'] = 1;
        echo "Welcome to my webpage! It is your first time that you are here";
    }

setcookie("visits",1+$_COOKIE['visits'], time()+600, '/', false);
/*
on the first run, its not set - it only gets set after the whole page is loaded.
*/
?>