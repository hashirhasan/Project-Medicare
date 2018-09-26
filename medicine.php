<?php include"include/header.php"?>
<?php include"medicine_css.css"?>
    <div class="container">

        <?php

$outputdisease = NULL;
$outputsubtitutes = NULL;
$outputmedicines = NULL;
$medicines = NULL;
$showprice = NULL;
$showimage = NULL;
$showdetails = NULL;
;

if (isset ($_POST['search'] ) )
{

$mysqli = NEW MySQLI("localhost","root","","medicare1");

$search = $mysqli->real_escape_string($_POST['search']);

$decision_medi = $mysqli->query("SELECT medicines.medi_name AS mediName FROM medicines WHERE medicines.medi_name = '$search'");

$decision_disease = $mysqli->query("SELECT diseases.disease_name AS diseaseName FROM diseases WHERE diseases.disease_name = '$search'");



if (mysqli_num_rows ($decision_medi) != 0)
{


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


while($rows = $result->fetch_assoc())
{
    $subtitute = $rows['mediName'];
    if(strtolower($subtitute) != strtolower($search))
    {
        $outputsubtitutes .= "<p> * $subtitute </p> ";
    }
    }
   



}



elseif (mysqli_num_rows ($decision_disease) != 0)
{


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



while($rows = $result->fetch_assoc())
{
    $subtitute = $rows['mediName'];
    if(strtolower($subtitute) != strtolower($search))
    {
        $outputsubtitutes .= "<p> * $subtitute </p> ";
    }
    
}
}
}

?>


    

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
        <div class="content">
                    <?php echo "$outputdisease";?>
        </div>
    </div>
</div>
        </div>
        <div class="medi-alt">
            <h3>Price: ₹<?php echo "$showprice";?></h3>
           <a href="https://www.medplusmart.com/product/CALPOL-500MG-TABLET/CALP0005">BUY NOW</a>
            </div>

</div>









</body>
</html>


