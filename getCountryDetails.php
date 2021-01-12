<?php

include "dbFunctions.php";

if (isset($_GET['country'])) {
    $country = $_GET['country'];
    
    $cutry = array();
    $query = "SELECT * FROM statistics where country = $country";
    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_assoc($result);
    if(!empty($row)) {
        $student = $row;
    }
    mysqli_close($link);

    echo json_encode($cutry);
}
?>
