<!--
// -----------------------------------------------------------------------------
// Written by: Alexander Alessi
// -----------------------------------------------------------------------------
-->

<!-- HEADER TEMPLATE FOR HTML CODE -->   
<?php 
    session_start();

    function verifyAptInfo() {
        $fileContents = file_get_contents('VacantApartments.txt');
        $availableApartments = explode("\n", $fileContents);

        return $availableApartments;
    }

    define("TITLE", "Alex's Apartment Search Form");

    include('ApartmentHeader.php');

    if(!empty($_SESSION['message']))
    {
        echo "<p><strong>" . $_SESSION['message'] . "</strong></p>";
    }

    if(!empty($_SESSION['LoggedIn']))
    {
        echo '<div style="position: relative; float: right; bottom: 120px;"><form id="form" method="get" onsubmit=""><input type="submit" id="signOut" name="signOut" value="Sign Out"></form></div>';
        ?>
            <!-- CSS STYLE SHEET FOR HOME PAGE -->
<link rel="stylesheet" type='text/css' href="Apartment.css">
    <!-- Needed to add onsubmit return false in order to prevent the page from refreshing when submitted-->
    <?php
    if(isset($_GET['signOut']))
    {
        $_SESSION['LoggedIn'] = false;
        $_SESSION['message'] = "";
        $_POST['username'] = false;
        $_POST['password'] = false;
        header('location: Apartment.php');
    }
    ?>
   <form style="position: relative; float: left; clear: both; width: 100%;" id="form" method="" onsubmit="">     
    <fieldset id="fieldset1">
      <legend id="legend1">Renter(s) Information</legend>
      <strong>How many people will be living in the apartment?</strong>
      <select>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
      </select>
      <p><strong>Smoker?</strong>
        <input type="radio" name="smokerAns" value="Yes">
        <label for="Yes" class="smokerAns">Yes</label>
        <input type="radio" name="smokerAns" value="No">
        <label for="No" class="smokerAns">No</label>
      </p>
      <p><strong>Any pets?</strong></p>
        <input type="checkbox" name="pets" value="Cat">
        <label for="Cat" class="pets">Cat(s)<br>
        <input type="checkbox" name="pets" value="Dog">
        <label for="Dog" class="pets">Dog(s)<br>
        <input type="checkbox" name="pets" value="Other">
        <label for="Other" class="pets">Other <strong>Specify:</strong> <input type="text"><br>
        <input type="checkbox" name="pets" value="NoPets">
        <label for="NoPets" class="pets">No Pets<br>
    </fieldset><br>
    <fieldset id="fieldset2">
      <legend id="legend2">What are your looking for?</legend>
      <p><strong>Size of Apartment?</strong></p>
        <input type="checkbox" name="aptSize" value="Loft">
        <label for="Loft" class="aptSize">Loft</label>
        <input type="checkbox" name="aptSize" value="threeandHalf">
        <label for="3andhalf" class="aptSize">3&frac12</label>
        <input type="checkbox" name="aptSize" value="fourandHalf">
        <label for="4andhalf" class="aptSize">4&frac12</label>
        <input type="checkbox" name="aptSize" value="fiveandHalf">
        <label for="5andhalf" class="aptSize">5&frac12</label>
        <input type="checkbox" name="aptSize" value="morethanfive">
        <label for="morethan5" class="aptSize">More than 5&frac12</label>
      <p><strong>Do you have preferred Locations?</strong></p>
        <input type="checkbox" name="location" value="Downtown">
        <label for="Downtown" class="location">Downtown</label>
        <input type="checkbox" name="location" value="Brossard">
        <label for="Brossard" class="location">Brossard</label>
        <input type="checkbox" name="location" value="Westmount">
        <label for="Westmount" class="location">Westmount</label>
        <input type="checkbox" name="location" value="TwnofMountRyl">
        <label for="TwnofMountRyl" class="location">Town of Mount-Royal</label>
        <input type="checkbox" name="location" value="WestIsland">
        <label for="WestIsland" class="location">West Island</label>
        <input type="checkbox" name="location" value="Anjou">
        <label for="Anjou" class="location">Anjou</label>
      <p><strong>Availabilities:</strong> 5500 De Maissoneuve, Downtown. 30 Orange Crescent, Brossard</p>
      <p><strong>Price Range/Month</strong></p>
      <select id="dropdown">
        <option value="<500" name="price">&lt700</option>
        <option value="<600" name="price">&lt800</option>
        <option value="<700" name="price">&lt900</option>
        <option value="<800" name="price">&lt1000</option>
        <option value="NoLimit" name="price">No Limit</option>
      </select><br>
      <p><strong>Would be nice to have:</strong> </p>
        <input type="checkbox" name="amenities" value="Fire Place">
        <label for="FirePlace" class="amenities">Fire Place</label>
        <input type="checkbox" name="amenities" value="Indoor Pool">
        <label for="IndoorPool" class="amenities">Indoor Pool</label>
        <input type="checkbox" name="amenities" value="Indoor Parking">
        <label for="IndoorParking" class="amenities">Indoor Parking</label>
        <input type="checkbox" name="amenities" value="Outdoor Parking">
        <label for="OutdoorParking" class="amenities">Outdoor Parking</label>
        <input type="checkbox" name="amenities" value="Electric Heating">
        <label for="ElectricHeating" class="amenities">Electric Heating</label>
        <input type="checkbox" name="amenities" value="Balcony">
        <label for="Balcony" class="amenities">Balcony</label>
      <br><br>
    </fieldset>
    <fieldset id="fieldset3">
        <legend id="legend3">Expert Suggestions</legend>
        <p></p>
    </fieldset>
    <fieldset id="fieldset4">
        <legend id="legend4">Additional Information:</legend>
        <p></p>
    </fieldset>
    <p>Let's see what we can find...</p>
    <?php
        $count = 0;
        $availableApartments = verifyAptInfo();
        
        if(isset($_GET['submit']))
        {
            foreach($availableApartments as $available) {
                
                
                if(empty($_GET['aptSize']) || empty($_GET['location']) || empty($_GET['amenities']) || empty($_GET['pets']))
                {
                    
                    echo "<h3 id='results'>No results found</h3></br>";
                    break;
                }
                
                $temp = explode(':', $available);
                $aptSize = $temp[0];
                $location = $temp[1];
                $amenities = $temp[2];
                $pets = $temp[3];
                //echo "file: " . " " . $aptSize . " " . $location . " " .  $amenities . " " . $pets . "</br>";
                //echo $_GET['aptSize'] . " " . $_GET['location'] . " " . $_GET['amenities'] . " ". $_GET['pets'] . "</br>";
                
        
                if(($aptSize==$_GET['aptSize'])&&($location==$_GET['location'])&&($amenities==$_GET['amenities'])
                   &&($pets==$_GET['pets']))
                {
                    $count++;
                } 
            }
            if($count>0)
            {
               echo "<h3 id='results'> There is/are " . $count . " available apartments</h3></br>"; 
            }
            
            if(($count==0) && !empty($_GET['aptSize']) && !empty($_GET['location']) && !empty($_GET['amenities']) && !empty($_GET['pets']))
            {
                echo "<h3 id='results'>No results found</h3></br>";
            }
        }
    ?>
        <input type="submit" value="Search" id="sub" name="submit">
        <input type="reset" id="reset" value="Start Over">
    </form>
<script type="text/javascript" src="Apartment.js"></script>
<!-- FOOTER TEMPLATE FOR HTML CODE -->     
<?php include('ApartmentFooter.php');?>
        <?php
    }  
    
    else
    {
        ?>
        <!-- CSS STYLE SHEET FOR HOME PAGE -->
<link rel="stylesheet" type='text/css' href="Apartment.css">
    <!-- Needed to add onsubmit return false in order to prevent the page from refreshing when submitted-->
    <?php
        if(isset($_GET['signIn']))
        {
            header('location: Login.php');
        }
        if(isset($_GET['infoButton']))
        {
            header('location: Login.php');
        }
        if(isset($_GET['register']))
        {
            header('location: register.php');
        }
    ?>
    <div style="position: relative; float: right; bottom: 90px;">
        <form id="form" method="get">
            <input type="submit" value="Sign In" id="signIn" name="signIn">
            <input type="submit" value="Register" id="register" name="register"> 
            <input type="submit" value="Login for more Information" id="infoButton" name="infoButton" style="position: absolute; right: 300px; top: 120px;">
        </form>
    </div>
    <form style="position: relative; float: left; clear: both; width: 100%;" id="form" method="" onsubmit="">
    <fieldset id="fieldset1">
      <legend id="legend1">Renter(s) Information</legend>
      <strong>How many people will be living in the apartment?</strong>
      <select>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
      </select>
      <p><strong>Smoker?</strong>
        <input type="radio" name="smokerAns" value="Yes">
        <label for="Yes" class="smokerAns">Yes</label>
        <input type="radio" name="smokerAns" value="No">
        <label for="No" class="smokerAns">No</label>
      </p>
      <p><strong>Any pets?</strong></p>
        <input type="checkbox" name="pets" value="Cat">
        <label for="Cat" class="pets">Cat(s)<br>
        <input type="checkbox" name="pets" value="Dog">
        <label for="Dog" class="pets">Dog(s)<br>
        <input type="checkbox" name="pets" value="Other">
        <label for="Other" class="pets">Other <strong>Specify:</strong> <input type="text"><br>
        <input type="checkbox" name="pets" value="NoPets">
        <label for="NoPets" class="pets">No Pets<br>
    </fieldset><br>
    <fieldset id="fieldset2">
      <legend id="legend2">What are your looking for?</legend>
      <p><strong>Size of Apartment?</strong></p>
        <input type="checkbox" name="aptSize" value="Loft">
        <label for="Loft" class="aptSize">Loft</label>
        <input type="checkbox" name="aptSize" value="threeandHalf">
        <label for="3andhalf" class="aptSize">3&frac12</label>
        <input type="checkbox" name="aptSize" value="fourandHalf">
        <label for="4andhalf" class="aptSize">4&frac12</label>
        <input type="checkbox" name="aptSize" value="fiveandHalf">
        <label for="5andhalf" class="aptSize">5&frac12</label>
        <input type="checkbox" name="aptSize" value="morethanfive">
        <label for="morethan5" class="aptSize">More than 5&frac12</label>
      <p><strong>Do you have preferred Locations?</strong></p>
        <input type="checkbox" name="location" value="Downtown">
        <label for="Downtown" class="location">Downtown</label>
        <input type="checkbox" name="location" value="Brossard">
        <label for="Brossard" class="location">Brossard</label>
        <input type="checkbox" name="location" value="Westmount">
        <label for="Westmount" class="location">Westmount</label>
        <input type="checkbox" name="location" value="TwnofMountRyl">
        <label for="TwnofMountRyl" class="location">Town of Mount-Royal</label>
        <input type="checkbox" name="location" value="WestIsland">
        <label for="WestIsland" class="location">West Island</label>
        <input type="checkbox" name="location" value="Anjou">
        <label for="Anjou" class="location">Anjou</label>
      <p><strong>Price Range/Month</strong></p>
      <select id="dropdown">
        <option value="<500" name="price">&lt700</option>
        <option value="<600" name="price">&lt800</option>
        <option value="<700" name="price">&lt900</option>
        <option value="<800" name="price">&lt1000</option>
        <option value="NoLimit" name="price">No Limit</option>
      </select><br>
      <p><strong>Would be nice to have:</strong> </p>
        <input type="checkbox" name="amenities" value="Fire Place">
        <label for="FirePlace" class="amenities">Fire Place</label>
        <input type="checkbox" name="amenities" value="Indoor Pool">
        <label for="IndoorPool" class="amenities">Indoor Pool</label>
        <input type="checkbox" name="amenities" value="Indoor Parking">
        <label for="IndoorParking" class="amenities">Indoor Parking</label>
        <input type="checkbox" name="amenities" value="Outdoor Parking">
        <label for="OutdoorParking" class="amenities">Outdoor Parking</label>
        <input type="checkbox" name="amenities" value="Electric Heating">
        <label for="ElectricHeating" class="amenities">Electric Heating</label>
        <input type="checkbox" name="amenities" value="Balcony">
        <label for="Balcony" class="amenities">Balcony</label>
      <br><br>
    </fieldset>
    <fieldset id="fieldset3">
        <legend id="legend3">Expert Suggestions</legend>
        <p></p>
    </fieldset>
    <fieldset id="fieldset4">
        <legend id="legend4">Additional Information:</legend>
        <p></p>
    </fieldset>
    <p>Let's see what we can find...</p>
    <?php
        $count = 0;
        $availableApartments = verifyAptInfo();
        
        if(isset($_GET['submit']))
        {
            foreach($availableApartments as $available) {
                
                
                if(empty($_GET['aptSize']) || empty($_GET['location']) || empty($_GET['amenities']) || empty($_GET['pets']))
                {
                    echo "<h3 id='results'>No results found</h3></br>";
                    break;
                }
                
                $temp = explode(':', $available);
                $aptSize = $temp[0];
                $location = $temp[1];
                $amenities = $temp[2];
                $pets = $temp[3];
        
                if(($aptSize==$_GET['aptSize'])&&($location==$_GET['location'])&&($amenities==$_GET['amenities'])
                   &&($pets==$_GET['pets']))
                {
                    $count++;
                } 
            }
            if($count>0)
            {
                echo "<h3 id='results'> There is/are " . $count . " available apartments</h3></br>"; 
            }
            
            if(($count==0) && !empty($_GET['aptSize']) && !empty($_GET['location']) && !empty($_GET['amenities']) && !empty($_GET['pets']))
            {
                echo "<h3 id='results'>No results found</h3></br>";
            }
        }
    ?>
        <input type="submit" value="Search" id="sub" name="submit">
        <input type="reset" id="reset" value="Start Over">
    </form>
<script type="text/javascript" src="Apartment.js"></script>
<!-- FOOTER TEMPLATE FOR HTML CODE -->     
<?php include('ApartmentFooter.php');
    }
    ?>   
        
   
            
<!--  
<form id="form" method="get" onsubmit="">
        <input type="submit" value="Sign In" id="signIn" name="signIn" style="background-color: antiquewhite; position: absolute; left: 630px; top: 25px; font-family: Arial, 'Times New Roman'; font-size: 17px;">
        <input type="submit" value="Register" id="register" name="register" style="background-color: antiquewhite; position: absolute; left: 710px; top: 25px; font-family: Arial, 'Times New Roman'; font-size: 17px;">

-->