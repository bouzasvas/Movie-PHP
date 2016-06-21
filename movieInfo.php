<?php
include_once ('DB_Management.php');
$mov = $_GET['mov'];

$db = new DB_Management("localhost", "root", "");
$db->connectToDB();

$query = "select Description, ReleaseYear, Image, Category
          from movies, categories, movie_categories 
          where Title = \"$mov\" and movies.MovieID = movie_categories.MovieID and categories.CategoryID = movie_categories.CategoryID";

$results = $db->queryToDB($query);

$row = $results->fetch();

$movieDescription = $row['Description'];
$movieYearRelease = $row['ReleaseYear'];
$movieCategory = $row['Category'];
$movieImage = $row['Image'];
$movieRating = "-";

while ($row = $results->fetch()) {
    $movieCategory = $movieCategory.", ".$row['Category'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Πληροφορίες Ταινίας</title>
    <link rel="stylesheet" type="text/css" href="styles/movieStyle.css">
    <script type="text/javascript" src="scripts/movieInfoScript.js" defer></script>
    <link rel="icon" href="images/icon.png">
</head>
<body>
<h1>Πληροφορίες Ταινίας</h1>
<div id="header">
        <span id="login_info">
            Παρακαλώ εγγραφείτε(sign-up) ή συνδεθείτε(sign-in) στη σελίδα
            για επιπλέον δυνατότητες.
        </span>
    <form id="login">
        <input type="text" id="username" placeholder="Username">
        <input type = "password" id="password" placeholder="Password">
        <button id="signInButton">Sign-in</button>
        <a href="signup.html">Είστε νέος χρήστης;</a>
    </form>
</div>
<hr>
<div id="movieInfoDiv">
    <div class="movie">
        <div id="titlePhoto">
            <p id="movieTitle">
                <?php echo "$mov"; ?>
            </p>
            <img id="movieThumb" src="<?php echo "$movieImage";?>">
        </div>
        <div id="metaInfo">
            <span class="label">Περιγραφή</span>
            <p id="movieDescription">
                <?php
                echo $movieDescription;
                ?>
                </p>
            <p class="label">Έτος κυκλοφορίας:</p>
            <span id="movieYearRelease" class="extraInfo">
                <?php
                    echo $movieYearRelease;
                ?>
            </span>
            <p class="label">Είδος/η:</p><span id="movieCategory" class="extraInfo"> Δράσης, Περιπέτεια</span>
            <p class="label">Βαθμολογία:</p>
            <span id="movieRating" class="extraInfo">
                <span id="ratingNumber">
                     <?php echo $movieRating ?>
                </span>
             στα 5</span>
            <span id="movieRatingStars">
                </span>
        </div>
    </div>
</div>
</body>
</html>