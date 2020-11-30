<?php


function connectDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "*****";


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
    return $result;
}

?>
