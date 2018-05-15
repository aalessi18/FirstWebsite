<?php
    function verifyLoginInfo() {
        $fileContents = file_get_contents('LoginFile.txt');
        /*
            Explode in order to store values line by line
        */
        $users = explode("\n", $fileContents);
        
        return $users;
    }
?>