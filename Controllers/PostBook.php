<?php
  if (!isset($_COOKIE['user'])) {
    header('Location: /');
    echo "<script>window.location.pathname = '/'</script>";
    exit();
}
if(isset($_POST['submit'])){

    include('DBConnectivity.php');

    $name = $_POST['bookName'];
    $author = $_POST['bookAuthor'];
    $donor = $_POST['bookDonor'];
    $price = $_POST['amount'];
    $count = $_POST['count'];
  
    
    $targetDirectory = $_SERVER['DOCUMENT_ROOT'] . "/Public/Books/";

    $imageFileType = strtolower(pathinfo($_FILES["frontImage"]["name"], PATHINFO_EXTENSION));

    // Generate a unique file name using timestamp and a random number
    // $timestamp = time(); // Current timestamp (seconds since Unix epoch)
    $randomNumber = rand(100, 999); // Random number to add some variability
    $targetFrontFile = $targetDirectory . $name . '-Front'.  $randomNumber . "." . $imageFileType;

    if (move_uploaded_file($_FILES["frontImage"]["tmp_name"], $targetFrontFile)) {
        // echo "The file has been uploaded successfully as: " . basename($targetFile);
    } else {

        echo json_encode([
            'status' => false,
            'message' => 'Unable to upload Image. try again later'
        ]);
        mysqli_close($db);
        exit();
    }

    $imageFileType = strtolower(pathinfo($_FILES["backImage"]["name"], PATHINFO_EXTENSION));

    // Generate a unique file name using timestamp and a random number
    // $timestamp = time(); // Current timestamp (seconds since Unix epoch)
    // $randomNumber = rand(100, 999); // Random number to add some variability
    $targetBackFile = $targetDirectory . $name . '-Back'.  $randomNumber . "." . $imageFileType;

    if (move_uploaded_file($_FILES["backImage"]["tmp_name"], $targetBackFile)) {
        // echo "The file has been uploaded successfully as: " . basename($targetFile);
    } else {

        echo json_encode([
            'status' => false,
            'message' => 'Unable to upload Image. try again later'
        ]);
        mysqli_close($db);
        exit();
    }

    $query = "SELECT count(*) as cnt FROM books";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    $randomNumber = rand(100, 999);
    $ID = 'BOOK'. $row['cnt'] . $randomNumber;

    $query = "INSERT INTO books VALUE('$ID', '$name', '$author', '$donor', '$targetFrontFile', '$targetBackFile', '$price', '$count')";
    $result = mysqli_query($db, $query);

    if($result){
        echo json_encode([
            'status' => true,
            'message' => 'Book Added Successfully'
        ]);

        mysqli_close($db);

        exit();
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'Unable to add Book. try again later'
        ]);

        mysqli_close($db);
        exit();
    }

}elseif(isset($_POST['edit-submit'])){
    include('DBConnectivity.php');

    $name = $_POST['bookName'];
    $author = $_POST['bookAuthor'];
    $donor = $_POST['bookDonor'];
    $price = $_POST['amount'];
    $count = $_POST['count'];
    $ID = $_POST['ID'];

    $query = "SELECT * FROM books WHERE ID = '$ID'";
    $result = mysqli_query($db, $query);
    $fetchedRow = mysqli_fetch_assoc($result);

    $isBack = false;
    $isFront = false;

    $targetFrontFile;
    $targetBackFile;

    if(isset($_FILES['frontImage']) && $_FILES['frontImage']['error'] == 0) {
        if(file_exists($fetchedRow['frontpage'])){
              unlink($fetchedRow['frontpage']);
        }
      
        $isFront = true;
        $targetDirectory = $_SERVER['DOCUMENT_ROOT'] . "/Public/Books/";

        // Get the file extension
        $imageFileType = strtolower(pathinfo($_FILES["frontImage"]["name"], PATHINFO_EXTENSION));
    
        // Generate a unique file name using timestamp and a random number
        $randomNumber = rand(100, 999); // Random number to add some variability
        $targetFrontFile = $targetDirectory . $name . '-Front'.  $randomNumber . "." . $imageFileType;
    
        if (move_uploaded_file($_FILES["frontImage"]["tmp_name"], $targetFrontFile)) {
            // echo "The file has been uploaded successfully as: " . basename($targetFile);
        } else {
    
            echo json_encode([
                'status' => false,
                'message' => 'Unable to upload Image. try again later'
            ]);
            mysqli_close($db);
    
            exit();
        }
    } 


    if(isset($_FILES['backImage']) && $_FILES['backImage']['error'] == 0) {
        if(file_exists($fetchedRow['backpage'])){
            unlink($fetchedRow['backpage']);
        }
        
        $isBack = true;
        $targetDirectory = $_SERVER['DOCUMENT_ROOT'] . "/Public/Books/";

        // Get the file extension
        $imageFileType = strtolower(pathinfo($_FILES["backImage"]["name"], PATHINFO_EXTENSION));
    
        // Generate a unique file name using timestamp and a random number
        $randomNumber = rand(100, 999); // Random number to add some variability
        $targetBackFile = $targetDirectory . $name . '-Back'.  $randomNumber . "." . $imageFileType;
    
        if (move_uploaded_file($_FILES["backImage"]["tmp_name"], $targetBackFile)) {
            // echo "The file has been uploaded successfully as: " . basename($targetFile);
        } else {
    
            echo json_encode([
                'status' => false,
                'message' => 'Unable to upload Image. try again later'
            ]);
            mysqli_close($db);
    
            exit();
        }
    } 
    

    if($isBack && $isFront){
        $query = "UPDATE books SET name = '$name', author = '$author', donor = '$donor', frontpage = '$targetFrontFile', backpage = '$targetBackFile', amount = '$price', count = '$count' WHERE ID = '$ID'";
    } elseif($isBack){
        $query = "UPDATE books SET name = '$name', author = '$author', donor = '$donor', backpage = '$targetBackFile', amount = '$price', count = '$count' WHERE ID = '$ID'";
    } elseif($isFront){
        $query = "UPDATE books SET name = '$name', author = '$author', donor = '$donor', frontpage = '$targetFrontFile', amount = '$price', count = '$count' WHERE ID = '$ID'";
    } else {
        $query = "UPDATE books SET name = '$name', author = '$author', donor = '$donor', amount = '$price', count = '$count' WHERE ID = '$ID'";
    }

    $result = mysqli_query($db, $query);


    if($result){
        echo json_encode([
            'status' => true,
            'message' => 'Book Updated Successfully'
        ]);

        mysqli_close($db);

        exit();
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'Unable to update Book. try again later'
        ]);

        mysqli_close($db);
        exit();
    }
} else {
    header('Location: /');
    exit();
}
?>