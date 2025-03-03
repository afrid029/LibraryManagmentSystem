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
$query = "SELECT * FROM users order by username LIMIT $offset, $results_per_page";
$result = mysqli_query($db, $query);


$html = " <div class='userAdd'>
    <button onclick=\"handleModel('add-user-model', true)\"  class='userAdd-btn edit'>Add Admins</button>
</div>";

while ($row = mysqli_fetch_assoc($result)) {
    $html .= "<div class='tile'>
                <div class='title'>
                    <h4 >".$row['username']."</h4>
                    <div class='bookEdit'>
                        <button onclick=\"editHandleModel('edit-user-model', true, '".$row['ID']."')\" class='btn edit'>Edit</button>
                        <button onclick=\"deleteModel('". $row['ID']."', true, 'User')\" class='btn del'>Delete</button>
                    </div>
                </div>
            

            </div>
            <hr>";
}



$sql = "SELECT COUNT(*) AS total FROM users";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];


$total_pages = ceil($total_records / $results_per_page);

// Generate pagination links
$pagination = "<div class='pagination'>";
if ($page > 1) {
    $pagination .= "<span class='textPagi' href='javascript:void(0);' onclick='loadPage(4," . ($page - 1) . ")'>Previous</span> ";
}

for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $page) {
        $pagination .= "<strong class='selected'>$i</strong> ";
    } else if ($i == 1) {
        $pagination .= "<span href='javascript:void(0);' onclick='loadPage(4,$i)'>$i</span> ";
    } else if ($i == $total_pages) {
        $pagination .= "<span href='javascript:void(0);' onclick='loadPage(4,$i)'>$i</span> ";
    } else if (abs($i - $page) < 3) {
        $pagination .= "<span href='javascript:void(0);' onclick='loadPage(4,$i)'>$i</span> ";
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
    $pagination .= "<span class='textPagi' href='javascript:void(0);' onclick='loadPage(4," . ($page + 1) . ")'>Next</span>";
}

$pagination .= "</div>";

mysqli_close($db);
echo json_encode([
    'html' => $html,
    'pagination' => $pagination
]);

?>