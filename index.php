<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();

require 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/js/app.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../style.css">
    
    <title>English Minglish</title>
</head>

<body>

    <header>
        <nav>
            <label class="logo">
               <a href="">X<span>seed</span> E<span>inglish</span></a>
            </label>
            
            <ul>
                <li><a href="#">HOME</a></li>
                <li class="aboutus"><a href="#">ABOUT US </a></li>
                <li class="C"><a href="/Classes.php">CLASSES</a></li>
                <!-- <li><a href="#">SAMPLE LESSONS</a></li> -->
                <!-- <li><a href="#">CONTACT</a></li> -->
                <?php

                if (isset($_SESSION['user_id'])&&$_SESSION['user_id']>0)
                {
                    ?>
                    <li class="signup"><a href="/logout.php"><?php echo $_SESSION['username'];?> - LOGOUT</a></li>

                    <?php

                }else{
                    ?>
                    <li class="signup"><a href="/login.php">LOGIN/SIGNUP</a></li>

                    <?php

                }
                ?>


            </ul>
            
           
        </nav>
    </header>


    <div class="grid-container1">
       
        <div class="item1"><p class="p1"><span class="span1">Why</span><br> <span class="span1a">English Minglish ?</span> <p class="p1text">
            We offer personalised lessons tailored based on diverse students’ needs and abilities
            Homework tasks are assigned at the end of each session and checked in the next lesson
            Each lesson starts with an educational game to engage the students in a virtual environment
            The content aligns with the Australian curriculum and adaptable to most English speaking countries 
            Under the supervision of qualified and experienced teachers.
            
            </p>
        </div>
    
        <div class="item2">
            <img class="img2" src="/img/mainimg3.jpeg" alt="heropic">
            <h1 class="h2">We get it, Learning is changing fast.</h1>
            <p class="p2">Our corporate, commercial advisory and dispute resolution services, help businesses of all sizes navigate the constantly changing world of business in the digital age.</p> 
        </div>

        <div class="item3"><a class="sample" href="">For more Sample lessons <br>click here</a>
            <video controls>
            <source src="./img/video1.mp4" type="video/mp4">
          </video>
        </div>

        
    </div>

    <div class="grid-container2">
        <div class="item4"><H2 class="H4">Learn With Us</H2></div>
    </div>

    <div class="grid-container3">
        <a class="A5" href="http://127.0.0.1:5500/Classes.html"><div class="item5"><H2 class="H5">Primary</H2><p class="P5">READ MORE</p></div></a>
        <a class="A6" href="http://127.0.0.1:5500/Classes.html"><div class="item6"><H2 class="H6">Secondery</H2><p class="P5">READ MORE</p></div></a>
        <a class="A7" href="http://127.0.0.1:5500/Classes.html"> <div class="item7"><H2 class="H7">Adults</H2></div><p class="P5">READ MORE</p></a>
       
    </div>

    <div class="grid-container2">
        <div class="item4"><H2 class="H4">Get  in Touch</H2></div>
    </div>



    <div class="grid-container4">
       <div class="item8"><h2 class="H8">Phone:</h2>
           <?php
          $phones= getSettingsByName("Phone");

          foreach ($phones as $p)
          {
              echo "<p class='P8'><a href='tel:$p'>$p</a></p>";
          }
           ?>



       </div>


       <div class="item8"><h2 class="H8">Mail:</h2>
           <?php
           $list= getSettingsByName("Email");

           foreach ($list as $i)
           {
               echo  "<div class='P9'><a  href='mailto:$i'>$i</a></div>";
           }
           ?>


       </div>
       
       
       <div class="item8">
        <h2 class="H8">Social:</h2>
            <div class="social">
                <div><a class="social1" href="https://www.instagram.com/smartify.academy/?r=nametag"><i class="fa-brands fa-instagram"></i> Instagram</div></a>
                <div><a class="social2" href="https://www.youtube.com/c/BOOKNOOKAUDIOBOOK"><i class="fa-brands fa-youtube"></i> youtube</div></a>
                <div><a class="social3"href=""><i class="fa-brands fa-whatsapp"></i> whatsapp</a></div>
            </div>
        
        </div>
       
       
       <div class="item8"><h2 class="H8">Message Box:</h2>
            <div class="grid-container5">
                <input type="text" id="fname" name="firstname" placeholder="Your Name">
                <input type="email" id="fname" name="firstname" placeholder="Email Address">
                <input type="text" id="fname" name="firstname" placeholder="Message...">
                <button class="send">Send</button>
            </div>
        


</body>

</html>