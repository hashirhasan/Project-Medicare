<!-- search bar 
<form method="POST">
<input type="TEXT" name="search"/>
<input type="SUBMIT" name="submit" value="search"/>
</form>-->
<?php include "include/header.php"?>
   <?php include"medicine_css.php" ?>

</head>
<body>
   

        <?php

/*query for searching medicines and their subtitutes*/
/*sub => substitute, medi => medicines*/



//$outputdisease = NULL;
//$outputsubtitutes = NULL;
//$outputmedicines = NULL;
//$medicines = NULL;
//$showprice = NULL;
//$showimage = NULL;
//$showdetails = NULL;

if (isset ($_POST['search'] ) )
{

$mysqli = NEW MySQLI("localhost","root","","medicare1");

$search = $mysqli->real_escape_string($_POST['search']);



$decision_medi = $mysqli->query("SELECT medicines.medi_name AS mediName FROM medicines WHERE medicines.medi_name LIKE '%$search%'");

$decision_disease = $mysqli->query("SELECT diseases.disease_name AS diseaseName FROM diseases WHERE diseases.disease_name LIKE '%$search%'");



if (mysqli_num_rows ($decision_medi) != 0)
{


$resultSet = $mysqli->query("SELECT medicines.medi_id AS mediid
                             FROM medicines
                             WHERE medicines.medi_name LIKE '%$search%'");



while ($row = $resultSet->fetch_assoc()) 
{
    $medi_id = $row['mediid'];
    $result = $mysqli->query("SELECT medicines.medi_name AS mediName,medicines.medi_price AS mediprice,medicines.medi_image AS mediimg,medicines.medi_details AS medidetails FROM medicines WHERE medicines.medi_id = '$medi_id'");
    
    while($rows = $result->fetch_assoc())
{
    
    $search = $rows['mediName'];
    $decision_medi = $mysqli->query("SELECT subtitutes.sub_name AS subName FROM subtitutes WHERE subtitutes.sub_name LIKE '$search'");

if (mysqli_num_rows ($decision_medi) != 0)
{
    $results = $mysqli->query("SELECT medicines.medi_id AS mediid,medicines.medi_name AS mediName
                             FROM medicines,subtitutes,medisub
                             WHERE subtitutes.sub_name LIKE '$search' AND medicines.medi_id = medisub.medi_id AND subtitutes.sub_id = medisub.sub_id");

    while ($rowsss = $results->fetch_assoc()) {
    $smn = $rowsss['mediName'];
    $mediid = $rowsss['mediid'];
    $subtitute = $mysqli->query("SELECT subtitutes.sub_name AS subname 
                                 FROM subtitutes,medisub,medicines
                                 WHERE medicines.medi_id = '$mediid' AND medicines.medi_id = medisub.medi_id AND subtitutes.sub_id = medisub.sub_id");
    $uses = $mysqli->query("SELECT diseases.disease_name AS diseaseName
                                    FROM diseases,medicines,medidisease
                                    WHERE medicines.medi_id = '$mediid' AND medicines.medi_id = medidisease.medi_id AND diseases.disease_id = medidisease.disease_id");
}
}
else
{
$subtitute = $mysqli->query("SELECT subtitutes.sub_name AS subname 
                                 FROM subtitutes,medisub,medicines
                                 WHERE medicines.medi_id = '$medi_id' AND medicines.medi_id = medisub.medi_id AND subtitutes.sub_id = medisub.sub_id");
    $uses = $mysqli->query("SELECT diseases.disease_name AS diseaseName
                                    FROM diseases,medicines,medidisease
                                    WHERE medicines.medi_id = '$medi_id' AND medicines.medi_id = medidisease.medi_id AND diseases.disease_id = medidisease.disease_id");
}

    ?>
 <div class="container">
    <div class="medi-pic"><img src="../medicine/<?php echo $rows['mediimg'];?>"></div>
        <div class="medi-price"><h2><?php echo $rows['mediName'];?></h2><p><?php echo $rows['medidetails'];?></p>
        
        <a class="alt-btn" type="button" href="#popup1">Alternative</a>
        <div class="box"></div>
        <div id="popup1" class="overlay">
        <div class="popup">
        <h2>Alternative</h2>
        <a class="close" href="#">&times;</a>
        <div class="content">
            <?php
            error_reporting(0);
            echo $smn;
            while ($rowss = $subtitute->fetch_assoc()) {
                $subtitutes = $rowss['subname'];
                if(strtolower($subtitutes) != strtolower($search))
    {
                 echo $subtitutes;
             } 
         }
            ?>
        </div>
    </div>
</div>
        <a class="use-btn" type="button" href="#popup2">Use In</a>
        
        <div class="box"></div>
        <div id="popup2" class="overlay">
        <div class="popup">
        <h2>Use In</h2>
        <a class="close" href="#">&times;</a>
        <div class="content">
                    <?php 
                    while ($rowss = $uses->fetch_assoc()) {
                    echo $rowss['diseaseName'];
                }?>
        </div>
    </div>
</div>
        </div>
        <div class="medi-alt">
            <h3>Price: ₹<?php echo $rows['mediprice'];?></h3>
           <a href="https://www.medplusmart.com/product/CALPOL-500MG-TABLET/CALP0005">BUY NOW</a>
            </div>

</div>
<?php
}
}

}

elseif (mysqli_num_rows ($decision_disease) != 0)
{

$resultSet = $mysqli->query("SELECT medicines.medi_name AS mediName FROM medicines,diseases,medidisease WHERE diseases.disease_name LIKE '%$search%' AND diseases.disease_id = medidisease.disease_id AND medicines.medi_id = medidisease.medi_id");

while ($rowsss = $resultSet->fetch_assoc()) 
{
    
    $search = $rowsss['mediName'];
   
$result = $mysqli->query("SELECT medicines.medi_id AS mediid
                             FROM medicines
                             WHERE medicines.medi_name LIKE '$search'");

while ($row = $result->fetch_assoc()) 
{
   $medi_id = $row['mediid'];
    $results = $mysqli->query("SELECT medicines.medi_name AS mediName,medicines.medi_price AS mediprice,medicines.medi_image AS mediimg,medicines.medi_details AS medidetails FROM medicines WHERE medicines.medi_id = '$medi_id'");
    
   while ($rows = $results->fetch_assoc()) {
    
$subtitute = $mysqli->query("SELECT subtitutes.sub_name AS subname 
                                 FROM subtitutes,medisub,medicines
                                 WHERE medicines.medi_id = '$medi_id' AND medicines.medi_id = medisub.medi_id AND subtitutes.sub_id = medisub.sub_id");
    $uses = $mysqli->query("SELECT diseases.disease_name AS diseaseName
                                    FROM diseases,medicines,medidisease
                                    WHERE medicines.medi_id = '$medi_id' AND medicines.medi_id = medidisease.medi_id AND diseases.disease_id = medidisease.disease_id");
 ?>
 <div class="container">
    <div class="medi-pic"><img src="../medicine/<?php echo $rows['mediimg'];?>"></div>
        <div class="medi-price"><h2><?php echo $rows['mediName'];?></h2><p><?php echo $rows['medidetails'];?></p>
        <a class="alt-btn" type="button" href="#popup1">Alternative</a>
        <div class="box"></div>
        <div id="popup1" class="overlay">
        <div class="popup">
        <h2>Alternative</h2>
        <a class="close" href="#">&times;</a>
        <div class="content">
            <?php
            error_reporting(0);
            echo $smn;
            while ($rowss = $subtitute->fetch_assoc()) {
                $subtitutes = $rowss['subname'];
                if(strtolower($subtitutes) != strtolower($search))
    {
                 echo $subtitutes;
             } 
         }
            ?>
        </div>
    </div>
</div>
        <a class="use-btn" type="button" href="#popup2">Use In</a>
        <div class="box"></div>
        <div id="popup2" class="overlay">
        <div class="popup">
        <h2>Use In</h2>
        <a class="close" href="#">&times;</a>
        <div class="content">
                    <?php 
                    while ($rowss = $uses->fetch_assoc()) {
                    echo $rowss['diseaseName'];
                }?>
        </div>
    </div>
</div>
        </div>
        <div class="medi-alt">
            <h3>Price: ₹<?php echo $rows['mediprice'];?></h3>
           <a href="https://www.medplusmart.com/product/CALPOL-500MG-TABLET/CALP0005">BUY NOW</a>
            </div>
</div>
<?php
}
}
}
}
else{
    header("location: no.php");
}
}
?>
</body>
</html>


