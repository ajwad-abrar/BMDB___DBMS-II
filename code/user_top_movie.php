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
        <link rel="stylesheet" href="css/user_browse_movie.css">


        <title>Top Movie</title>
    </head>
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>

            <div class="header__img">
                <img src="img/demo.jpg" alt="">
            </div>
        </header>

        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="#" class="nav__logo">
                        <i class='bx bx-layer nav__logo-icon'></i>
                        <span class="nav__logo-name">Vara Hobe</span>
                    </a>

                    <div class="nav__list">
                        <a href="user_home.php" class="nav__link">
                        <i class='bx bxs-home nav__icon' ></i>
                            <span class="nav__name">Home</span>
                        </a>

                        <a href="user_profile.php" class="nav__link">
                            <i class='bx bxs-user nav__icon' ></i>
                            <span class="nav__name">Profile</span>
                        </a>
                        
                        <a href="user_browse_movie.php" class="nav__link">
                            <i class='bx bxs-search-alt-2 nav__icon' ></i>
                            <span class="nav__name">Browse Movie</span>
                        </a>

                        
                        <a href="varatia_my_home.php" class="nav__link active">
                            <i class='bx bxs-movie nav__icon' ></i>
                            <span class="nav__name">Top Movie</span>
                        </a>


                        <a href="user_rating.php" class="nav__link">
                            <i class='bx bxs-star-half nav__icon' ></i>
                            <span class="nav__name">Rating</span>
                        </a>


                    </div>
                </div>

                <a href="varatia_logout.php" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>

       
        <h1 class="text-center">Top Rated Movies</h1>
        
        
        <!-- <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="images/first-img.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Monpura</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Rating: 6.5</li>
            <li class="list-group-item">Genre: Romantic</li>
            <li class="list-group-item">Release Year: 2011</li>
        </ul>
        </div> -->
        


        <div class="tab-content">

            <div id="inbox" class="tab-pane active jumbotron"><p></p>

                <h1 class="text-center" style="color: orangered; margin-bottom: 50px;">Select the genre: </h1>



                <form action="user_top_movie.php" method="POST">

                    <div class="container">

                        <div class="row">
                            
                            <div class="col">

                            <select class="form-select form-select-md mb-3"  id="genre" name="genre">
                            <option value="horror">Horror</option>
                            <option value="comdey">Comdey</option>
                            <option value="drama">Drama</option>
                            <option value="romance">Romance</option>
                            <option value="thriller">Thriller</option>
                            <option value="science_fiction">Science Fiction</option>
                            <option value="animation">Animation</option>
                            <option value="adventure">Adventure</option>
                            <option value="historical">Historical</option>
                            <option value="documentary">Documentary</option>
                        </select>             
                            </div>

                        </div>

                    </div>

                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-success btn-lg" id="submit_button" name="top_movie">Submit</button>
                    </div>


                </form>

                <div class="card mx-auto" style="width: 28rem;" id="profile-card">

                <div class="card-body">
                    <h4 class="card-title text-center" style="color:dodgerblue; font-size: 26px; font-weight: 700;">Movie Details</h4>
                    <h5 class="card-title" style="color: black;"><?php getTopMovie(); ?></h5>

                </div>

                </div>         

            </div>          

        </div>


    <?php

      function getTopMovie(){

        if(isset($_POST['top_movie'])) {

            $servername = "localhost";
            $username = "root";
            $password = "190042106";
            $dbname = "bmdb";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            $genre = $_POST['genre'];

            $sql1 = "SELECT * FROM movie M WHERE M.genre = '$genre' ORDER BY rating desc";

            $result1 = mysqli_query($conn, $sql1);

            // Check connection
            if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
            }

            if (mysqli_query($conn, $sql1)) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result1)) {
                    echo "<b>Name: </b>" .$row['title'] ." <br> <br>";
                    echo "<b>Genre: </b>" .$row['genre'] ." <br> <br>";
                    echo "<b>Release Date: </b>" .$row['release_date'] ." <br> <br>";
                    echo "<b>Production Cost: </b> " .$row['production_cost'] ." <br><br>";
                    echo "<b>Rating: </b>" .$row['rating'] ." <br><br><br><br>";
                    // echo "<b> Reg Date: </b>" .date("d M, Y", strtotime($row['reg_date']))." ";   //Not needed rn
                }
            } else {
                echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
            }


            mysqli_close($conn);

        }
      }    

    ?>	

    
        
        
        <!--=====  JS =====-->
        <script src="js/user_js.js"></script>
    </body>
</html>