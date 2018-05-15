<!--
// ------------------------------------------------------------------------------
// Assignment 4 Part 1
// Written by: Alexander Alessi, 26439217
// For SOEN 287 Section Q
// -----------------------------------------------------------------------------
-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Test PHP Functions</title>
    </head>
    <body>
        <?php
            function findSummation() {
                $sum = 0;
                $valueToAdd = $_GET['valueToSum'];

                if($valueToAdd==0)
                    $sum = 1;

                if(!is_numeric($valueToAdd) || $valueToAdd<0)
                    return false;

                for($i=0; $i<$valueToAdd; $i++)
                {
                    $sum += ($valueToAdd-$i);
                }
                
                if($valueToAdd == 0)
                    echo "<br>Default sum is 1 since we are adding between 1 to N";
                else
                    echo "<br>Sum of " . $valueToAdd . " is equal to: " . $sum;
            }
        
            function uppercaseFirstandLast() {
                $valueToCapitalize = $_GET['stringToCapitalize'];
                
                if(is_numeric($valueToCapitalize))
                    return false;
                else
                {
                    $strings = explode(" ", $valueToCapitalize);
                    
                    echo "</br>", "<strong>Resulting String is: </strong>", "</br>";
                    foreach($strings as $string)
                    {
                        $firstIndex = strtoupper(substr($string, 0, 1));
                        $lastIndex = strtoupper(substr($string, -1));
                        $string = $firstIndex.substr($string, 1, -1).$lastIndex;
                        echo $string. " ";
                    }
                }
            } 
        
            function findAverage_and_Mean($params) {
                $totalVariables = 0;
                $mean = 0;
                $middle;
                $median = 0;
                sort($params);
                
                foreach($params as $param)
                {
                    $totalVariables++;
                    $mean += $param;
                }
                $mean = $mean/$totalVariables;
                
                if((count($params))%2 == 0)
                {
                    $firstMiddle = ((count($params)/2)-1);
                    $secondMiddle = $firstMiddle+1;
                    $median = ($params[$firstMiddle]+$params[$secondMiddle])/2;
                }
                else
                {
                    $middle = (count($params))/2;
                    $median = $params[$middle];
                }
                    
                echo "</br>Mean = " . $mean . "</br> Median = " . $median;
            }
        
            function find4Digits() {
                $fullString = $_GET['fourDigits'];
                $sizeOfString = strlen($fullString);
                $count = 0;
                
                echo "</br>";
                
                
                for($i=0;$i<$sizeOfString;$i++)
                {
                    echo is_numeric($sizeOfString[$i]);
                    if(is_numeric($fullString[$i]))
                    {
                        if($count==4)
                            break;
                        echo $fullString[$i];
                        $count++;
                    }
                }
                
                if($count==0)
                {
                    echo "no numbers";
                    return false;
                }
            
            }
        ?>
        <form method="get">
            
            <label for="valueToSum"><h1>Value to find sum</h1></label>
            <input type="text" id="valueToSum" name="valueToSum">
            <input type="submit" id="submitSum" name="submitSum">
            <?php
                if(isset($_GET['submitSum']))
                {
                    findSummation();
                }
            ?>
            
            <label for="stringToCapitalize"><h2>String to Capitalize First and Last index</h2></label>
            <input type="text" id="stringToCapitalize" name="stringToCapitalize">
            <input type="submit" id="submitCapitalize" name="submitCapitalize">
            <?php
                if(isset($_GET['submitCapitalize']))
                {
                    uppercaseFirstandLast();
                }
            ?>
            
            <label for="meanAndMedia"><h3>Let's find the Mean and Median of the following arrays:</h3></label>
            <?php
                $array1 = array(1, 2, 4, 8, 3, 2);
                
                echo "array1 = [ ";
                foreach($array1 as $value)
                {
                    echo $value . ", ";
                }
                echo "]</br>";
                
                $array2 = array(1, 3, 4, 2, 5, 6, 2);
                
                echo "array2 = [ ";
                foreach($array2 as $value)
                {
                    echo $value . ", ";
                }
                echo "]</br></br>";
            ?>
            <input type="submit" id="submitMeanMedian" name="submitMeanMedian" value="Let's calculate!">
            <?php
                echo "</br>";
                if(isset($_GET['submitMeanMedian']))
                {
                    findAverage_and_Mean($array1);
                    findAverage_and_Mean($array2);
                }
            ?>
            
            <label><h4>This section finds the first four digits of a String</h4></label>
            <textarea id="fourDigits" name="fourDigits" rows="4" cols="30"></textarea>
            <input type="submit" id="submitFourDigits" name="submitFourDigits">
            <?php
                if(isset($_GET['submitFourDigits']))
                {
                    find4Digits();
                }
            ?>
        </form>
    </body>
</html>

<!--   


-->