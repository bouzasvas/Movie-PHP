var checkboxes = document.querySelectorAll("input[name=\"category\"]");
var movies = document.getElementById("movies");
var moviesInDiv = movies.childNodes;

var anyCheckbox = checkboxes[0];

var searchButton = document.getElementById("searchButton");

var moviesArgs;
var movieData;

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
    for (var i = 0; i < movieData.length; i++) {
        var currentMovie = movieData[i];

        var movieDiv = document.createElement("div");
        movieDiv.className = "movie";

        var title = document.createElement("p");
        var movieThumb = document.createElement("img");
        var rating = document.createElement("p");

        title.innerHTML = currentMovie[0];

        movieThumb.setAttribute("src", currentMovie[1]);
        movieThumb.className = "movieThumb";

        rating.innerHTML = "Βαθμολογία: "+ "-" + "/5";

        movieDiv.appendChild(title);
        movieDiv.appendChild(movieThumb);
        movieDiv.appendChild(rating);

        movies.appendChild(movieDiv);

        moviesInDiv[moviesInDiv.length-1].addEventListener("click", showMovieInfo);
    }
}

function SearchAjaxRequest() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var returnedMovies = xhttp.responseText;
            movies.innerHTML = "";
            moviesArgs = new Array;
            moviesArgs = returnedMovies.split("$");
            moviesArgs.pop();

            movieData = new Array(moviesArgs.length);
            moviesArgs.forEach(function (movie, i, moviesArgs) {
               movieData[i] = movie.split("#");
            });
            createMovie();
        }
    };
    xhttp.open("POST", "searchMovieByCategory.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    var sendArgumets = "category=";

    if (checkboxes[0].checked) {
        sendArgumets+= "any-";
    }
    else {
        checkboxes.forEach(function (check, i, checkboxes) {
            if (check.checked) {
                sendArgumets+= check.value+"-";
            }
        });
    }
    xhttp.send(sendArgumets);

}

searchButton.addEventListener("click", function (evt) {
    evt.preventDefault();
    SearchAjaxRequest();
}, false);

function showMovieInfo(evt) {
    var target = evt.currentTarget;
    var mov = target.childNodes[0].innerHTML;
    window.open("movieInfo.php?mov="+mov);
}