<?php

/*
Can use brackets within without having to make the compiler recognize them.
Also can use quotes as long as they are not the same as the outer quotation marks
*/

    echo "<h2>We can concatenate strings whether we use the echo or print method by placing a '.' between the strings:</h2>";
$hello = "hello";
$you = "you";
    print ('<strong>"(hello)"')." you</strong>";
    echo '<br><strong>(hello)'." there</strong><br>";
/*
However, if you want to pass it as parameters, then it won't work the same way. print will only be able to accept one parameter, whereas echo will accept both.

Also, print returns the value "1" if we assume that the correct arguments are passed.
*/
    echo '<br><strong>The difference between using echo and print</strong> is that print returns a value of 1 (considering there is an output), and echo can take several parameters by doing the following:  "x,y,z". <br><strong>This would not work with print!!</strong>';
    //print($hello,$you); will not compile
    echo '<br>',$hello," ",$you; //this will
    echo '<br>', "Parameters can consist of anything, even <strong> html tags.</strong>";

/*
To define a CONSTANT, case sensitive and all in CAPS! Basically, the first parameter is the name of the constant
*/
    echo "<br>";
define("NAME", "Robert Bobert");
    echo '<br>hello '.NAME;

/*
To set the time and date 
F = month
j = day
Y = year
Then have my age appear dynamically
*/

date_default_timezone_set('Canada/Mountain');
$today = date('F j, Y');
$this_year = date('Y');
$birth_year = 1992;

$my_age = ($this_year - $birth_year);

echo "<br>",$today,"<br>","My age is: ", $my_age, "<br>";

/*
How to use Arrays
*/

echo "<h4>It's time to use Arrays</h4>";

$color = array("red", "green", "blue");

define("TITLE", "Arrays");

$my_name = "Alexander Alessi";
$lecture_num = 3;

echo TITLE, "<br>";
echo $color[0],"<br>";
echo $color[1],"<br>";
echo $color[2],"<br>";
echo $my_name. " ", date('Y'), "<br>";

/*
Associative Arrays
*/

echo "<strong><br>Let's take a look at associate arrays</strong><br>";

define("TITLE2", "Associative Array");

echo "<br>"."<strong>".TITLE2."</strong>";

$bicycle = array(
    'name' => "Bicycle", 
    'type' => "Mountain Bike", 
    'cost' => 75
);

echo "<br>Cannot call array index one with [0] because the key name changed. We need to call it by using its name with ['name'] like this: ", $bicycle['name'];

/*
Multi Dimensional Arrays
*/

$cars = array(
    array(
        "name" => "BMW",
        "cost" => "50000$"
    )
);

    echo "</br>Name of the car is: " . $cars[0]['name'];
    echo "</br>Cost of the car is: " . $cars[0]['cost'];

/*
Opening and editing filesx
*/
    $fileContents = file_get_contents('LoginFile.txt');
    $file = fopen('LoginFile.txt', 'r');
    fread($file, filesize('LoginFile.txt'));

    $users = explode("\n", $fileContents);

    /*
    for($i=0;$i<sizeof($users);$i++)
    {
        $user = array();
    }
    */
    
    echo "</br>";
    print_r($users);

    if(file_exists('LoginFile.txt'))
    {
        $filename = 'LoginFile.txt';
        chmod($filename, 0777);
        fopen($filename, 'w') or die("Cannot open file: " . $filename);
    }
       
    $filename = "LoginFile.txt";
    
    $content = "hello:jim";
    fwrite($filename, $content);
    
    print_r($users);
?>
