<?php
require 'db_connection.php';
$sql = "SELECT *
        FROM movie_admin
        WHERE username = :username
        AND password = :password";
$stmt = $dbconn -> prepare($sql);
$stmt -> execute(array(":username" => $_POST['username'], ":password" => hash("sha1", $_POST['password'])));
$record = $stmt -> fetch();

if (isset($_POST['password']))
{
    $sql = "INSERT INTO movie_admin (password)
            VALUE (:password)";
    $stmt = $dbconn -> prepare($sql);
    $stmt -> execute(array (":password" => hash("sha1", $_POST['change password'])));
    echo "Password Changed";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
<body>
<div>
    <h1>Change Password</h1>
    <form method="post">
        <textarea name="review" rows="1" cols="60"></textarea><br />
        <input type="submit" value="change password"/>
    </form>
</body>
</html>
