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

        <script src="https://kit.fontawesome.com/22fda2a086.js" crossorigin="anonymous"></script>

        <title>User Browse Movie</title>
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
                        <a href="user_home.php" class="nav__link">
                        <i class='bx bxs-home nav__icon' ></i>
                            <span class="nav__name">Home</span>
                        </a>

                        <a href="user_profile.php" class="nav__link">
                            <i class='bx bxs-user nav__icon' ></i>
                            <span class="nav__name">Profile</span>
                        </a>
                        
                        <a href="user_browse_movie.php" class="nav__link active">
                            <i class='bx bxs-search-alt-2 nav__icon' ></i>
                            <span class="nav__name">Browse Movie</span>
                        </a>

                        <a href="user_top_movie.php" class="nav__link">
                            <i class='bx bxs-movie nav__icon' ></i>
                            <span class="nav__name">Top Movie</span>
                        </a>


                        <a href="varatia_chat.php" class="nav__link">
                            <i class='bx bxs-message-rounded-dots nav__icon' ></i>
                            <span class="nav__name">Chat</span>
                        </a>

                    </div>
                </div>

                <a href="varatia_logout.php" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>



        <div class="tab-content">

            <div id="inbox" class="tab-pane active jumbotron"><p></p>

                <h1 class="text-center" style="color: orangered; margin-bottom: 50px;">Write down the movie name: </h1>



                <form action="user_browse_movie.php" method="POST">

                    <div class="container">

                        <div class="row">
                            
                            <div class="col">

                            <input type="text" class="form-control" id="movie_form" placeholder="Enter name of the movie" name="movie_name">
                            </div>

                        </div>

                    </div>

                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-success btn-lg" id="submit_button" name="usear_search_movie">Submit</button>
                    </div>


                </form>

                <div class="card mx-auto" style="width: 28rem;" id="profile-card">

                <div class="card-body">
                    <h4 class="card-title text-center" style="color:dodgerblue; font-size: 26px; font-weight: 700;">Movie Details</h4>
                    

                </div>

                </div>         

            </div>          

        </div>


        <!--=====  JS =====-->
        <script src="js/user_js.js"></script>


    </body>
</html>