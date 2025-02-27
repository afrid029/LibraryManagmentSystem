<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Console | CVHTH</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=library_books" /> -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=badge" /> -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=deployed_code_history" /> -->
    <link rel="stylesheet" href="/Assets/CSS/dashboard.css">
    <link rel="stylesheet" href="/Assets/CSS/Form.css">
    <link rel="stylesheet" href="/Assets/CSS/model.css">
</head>

<body>

    <!-- Add Book Model -->
    <div id="add-book-model" class="model-overlay">
        <div class="model-body">
            <div onclick="handleModel('add-book-model', false)" class="close-btn">X</div>
            <div class="model-title">
                Add Books

            </div>
            <hr>

            <div class="model-content">
                <form id="add-book-form" method="post" oninput="validateBookForm()">
                    <div class="form">
                        <div class="FormRow">
                            <input type="text" name="bookName" id="bookName" placeholder="Book Name" required />
                        </div>
                        <div class="FormRow">
                            <input type="text" name="bookAuthor" id="bookAuthor" placeholder="Author of Book" required />
                        </div>
                        <div class="FormRow">
                            <input type="text" name="bookDonor" id="bookDonor" placeholder="Donor of the Book" required />
                        </div>
                        <div class="FormRow">
                            <label for="frontImage">Front page image</label>
                            <input type="file" name="frontImage" id="frontImage" required />
                        </div>
                        <div class="FormRow">
                            <label for="frontImage">Back page image</label>
                            <input type="file" name="backImage" id="backImage" required />
                        </div>
                        <div class="FormRow">
                            <input type="number" name="amount" id="amount" placeholder="Price of the book" required />
                        </div>
                        <div class="FormRow">
                            <input type="number" name="count" id="count" placeholder="Number of Copies" required />
                        </div>


                        <div class="button">
                            <button
                                type="submit"
                                id="book-submit"
                                name="submit"
                                disabled="true"
                                class="submit">
                                Add Book
                            </button>

                            <button
                                style="display: none;"
                                id="book-submiting"
                                disabled="true"
                                class="submit"> Adding...
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Mobile SIde bar -->
    <div class="mobile-side-bar">
        <div class="mobile-side-bar-content">
            <div onclick="slideBar(false)" class="close">x</div>
            <img src="/Assets/Images/logo.jpg" alt="">

            <div class="mobile-ul">
                <div class="active" onclick="navigate(1)"><a> <span class="material-symbols-outlined">
                            library_books
                        </span>Books</a></div>
                <hr>
                <div onclick="navigate(2)"><a><span class="material-symbols-outlined">
                            badge
                        </span>Lenders</a></div>
                <hr>
                <div onclick="navigate(3)"><a><span class="material-symbols-outlined">
                            deployed_code_history
                        </span>Borrow History</a></div>
                <hr>
                <div onclick="navigate(4)"><a><span class="material-symbols-outlined">
                            shield_person
                        </span>Admins</a></div>
                <hr>
                <div><a onclick="handleModel('add-book-model', true)"><span class="material-symbols-outlined">
                            post_add
                        </span>Add Books</a></div>
                <hr>

                <div><a><span class="material-symbols-outlined">
                            person_add
                        </span>Add Lenders</a></div>
                <hr>
                <div><a><span class="material-symbols-outlined">
                            outbox
                        </span>Lend Book</a></div>
                <hr>
                <div><a href="/logoff">Logout</a></div>
            </div>


        </div>
    </div>


    <!-- Alert -->
    <div class="alert-container" id="alert">
        <div class="alert" id="alertCont">
            <p id="alert-text"></p>
        </div>
    </div>


    <div class="nav">
        <div class="nav-cover"></div>

        <img src="/Assets/Images/logo.jpg" alt="" />

        <div class="ul">
            <div class="active" onclick="navigate(1)"><a> <span class="material-symbols-outlined">
                        library_books
                    </span>Books</a></div>
            <div onclick="navigate(2)"><a><span class="material-symbols-outlined">
                        badge
                    </span>Lenders</a></div>
            <div onclick="navigate(3)"><a><span class="material-symbols-outlined">
                        deployed_code_history
                    </span>Borrow History</a></div>
            <div onclick="navigate(4)"><a><span class="material-symbols-outlined">
                        shield_person
                    </span>Admins</a></div>
            <div onclick="handleModel('add-book-model', true)"><a><span class="material-symbols-outlined">
                        post_add
                    </span>Add Books</a></div>
            <div><a><span class="material-symbols-outlined">
                        person_add
                    </span>Add Lenders</a></div>
            <div><a><span class="material-symbols-outlined">
                        outbox
                    </span>Lend Book</a></div>
            <div><a href="/logoff">Logout</a></div>

        </div>

        <div onclick="slideBar(true)" class="mobile-nav">
            <span class="material-symbols-outlined">
                widgets
            </span>
        </div>
    </div>

    <div class="body">
        <div class="search">
            <div class="FormRow">
                <input type="text" id="search" placeholder="Search" />
            </div>

        </div>

        <div class="content">


        </div>

