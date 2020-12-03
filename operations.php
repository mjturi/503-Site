<?php


function connectDatabase() {
    $servername = "127.0.0.1:3306";
    $username = "root";
    $password = "abcd1234";


    $conn = new mysqli($servername, $username, $password);
    $conn->select_db("Soccer");

    if ($conn->connect_error){
        die("connection failed: " . $conn->connect_error);
    }
    return $conn;

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

    $result = $conn->query($sql);
    $json = [];
    while ($row = $result->fetch_assoc()){
        $json[] = $row;
    }

    $conn->close();
    return $json;
}

?>
