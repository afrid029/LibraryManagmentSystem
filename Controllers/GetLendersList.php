<?php 
  if (!isset($_COOKIE['user'])) {
    header('Location: /');
    echo "<script>window.location.pathname = '/'</script>";
    exit();
}
include ('DBConnectivity.php');
$query = "SELECT * FROM lenders order by name";
$result = mysqli_query($db, $query);
$data = array();

while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}

mysqli_close($db);

echo json_encode([
    'data' => $data
])
?>