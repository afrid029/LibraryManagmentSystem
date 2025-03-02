<?php
    include('DBConnectivity.php');

    $ID = $_GET['ID'];

    $query = "SELECT * from users where ID = '$ID'";
    $result = mysqli_query($db, $query);

    $data = mysqli_fetch_assoc($result);

    mysqli_close($db);

    echo json_encode([
        'data' => $data
    ]);

?>