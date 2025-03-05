<?php SESSION_START() ?>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="Assets/Images/logo.png" />
    <title>CV Library | Home </title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=Outfit:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="/Assets/CSS/index.css">
    <link rel="stylesheet" href="/Assets/CSS/Form.css">
    <link rel="stylesheet" href="/Assets/CSS/alert.css">
    <link rel="stylesheet" href="/Assets/CSS/pagination.css">
    <link rel="stylesheet" href="/Assets/CSS/model.css">

</head>

<body class = "homebody">
     <!-- Image Viewer -->
     <div id="image-viewer" class="model-overlay">
        <div class="model-body">
            <div onclick="closeImageViewer()" class="close-btn">X</div>
            <div class="model-title">
                <h3 id="book-image"></h3>
            </div>
            <hr>

            <div class="model-content">
                <div class="image-viewer-container">
                    <div class="image-viewer">
                        <h4>Front Page</h4>
                        <img id="frontImg" src="" alt="Front Page">
                    </div>
                    <div class="image-viewer">
                        <h4>Back Page</h4>
                        <img id="backImg" src="" alt="Back Page">
                    </div>
                   
                </div>
                <div class="model-foot">
                        <p >Book Code: <span id="bookCode" style="color: 542a03;"></span></p>
                        <p >Donated By: <span id="bookDonor" style="color: 542a03;"></span></p>
                </div>

            </div>

        </div>
    </div>
<div class="nav">
        <div class="nav-cover"></div>

        <img src="/Assets/Images/logo2.png" alt="" />

        <div class="ul">

        <?php
        if (!isset($_COOKIE['user'])) {
            ?> 
                <div>
                    <a href="/loginpage">
                        <span class="material-symbols-outlined">
                            face_2
                        </span>Login
                    </a>
                </div>
            <?php
        }else {?>
            <div >
                    <a href="/dashboard">
                        <span class="material-symbols-outlined">
                            dashboard
                        </span> Dashboard
                    </a>
                </div>
        <?php
        }
        ?>
            

        </div>

    </div>
    <?php
    if (isset($_SESSION['fromAction']) && $_SESSION['fromAction'] === true) { ?>


    <div class="alert-container" id="alertSecond">
        <div class="alert" id="alertContSecond">
            <p><?php echo $_SESSION['message'] ?></p>
        </div>
    </div>

    <?php
    if ($_SESSION['status'] === true) {
        echo "<script>document.getElementById('alertContSecond').style.backgroundColor = '#1D7524';</script>";
    } else {
        echo "<script>document.getElementById('alertContSecond').style.backgroundColor = '#E44C4C';</script>";
    }
    ?>
    <script>
        
        document.getElementById('alertSecond').style.display = 'flex';
        

        setTimeout(() => {
            document.getElementById('alertSecond').style.display = 'none';
        }, 5000);
    </script>
    <?php
    }
    $_SESSION['fromAction'] = false;

?>
   
    <div class="content">

        <div class="search">
            <div class="search-text">
            Uncover stories that await you
            </div>
            <div style="margin-bottom: 0px !important; padding-top: 20px; padding-bottom: 20px" class="FormRow SearchRow">
                <span onclick="clearSearch()" style="display: none;" id="closeSearch" class="material-symbols-outlined">
                    close
                </span>
                <input type="text" id="search" placeholder="Search Books" />
                <span onclick="searchContent()" class="material-symbols-outlined">
                    frame_inspect
                </span>
            </div>

        </div>

        <div class="loading">
            <span class="material-symbols-outlined">
                progress_activity
            </span>
        </div>

        <div class="books-body">
            <div class="books-cover"></div>
            <div class="books-content">
            

            </div>
        </div>
        

        <div id="pagination"></div>
        <div class="footer">Designed By : &nbsp; <a target="_blank" href="https://masspro.ca/en/">Mass Productions</a></div>
    </div>

  


       
    
</body>  


<script>
   

    let bookPage = 1;
    let key;

    function loadPage(pagination) {
        const xhr = new XMLHttpRequest();

        document.querySelector('.loading').style.display = 'flex';

       
            if(pagination){
                bookPage = pagination;
            }
            xhr.open("GET", "/Controllers/GetBooksForHome.php?page="+bookPage+"&key="+key, true);
        

        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                document.querySelector('.loading').style.display = 'none';
                const content = document.querySelector(".books-content");
                const pagination = document.querySelector("#pagination");
                content.innerHTML = response.html;
                pagination.innerHTML = response.pagination;
            

                // cur = page;
            } else {
                console.log("Error in XMLHttpRequest ", xhr.readyState);
            }
        }

        xhr.send();

    }

    var closeSearch = document.getElementById("closeSearch");
    document.getElementById("search").addEventListener('input', function(event) {
        if(event.target.value.length > 0){
            closeSearch.style.display = 'block';
        }else {
            closeSearch.style.display = 'none';
        }
        
    })
    function searchContent() {
        key = document.getElementById("search").value;
        bookPage = 1;
        
        loadPage();
        
    }

    function clearSearch() {
        key = undefined;
        document.getElementById('search').value = '';
        closeSearch.style.display = 'none';
        bookPage = 1;
        loadPage()
    }

    function seeBookImages(front, back, name, ID, donor) {
        document.getElementById('book-image').innerText = name;
        document.getElementById('bookCode').innerText = ID;
        document.getElementById('bookDonor').innerText = donor;


        let imgSrc = front;
        imgSrc = imgSrc.split("/");
        imgSrc = imgSrc[imgSrc.length - 1];
        imgSrc = "Public/Books/" + imgSrc;

        document.getElementById('frontImg').src = imgSrc;

        imgSrc = back;
        imgSrc = imgSrc.split("/");
        imgSrc = imgSrc[imgSrc.length - 1];
        imgSrc = "Public/Books/" + imgSrc;

        document.getElementById('backImg').src = imgSrc;
        document.getElementById('image-viewer').style.display = 'block';
    }

    function closeImageViewer() {
        document.getElementById('image-viewer').style.display = 'none';
        document.getElementById('book-image').innerText = '';
        document.getElementById('frontImg').src = '';
        document.getElementById('backImg').src = '';
        document.getElementById('bookCode').innerText = '';
        document.getElementById('bookDonor').innerText = '';
    }

    window.onload = function() {
       loadPage(1);
    }

</script>

</html>