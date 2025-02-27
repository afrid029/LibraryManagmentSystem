<?php

include('DBConnectivity.php');
$query = "SELECT * FROM books";
$result = mysqli_query($db, $query);

$html = "";

while($row = mysqli_fetch_assoc($result)){
    $html .= " <div class='tile'>
                <div class='title'>
                    <h4>".$row['name']."</h4>
                    <div class='bookEdit'>
                        <small class='available'>Available</small>
                        <small class='not-available'>Out of stock</small>
                        <span style='color: #542e03 ;' class='material-symbols-outlined'>
                            lightbulb
                        </span>
                        <button class='btn edit'>Edit</button>
                        <button class='btn del'>Delete</button>
                    </div>
                </div>
                <div class='about'>
                    <small>Author : ".$row['author']."</small>
                    <small>Donated By : ".$row['donor']."</small>
                    <span class='material-symbols-outlined'>
                        imagesmode
                    </span>
                    <small>Price : RS ".$row['price']."</small>
                </div>
                <div class='count'>
                    <small>Available : ".$row['count']."</small>
                    <small>Issued : 3</small>
                </div>
            </div>
            <hr>
            ";
}
$html = " <div class='tile'>
                <div class='title'>
                    <h4>Book Name</h4>
                    <div class='bookEdit'>
                        <small class='available'>Available</small>
                        <small class='not-available'>Out of stock</small>
                        <span style='color: #542e03 ;' class='material-symbols-outlined'>
                            lightbulb
                        </span>
                        <button class='btn edit'>Edit</button>
                        <button class='btn del'>Delete</button>
                    </div>
                </div>
                <div class='about'>
                    <small>Author : Author Name</small>
                    <small>Donated By : Donor</small>
                    <span class='material-symbols-outlined'>
                        imagesmode
                    </span>
                    <small>Price : RS 8500</small>
                </div>
                <div class='count'>
                    <small>Available : 5</small>
                    <small>Issued : 3</small>
                </div>
            </div>
            <hr>
            ";

            echo json_encode([
                'html' => $html
            ])
?>