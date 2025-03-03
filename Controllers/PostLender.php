<?php
  if (!isset($_COOKIE['user'])) {
    header('Location: /');
    echo "<script>window.location.pathname = '/'</script>";
    exit();
}
if (isset($_POST['submit'])) {

    include('DBConnectivity.php');

    $name = $_POST['lname'];
    $phone = $_POST['phone'];
    $nic = $_POST['nic'];
    $address = $_POST['address'];


    $query = "SELECT count(*) as cnt FROM lenders";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    $randomNumber = rand(100, 999);
    $ID = 'Lender' . $row['cnt'] . $randomNumber;

    $query = "INSERT INTO lenders VALUE('$ID', '$name', '$phone', '$nic', '$address')";
    $result = mysqli_query($db, $query);

    if ($result) {
        echo json_encode([
            'status' => true,
            'message' => 'Lender Created Successfully'
        ]);
        mysqli_close($db);
        exit();
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'Unable to create lender. try again later'
        ]);
        mysqli_close($db);
        exit();
    }
} elseif (isset($_POST['edit-submit'])) {
    include('DBConnectivity.php');

    $ID = $_POST['ID'];
    $name = $_POST['lname'];
    $phone = $_POST['phone'];
    $nic = $_POST['nic'];
    $address = $_POST['address'];

    $query = "UPDATE lenders set name = '$name', contact = '$phone', nic = '$nic', address = '$address' WHERE ID = '$ID'";
    $result = mysqli_query($db, $query);

    if ($result) {
        echo json_encode([
            'status' => true,
            'message' => 'Lender Updated Successfully'
        ]);
        mysqli_close($db);
        exit();
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'Unable to update lender. try again later'
        ]);
        mysqli_close($db);
        exit();
    }
} else {
    header('Location: /');
    exit();
}

?>