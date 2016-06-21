<?php
include_once ('DB_Management.php');

$args = $_POST["category"];
$args = str_replace("-", " ", $args);

$Array = explode(" ", $args);
array_pop($Array);

$db = new DB_Management("localhost", "root", "");
$db->connectToDB();

$query = "";

if ($Array[0] == "any") {
    $query = 'select Title, ReleaseYear, Image from movies';
}
else {
    $query = 'select distinct Title, ReleaseYear, Image
              from movies, categories, movie_categories
              where movies.MovieID = movie_categories.MovieID
              and categories.CategoryID = movie_categories.CategoryID
              and (';

    foreach ($Array as &$item) {
        $query = $query . "Category = \"$item\" or ";
    }

    $query = substr($query, 0, strlen($query)-4);
    $query = $query.')';
}

$result = $db->queryToDB($query);

    while ($row = $result->fetch()) {
        echo $row['Title'].'#'.$row['Image'].'#'.'$';
    }
?>