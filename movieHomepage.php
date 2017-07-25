<?php
$host = "localhost";
$dbname = "maug5727";
$username = "maug5727";
$password = "Tranetrane1!!";

$dbconn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$dbconn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT MPAAId, rating
        FROM MPAA_ratings
        ORDER BY MPAAId ASC";
$stmt = $dbconn -> prepare($sql);
$stmt -> execute();
$ratings = $stmt -> fetchAll();

$sql = "SELECT genreId, genre
        FROM movie_genres
        ORDER BY genreId ASC";
$stmt = $dbconn -> prepare($sql);
$stmt -> execute();
$genres = $stmt -> fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>2016 Movies</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="background"><img src="background.jpg"></div>
<div class="modal">
    <h1>2016 Movie Suggestion Generator</h1>
    <form action="suggestionPage.php">
    <div class="modal_row">
        <div class="modal_item">IMDB Score</div>
        <div class="modal_item">
            <select name="IMDBScore">
                <?php
                for ($i = 5; $i < 10; $i++)
                {
                    echo "<option value='$i'>> $i</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="modal_row">
        <div class="modal_item">MPAA Rating</div>
        <div class="modal_item">
            <select name="MPAARating">
                <?php
                foreach ($ratings as $rating)
                {
                    echo "<option value=" . $rating['MPAAId'] . ">" . $rating['rating'] . "</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="modal_row">
        <div class="modal_item">Genre</div>
        <div class="modal_item">
            <select name="genre">
                <?php
                foreach ($genres as $genre)
                {
                    echo "<option value=" . $genre['genreId'] . ">" . $genre['genre'] . "</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="modal_row">
        <div class="modal_item"><input type="submit" value="Suggest a Movie"/></div>
    </div>
    </form>
    <form action="AllMovies.php">
        <div class="modal_item"><input type="submit" value="See all Movies"/></div>
    </form>
    <?php
    $dbconn = null;
    ?>
</div>
</body>
</html>