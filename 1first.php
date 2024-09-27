
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital forencis vlab</title>
	<link rel="icon" href="logo_head.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <header>
        <style>
            @import url(somaiya_temp.css);
            @import url(1first_animation.css);

            #intro {
                overflow-x: hidden;
                overflow-y: auto;
                position: relative;
                display: flex;
                align-items: center;
                justify-content: left;
                top: 15vh;
                padding-left: 7px;
                text-align: justify;
            }

            #intro p {
                margin-bottom: 5px;
                padding-right: 1.5vw;

                font-size: 2.5vh;
            }

            h2 {
                position: relative;
                font-size: 5vh;
                display: flex;
                align-items: center;
                justify-content: left;
                top: 15vh;
            }

            #icon {
                display: flex;
                align-items: center;
                justify-content: space-evenly;
                text-align: center;
                position: relative;
                flex-wrap: wrap;
                font-size: 3.5vh;
                top:12vh;
                left:5vw;
                width:fit-content;
            }

            .icons1 { 
                border: 3px solid rgb(153, 31, 0);
                border-radius: 15%;
                text-align: center;
                width: fit-content;
                height: 10vh;
                padding: 2px;
                margin-left: 10vw;
                margin-right: 3.5vw;
            }

            .icons2 {
                border: 3px solid rgb(153, 31, 0);
                border-radius: 15%;
                text-align: center; 
                width:fit-content;
                height: 10vh;
                padding: 10px;
                margin-right: 3.5vw;
            }
            .icons3 {
                border: 3px solid rgb(153, 31, 0);
                border-radius: 15%;
                text-align: center; 
                width:fit-content;
                height: 10vh;
                padding: 8px;
                margin-right: 3.5vw;
            }
            .icons4 {
                border: 3px solid rgb(153, 31, 0);
                border-radius: 15%;
                text-align: center; 
                width:fit-content;
                height: 10vh;
                padding: 8px;
                margin-right: 3.5vw;
            }
            .icons5 {
                border: 3px solid rgb(153, 31, 0);
                border-radius: 15%;
                text-align: center; 
                width:fit-content;
                height: 10vh;
                padding: 8px;
                margin:4px;
            }
            .icons1:hover{
                background-color: #E2FFCC;
            }
            .icons2:hover{
                background-color: #E2FFCC;
            }
            .icons3:hover{
                background-color: #E2FFCC;
            }
            .icons4:hover{
                background-color: #E2FFCC;
            }
            .icons5:hover{
                background-color: #E2FFCC;
            }
            a{
                color:#03521a;
                text-decoration:none ;
            }


            @media screen and (max-width: 800px) {
                #intro {
                    font-size: 2vh;
                }

                .icons1 {
                    width: fit-content;
                }

                #icon {
                    flex-wrap: wrap;
                    width:fit-content;
                }
            }
        </style>
    </header>

    <div id="logo">
        <img src="logo.jpg" id="logo">
    </div>
    <div id="header">

    </div>

    <div id="body">
        <div id="heading">

            <div class="area">
                <h1>Welcome to Virtual Lab of Digital Forensics</h1>
                <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="icon">
        <div class="icons1">
            <a href="2experiment.html">
                <i class="fa-solid fa-display fa-beat" style="color: #4ec2009f;"></i>
                <p id="icpart1">Experiments</p>
            </a>
        </div>
        <div class="icons2">
            <a href="about.html">
                <i id="icpart2" class="fa-solid fa-users" style="color: #1fc451;"></i>
                <p id="icpart2">About Us</p>
            </a>
        </div>
        <div class="icons3">
            <a href="feedback.html">
            <i class="fa-solid fa-comment-dots" style="color: #039d2f;"></i>
            <p>Feedback</p>
        </a>
        </div>
        <div class="icons4">
            <a href="1index.php">
            <i class="fa-solid fa-right-from-bracket" style="color: #3aa14d;"></i>
                <p id="icpart2">Log Out</p>
            </a>
        </div>
        <div class="icons5">
            <a href="syllabus.jpg">
            <i class="fa-solid fa-book-open" style="color: #3aa14d;"></i>
                <p id="icpart2">Syllabus</p>
            </a>
        </div>
    </div>
    <h2><u>Introduction</u></h2>
    <div id="intro">
        <p>
            <br>When it comes to digital forensics, there are always tricks being played by law
            enforcement agencies
            that are limited by the public sector budget to employ single functionality digital forensic tools
            instead of bidding and installing an integrated all-function digital forensic lab.
            It’s not unusual for those medium-small scale countries and politically blocked counties.
            However, in essence, equiping a complete and scientific digital forensics lab has gradually been a
            cons`ensus for countries who are dedicated to their citizen’s safety and happinesses. With
            industry-standard case assistance capability and reliability makes much more sense than those
            solutions with simply lower cost, since what a law enforcement agency sets up for is for higher
            safety of the country and trustworthy solution help to achieve the goal.
            With digital forensic lab solution having been optimized by contractors’ like SalvationDATA, the
            total cost and even the difficulty of construction have sharply dropped to be within the average
            counties’ public sectors’ budget.
        </p><br>
    </div>

    <footer>
        abbas
    </footer>

</html>