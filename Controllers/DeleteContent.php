<?php
    if(isset($_POST['submit'])){

       if (!isset($_COOKIE['user'])) {
            header('Location: /');
            echo "<script>window.location.pathname = '/'</script>";
            exit();
        }
        include('DBConnectivity.php');
        $ID = $_POST['ID'];
        $type = $_POST['type'];

        if($type == 'User'){
            $query = "DELETE from users where ID = '$ID'";
            $result = mysqli_query($db, $query);

            if($result){
                echo json_encode([
                    'status' => true,
                    'message' => 'Librarian Deleted Successfully'
                ]);
                mysqli_close($db);
                exit();
            } else {
                echo json_encode([
                    'status' => false,
                    'message' => 'Unable to delete Librarian. try again later'
                ]);
                mysqli_close($db);
                exit();
            }
        }elseif ($type == 'History') {
            $query = "DELETE from borrowhistory where ID = '$ID'";
            $result = mysqli_query($db, $query);

            if($result){
                echo json_encode([
                    'status' => true,
                    'message' => 'Borrow History Deleted Successfully'
                ]);
                mysqli_close($db);
                exit();
            } else {
                echo json_encode([
                    'status' => false,
                    'message' => 'Unable to delete Borrow History. try again later'
                ]);
                mysqli_close($db);
                exit();
            }
        }elseif ($type == 'Lender') {
            $query = "DELETE from lenders where ID = '$ID'";
            $result = mysqli_query($db, $query);

            if($result){
                echo json_encode([
                    'status' => true,
                    'message' => 'Lender Deleted Successfully'
                ]);
                mysqli_close($db);
                exit();
            } else {
                echo json_encode([
                    'status' => false,
                    'message' => 'Unable to delete Lender. try again later'
                ]);
                mysqli_close($db);
                exit();
            }
        }elseif ($type == 'Book') {

            $query = "SELECT * FROM books WHERE ID = '$ID'";
            $result = mysqli_query($db, $query);
            $fetchedResult = mysqli_fetch_assoc($result);
            if(file_exists($fetchedResult['frontpage'])){
                unlink($fetchedResult['frontpage']);
            }
            if(file_exists($fetchedResult['backpage'])){
                unlink($fetchedResult['backpage']);

            }
            
            $query = "DELETE from books where ID = '$ID'";
            $result = mysqli_query($db, $query);

            if($result){
                echo json_encode([
                    'status' => true,
                    'message' => 'Book Deleted Successfully'
                ]);
                mysqli_close($db);
                exit();
            } else {
                echo json_encode([
                    'status' => false,
                    'message' => 'Unable to delete Book. try again later'
                ]);
                mysqli_close($db);
                exit();
            }
        }
    }
?>