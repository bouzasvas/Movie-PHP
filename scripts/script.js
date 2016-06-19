var checkboxes = document.querySelectorAll("input[name=\"category\"]");
var movies = document.getElementById("movies");
var moviesInDiv = movies.childNodes;

var anyCheckbox = checkboxes[0];

anyCheckbox.addEventListener("click", function() {
    if (anyCheckbox.checked) {
        checkboxes.forEach(function(check, i, checkboxes)
        { check.setAttribute("checked", ""); });
    }
    else {
        checkboxes.forEach(function(check, i, checkboxes)
        { check.removeAttribute("checked"); });
    }
});

//anyCheckbox.addEventListener("click", createMovie);

function createMovie() {
    var movieDiv = document.createElement("div");
    movieDiv.className = "movie";

    var title = document.createElement("p");
    var movieThumb = document.createElement("img");
    var rating = document.createElement("p");

    title.innerHTML = "Mission Impossible";

    movieThumb.setAttribute("src", "images/test.jpg");
    movieThumb.className = "movieThumb";

    rating.innerHTML = "Βαθμολογία: 4.2/5";

    movieDiv.appendChild(title);
    movieDiv.appendChild(movieThumb);
    movieDiv.appendChild(rating);

    movies.appendChild(movieDiv);

    moviesInDiv[moviesInDiv.length-1].addEventListener("click", showMovieInfo);
}

function showMovieInfo() {
    location = "movieInfo.html";
}