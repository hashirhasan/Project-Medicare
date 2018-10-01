<?php include "include/header.php" ?>
<?php include "doctor_css.php" ?>

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
            <div class="doc-pic"><img src="../doctors/<?php echo $rows['doc_img'];?>"></div>

            <div class="doc-price"><h1><?php echo $rows['doc_name']; ?></h1><br/>
                <p>
                    <h3>EXPERIENCE:</h3><?php echo $rows['doc_exp']; ?>
                    <h3>QUALIFICATIONS:</h3><?php echo $rows['doc_qualifications'];?>
                    <h3>SERVICES:</h3><?php echo $rows['doc_services'];?>
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

             <?php echo $rows['doc_address']; ?>

             <h3><br/>Timings</h3>
              <?php echo $rows['doc_timing'];?>
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
                      
         </div>

        </div>

    </div>

            </div>

            <div class="doc-alt">

                <h3>Specialization:</h3> <?php echo $rows['specialist_name'];?><br/>

                    <h3>Fees: </h3> <?php echo "₹".$rows['doc_fees']; ?>

                

                </div>

    </div>
<?php
}?>


    </body>

    </html>