<!-- search bar 
<form method="POST">
<input type="TEXT" name="search"/>
<input type="SUBMIT" name="submit" value="search"/>
</form>-->

<!DOCTYPE html>
<html>
<head>
    <title>medicine</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../medicine/medicine.css">

</head>
<body>
    <div class="container">

        <?php

/*query for searching medicines and their subtitutes*/
/*sub => substitute, medi => medicines*/



$outputdisease = NULL;
$outputsubtitutes = NULL;
$outputmedicines = NULL;
$medicines = NULL;
$showprice = NULL;
$showimage = NULL;
$showdetails = NULL;
//$searchtemp = NULL;

if (isset ($_POST['search'] ) )
{

$mysqli = NEW MySQLI("localhost","root","","medicare");

$search = $mysqli->real_escape_string($_POST['search']);

//str_replace('$search', '$temp', '');
//$temp = '$search';

$decision_medi = $mysqli->query("SELECT medicines.medi_name AS mediName FROM medicines WHERE medicines.medi_name = '$search'");

$decision_disease = $mysqli->query("SELECT diseases.disease_name AS diseaseName FROM diseases WHERE diseases.disease_name = '$search'");



if (mysqli_num_rows ($decision_medi) != 0)
{

//echo " <h1> $search </h1> <br> <h2> primary uses of $search: </h2>";

$getdetails = $mysqli->query("SELECT medicines.medi_price AS mediprice,medicines.medi_image AS mediimg,medicines.medi_details AS medidetails
                            FROM medicines
                            WHERE medicines.medi_name = '$search'");

while ($rows = $getdetails->fetch_assoc()) {
    $Price = $rows['mediprice'];
    $showprice .= "$Price";
    $img = $rows['mediimg'];
    $showimage .= "$img";
    $details = $rows['medidetails'];
    $showdetails .= "$details";
}

$resultSet = $mysqli->query("SELECT medicines.medi_name AS mediName,diseases.disease_name AS diseaseName,medidisease.disease_id AS diseaseid
                             FROM medicines,diseases,medidisease
                             WHERE medicines.medi_name = '$search' AND medicines.medi_id = medidisease.medi_id AND diseases.disease_id = medidisease.disease_id");

while ($rows = $resultSet->fetch_assoc()) 
{
    $disease = $rows['diseaseName'];
    $outputdisease .= " <p> * $disease </p> ";

    $desi_id = $rows['diseaseid'];
    $result = $mysqli->query("SELECT medicines.medi_name AS mediName
                               FROM medicines,medidisease
                               WHERE medidisease.disease_id = '$desi_id' AND medicines.medi_id = medidisease.medi_id");
}

//echo $outputdisease;

//echo "<h2> subtitutes: </h2>";

while($rows = $result->fetch_assoc())
{
    $subtitute = $rows['mediName'];
    if(strtolower($subtitute) != strtolower($search))
    {
        $outputsubtitutes .= "<p> * $subtitute </p> ";
    }
    }
   

//echo $outputsubtitutes;

}



elseif (mysqli_num_rows ($decision_disease) != 0)
{
//echo " <h1> $search </h1> <br> <h2> medicines: </h2>";

$resultSet = $mysqli->query("SELECT medicines.medi_name AS mediName,diseases.disease_name AS diseaseName, subtitutes.sub_name FROM medicines,diseases,medidisease,subtitutes,medisub WHERE diseases.disease_name = '$search' AND diseases.disease_id = medidisease.disease_id AND medicines.medi_id = medidisease.medi_id AND subtitutes.sub_id = medisub.sub_id AND medicines.medi_id = medisub.medi_id");

while ($rows = $resultSet->fetch_assoc()) 
{
    if(strtolower($rows['mediName']) == strtolower($medicines))
    {
        break;
    }
    $search = $rows['mediName'];
   $outputmedicines .= " <p> * $medicines </p> ";
}

$getdetails = $mysqli->query("SELECT medicines.medi_price AS mediprice,medicines.medi_image AS mediimg,medicines.medi_details AS medidetails
                            FROM medicines
                            WHERE medicines.medi_name = '$search'");

while ($rows = $getdetails->fetch_assoc()) {
    $Price = $rows['mediprice'];
    $showprice .= "$Price";
    $img = $rows['mediimg'];
    $showimage .= "$img";
    $details = $rows['medidetails'];
    $showdetails .= "$details";
}

$resultSet = $mysqli->query("SELECT medicines.medi_name AS mediName,diseases.disease_name AS diseaseName,medidisease.disease_id AS diseaseid
                             FROM medicines,diseases,medidisease
                             WHERE medicines.medi_name = '$search'  AND medicines.medi_id = medidisease.medi_id AND diseases.disease_id = medidisease.disease_id");

while ($rows = $resultSet->fetch_assoc()) 
{
    $disease = $rows['diseaseName'];
    $outputdisease .= " <p> * $disease </p> ";

    $desi_id = $rows['diseaseid'];
    $result = $mysqli->query("SELECT medicines.medi_name AS mediName
                               FROM medicines,medidisease
                               WHERE medidisease.disease_id = '$desi_id' AND medicines.medi_id = medidisease.medi_id");
}

//echo $outputdisease;

//echo "<h2> subtitutes: </h2>";

while($rows = $result->fetch_assoc())
{
    $subtitute = $rows['mediName'];
    if(strtolower($subtitute) != strtolower($search))
    {
        $outputsubtitutes .= "<p> * $subtitute </p> ";
    }
    //echo $outputmedicines;
}
}
}

?>

<?php 
for($i = 0;$GLOBALS['outputs']>0; $i++) {?>
    

        <div class="medi-pic"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($showimage) . '" />';?></div>
        <div class="medi-price"><h2><?php echo "$search";?></h2><p><?php echo "$showdetails";?></p>
        <!-- <input class="alt-btn" type="button" value="Alternative" > -->
        <a class="alt-btn" type="button" href="#popup1">Alternative</a>
        <div class="box"></div>
        <div id="popup1" class="overlay">
        <div class="popup">
        <h2>Alternative</h2>
        <a class="close" href="#">&times;</a>
        <div class="content">
            <?php echo "$outputsubtitutes";?>
        </div>
    </div>
</div>
        <a class="use-btn" type="button" href="#popup2">Use In</a>
        <!-- <input class="use-btn" type="button" value="Use In"> -->
        <div class="box"></div>
        <div id="popup2" class="overlay">
        <div class="popup">
        <h2>Use In</h2>
        <a class="close" href="#">&times;</a>
        <div class="con"tent">
                    <?php echo "$outputdisease";?>
        </div>
    </div>
</div>
        </div>
        <div class="medi-alt">
            <h3>Price: ₹<?php echo "$showprice";?></h2>
           
            </div>
</div>

<?php }
?>

<!-- 
<div class="container">
    
        <div class="medi-pic"><img src="tab.jpg"></div>
        <div class="medi-price"><h2>Name</h2><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        <input class="alt-btn" type="button" value="Alternative" > -->
      <!--  <a class="alt-btn" type="button" href="#popup1">Alternative</a>
        <div class="box"></div>
        <div id="popup1" class="overlay">
        <div class="popup">
        <h2>Alternative</h2>
        <a class="close" href="#">&times;</a>
        <div class="content">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
    </div>
</div>
        <a class="use-btn" type="button" href="#popup2">Use In</a>
     <input class="use-btn" type="button" value="Use In"> 
        <div class="box"></div>
        <div id="popup2" class="overlay">
        <div class="popup">
        <h2>Use In</h2>
        <a class="close" href="#">&times;</a>
        <div class="content">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
    </div>
</div>
        </div>
        <div class="medi-alt">
            <h3>Price:</h2>
            
            </div>
</div>

    <div class="container">
    
        <div class="medi-pic"><img src="tab.jpg"></div>
        <div class="medi-price"><h2>Name</h2><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        <input class="alt-btn" type="button" value="Alternative">
            <input class="use-btn" type="button" value="Use In">
        </div>
        <div class="medi-alt">
            <h3>Price:</h2>
            
            </div>
        
    </div> --> 








</body>
</html>


