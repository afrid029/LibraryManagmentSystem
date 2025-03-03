<?php

if (!isset($_COOKIE['user'])) {
    header('Location: /');
    echo "<script>window.location.pathname = '/'</script>";
    exit();
}

$results_per_page = 10;

// Get the current page from the URL, default to 1 if not set
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for the query
$offset = ($page - 1) * $results_per_page;

include('DBConnectivity.php');


if(isset($_GET['key']) && $_GET['key'] != 'undefined'){

    $key = $_GET['key'];
    $query = "SELECT bh.*, b.name as book, l.name as lender FROM 
                borrowhistory bh JOIN books b ON bh.book_ID = b.ID
                JOIN lenders l ON bh.lender_ID = l.ID
                WHERE b.name like '%$key%' OR l.name like '%$key%' OR bh.lentdate like '%$key%' OR bh.deadline like '%$key%'
                order by bh.status DESC, bh.lentdate desc
                LIMIT $offset, $results_per_page";
}else {
    
    $query = "SELECT bh.*, b.name as book, l.name as lender FROM 
            borrowhistory bh JOIN books b ON bh.book_ID = b.ID
            JOIN lenders l ON bh.lender_ID = l.ID
            order by bh.status DESC, bh.lentdate desc
            LIMIT $offset, $results_per_page";
              
}


$result = mysqli_query($db, $query);


$html = "";

if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if($row['status'] == 1){
            $class = 'not-available';
            $content = 'Not Returned';
        } else {
            $class = 'available';
            $content = 'Returned : '.$row['receivedDate'];
        }
        $html .= "<div class='tile'>
                    <div class='title'>
                        <h4>".$row['book']."</h4>
                        <div class='bookEdit'>
                            <small class='$class'>$content</small>
                            <button onclick=\"editHandleModel('edit-history-model', true, '".$row['ID']."')\" class='btn edit'>Edit</button>
                            <button onclick=\"deleteModel('". $row['ID']."', true, 'History')\"  class='btn del'>Delete</button>
                        </div>
                    </div>
                    <div class='about about-lender'>
                        <small>Lender : ".$row['lender']."</small>
                        <small style='text-align: center'>Lent Date : ".$row['lentdate']." </small>
                        <small style='text-align: center'>Due date : ".$row['deadline']."</small>
                    </div>
                    
                </div>
                <hr>";
    }
}else {
    $html .= "<div style='padding-left: 10px;' class='history-body'>No Lent History Found</div>";
}



if(isset($_GET['key']) && $_GET['key'] != 'undefined'){

    $key = $_GET['key'];
    $sql = "SELECT count(bh.ID) AS total FROM 
                borrowhistory bh JOIN books b ON bh.book_ID = b.ID
                JOIN lenders l ON bh.lender_ID = l.ID
                WHERE b.name like '%$key%' OR l.name like '%$key%' OR bh.lentdate like '%$key%' OR bh.deadline like '%$key%'";
}else {
    
    $sql = "SELECT COUNT(*) AS total FROM borrowhistory";
              
}

// $sql = "SELECT COUNT(*) AS total FROM borrowhistory";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];


$total_pages = ceil($total_records / $results_per_page);

// Generate pagination links
$pagination = "<div class='pagination'>";
if ($page > 1) {
    $pagination .= "<span class='textPagi' href='javascript:void(0);' onclick='loadPage(3," . ($page - 1) . ")'>Previous</span> ";
}

for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $page) {
        $pagination .= "<strong class='selected'>$i</strong> ";
    } else if ($i == 1) {
        $pagination .= "<span href='javascript:void(0);' onclick='loadPage(3,$i)'>$i</span> ";
    } else if ($i == $total_pages) {
        $pagination .= "<span href='javascript:void(0);' onclick='loadPage(3,$i)'>$i</span> ";
    } else if (abs($i - $page) < 3) {
        $pagination .= "<span href='javascript:void(0);' onclick='loadPage(3,$i)'>$i</span> ";
    } else {
        if (substr($pagination, -3) !== '...') {
            $pagination .= ".";
        }
    }

    // if ($i == $page) {
    //     $pagination .= "<strong>$i</strong> ";
    // } else {
    //     $pagination .= "<a href='javascript:void(0);' onclick='loadPage($i)'>$i</a> ";
    // }
}

if ($page < $total_pages) {
    $pagination .= "<span class='textPagi' href='javascript:void(0);' onclick='loadPage(3," . ($page + 1) . ")'>Next</span>";
}

$pagination .= "</div>";

mysqli_close($db);
echo json_encode([
    'html' => $html,
    'pagination' => $pagination
]);


?>