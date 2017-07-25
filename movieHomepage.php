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
</head>
<body>
<h2>2016 Movie Suggestion Generator</h2>
<form action="suggestionPage.php">
    <table border="1" cellpadding="5px">
        <tr>
            <td>IMDB Score</td>
            <td><select name="IMDBScore">
                    <?php
                    for ($i = 5; $i < 10; $i++)
                    {
                        echo "<option value='$i'>> $i</option>";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>MPAA Rating</td>
            <td><select name="MPAARating">
                    <?php
                    foreach ($ratings as $rating)
                    {
                        echo "<option value=" . $rating['MPAAId'] . ">" . $rating['rating'] . "</option>";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td>Genre</td>
            <td><select name="genre">
                    <?php
                    foreach ($genres as $genre)
                    {
                        echo "<option value=" . $genre['genreId'] . ">" . $genre['genre'] . "</option>";
                    }
                    ?>
                </select></td>
        </tr>
    </table>
    <input type="submit" value="Suggest a Movie"/><br /><br />
    <input type="button" value="See all Movies"/>
</form>
<?php
$dbconn = null;
?>
</body>
</html>