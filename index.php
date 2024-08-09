<?php
$servername ="localhost";
$username ="root";
$password ="";
$dbname ="organization";

$conn =new mysqli($servername ,$username ,$password ,$dbname);

if ($conn->connect_error) {
  die("Connection failed: " .$conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] =="POST"){ 

  if($_POST['form']=="volunteer"){

    $fullname =    $_POST['fullname'];
    $email =       $_POST['email'];
    $department=   $_POST['department'];
    $why=          $_POST['why'];

    if(isset($_POST['submit'])){

      $sql = "INSERT INTO members( fullname ,email ,department , why)
            VALUES ('$fullname','$email','$department','$why')";
      if(empty($fullname)){
        echo "enter fullname";
      }elseif(empty($email)){
        echo "enter your email";
      }elseif(empty($department)){
        echo "enter your department";
      }elseif(empty($why)){
        echo "enter why";
      }else{
        if ($conn->query($sql) === TRUE) {
          $message = "Registration successful";
        }else {
        echo "An error occurred" ;
        }

      }      
    
    }
  } else if ($_POST['form']=="donate"){
    $fullname =    $_POST['fullname'];
    $email =       $_POST['email'];
    $value_ofDonation=   $_POST['value_ofDonation'];
    if(isset($_POST['submit'])){
      $sql = "INSERT INTO donors( fullname ,email ,value_ofDonation )
              VALUES ('$fullname','$email','$value_ofDonation' )";
      if(empty($fullname)){
        echo "enter fullname";
      }elseif(empty($email)){
        echo "enter your email";
      }elseif(empty($value_ofDonation)){
        echo "enter the value of donation";
      }else{
        if ($conn->query($sql) === TRUE) {
          echo "Registration successful";
        }else {
          echo "An error occurred" ;
        }
      }      
    }

  } else if ($_POST['form']=="update_donate"){
    $fullname =    $_POST['fullname'];
    $email =       $_POST['email'];
    $value_ofDonation=   $_POST['value_ofDonation'];
    if(isset($_POST['submit'])){
      $sql="UPDATE  donors SET fullname='$fullname', value_ofDonation='$value_ofDonation' where email='$email'";
      if($conn->query($sql) === TRUE){
        echo "تم التعديل بنجاح";
      }else{
        echo "خطأ في العديل" . $conn->error;
      } 
    } 
  } else if ($_POST['form']=="query"){
    if(isset($_POST['submit'])){
      $email =       $_POST['email'];
      $sql="SELECT value_ofDonation FROM donors WHERE email='$email' ";
      $result=$conn->query($sql);
      if($result === false){
        die("خطأ في الاستعلام:. $conn->error");
      }
      if($result->num_rows >0){
        while($row = $result->fetch_assoc()){
          echo "value of donation:" . $row['value_ofDonation'];}
      }else{
        echo "النتائج0";
      }
  } 
  
  } 
}
$conn->close();
?>


  
<!doctype html >
<html lang="en">
    <head>
      <meta charset="utf-8" >
      <title>togther website</title>
      <link rel="stylesheet" href="home-css.css">
    </head>
    <body>
       <div class="full" id="home section"> 
        <header>
          <div class="container1">
            <div class="logo">
              <img src="maya/foot4.jpg" alt="erreo" >
            </div>
            <nav>
              <ul>
                <li>
                  <a href="#home section" >Home</a>
                </li>
                <li>
                  <a href="#aboute section" >About Us</a>
                </li>
                <li>
                  <a href="#programsection">Programs</a>
                </li>
                <li>
                  <a href="#educationsection">Education</a>
                </li>

                <li>
                  <a href="#joinus">Join Us</a>
                </li>
                <li>
                  <a href="#donate">Donate</a>
                </li><li>
                  <a href="#up/qu">Update or Query</a>
                </li>
                <li>
                  <a href="#connect">Connect Us</a>
                </li>


                 
                
              </ul>
            </nav>
          </div>

        </header> <!--end header-->
        <div class="container2">
          <h1>Togther We Can <span>Change</span> The Wourld  
           Togther We Can <span>Save</span> Lives</h1>

           
         <!-- <button>Start With A Little</button>-->
     
        </div>

       </div><!--end full-->
       <section  class="full2" id="aboute section">
        <div class="container">
          <h2 class="section title">Aboute Us</h2>
          <p class="pp">We are a team of volunteers aiming to establish a modest charity organization that provides all kinds of assistance, financial support, moral support, and medical supplies to patients and victims of natural disasters and wars.</p>
          <div class="carde">
             <div class="donation">
              <div class="title">Give Donation</div>
              <p>Start With A Little , Make A Difference.</p>
              <button>Donation</button>
             </div>

             <div class="volunteers">
              <div class="title">Become A Volunteers</div>
              <p>Join Our Great Experience, As It May Have A Great Reward And Tangible Results.</p>
              <button>Become Now</button>
             </div>


             <div class="scholarship">
              <div class="title">Give Scholarship</div>
               <p> If you find yourself a teacher, do not hesitate to complete the education of those whose circumstances have deprived them of their right to study.</p>
              <button>Give Immediately</button>
             </div>
          </div>

          
        </div>
       </section>
       <!--end abaute-->
       <section class="full3" id="programsection">
        <div class="container2">
          <h2 class="section title">Programs</h2>
          <div class="boxContainer">
            <div class="box">
              <div class="cardimage"></div>
              <div class="programtitle">Home Insurance</div>
              <div class="donationcount">
                 alittle form you goes along way
              </div>
              <button>Donation Now</button>
              
            </div><!--end box-->
            <div class="box">
              <div class="cardimage"></div>
              <div class="programtitle">Emotional Support</div>
              <div class="donationcount">
                help him face the illness with confidence and positivity

              </div>
              <button>Encourage</button>
              
            </div><!--end box-->
            <div class="box">
              <div class="cardimage"></div>
              <div class="programtitle">Completing Education</div>
              <div class="donationcount">
                 be a teacher for them
              </div>
              <button>Be Now</button>
              
            </div><!--end box-->
            <div class="box">
              <div class="cardimage"></div>
              <div class="programtitle">Disaster victims</div>
              <div class="donationcount">
                fires or floods or earthquakes

              </div>
              <button>Donation Now</button>
              
            </div><!--end box-->
            <div class="box">
              <div class="cardimage"></div>
              <div class="programtitle">War Victims </div>
              <div class="donationcount">
                 whether wounded or displaced

              </div>
              <button>Donation Now</button>
              
            </div><!--end box-->
            <div class="box">
              <div class="cardimage"></div>
              <div class="programtitle">Complete Nutrition</div>
              <div class="donationcount">
                 meals and food baskets

              </div>
              <button>Donation Now</button>
              
            </div><!--end box-->
             
          </div><!--end boxcontainer-->


        </div>
       </section><!--end programs-->
       <section class="full4" id="educationsection">
        <video src="maya/mmmm.mp4 " type="video/mp4" muted loop autoplay class="videoplay">Your Browser Dose Not Support HTML5 Video</video>
         <div class="container3">
          <div class="sectiontitle">Education</div>
          <div class="educationcontainer">
            <h3>Education  Is  Essntial  For<br>
              
                <strong>BETTER  FUTURE</strong></h3>
            <P>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
               Fugit eos et possimus enim reiciendis autem amet,
                quasi voluptatem, illum voluptas est unde sit cum.
                 Quibusdam hic autem incidunt ex ullam.
            </P>
            <button >EXPLORE NOW</button>
          </div>

         </div>



       </section><!--end education-->
       <!--start join-->  
       
       <section class="full55" id="joinus">
        <div class="jointitlie">Join Us</div>
        <div class="container55">
          <h3 class="joinpara">Lets make a difference in the lives of others</h3>
          <div class="classform">
            <form action="index.php#joinus" method="POST"  class="form1">
              <input type="hidden" value="volunteer" name="form">
              <div class="become" >Become A Volunteer</div>
              <span>use your email for registration</span>
              <input name="fullname" id="fullname" type="text" placeholder="Full Name" required>
             <input name="email" id="email" type="email" placeholder="Email" required>
             <input name="department" id="department" type="text" placeholder="Department" required>
             <input name="why" id="why" type="text" placeholder="Why You Want To Become A Volunteer" aria-rowcount="3" required>
             <input type="submit" name="submit" value="send">
            
            </form>

          </div>
        </div>



       </section>
       
  

        <!--end join-->
        <!--staraat donate-->
        <section class="full66" id="donate">
          <div class="donatetitlie">Donate Now</div>
          <div class="container66">
            <h3 class="donatepara"> Lets donate to needy people for better lives</h3>
            <div class="classform11">
              <form action="index.php" method="POST" class="form11">
              <input type="hidden" value="donate" name="form">
                <div class="don" >Donate Now</div>
                <span>use your email for registration</span>
                <input name="fullname" id="fullname" type="text" placeholder="Full Name" required>
               <input name="email" id="email" type="email" placeholder="Email" required>
               <input name="value_ofDonation" id="value_ofDonation" type="number" placeholder="value of Donation" required max="100000" min="100" step="100" >
               <input type="submit" name="submit" value="Donate Now">
  
              </form>
         
            </div>
          </div>
  
  
  
         </section>

        <!--end donate-->
        <!--start update-->
        <section class="full77" id="up/qu">
          <div class="upqutitle">update or query</div>
          <div class="container77">
            <div class="classleft">
              <form action="index.php" method="POST" class="formleft">
                <input type="hidden" value="update_donate" name="form">
                <div class="up" >Update</div>
                <span>you can edit the value of a previous donation</span>
                <input name="fullname" id="fullname" type="text" placeholder="Full Name" required>
                <input name="email" id="email" type="email" placeholder="Email" required>
                <input name="value_ofDonation" id="value_ofDonation" type="number" placeholder="value of Donation" required max="100000" min="100" step="100" >
                <input type="submit" name="submit" value="updateNow">
              </form>

   
             </div>
             <div class="classright">
              <form action="index.php" method="POST" class="formright">
                <input type="hidden" value="query" name="form">
                <div class="qu" >Query</div>
                <span>you can inquire about the total amount of donations you have made</span>
                <input name="fullname" type="text" placeholder="Full Name" required>
                <input name="email" type="email" placeholder="Email" required>
               <input type="submit" name="submit"  value="queryNow">
              </form>
                          
             </div>

          </div>
        </section>
        <!--end update-->
        <!--starat connect-->
         <section class="connect" id="connect">
          <div class="containerconn">
            <div class="conntitle">fostering a humanitarian cause <span>and save lives</span></div>
             <p> being a contributing part in saving lives makes adifference .if you can do not hesitate</p>

            <div class="a111"><a  href="#joinus">Join Us</a></div>
              
            <div class="a222"><a   href="#donate">Donate</a></div>
            
          </div>

         </section>
        <!--end connect-->
        <!--footer-->
        <footer>
          <div class="containerfoo">
            <div class="newsletter">
              <img src="maya/foot3.jpg" alt="erreo">
              <p>"sawa charity" deserves the intiative from all of us to build a better futuer and a better reality.</p>
            </div>

          </div>
          <div class="links">
            <div class="title1">Useful Links</div>
            <ul>
              <li>
                <a href="#home section" >Home</a>
              </li>
              <li>
                <a href="#aboute section" >About Us</a>
              </li>
              <li>
                <a href="#programsection">Programs</a>
              </li>
              <li>
                <a href="#educationsection">Education</a>
              </li>

              <li>
                <a href="#joinus">Join Us</a>
              </li>
              <li>
                <a href="#donate">Donate</a>
              </li><li>
                <a href="#up/qu">Update or Query</a>
              </li>
            </ul>


          </div>
          <div class="conect">
            <div class="title1">Connect With Us</div>
            <p>for any inquiry , feel ferr to contact any member of the team. </p>
            <p>maya@gmail.com   tel:(+963)997193967<br>

               ahed@gmail.com   tel:(+963)935841295<br>

               leena@#gmail.com tel:(+963)930562909

            </p>
            <p>info@sawa.com</p>



          </div>
        </footer>
        <!--end footer-->
        
        
    </body>
</html>