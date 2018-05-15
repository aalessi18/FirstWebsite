<?php

function readUsersFile() {

    $usersString = file_get_contents('./users.txt');
    // Here for the delimiter I am using the built in PHP_EOL constant, which
    // is the constant for the newline character. ('\n' won't work here or else)
    $usersArray = explode(PHP_EOL, trim($usersString));

    //var_dump($usersArray);
    return $usersArray;
}
