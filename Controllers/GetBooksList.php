<?php


    include ('DBConnectivity.php');
    $data = array();
    if(isset($_GET['ID'])){
        $ID = $_GET['ID'];
        $query = "SELECT 
            b.ID, 
            b.name, 
            b.count, 
            (SELECT count(*) FROM borrowhistory bh WHERE bh.book_ID = b.ID and bh.status = true) leftBooks
            FROM books b
            where b.ID = '$ID'";
        $result = mysqli_query($db, $query);

        $Selecteddata = mysqli_fetch_assoc($result);
        $Selecteddata['available'] = (int) $Selecteddata['count'] - (int) $Selecteddata['leftBooks'];
        $data[] = $Selecteddata;
        

    }

    $query = "SELECT 
            b.ID, 
            b.name, 
            b.count, 
            (SELECT count(*) FROM borrowhistory bh WHERE bh.book_ID = b.ID and bh.status = true) leftBooks
            FROM books b
            order by b.name";
    $result = mysqli_query($db, $query);
    

    while($row = mysqli_fetch_assoc($result)){
        if($row['count'] > $row['leftBooks']){
            $row['available'] = (int) $row['count'] - (int) $row['leftBooks'];
            $data[] = $row;
        } 
    }

   

    mysqli_close($db);

    echo json_encode([
        'data' => $data
    ])
?>