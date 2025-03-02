<?php

    include('DBConnectivity.php');
    $ID = $_GET['ID'];
    $query = "SELECT bh.*, b.name as book, l.name as lend FROM
            borrowhistory bh JOIN books b ON bh.book_ID = b.ID
            JOIN lenders l ON bh.lender_ID = l.ID
            WHERE bh.ID = '$ID'";

    $result = mysqli_query($db, $query);
    $data = mysqli_fetch_assoc($result);

    mysqli_close($db);

    echo json_encode([
        'data' => $data
    ])


?>