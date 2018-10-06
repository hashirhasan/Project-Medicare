<?php include "include/header.php" ?>
<?php include "doctor_css.php" ?>
<?php	
if(isset($_SESSION['user_role']))
{
  ?>
  <div class="yoga-srch-btn">
<form action="" method="POST" >
            <input id="mytext" type="TEXT" class="search-area"  placeholder="Doctors / Disease Name" name="search"  onkeyup="enabled()">

    <button type="SUBMIT" class="search-button" name="submit" id="start_button"  disabled>Search</button>
</form>
        </div>

<script type="text/javascript">
    function enabled(){
        if(document.getElementById("mytext").value==="") { 
            //console.log(document.getElementById("mytext").value);
            document.getElementById('start_button').disabled = true; 
        } else { 
            document.getElementById('start_button').disabled = false;
        }
    }
</script>

<?php


$outputspecialist = NULL;
$outputdoctors = NULL;
$showexp = NULL;
$showqualify = NULL;
$showservices = NULL;
$showdoctor = NULL;
$showimage = NULL;
$showaddress = NULL;
$showfees = NULL;
$showtiming = NULL;

if (isset ($_POST['search'] ) )
{

$mysqli = NEW MySQLI("localhost","root","","medicare1");

$search = $mysqli->real_escape_string($_POST['search']);


$decision_doctor = $mysqli->query("SELECT doctors.doc_name AS docName FROM doctors WHERE doctors.doc_name LIKE '%$search%'");

$decision_disease = $mysqli->query("SELECT specialization.specialist_name AS specialistName FROM specialization WHERE specialization.specialist_name LIKE '%$search%'");



if (mysqli_num_rows ($decision_doctor) != 0)
{


$resultSet = $mysqli->query("SELECT doctors.doc_name AS doctorName,specialization.specialist_name AS specialistName, doctors.doc_address AS address,doctors.doc_fees AS fees,doctors.doc_exp AS exp,doctors.doc_img AS image,doctors.doc_timing AS timing, doctors.doc_qualifications AS qualify, doctors.doc_services AS services
                             FROM doctors,specialization,doctor_specialization
                             WHERE doctors.doc_name LIKE '%$search%' AND doctors.doc_id = doctor_specialization.doc_id AND specialization.specialist_id = doctor_specialization.specialist_id");

while ($rows = $resultSet->fetch_assoc()) 
{ 

?>
    <div class="container">
            <div class="doc-pic"><img src="image/<?php echo $rows['image'];?>"></div>

            <div class="doc-price"><h1><?php echo $rows['doctorName']; ?></h1><br/>
                <p>
                    <h3>EXPERIENCE:</h3><?php echo $rows['exp']; ?>
                    <h3>QUALIFICATIONS:</h3><?php echo $rows['qualify'];?>
                    <h3>SERVICES:</h3><?php echo $rows['services'];?>
                </p>

            <!-- <input class="alt-btn" type="button" value="Alternative" > -->

            <a class="alt-btn" type="button" href="#popup1">Availbility</a>

            <div class="box"></div>

            <div id="popup1" class="overlay">

            <div class="popup">

            <h2>Availbility</h2><br/><br/>

            <a class="close" href="#">&times;</a>

            <div class="content">
                 <h3>Address</h3>

             <?php echo $rows['address']; ?>

             <h3><br/>Timings</h3>
              <?php echo $rows['timing'];?>
            </div>

        </div>

    </div>

            <a class="use-btn" type="button" href="contactpage.php">CONTACT</a>

            <!-- <input class="use-btn" type="button" value="Use In"> -->

            <div class="box"></div>

            <div id="popup2" class="overlay">

            <div class="popup">

           
            <a class="close" href="#">&times;</a>

            <div class="content">
                      
         </div>

        </div>

    </div>

            </div>

            <div class="doc-alt">

                <h3>Specialization:</h3> <?php echo $rows['specialistName'];?><br/>

                    <h3>Fees: </h3> <?php echo "₹".$rows['fees']; ?>

                

                </div>

    </div>


<?php
}


}


elseif (mysqli_num_rows ($decision_disease) != 0)
{


$result = $mysqli->query("SELECT doctors.doc_name AS doctorName,specialization.specialist_name AS specialistName FROM doctors,specialization,doctor_specialization WHERE specialization.specialist_name LIKE '%$search%' AND specialization.specialist_id = doctor_specialization.specialist_id AND doctors.doc_id = doctor_specialization.doc_id");

while ($row = $result->fetch_assoc()) 
{
    $doc = $row['doctorName'];
 //  $outputdoctors .= "$search";


//echo $outputdoctors;

$resultSet = $mysqli->query("SELECT doctors.doc_name AS doctorName,specialization.specialist_name AS specialistName, doctors.doc_address AS address,doctors.doc_fees AS fees,doctors.doc_exp AS exp,doctors.doc_img AS image,doctors.doc_timing AS timing, doctors.doc_qualifications AS qualify, doctors.doc_services AS services
                             FROM doctors,specialization,doctor_specialization
                             WHERE doctors.doc_name = '$doc' AND doctors.doc_id = doctor_specialization.doc_id AND specialization.specialist_id = doctor_specialization.specialist_id");

while ($rows = $resultSet->fetch_assoc()) 
{ 

?>
    <div class="container">
            <div class="doc-pic"><img src="image/<?php echo $rows['image'];?>"></div>

            <div class="doc-price"><h1><?php echo $rows['doctorName']; ?></h1><br/>
                <p>
                    <h3>EXPERIENCE:</h3><?php echo $rows['exp']; ?>
                    <h3>QUALIFICATIONS:</h3><?php echo $rows['qualify'];?>
                    <h3>SERVICES:</h3><?php echo $rows['services'];?>
                </p>

            <!-- <input class="alt-btn" type="button" value="Alternative" > -->

            <a class="alt-btn" type="button" href="#popup1">Availbility</a>

            <div class="box"></div>

            <div id="popup1" class="overlay">

            <div class="popup">

            <h2>Availbility</h2><br/><br/>

                <a class="close" href="#">&times;</a>

            <div class="content">
                 <h3>Address</h3>

             <?php echo $rows['address']; ?>

             <h3><br/>Timings</h3>
              <?php echo $rows['timing'];?>
            </div>

        </div>

    </div>

            <a class="use-btn" type="button" href="contactpage.php">CONTACT</a>

            <!-- <input class="use-btn" type="button" value="Use In"> -->

            <div class="box"></div>

            <div id="popup2" class="overlay">

            <div class="popup">

           
            <a class="close">&times;</a>

            <div class="content">
                      
         </div>

        </div>

    </div>

            </div>

            <div class="doc-alt">

                <h3>Specialization:</h3> <?php echo $rows['specialistName'];?><br/>

                    <h3>Fees: </h3> <?php echo "₹".$rows['fees']; ?>

                

                </div>

    </div>


<?php
}
}
}
else{
   ?>
<script> swal ( "Oops" ,  "No Result Found!" ,  "error" );</script> 

<?php
    echo"<h1 style='margin-top:30% ;margin-left:25%;'>NO Result Found!!</h1>";
}
} 
}
else
{  
    header("location:home.php");

 }
?>
