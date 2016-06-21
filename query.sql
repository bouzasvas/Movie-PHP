create database moviesDB;

use moviesDB;

create table categories
(
CategoryID int not null auto_increment,
Category varchar(100) character set utf8,
primary key (CategoryID)
)
engine InnoDB;

create table movies
(
	MovieID int not null auto_increment,
    Title varchar(250) character set utf8 not null,
    ReleaseYear int,
    Image varchar(100),
	Description text character set utf8,
    primary key (MovieID)
)
engine InnoDB;

create table Movie_Categories
(
	MovieID int not null,
    CategoryID int not null,
    foreign key (MovieID) references movies (MovieID) on delete cascade,
    foreign key (CategoryID) references categories (CategoryID) on delete cascade,
    primary key (MovieID, CategoryID)
)
engine InnoDB;

insert into movies(Title, ReleaseYear, Image, Description) values
("Τελευταία έξοδος: Ρίτα Χέιγουορθ", 1994, "images/moviesThumb/redemption.jpg", "Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency."),
("Ο νονός", 1972, "images/moviesThumb/godfather.jpg", "The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son."),
("Ο νονός, μέρος 2ο", 1974, "images/moviesThumb/godfather2.jpg", "The early life and career of Vito Corleone in 1920s New York is portrayed while his son, Michael, expands and tightens his grip on his crime syndicate stretching from Lake Tahoe, Nevada to pre-revolution 1958 Cuba."),
("Ο σκοτεινός ιππότης", 2008, "images/moviesThumb/dark_knight.jpg", "When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, the caped crusader must come to terms with one of the greatest psychological tests of his ability to fight injustice."),
("Η λίστα του Σίντλερ", 1993, "images/moviesThumb/schindler_list.jpg", "In Poland during World War II, Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis."),
("Οι δώδεκα ένορκοι", 1957, "images/moviesThumb/angry_12.jpg", "A jury holdout attempts to prevent a miscarriage of justice by forcing his colleagues to reconsider the evidence."),
("Pulp Fiction", 1994, "images/moviesThumb/pulp_fiction.jpg", "The lives of two mob hit men, a boxer, a gangster's wife, and a pair of diner bandits intertwine in four tales of violence and redemption."),
("Ο άρχοντας των δαχτυλιδιών: Η επιστροφή του βασιλιά", 2003, "images/moviesThumb/lord.jpg", "Gandalf and Aragorn lead the World of Men against Sauron's army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring."),
("Ο καλός, ο κακός και ο άσχημος", 1966, "images/moviesThumb/good_bad.jpg", "A bounty hunting scam joins two men in an uneasy alliance against a third in a race to find a fortune in gold buried in a remote cemetery."),
("Fight Club", 1999, "images/moviesThumb/fight_club.jpg", "An insomniac office worker, looking for a way to change his life, crosses paths with a devil-may-care soap maker, forming an underground fight club that evolves into something much, much more..."),
("Star Wars: Επεισόδιο 5 - Η αυτοκρατορία αντεπιτίθεται", 1980, "images/moviesThumb/star_wars_5.jpg", "After the rebels have been brutally overpowered by the Empire on their newly established base, Luke Skywalker takes advanced Jedi training with Master Yoda, while his friends are pursued by Darth Vader as part of his plan to capture Luke."),
("Forest Gump", 1994, "images/moviesThumb/forest_gump.jpg", "Forrest Gump, while not intelligent, has accidentally been present at many historic moments, but his true love, Jenny Curran, eludes him."),
("Inception", 2010, "images/moviesThumb/inception.jpg", "A thief, who steals corporate secrets through use of dream-sharing technology, is given the inverse task of planting an idea into the mind of a CEO.");

insert into categories(Category) values
("Crime"),
("Drama"),
("Action"),
("Adventure"),
("Biography"),
("History"),
("Western"),
("Fantasy"),
("Romance"),
("Sci-Fi");

insert into movie_categories(MovieID, CategoryID) values
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 3),
(4, 4),
(5, 2),
(5, 5),
(5, 6),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 2),
(8, 3),
(8, 4),
(9, 7),
(10, 2),
(11, 3),
(11, 4),
(11, 8),
(12, 2),
(12, 9),
(13, 3),
(13, 4),
(13, 10);

select Title, Category
from movies, categories, movie_categories
where movies.MovieID = movie_categories.MovieID
and categories.CategoryID = movie_categories.CategoryID
order by Title;
