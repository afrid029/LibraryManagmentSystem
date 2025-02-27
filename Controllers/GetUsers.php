<?php 
$html = " <div class='tile'>
                <div class='title'>
                    <h4>User Name</h4>
                    <div class='bookEdit'>
                        <button class='btn edit'>Edit</button>
                        <button class='btn del'>Delete</button>
                    </div>
                </div>
            

            </div>
            <hr>
<div class='tile'>
                <div class='title'>
                    <h4>User Name</h4>
                    <div class='bookEdit'>
                        <button class='btn edit'>Edit</button>
                        <button class='btn del'>Delete</button>
                    </div>
                </div>
            

            </div>
            <hr>
<div class='tile'>
                <div class='title'>
                    <h4>User Name</h4>
                    <div class='bookEdit'>
                        <button class='btn edit'>Edit</button>
                        <button class='btn del'>Delete</button>
                    </div>
                </div>
            

            </div>
            <hr>";

            echo json_encode([
                'html' => $html
            ])
?>