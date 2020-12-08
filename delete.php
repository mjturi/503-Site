<?php


function connectDatabase()
{
    $servername = "localhost";
    $username = "root";
    $password = "ZugYdnpW1!";


    $conn = new mysqli($servername, $username, $password);
    $conn->select_db("soccer");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;

}

function deleteData($table, $id)
{
    $conn = connectDatabase();
    $deleteRow = "DELETE FROM %s WHERE %s=%d";
    $sql = "";
    if ($table == "club") {
        $sql = sprintf($deleteRow, $table, 'Club_id', $id);
    } elseif ($table == "league") {
        $sql = sprintf($deleteRow, $table, 'League_id', $id);
    } elseif ($table == "matches") {
        $sql = sprintf($deleteRow, $table, 'Match_id', $id);
    } elseif ($table == "player") {
        $sql = sprintf($deleteRow, $table, 'Player_id', $id);
    }
    echo $sql;

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }


    $conn->close();
}

if ($_GET['id'] != "") {
    deleteData($_GET['table'], $_GET['id']);
}

