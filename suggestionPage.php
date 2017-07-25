<?php
$host = "localhost";
$dbname = "maug5727";
$username = "maug5727";
$password = "Tranetrane1!!";

$dbconn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$dbconn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$IMDBScore = $_GET['IMDBScore'];
$MPAARating = $_GET['MPAARating'];
$genre = $_GET['genre'];

$sql = "SELECT *
            FROM movies
            WHERE imdbRating >= :imdbRating &&
                  MPAAId = :MPAAId &&
                  genreId = :genreId";
$stmt = $dbconn -> prepare($sql);
$stmt -> execute(array(':imdbRating' => $IMDBScore,
                       ':MPAAId' => $MPAARating,
                       ':genreId' => $genre));
$movieMatches = $stmt->fetchAll();

function suggestMovie()
{
    global $movieMatches;
    $max = count($movieMatches) - 1;
    $randIndex = rand(0, $max);
    $movie = $movieMatches[$randIndex];
    return $movie;
}

function moreInfo($movie)
{
    global $dbconn;
    $sql = "SELECT rating
            FROM MPAA_ratings
            WHERE MPAAId = :MPAAId";
    $stmt = $dbconn -> prepare($sql);
    $stmt -> execute(array (':MPAAId' => $movie['MPAAId']));
    $rating = $stmt->fetch();

    $sql = "SELECT movieDescription
            FROM movie_descriptions
            WHERE movieId = :movieId";
    $stmt = $dbconn -> prepare($sql);
    $stmt -> execute(array (':movieId' => $movie['movieId']));
    $description = $stmt->fetch();

    echo $rating['rating'] . "<br />";
    echo "IMDb Rating " . $movie['imdbRating'] . "/10" . "<br />";
    echo $description['movieDescription'] . "<br />";
    echo $movie['duration'] . " min." . "<br />";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>2016 Movies</title>
</head>
<body>
<h2>2016 Movie Suggestion Generator</h2>
<?php
$movie = suggestMovie();
echo $movie['movieName'] . "<br />";
moreInfo($movie);
?>
<form action="">
<input type="button" value="more info" onclick="<?moreInfo($movie)?>">
<input type="button" value="another suggestion" onclick="<? suggestMovie()?>">
<input type="button" value="change parameters" onclick="movieHomepage.php">
</form>
<?php
$dbconn = null;
?>
</body>
</html>