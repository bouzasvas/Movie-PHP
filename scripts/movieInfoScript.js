window.onload = function () {
    var ratingNumber = parseInt(document.getElementById("ratingNumber").innerHTML);
    var ratingSpan = document.getElementById("movieRatingStars");

    for (var i = 1; i <= ratingNumber; i++) {
        var star = document.createElement("a");
        ratingSpan.appendChild(star);
    }
};

