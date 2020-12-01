<?php


function connectDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "ZugYdnpW1!";


    $conn = new mysqli($servername, $username, $password);
    $conn->select_db("website");

    if ($conn->connect_error){
        die("connection failed: " . $conn->connect_error);
    }
    return $conn;

}

function deleteData($table, $id) {
    $conn = connectDatabase();
    $deleteRow = "DELETE FROM %s WHERE id=%d";

    if ($table == "Clubs") {
        $sql = sprintf($deleteRow, $table, $id);
    } elseif ($table == "Leagues") {
        $sql = sprintf($deleteRow, $table, $id);
    } elseif ($table == "Matches") {
        $sql = sprintf($deleteRow, $table, $id);
    } elseif ($table == "Players") {
        $sql = sprintf($deleteRow, $table, $id);
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}

function displayEdit($table, $id){
    $almid = "$table";
    $specid = rtrim($almid, 's');
    $finid = $specid."id";

    $conn = connectDatabase();
    $query = "SELECT * FROM $table WHERE $finid = $id";
    $result =  $conn->query($query);
    return $result->fetch_assoc();
}

function displayMatchEdit($id){
    $finid = "matchid";
    $conn = connectDatabase();
    $query = "SELECT matchid, homescore, visitorscore FROM matches WHERE $finid = $id";
    $result =  $conn->query($query);
    return $result->fetch_assoc();

}

function updateLeagues($table, $id, $name, $country){
    $conn = connectDatabase();
    $query = "UPDATE $table SET name= '$name', country= '$country' WHERE leagueid = $id";
    if ($conn->query($query) === TRUE) {
        header('Location: http://localhost:8000/update.php');
    } else {
        header('Location: http://localhost:8000/update2.php');
    }
}

function updateClubs($table, $id, $name, $ranking, $wins, $losses, $draws, $points, $country){
    $conn = connectDatabase();
    $query = "UPDATE $table SET name= '$name', ranking= $ranking, wins= $wins, losses= $losses, draws=$draws, points= $points, country= '$country' WHERE clubid = $id";
    if ($conn->query($query) === TRUE) {
        header('Location: http://localhost:8000/update.php');
    } else {
        header('Location: http://localhost:8000/update2.php');
    }
}

function updateMatches($table, $id, $homescore, $visitorscore){
    $conn = connectDatabase();
    $query = "UPDATE $table SET homescore= $homescore, visitorscore= $visitorscore WHERE matchid = $id";
    if ($conn->query($query) === TRUE) {
        header('Location: http://localhost:8000/update.php');
    } else {
        header('Location: http://localhost:8000/update2.php');
    }
}



function updatePlayers($table, $id, $name, $position, $age, $height, $weight, $country, $goals, $assists, $marketval){
    $conn = connectDatabase();
    $query = "UPDATE $table SET name= '$name', country= '$country', position = '$position', age= $age, height= '$height', weight= $weight, goals= '$goals', assists= $assists, marketval=$marketval WHERE playerid = $id";
    if ($conn->query($query) === TRUE) {
        header('Location: http://localhost:8000/update.php');
    } else {
        header('Location: http://localhost:8000/update2.php');
    }
}


function getClub($id) {
    $conn = connectDatabase();
    $query = "SELECT name FROM clubs WHERE clubs.clubid = $id";
    $result = $conn->query($query);
    $name = $result->fetch_array()[0];
    return $name;
}

function getData($table) {
    $conn = connectDatabase();
    $getRow = "SELECT * FROM %s";

    $sql = "";

    if ($table == "clubs") {
        $sql = sprintf($getRow, $table);
    } elseif ($table == "leagues") {
        $sql = sprintf($getRow, $table);
    } elseif ($table == "matches") {
        $sql = sprintf($getRow, $table);
    } elseif ($table == "players") {
        $sql = sprintf($getRow, $table);
    }

    return $conn->query($sql);
}


