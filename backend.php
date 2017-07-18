<?php

function insertInitial() {

    $conn = new mysqli("localhost", "root", "airpolo3", "CSTassignment4");

    if ($conn->connect_error) { print "Database Connection Error"; }

    $sql = "INSERT INTO tableA (name, director, genre, rating) VALUES ('Starwars', 'John Williams', 'Space', '5')";
    $sql2 = "INSERT INTO tableb (name, director, genre, rating) VALUES ('Starwars', 'John Williams', 'Space', '5')";
    $conn->query($sql);
    $conn->query($sql2);

    $sql = "INSERT INTO tableA (name, director, genre, rating) VALUES ('Starwars', 'John Williams', 'Space', '5')";
    $sql2 = "INSERT INTO tableb (name, director, genre, rating) VALUES ('Starwars', 'John Williams', 'Space', '5')";
    $conn->query($sql);
    $conn->query($sql2);

    $sql = "INSERT INTO tableA (name, director, genre, rating) VALUES ('Starwars', 'John Williams', 'Space', '5')";
    $sql2 = "INSERT INTO tableb (name, director, genre, rating) VALUES ('Starwars', 'John Williams', 'Space', '5')";
    $conn->query($sql);
    $conn->query($sql2);

    $sql = "INSERT INTO tableA (name, director, genre, rating) VALUES ('Starwars', 'John Williams', 'Space', '5')";
    $sql2 = "INSERT INTO tableb (name, director, genre, rating) VALUES ('Starwars', 'John Williams', 'Space', '5')";
    $conn->query($sql);
    $conn->query($sql2);

    $sql = "INSERT INTO tableA (name, director, genre, rating) VALUES ('Starwars', 'John Williams', 'Space', '5')";
    $sql2 = "INSERT INTO tableb (name, director, genre, rating) VALUES ('Starwars', 'John Williams', 'Space', '5')";
    $conn->query($sql);
    $conn->query($sql2);

    $sql = "INSERT INTO tableA (name, director, genre, rating) VALUES ('Starwars', 'John Williams', 'Space', '5')";
    $sql2 = "INSERT INTO tableb (name, director, genre, rating) VALUES ('Starwars', 'John Williams', 'Space', '5')";
    $conn->query($sql);
    $conn->query($sql2);

    $sql = "INSERT INTO tableA (name, director, genre, rating) VALUES ('Starwars', 'John Williams', 'Space', '5')";
    $sql2 = "INSERT INTO tableb (name, director, genre, rating) VALUES ('Starwars', 'John Williams', 'Space', '5')";
    $conn->query($sql);
    $conn->query($sql2);

    $sql = "INSERT INTO tableA (name, director, genre, rating) VALUES ('Starwars', 'John Williams', 'Space', '5')";
    $sql2 = "INSERT INTO tableb (name, director, genre, rating) VALUES ('Starwars', 'John Williams', 'Space', '5')";
    $conn->query($sql);
    $conn->query($sql2);

    $conn->close();
}

function getData() {
    //insertInitial();

    print "<h1>Here is the data: </h1>";

    $conn = new mysqli("localhost", "root", "airpolo3", "CSTassignment4");

    if ($conn->connect_error) { print "Database Connection Error"; }

    $sql = "SELECT * FROM tableA";
    $sql2 = "SELECT * FROM tableb";

    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);

    print "<h2>Table A: </h2>";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            print "<p>" . $row['name'] . "\t" . $row['director'] . "\t" . $row['genre'] . "\t" . $row['rating'] . "\n" . "</p>";
        }
    }

    print "<h2>Table B: </h2>";
    if ($result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
            print "<p>" . $row['name'] . "\t" . $row['director'] . "\t" . $row['genre'] . "\t" . $row['rating'] . "\n" . "</p>";
        }
    }
    $conn->close();
}

$instructions = $_GET['instructions'];

if($instructions == "getProjects") { getData(); }