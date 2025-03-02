<?php
if(isset($_POST['submit'])){

    include('DBConnectivity.php');

    $book = $_POST['book'];
    $lender = $_POST['lender'];
    $startDate = $_POST['startDate'];
    $dueDate = $_POST['dueDate'];
  
    
    $query = "SELECT count(*) as cnt FROM borrowhistory";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    $randomNumber = rand(100, 999);
    $ID = 'LH'. $row['cnt'] . $randomNumber;

    $query = "INSERT INTO borrowhistory VALUE('$ID', '$book', '$lender', '$startDate', '$dueDate', true, NULL)";
    $result = mysqli_query($db, $query);

    if($result){
        echo json_encode([
            'status' => true,
            'message' => 'Borrow History Created Successfully'
        ]);
        mysqli_close($db);
        exit();
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'Unable to create Borrow history. try again later'
        ]);
        mysqli_close($db);
        exit();
    }

}else if(isset($_POST['edit-submit'])){
    include('DBConnectivity.php');

    $ID = $_POST['ID'];
    $book = $_POST['book'];
    $lender = $_POST['lender'];
    $startDate = $_POST['startDate'];
    $dueDate = $_POST['dueDate'];
   
  
    if(isset($_POST['rcvd'])){
        $rcvdDate = $_POST['rcvdDate'];
        $query = "UPDATE borrowhistory 
        SET book_ID = '$book', 
        lender_ID = '$lender',
        lentdate = '$startDate',
        deadline = '$dueDate',
        status = false,
        receivedDate = '$rcvdDate'
        WHERE ID = '$ID'";
    }else {
        $query = "UPDATE borrowhistory 
        SET book_ID = '$book', 
        lender_ID = '$lender',
        lentdate = '$startDate',
        deadline = '$dueDate',
        status = true,
        receivedDate = NULL
        WHERE ID = '$ID'";
    }

   $result = mysqli_query($db, $query);

    if($result){
        echo json_encode([
            'status' => true,
            'message' => 'Borrow History Updated Successfully'
        ]);
        mysqli_close($db);
        exit();
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'Unable to update Borrow history. try again later'
        ]);
        mysqli_close($db);
        exit();
    }
} else {
    header('Location: /');
    exit();
}
?>