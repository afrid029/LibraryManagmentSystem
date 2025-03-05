<?php
 

$results_per_page = 18;

// Get the current page from the URL, default to 1 if not set
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for the query
$offset = ($page - 1) * $results_per_page;

include('DBConnectivity.php');

if(isset($_GET['key']) && $_GET['key'] != 'undefined'){

    $key = $_GET['key'];
    $query = "SELECT b.*
                FROM books b
                WHERE b.name like '%$key%' OR b.author like '%$key%'
                order by b.name LIMIT $offset, $results_per_page";
}else {
    
    $query = "SELECT b.*
                FROM books b
                order by b.name
                LIMIT $offset, $results_per_page";
              
}

$result = mysqli_query($db, $query);


$html = "";

if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)) {
        $imgSrc = $row['frontpage'];
        $imgSrc = explode('/', $imgSrc);
        $imgSrc = $imgSrc[sizeof($imgSrc) - 1];
        $imgSrc = "Public/Books/". $imgSrc;
         
        $html .= "<div class='book-tile'>
                    <div class='book-image'>
                        <img onclick=\"seeBookImages('".$row['frontpage']."', '".$row['backpage']."', '".$row['name']."','".$row['ID']."','".$row['donor']."')\" src='".$imgSrc."' alt='Front Page' srcset=''>
                    </div>
                    <div class='book-content'>
                        <div class='book-name'>
                            ".$row['name']."
                        </div>
                        <div class='book-author'>
                            ".$row['author']."
                        </div>
                    </div>
                </div>";
    }
} else {
    $html .= "<div class='no-found'>No books Found</div>";
}



if(isset($_GET['key']) && $_GET['key'] != 'undefined'){

    $key = $_GET['key'];
    $sql = "SELECT COUNT(*) AS total FROM books b
                WHERE b.name like '%$key%' OR b.author like '%$key%'";
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
    $pagination .= "<span class='textPagi' href='javascript:void(0);' onclick='loadPage(" . ($page - 1) . ")'>Previous</span> ";
}

for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $page) {
        $pagination .= "<strong class='selected'>$i</strong> ";
    } else if ($i == 1) {
        $pagination .= "<span href='javascript:void(0);' onclick='loadPage($i)'>$i</span> ";
    } else if ($i == $total_pages) {
        $pagination .= "<span href='javascript:void(0);' onclick='loadPage($i)'>$i</span> ";
    } else if (abs($i - $page) < 3) {
        $pagination .= "<span href='javascript:void(0);' onclick='loadPage($i)'>$i</span> ";
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
    $pagination .= "<span class='textPagi' href='javascript:void(0);' onclick='loadPage(" . ($page + 1) . ")'>Next</span>";
}

$pagination .= "</div>";

// echo ini_get('max_execution_time');

mysqli_close($db);
$html = mb_convert_encoding($html, 'UTF-8', 'auto');
echo json_encode([
    'html' => $html,
    'pagination' => $pagination
]);

?>