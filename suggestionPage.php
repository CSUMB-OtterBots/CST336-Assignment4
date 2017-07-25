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
    echo $movie['movieName'] . "<br />";

//    global $movieMatches;
//    $max = count($movieMatches) - 1;
//    $randIndex = rand(0, $max);
//    $suggestion = $movieMatches[$randIndex];
//    return $suggestion;
}

function moreInfo($movie)
{
//    $sql = "SELECT MPAAId, rating
//        FROM MPAA_ratings
//        ORDER BY MPAAId ASC";
//    $stmt = $dbconn -> prepare($sql);
//    $stmt -> execute();
//    $ratings = $stmt -> fetchAll();
//
//    $sql = "SELECT genreId, genre
//        FROM movie_genres
//        ORDER BY genreId ASC";
//    $stmt = $dbconn -> prepare($sql);
//    $stmt -> execute();
//    $genres = $stmt -> fetchAll();
    echo $movieInfo['movieDescription'] . "<br />";
    echo $movie['imdbRating'] . "<br />";
    echo $movie['rating'] . "<br />";
    echo $movie['duration'] . "<br />";
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
suggestMovie();
foreach ($movieMatches as $item)
{
    echo $item['movieName'] . " | ";
}
?>
<form action="">
<input type="button" value="more info" onclick="<?moreInfo()?>">
<input type="button" value="another suggestion" onclick="<? suggestMovie()?>">
<input type="button" value="change parameters" onclick="movieHomepage.php">
</form>
<?php
$dbconn = null;
?>
</body>
</html>