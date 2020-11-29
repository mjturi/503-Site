<?php
$deleteRow = "DELETE FROM %s WHERE id=%d";
$getRow = "SELECT * FROM %s";

function connectDatabase() {
  $servername = "localhost";
  $username = "system";
  $password = "password";
  $dbname = "myDB";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  return $conn;

}

function deleteData($table, $id) {
  $conn = connectDatabase();

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

function getData($table) {
  $conn = connectDatabase();

  if ($table == "Clubs") {
    $sql = sprintf($getRow, $table);
  } elseif ($table == "Leagues") {
    $sql = sprintf($getRow, $table);
  } elseif ($table == "Matches") {
    $sql = sprintf($getRow, $table);
  } elseif ($table == "Players") {
    $sql = sprintf($getRow, $table);
  }

  $result = $conn->query($sql);

  $result -> fetch_all(MYSQLI_ASSOC);


  $conn->close();
  return $result;
}
?>
