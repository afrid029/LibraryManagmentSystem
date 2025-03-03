<?php
  if (!isset($_COOKIE['user'])) {
    header('Location: /');
    echo "<script>window.location.pathname = '/'</script>";
    exit();
}
if(isset($_POST['submit'])){

    include('DBConnectivity.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = "INSERT INTO users (username, password, role) VALUE('$username', '$password', 'admin')";
    $result = mysqli_query($db, $query);

    if($result){
        echo json_encode([
            'status' => true,
            'message' => 'Librarian Created Successfully'
        ]);
        mysqli_close($db);
        exit();
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'Unable to create Librarian. try again later'
        ]);
        mysqli_close($db);
        exit();
    }

}elseif(isset($_POST['edit-submit'])) {
    include('DBConnectivity.php');

    $ID = $_POST['ID'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "UPDATE users SET username = '$username', password = '$password' WHERE ID = '$ID'";
    
    $result = mysqli_query($db, $query);

    if($result){
        echo json_encode([
            'status' => true,
            'message' => 'Librarian Updated Successfully'
        ]);
        mysqli_close($db);
        exit();
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'Unable to update Librarian. try again later'
        ]);
        mysqli_close($db);
        exit();
    }
} else {
    header('Location: /');
    exit();
}
?>