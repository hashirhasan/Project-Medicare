<?php include "include/header.php" ?>
<?php include "doctor_css.php" ?>
<?php	
if(isset($_SESSION['user_role']))
{
  ?>
  <div class="yoga-srch-btn">
<form action="doctors_search.php" method="POST" >
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
$mysqli = NEW MySQLI("localhost","root","","medicare1");

$showdata = $mysqli->query("SELECT * FROM doctors,specialization,doctor_specialization WHERE doctors.doc_id = doctor_specialization.doc_id AND specialization.specialist_id = doctor_specialization.specialist_id");

while ($rows= $showdata->fetch_assoc()) {?>
    <div class="container">
            <div class="doc-pic"><img src="image/<?php echo $rows['doc_img'];?>"></div>

            <div class="doc-price"><h1><?php echo $rows['doc_name']; ?></h1><br/>
                <p>
                    <h3 style="font-faimly:lato;">EXPERIENCE:</h3><p style="color:#6B2432;"><?php echo $rows['doc_exp']; ?></p>
                    <h3 style="font-faimly:lato;">QUALIFICATIONS:</h3><p style="color:#6B2432;"><?php echo $rows['doc_qualifications'];?></p>
                    <h3 style="font-faimly:lato;">SERVICES:</h3><p style="color:#6B2432;"><?php echo $rows['doc_services'];?></p>
                </p>

            <!-- <input class="alt-btn" type="button" value="Alternative" > -->

            <a class="alt-btn" type="button" href="#popup1">Availbility</a>

            <div class="box"></div>

            <div id="popup1" class="overlay">

            <div class="popup">

            <h2>Availbility</h2><br/><br/>

            <a class="close" href="#bottom">&times;</a>

            <div class="content">
                 <h3>Address</h3>

             <?php echo $rows['doc_address']; ?>

             <h3><br/>Timings</h3>
              <?php echo $rows['doc_timing'];?>
            </div>

        </div>

    </div>

            <a class="use-btn" type="button" href="contactpage.php">CONTACT</a>

            <!-- <input class="use-btn" type="button" value="Use In"> -->

            <div class="box"></div>

            <div id="popup2" class="overlay">

            <div class="popup">

           
            <a class="close" href="#bottom">&times;</a>

            <div class="content">
                      
         </div><a name="bottom"></a>

        </div>

    </div>

            </div>

            <div class="doc-alt">

                <h3>Specialization:</h3><p style="color:#6B2432;"> <?php echo $rows['specialist_name'];?></p><br/>

                <h3>Fees: </h3><p style="color:#6B2432;"> <?php echo "₹".$rows['doc_fees']; ?></p>

                

                </div>

    </div>
<?php
}
}
else
{
?>

 <script>swal("Medicare Says:", "First Please Login!");</script> 
<?php } ?>
    </body>

    </html>