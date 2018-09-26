
<!DOCTYPE html>

    <html>

    <head>

        <title>doctors</title>

        <meta charset="utf-8">

        <link rel="stylesheet" href="doctors.css">



    </head>

    <body>



        <div class="yoga-srch-btn">
<form method="POST">
            <input type="TEXT" class="search-area"  placeholder="Doctors / Disease Name" name="search">

               <input type="SUBMIT" class="search-button" name="submit" value="Search">
</form>
        </div>
            <header class="header">

        <img class="logo" src="medi4.svg">

        

        

    <!-- <nav> -->

            <ul>

                <!-- <li><a class="black" href="#"> Home</a></li> -->

                <li><a class="black" href="#"> Read Article </a></li>

                <li><a class="black" href="#"> Yoga</a></li>

                <li><a class="black" href="#"> About Ayurved</a></li>

                <li><a class="black" href="#"> Fitness</a></li>

                <li><a class="black" href="#"> Consult to Doctors</a></li>

                <li><a class="black" href="#"> Disease & Symptoms</a></li>

            </ul>

            <input type="button" class="login-button" value="Login">

        <!-- </nav> -->

        </header>







        <div class="container">

<?php




$outputspecialist = NULL;
$outputdoctors = NULL;
$showexp = NULL;
$showqualify = NULL;
$showservices = NULL;
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


$getdetails = $mysqli->query("SELECT doctors.doc_address AS address,doctors.doc_fees AS fees,doctors.doc_exp AS exp,doctors.doc_img AS image,doctors.doc_timing AS timing, doctors.doc_qualifications AS qualify, doctors.doc_services AS services
                            FROM doctors
                            WHERE doctors.doc_name = '$search'");

while ($rows = $getdetails->fetch_assoc()) {
    $address = $rows['address'];
    $showaddress .= "$address";
    $fees = $rows['fees'];
    $showfees .= "$fees";
    $image = $rows['image'];
    $showimage .= "$image";
    $exp = $rows['exp'];
    $showexp .= "$exp";
    $qualify = $rows['qualify'];
    $showqualify .= "$qualify";
    $services = $rows['services'];
    $showservices .= "$services";
    $timing = $rows['timing'];
    $showtiming .= "$timing";
}

$resultSet = $mysqli->query("SELECT doctors.doc_name AS doctorName,specialization.specialist_name AS specialistName
                             FROM doctors,specialization,doctor_specialization
                             WHERE doctors.doc_name = '$search' AND doctors.doc_id = doctor_specialization.doc_id AND specialization.specialist_id = doctor_specialization.specialist_id");

while ($rows = $resultSet->fetch_assoc()) 
{
    $specialist = $rows['specialistName'];
    $outputspecialist .= "$specialist";
}

//echo $outputspecialist;
}

elseif (mysqli_num_rows ($decision_disease) != 0)
{


$resultSet = $mysqli->query("SELECT doctors.doc_name AS doctorName,specialization.specialist_name AS specialistName FROM doctors,specialization,doctor_specialization WHERE specialization.specialist_name = '$search' AND specialization.specialist_id = doctor_specialization.specialist_id AND doctors.doc_id = doctor_specialization.doc_id");

while ($rows = $resultSet->fetch_assoc()) 
{
    $search = $rows['doctorName'];
   $outputdoctors .= "$search";
}


//echo $outputdoctors;

$resultSet = $mysqli->query("SELECT doctors.doc_name AS doctorName,specialization.specialist_name AS specialistName
                             FROM doctors,specialization,doctor_specialization
                             WHERE doctors.doc_name = '$search' AND doctors.doc_id = doctor_specialization.doc_id AND specialization.specialist_id = doctor_specialization.specialist_id");

while ($rows = $resultSet->fetch_assoc()) 
{
    $specialist = $rows['specialistName'];
    $outputspecialist .= "$specialist";

}

//echo $outputspecialist;
$getdetails = $mysqli->query("SELECT doctors.doc_address AS address,doctors.doc_fees AS fees,doctors.doc_exp AS exp,doctors.doc_img AS image,doctors.doc_timing AS timing, doctors.doc_qualifications AS qualify, doctors.doc_services AS services
                            FROM doctors
                            WHERE doctors.doc_name = '$search'");

while ($rows = $getdetails->fetch_assoc()) {
    $address = $rows['address'];
    $showaddress .= "$address";
    $fees = $rows['fees'];
    $showfees .= "$fees";
    $image = $rows['image'];
    $showimage .= "$image";
    $exp = $rows['exp'];
    $showexp .= "$exp";
    $qualify = $rows['qualify'];
    $showqualify .= "$qualify";
    $services = $rows['services'];
    $showservices .= "$services";
    $timing = $rows['timing'];
    $showtiming .= "$timing";
}
}
}

?>





        
        
       
            <div class="doc-pic"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($showimage) . '" />';?></div>

            <div class="doc-price"><h1><?php echo "$search"; ?></h1><br/>
                <p>
                    <h3>EXPERIENCE:</h3><?php echo "$showexp"; ?>
                    <h3>QUALIFICATIONS:</h3><?php echo "$showqualify";?>
                    <h3>SERVICES:</h3><?php echo "$showservices";?>
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

             <?php echo "$showaddress"; ?>

             <h3><br/>Timings</h3>
              <?php echo "$showtiming";?>
            </div>

        </div>

    </div>

            <a class="use-btn" type="button" href="#popup2">CONTACT</a>

            <!-- <input class="use-btn" type="button" value="Use In"> -->

            <div class="box"></div>

            <div id="popup2" class="overlay">

            <div class="popup">

           
            <a class="close" href="#">&times;</a>

            <div class="content">
              <?php include'form.php';?>           
         </div>

        </div>

    </div>

            </div>

            <div class="doc-alt">

                <h3>Specialization:</h3> <?php echo "$outputspecialist";?><br/>

                    <h3>Fees: </h3> <?php echo "₹ $showfees"; ?>

                

                </div>

    </div>









        <!-- <div class="container">

            

                <div class="doc-pic"><img src="tab.jpg"></div>

                <div class="doc-price"><h2>Name</h2><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                <input class="alt-btn" type="button" value="Alternative" >

                <a class="alt-btn" type="button" href="#popup1">Alternative</a>

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

                <div class="doc-alt">

                    <h3>Price:</h2>

                    

                    </div>

</div> -->



        <!-- <div class="container">

        

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