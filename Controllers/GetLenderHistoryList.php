<?php
include('DBConnectivity.php');
$ID = $_GET['ID'];
$query = "SELECT bh.*, b.name FROM borrowhistory bh
        JOIN books b ON bh.book_ID = b.ID
        WHERE bh.lender_ID= '$ID'
        ORDER BY bh.status DESC, bh.lentdate desc";

$result = mysqli_query($db, $query);

$html = "<div class='history-header'>
    <div style='padding-left: 10px;'>Book</div>
    <div>Lent Date</div>
    <div>Due date</div>
    <div>Status</div>
</div>";

if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        if($row['status'] == 1){
            $content = "<div style ='color:red'>Not Receieved</div>";
        } else {
            $content = "<div>Returned:".$row['receivedDate']."</div>";
        }
    
        $html .= "<div class='history-body'>
                    <div style='padding-left: 10px;'>".$row['name']."</div>
                    <div>".$row['lentdate']."</div>
                    <div>".$row['deadline']."</div>
                    $content
                </div>
                <hr>";
    }
}else {
    $html .= "<div style='padding-left: 10px;' class='history-body'>No records found for this lender</div>";
}

mysqli_close($db);

echo json_encode([
    'html' => $html
]);

?>
