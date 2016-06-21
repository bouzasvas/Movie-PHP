<?php
    include_once('DB_Management.php');

    $db = new DB_Management("localhost", "root", "");
    $db->connectToDB();
    $result = $db->queryToDB("select Category from categories");

    $db->closeConnection();
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="icon" href="images/icon.png">
    <title>Αξιολογήσεις Ταινιών</title>
</head>
<body>
<h1>Αξιολογήσεις Ταινιών</h1>
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
<div id = "searchDiv">
    <p> Επιλέξτε την/τις κατηγορία/ες ταινίας που θέλετε να αναζητήσετε: </p>
    <form id="search">
        <label><input type="checkbox" name="category">Any</label>
        <?php
            while ($row = $result->fetch()) {
                echo '<label><input type="checkbox" name="category" value="'.$row["Category"].'">'.$row["Category"].'</label>';
            }
        ?>
        <button id="searchButton">Αναζήτηση</button>
    </form>
</div>

<div id="movies">

</div>
</body>
<script type="text/javascript" src="scripts/script.js"></script>
</html>