<?php
    session_start();

    if(isset($_POST['submit'])) {

        $servername = "localhost";
        $username = "root";
        $password = "190042106";
        $dbname = "bmdb";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // $date = $_POST['date_of_post'];
        $title = $_POST['title'];
        $genre = $_POST['genre'];
        $release_date = $_POST['release_date'];
        $cost = $_POST['cost'];
        // $rating = $_POST['rating'];
        $director = $_POST['director'];
        $email = $_SESSION['email'];

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO movie(title, genre, release_date, production_cost, director_id) VALUES ( '$title', '$genre', '$release_date', '$cost', '$director')";

        if (mysqli_query($conn, $sql)) {
            echo "";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);

    }

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
        <link rel="stylesheet" href="css/admin_style.css">
        <link rel="stylesheet" href="css/admin_add_movie.css">

        <title>Add Movie</title>
    </head>
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>

            <div class="header__img">
                <img src="images/admin_profile_pic.jfif" alt="">
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
                         <a href="admin_home.php" class="nav__link">
                        <i class='bx bxs-home nav__icon' ></i>
                            <span class="nav__name">Home</span>
                        </a>

                        <a href="admin_profile.php" class="nav__link">
                            <i class='bx bxs-user nav__icon' ></i>
                            <span class="nav__name">Profile</span>
                        </a>

                        <a href="admin_add_movie.php" class="nav__link active">
                            <i class='bx bxs-folder-plus nav__icon' ></i>
                            <span class="nav__name">Add Movie</span>
                        </a>
                    </div>
                </div>

                <a href="#" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>

       

        <div id="search_flat">
            <h1 class="text-center"> Add Movie details</h1>
        </div>


        <form action="admin_add_movie.php" method="post">

            <div class="container text-center">

                <div class="row" id="part-1">

                    <div class="col">
                        <h4 class="text-center">Title</h4>
                        <input class="form-control" type="text" id="title" name="title">
                    </div>


                    <div class="col">
                        <h4 class="text-center">Genre</h4>
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

                    <div class="col">

                        <h4 class="text-center">Released Date</h4>
                        <input class="form-control" type="date" id="release_date" name="release_date">

                    </div>


                </div>

                
                <div class="row" id="part-2">

                    <div class="col">
                            <h4 class="text-center">Production Cost</h4>
                            <input class="form-control" type="number" id="cost" name="cost">
                    </div>

                    <!-- <div class="col">
                        <h4 class="text-center">Rating</h4>
                        <input class="form-control" type="number" id="rating" name="rating"  step="any" min="0" max="10">
                    </div> -->

                    <div class="col">
                            <h4 class="text-center">Director ID</h4>
                            <input class="form-control" type="number" id="director" name="director">
                    </div>

                </div>


            </div>

            <div class="text-center mt-5">
				<button onclick="requestSubmission()"  type="submit" name="submit" class="btn btn-success btn-lg" id="submit_button">Submit</button>
			</div>
            

        </form>  
        
        
        <!--=====  JS =====-->
        <script src="js/admin_js.js"></script>

        <script>
       function requestSubmission(){
       alert('Request Submitted');

      }
      </script>
  

    </body>
</html>