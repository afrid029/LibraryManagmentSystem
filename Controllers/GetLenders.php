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
    $query = "SELECT * From lenders 
    WHERE name like '%$key%' OR ID like '%$key%'
    order by name LIMIT $offset, $results_per_page";
}else {
    
    $query = "SELECT * From lenders order by name LIMIT $offset, $results_per_page";
}

$result = mysqli_query($db, $query);

$html = "";

if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)) {
        $ID = $row['ID'];
        $html .= "<div class='tile'>
        <div class='title'>
            <h4 id='$ID-name' >".$row['name']."</h4>
            <div class='bookEdit'>
                <small class='available'>Membership Num: ".$row['ID']."</small>
                <span onclick=\"getLenderHistory('".$row['ID']."', '".$row['name']."')\"  style='color: #542e03 ;' class='material-symbols-outlined'>
                    lightbulb
                </span>
                <button onclick=\"editHandleModel('edit-lender-model', true, '".$row['ID']."')\" class='btn edit'>Edit</button>
                <button onclick=\"deleteModel('". $row['ID']."', true, 'Lender')\" class='btn del'>Delete</button>
            </div>
        </div>
        <div class='about about-lender'>
            <small id='$ID-phone' >Phone : ".$row['contact']."</small>
            <small id='$ID-address' style='text-align: center'>Address : ".$row['address']." </small>
            <small id='$ID-nic' style='text-align: right'>NIC : ".$row['nic']."</small>
        </div>
       
    </div>
    <hr>";
    }
} else {
    $html .= "<div style='padding-left: 10px;' class='history-body'>No Lenders Found</div>";
}


if(isset($_GET['key']) && $_GET['key'] != 'undefined'){
    // echo "There";       
    $key = $_GET['key'];
    $sql = "SELECT COUNT(*) AS total FROM lenders WHERE name like '%$key%' OR ID like '%$key%'";
   
}else {
    // echo "Nothere";
    $sql = "SELECT COUNT(*) AS total FROM lenders";
}


$result = mysqli_query($db, $sql);
// echo mysqli_error($db);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];


$total_pages = ceil($total_records / $results_per_page);

// Generate pagination links
$pagination = "<div class='pagination'>";
if ($page > 1) {
    $pagination .= "<span class='textPagi' href='javascript:void(0);' onclick='loadPage(2," . ($page - 1) . ")'>Previous</span> ";
}

for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $page) {
        $pagination .= "<strong class='selected'>$i</strong> ";
    } else if ($i == 1) {
        $pagination .= "<span href='javascript:void(0);' onclick='loadPage(2,$i)'>$i</span> ";
    } else if ($i == $total_pages) {
        $pagination .= "<span href='javascript:void(0);' onclick='loadPage(2,$i)'>$i</span> ";
    } else if (abs($i - $page) < 3) {
        $pagination .= "<span href='javascript:void(0);' onclick='loadPage(2,$i)'>$i</span> ";
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
    $pagination .= "<span class='textPagi' href='javascript:void(0);' onclick='loadPage(2," . ($page + 1) . ")'>Next</span>";
}

$pagination .= "</div>";

mysqli_close($db);
echo json_encode([
    'html' => $html,
    'pagination' => $pagination
]);

?>
