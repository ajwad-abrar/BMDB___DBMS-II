<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="css/user_style.css">
        <link rel="stylesheet" href="css/user_home_style.css">

        <title>User Home</title>
    </head>
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>

            <div class="header__img">
                <img src="images/demo.jpg" alt="">
            </div>
        </header>

        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="#" class="nav__logo">
                        <i class='bx bx-layer nav__logo-icon'></i>
                        <span class="nav__logo-name">BMDB</span>
                    </a>

                    <div class="nav__list">
                        <a href="varatia_home.php" class="nav__link active">
                        <i class='bx bxs-home nav__icon' ></i>
                            <span class="nav__name">Home</span>
                        </a>

                        <a href="varatia_profile.php" class="nav__link">
                            <i class='bx bxs-user nav__icon' ></i>
                            <span class="nav__name">Profile</span>
                        </a>
                        
                        <a href="varatia_search_home.php" class="nav__link">
                            <i class='bx bxs-search-alt-2 nav__icon' ></i>
                            <span class="nav__name">Search Home</span>
                        </a>

                        
                        <a href="varatia_my_home.php" class="nav__link">
                            <i class='bx bxs-home-heart nav__icon' ></i>
                            <span class="nav__name">My Home</span>
                        </a>

                        <!-- <a href="varatia_review.php" class="nav__link">
                            <i class='bx bxs-star-half nav__icon' ></i>
                            <span class="nav__name">Review</span>
                        </a> -->

                        <a href="varatia_chat.php" class="nav__link">
                            <i class='bx bxs-message-rounded-dots nav__icon' ></i>
                            <span class="nav__name">Chat</span>
                        </a>


                        <!-- <a href="#" class="nav__link">
                            <i class='bx bx-bar-chart-alt-2 nav__icon' ></i>
                            <span class="nav__name">Analytics</span>
                        </a>  -->


                    </div>
                </div>

                <a href="varatia_logout.php" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>


        <?php


        function showName(){

            // $con = mysqli_connect('localhost', 'root', '190042106', 'vara_hobe');
            $conn = oci_connect("system", "dbms106AJ", "localhost/orcl");

            $array = oci_parse($conn, "begin:ret:= getUserName(); end;");

            oci_bind_array_by_name($conn,":ret",$arr,100,-1,SQLT_CHR);

            oci_execute($array);

            while($row = oci_fetch_array($array)) {
                echo "<br>";
                echo $row[0];
            }

            oci_close($conn);


        }
    ?>    



    <div id="welcome">  
        <h1 class="welcome_font"> 
        
        <?php 

            $conn = oci_connect("system", "dbms106AJ", "localhost/orcl");

            // If (!$conn)
            //     echo 'Failed to connect to Oracle';
            // else 
            //     echo 'Succesfully connected with Oracle DB';


            // $statement = oci_parse($conn, 'select 1 from dual');
            // oci_execute($statement);
            // $row = oci_fetch_array($statement, OCI_ASSOC+OCI_RETURN_NULLS);	

            echo "Welcome Back, ";

            showName();

            $sql = "SELECT TO_CHAR(sysdate, 'Day') FROM DUAL";
            $array = oci_parse($conn, $sql);

            oci_execute($array);

            while($row = oci_fetch_array($array)) {
                echo "<br>";
                echo $row[0];
            }


            oci_close($conn);
        ?>

	    </h1>
    </div>





    
        
        
        <!--=====  JS =====-->
        <script src="js/user_js.js"></script>
    </body>
</html>