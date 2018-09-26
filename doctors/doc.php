
<form method="POST">
<input type="TEXT" name="search"/>
<input type="SUBMIT" name="submit" value="search"/>
</form>
<?php




$outputspecialist = NULL;
$outputdoctors = NULL;
$showdetails = NULL;
$showimage = NULL;
$showaddress = NULL;
$showfees = NULL;
$showtiming = NULL;

if (isset ($_POST['search'] ) )
{

$mysqli = NEW MySQLI("localhost","root","","medicare");

$search = $mysqli->real_escape_string($_POST['search']);


$decision_doctor = $mysqli->query("SELECT doctors.doc_name AS docName FROM doctors WHERE doctors.doc_name = '$search'");

$decision_disease = $mysqli->query("SELECT specialization.specialist_name AS specialistName FROM specialization WHERE specialization.specialist_name = '$search'");



if (mysqli_num_rows ($decision_doctor) != 0)
{


$getdetails = $mysqli->query("SELECT doctors.doc_address AS address,doctors.doc_fees AS fees,doctors.doc_details AS details,doctors.doc_img AS image,doctors.doc_timing AS timing
                            FROM doctors
                            WHERE doctors.doc_name = '$search'");

while ($rows = $getdetails->fetch_assoc()) {
    $address = $rows['address'];
    $showaddress .= "$address";
    $fees = $rows['fees'];
    $showfees .= "$fees";
    $image = $rows['image'];
    $showimage .= "$image";
    $details = $rows['details'];
    $showdetails .= "$details";
    $timing = $rows['timing'];
    $showtiming .= "$timing";
}

$resultSet = $mysqli->query("SELECT doctors.doc_name AS doctorName,specialization.specialist_name AS specialistName
                             FROM doctors,specialization,doctor_specialization
                             WHERE doctors.doc_name = '$search' AND doctors.doc_id = doctor_specialization.doc_id AND specialization.specialist_id = doctor_specialization.specialist_id");

while ($rows = $resultSet->fetch_assoc()) 
{
    $specialist = $rows['specialistName'];
    $outputspecialist .= " <p> * $specialist </p> ";
}

echo $outputspecialist;
}

elseif (mysqli_num_rows ($decision_disease) != 0)
{


$resultSet = $mysqli->query("SELECT doctors.doc_name AS doctorName,specialization.specialist_name AS specialistName FROM doctors,specialization,doctor_specialization WHERE specialization.specialist_name = '$search' AND specialization.specialist_id = doctor_specialization.specialist_id AND doctors.doc_id = doctor_specialization.doc_id");

while ($rows = $resultSet->fetch_assoc()) 
{
    $search = $rows['doctorName'];
   $outputdoctors .= " <p> * $search </p> ";
}


echo $outputdoctors;

$resultSet = $mysqli->query("SELECT doctors.doc_name AS doctorName,specialization.specialist_name AS specialistName
                             FROM doctors,specialization,doctor_specialization
                             WHERE doctors.doc_name = '$search' AND doctors.doc_id = doctor_specialization.doc_id AND specialization.specialist_id = doctor_specialization.specialist_id");

while ($rows = $resultSet->fetch_assoc()) 
{
    $specialist = $rows['specialistName'];
    $outputspecialist .= " <p> * $specialist </p> ";

}

echo $outputspecialist;

$getdetails = $mysqli->query("SELECT doctors.doc_address AS address,doctors.doc_fees AS fees,doctors.doc_details AS details,doctors.doc_img AS image,doctors.doc_timing AS timing
                            FROM doctors
                            WHERE doctors.doc_name = '$search'");

while ($rows = $getdetails->fetch_assoc()) {
    $address = $rows['address'];
    $showaddress .= "$address";
    $fees = $rows['fees'];
    $showfees .= "$fees";
    $image = $rows['image'];
    $showimage .= "$image";
    $details = $rows['details'];
    $showdetails .= "$details";
    $timing = $rows['timing'];
    $showtiming .= "$timing";
}

}
}

?>