</body>

<script>
    let cur = 1;

    function slideBar(val) {
        const sidebar = document.querySelector(".mobile-side-bar");
        const sidebarContent = document.querySelector(".mobile-side-bar-content");
        if (val) {
            sidebar.style.display = "block"
        } else {

            sidebarContent.classList.add("bar-close");

            setTimeout(() => {
                sidebar.style.display = "none"
                sidebarContent.classList.remove("bar-close");
            }, 300)

        }
    }

    function navigate(page) {
        const ul = document.querySelector(".ul");
        const links = ul.querySelectorAll("div");

        const mobileul = document.querySelector(".mobile-ul");
        const mobilelinks = mobileul.querySelectorAll("div");
        if (page != cur) {
            links[cur - 1].classList.remove("active");
            links[page - 1].classList.add("active");

            mobilelinks[cur - 1].classList.remove("active");
            mobilelinks[page - 1].classList.add("active");

            slideBar(false);


            const content = document.querySelector(".content");

            if (page > cur) {
                content.classList.toggle("right");
                setTimeout(() => {
                    content.classList.toggle("right");
                }, 500)
            } else {
                content.classList.toggle("left");
                setTimeout(() => {
                    content.classList.toggle("left");
                }, 500)
            }

            cur = page;
        }

        document.querySelector(".content").innerHTML = "";
        loadPage(page);
    }

    function loadPage(page) {
        const xhr = new XMLHttpRequest();

        if (page == 1) {
            xhr.open("GET", "/Controllers/GetBooks.php", true);
        } else if (page == 2) {
            xhr.open("GET", "/Controllers/GetLenders.php", true);
        } else if (page == 3) {
            xhr.open("GET", "/Controllers/GetBorrowHistory.php", true);
        } else if (page == 4) {
            xhr.open("GET", "/Controllers/GetUsers.php", true);
        }

        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                const content = document.querySelector(".content");
                content.innerHTML = response.html;
                const searchBar = document.getElementById("search");

                if (cur == 1) {
                    searchBar.setAttribute("placeholder", "Search Books");
                    searchBar.value = "";

                } else if (cur == 2) {
                    searchBar.setAttribute("placeholder", "Search Lenders");
                    searchBar.value = "";
                } else if (cur == 3) {
                    searchBar.setAttribute("placeholder", "Search Borrow History");
                    searchBar.value = "";
                } else if (cur == 4) {
                    searchBar.setAttribute("placeholder", "Search is not active here");
                    searchBar.value = "";
                }
            } else {
                console.log("Error in XMLHttpRequest ", xhr.readyState);
            }
        }

        xhr.send();

    }

    function handleModel(ID, value) {

        slideBar(false);
        const model = document.getElementById(ID);
        if (value) {
            model.style.display = "block";
        } else {
            model.style.display = "none";
        }

    }

    // Add Book
    function validateBookForm() {
        const bookName = document.getElementById("bookName").value;
        const bookAuthor = document.getElementById("bookAuthor").value;
        const bookDonor = document.getElementById("bookDonor").value;
        const amount = document.getElementById("amount").value;
        const count = document.getElementById("count").value;
        const frontImage = document.getElementById("frontImage").value;
        const backImage = document.getElementById("backImage").value;

        const submit = document.getElementById("book-submit");

        if (bookName.length > 0 && bookAuthor.length > 0 && bookDonor.length > 0 && amount.length > 0 && count.length > 0 && frontImage.length > 0 && backImage.length > 0) {
            submit.removeAttribute("disabled");
        } else {
            submit.setAttribute("disabled", true);
        }
    }

    document.getElementById('add-book-form').addEventListener('submit', function(e) {

        let button = document.getElementById('book-submit');
        let button2 = document.getElementById('book-submiting');
        button.style.display = 'none';
        button2.style.display = 'block';
        e.preventDefault();
        const form = document.getElementById('add-book-form');


        const formData = new FormData(form);
        formData.append('submit', true);

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/Controllers/PostBook.php", true);
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message)
                    handleModel('add-book-model', false);
                    form.reset();
                    validateBookForm();
                    loadPage(1);
                } else {
                    alertRise(false, response.message)
                }

                
            } else {
                console.log("Error in XMLHttpRequest ", xhr.readyState);
            }
            button.style.display = "block";
            button2.style.display = "none";
        }

        xhr.send(formData);
    });


    function alertRise(status, message) {

        document.getElementById('alert-text').innerText = message;

        if (status) {
            document.getElementById('alertCont').style.backgroundColor = '#1D7524';
        } else {
            document.getElementById('alertCont').style.backgroundColor = '#E44C4C';
        }

        setTimeout(() => {
            document.getElementById('alert').style.display = 'flex';
        }, 1000);

        setTimeout(() => {
            document.getElementById('alert').style.display = 'none';
        }, 6000);

    }

    window.onload = function() {
        loadPage(1);
    }
</script>

</html>