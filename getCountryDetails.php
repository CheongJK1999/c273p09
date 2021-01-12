<?php

include "dbFunctions.php";

$country = $_GET['id'];

$cutry = array();
$query = "SELECT * FROM statistics WHERE id = '$country'";
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $cutry[] = $row;
}
mysqli_close($link);

echo json_encode($cutry);
?>
