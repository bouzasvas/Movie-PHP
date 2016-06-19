<?php
    $movieDescription = 'Η περίοδος της Γενουατοκρατίας στη Χίο διήρκεσε δύο αιώνες, από το 1346 έως την τουρκική
                κατάληψη του νησιού το 1566. Αξίζει να σημειωθεί ότι το ενδιαφέρον των Γενουατών είχε εκδηλωθεί ήδη από το 1155
                ενώ με τη συνθήκη του Νυμφαίου, το 1261, οι Γενουάτες έλαβαν το προνόμιο από τον Βυζαντινό αυτοκράτορα Μιχαήλ Η’
                Παλαιολόγο (1259-1282), ως αντάλλαγμα για τη βοήθεια τους στην ανακατάληψη της Κωνσταντινούπολης, να ιδρύσουν
                εμπορικούς σταθμούς σε διάφορες πόλεις της αυτοκρατορίας, συμπεριλαμβανομένης και της Χίου.';
    $movieYearRelease = '2012';
    $movieCategory = 'Δράσης, Περιπέτεια';
    $movieRating = '4,2';
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
            <p id="movieTitle">Mission Impossible</p>
            <img id="movieThumb" src="images/test.jpg">
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