<!DOCTYPE html>
<html>
<head>
    <title>MEDICARE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="new.css">
</head>
<body>
    <header class="header">
        <img class="logo" src="medi4.svg">
        
        </header>
    <nav>
            <ul>
                <!-- <li><a class="black" href="#"> Home</a></li> -->
                <li><a class="black" href="#"> Read Article </a></li>
                <li><a class="black" href="#"> Yoga</a></li>
                <li><a class="black" href="#"> About Ayurved</a></li>
                <li><a class="black" href="#"> Fitness</a></li>
                <li><a class="black" href="#"> Donate Organ</a></li>
                <li><a class="black" href="#"> Disease & Symptoms</a></li>
            </ul>
        </nav>
        <div class="search">
            <div class="seach-box">
                <form method="POST">
                <input class="search-area" type="text" placeholder="What are you looking for?" name="search"/>
               <input type="SUBMIT" class="submit" value="Search"/>
               </form>
            </div>
        </div>
<!-- search bar 
<form method="POST">
<input type="TEXT" name="search"/>
<input type="SUBMIT" name="submit" value="search"/>
</form>-->


<?php

/*query for searching medicines and their subtitutes*/
/*sub => substitute, medi => medicines*/



$outputdisease = NULL;
$outputsubtitutes = NULL;
$outputmedicines = NULL;
$medicines = NULL;
//$searchtemp = NULL;

if (isset ($_POST['submit'] ) )
{

$mysqli = NEW MySQLI("localhost","root","","medicare");

$search = $mysqli->real_escape_string($_POST['search']);

//str_replace('$search', '$temp', '');
//$temp = '$search';

$decision_medi = $mysqli->query("SELECT medicines.medi_name AS mediName FROM medicines WHERE medicines.medi_name = '$search'");

$decision_disease = $mysqli->query("SELECT diseases.disease_name AS diseaseName FROM diseases WHERE diseases.disease_name = '$search'");



if (mysqli_num_rows ($decision_medi) != 0)
{

echo " <h1> $search </h1> <br> <h2> primary uses of $search: </h2>";

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

echo $outputdisease;

echo "<h2> subtitutes: </h2>";

while($rows = $result->fetch_assoc())
{
    $subtitute = $rows['mediName'];
    if(strtolower($subtitute) != strtolower($search))
    {
        $outputsubtitutes .= "<p> * $subtitute </p> ";
    }
    }
   

echo $outputsubtitutes;

}



elseif (mysqli_num_rows ($decision_disease) != 0)
{
echo " <h1> $search </h1> <br> <h2> medicines: </h2>";

$resultSet = $mysqli->query("SELECT medicines.medi_name AS mediName,diseases.disease_name AS diseaseName, subtitutes.sub_name FROM medicines,diseases,medidisease,subtitutes,medisub WHERE diseases.disease_name = '$search' AND diseases.disease_id = medidisease.disease_id AND medicines.medi_id = medidisease.medi_id AND subtitutes.sub_id = medisub.sub_id AND medicines.medi_id = medisub.medi_id");

while ($rows = $resultSet->fetch_assoc()) 
{
    if($rows['mediName'] == $medicines)
    {
        break;
    }
    $medicines = $rows['mediName'];
    $outputmedicines .= " <p> * $medicines </p> ";
}

echo $outputmedicines;

}
}

?>


</body>
</html>