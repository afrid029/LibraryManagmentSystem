<?php
$html = " <div class='tile'>
                <div class='title'>
                    <h4>Book Name</h4>
                    <div class='bookEdit'>
                        <button class='btn edit'>Edit</button>
                        <button class='btn del'>Delete</button>
                    </div>
                </div>
                <div class='about'>
                    <small>Lender : Lender Name</small>
                    <small>Lent Date :12/02/2024 </small>
                    <small>Deadline : 19/02/2024</small>
                </div>
                
            </div>
            <hr>
<div class='tile'>
                <div class='title'>
                    <h4>Book Name</h4>
                    <div class='bookEdit'>
                        <button class='btn edit'>Edit</button>
                        <button class='btn del'>Delete</button>
                    </div>
                </div>
                <div class='about'>
                    <small>Lender : Lender Name</small>
                    <small>Lent Date :12/02/2024 </small>
                    <small>Deadline : 19/02/2024</small>
                </div>
                
            </div>
            <hr>
<div class='tile'>
                <div class='title'>
                    <h4>Book Name</h4>
                    <div class='bookEdit'>
                        <button class='btn edit'>Edit</button>
                        <button class='btn del'>Delete</button>
                    </div>
                </div>
                <div class='about'>
                    <small>Lender : Lender Name</small>
                    <small>Lent Date :12/02/2024 </small>
                    <small>Deadline : 19/02/2024</small>
                </div>
                
            </div>
            <hr>";

            echo json_encode([
                'html' => $html
            ])
?>