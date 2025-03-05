<?php
 





$results_per_page = 10;

// Get the current page from the URL, default to 1 if not set
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for the query
$offset = ($page - 1) * $results_per_page;

include('DBConnectivity.php');

if(isset($_GET['key']) && $_GET['key'] != 'undefined'){

    $key = $_GET['key'];
    $query = "SELECT b.*, (SELECT count(*) FROM borrowhistory bh WHERE bh.book_ID = b.ID and bh.status = true) leftBooks
                FROM books b
                WHERE b.ID like '%$key%' OR  b.name like '%$key%' OR b.author like '%$key%' OR b.donor like '%$key%'
                order by b.name LIMIT $offset, $results_per_page";
}else {
    
    $query = "SELECT b.*, (SELECT count(*) FROM borrowhistory bh WHERE bh.book_ID = b.ID and bh.status = true) leftBooks
                FROM books b
                order by b.name
                LIMIT $offset, $results_per_page";
              
}

$result = mysqli_query($db, $query);


$html = "";

if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['count'] == $row['leftBooks']) {
           $class = 'not-available';
           $content = 'Out of stock';
        } else {
            $class = 'available';
            $content = 'Available';
        } 
    
        $ID = $row['ID'];
    
        $available = (int) $row['count'] - (int) $row['leftBooks'];
        $html .= " <div class='tile'>
                    <div class='title'>
                        <div class='title-div'>
                            <h4 id='$ID-name'>" . $row['name'] . "</h4>
                            <small>".$row['ID']."</small>
                        </div>
                        <div class='bookEdit'>
                            <small class='$class'>$content</small>
    
                            <span onclick=\"getBookHistory('".$row['ID']."', true)\" style='color: #542e03 ;' class='material-symbols-outlined'>
                                lightbulb
                            </span>
                            <button onclick=\"editHandleModel('edit-book-model', true, '".$row['ID']."')\" class='btn edit'>Edit</button>
                            <button onclick=\"deleteModel('". $row['ID']."', true, 'Book')\" class='btn del'>Delete</button>
                        </div>
                    </div>
                    <div class='about'>
                        <small id='$ID-author'>Author : " . $row['author'] . "</small>
                        <small id='$ID-donor' >Donated By : " . $row['donor'] . "</small>
                        <span onclick=\"seeBookImages('".$row['frontpage']."', '".$row['backpage']."', '".$row['name']."')\" class='material-symbols-outlined'>
                            imagesmode
                        </span>
                        <small id='$ID-amount' style='text-align: right'>Price : RS " . $row['amount'] . "</small>
                    </div>
                    <div class='count'>
                        <small id='$ID-count' >Total : " . $row['count'] . "</small>
                        <small>available : ".$available."</small>
                    </div>
                </div>
                <hr>
                ";
    }
} else {
    $html .= "<div style='padding-left: 10px;' class='history-body'>No books Found</div>";
}



if(isset($_GET['key']) && $_GET['key'] != 'undefined'){

    $key = $_GET['key'];
    $sql = "SELECT COUNT(*) AS total FROM books b
                WHERE b.ID like '%$key%' OR b.name like '%$key%' OR b.author like '%$key%' OR b.donor like '%$key%'";
}else {
    $sql = "SELECT COUNT(*) AS total FROM books";        
}


$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];

$total_pages = ceil($total_records / $results_per_page);

// Generate pagination links
$pagination = "<div class='pagination'>";
if ($page > 1) {
    $pagination .= "<span class='textPagi' href='javascript:void(0);' onclick='loadPage(1," . ($page - 1) . ")'>Previous</span> ";
}

for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $page) {
        $pagination .= "<strong class='selected'>$i</strong> ";
    } else if ($i == 1) {
        $pagination .= "<span href='javascript:void(0);' onclick='loadPage(1,$i)'>$i</span> ";
    } else if ($i == $total_pages) {
        $pagination .= "<span href='javascript:void(0);' onclick='loadPage(1,$i)'>$i</span> ";
    } else if (abs($i - $page) < 3) {
        $pagination .= "<span href='javascript:void(0);' onclick='loadPage(1,$i)'>$i</span> ";
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
    $pagination .= "<span class='textPagi' href='javascript:void(0);' onclick='loadPage(1," . ($page + 1) . ")'>Next</span>";
}

$pagination .= "</div>";

// echo ini_get('max_execution_time');
$html = mb_convert_encoding($html, 'UTF-8', 'auto');
mysqli_close($db);
echo json_encode([
    'html' => $html,
    'pagination' => $pagination
]);

?>