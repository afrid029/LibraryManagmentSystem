<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Console | CVHTH</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=Outfit:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=library_books" /> -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=badge" /> -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=deployed_code_history" /> -->
    <link rel="stylesheet" href="/Assets/CSS/dashboard.css">
    <link rel="stylesheet" href="/Assets/CSS/Form.css">
    <link rel="stylesheet" href="/Assets/CSS/model.css">
    <link rel="stylesheet" href="/Assets/CSS/pagination.css">
</head>

<body>

    <!-- Delete Model -->
    <div id="delete-model" class="model-overlay">
        <div class="delete-model-body">
            <div onclick="deleteModel('delete-model', false, 'X')" class="close-btn">X</div>
            <div class="model-title">

            </div>
            <hr>

            <div class="model-content">
                <form id="delete-form" method="post">
                    <div class="form">
                        <input type="text" name="ID" id="deleteID" hidden />
                        <input type="text" name="type" id="deleteType" hidden />
                        <div class="button">
                            <button
                                type="submit"
                                id="delete-submit"
                                name="submit"
                                class="submit">
                                Delete
                            </button>

                            <button
                                style="display: none;"
                                id="delete-submiting"
                                disabled="true"
                                class="submit"> Deleting...
                            </button>

                            <button
                                onclick="deleteModel('delete-model', false, 'X')"
                                type="button"
                                style="background-color: red;"
                                class="submit">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>


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
                            <input type="file" name="frontImage" accept="image/*" id="frontImage" required />
                        </div>
                        <div class="FormRow">
                            <label for="backImage">Back page image</label>
                            <input type="file" name="backImage" id="backImage" accept="image/*" required />
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

    <!-- Edit Book Model -->
    <div id="edit-book-model" class="model-overlay">
        <div class="model-body">
            <div onclick="editHandleModel('edit-book-model', false)" class="close-btn">X</div>
            <div class="model-title">
                Edit Book Info
            </div>
            <hr>

            <div class="model-content">
                <form id="edit-book-form" method="post" oninput="validateEditBookForm()">
                    <input type="text" name="ID" id="editBookID" hidden />
                    <div class="form">
                        <div class="FormRow">
                            <label for="editBookName">Name of Book</label>
                            <input type="text" name="bookName" id="editBookName" placeholder="Book Name" required />
                        </div>
                        <div class="FormRow">
                            <label for="editBookAuthor">Author of Book</label>
                            <input type="text" name="bookAuthor" id="editBookAuthor" placeholder="Author of Book" required />
                        </div>
                        <div class="FormRow">
                            <label for="editBookDonor">Donor of the Book</label>
                            <input type="text" name="bookDonor" id="editBookDonor" placeholder="Donor of the Book" required />
                        </div>
                        <div class="FormRow">
                            <label for="frontImage">Change Front page image</label>
                            <input type="file" accept="image/*" name="frontImage" id="editFrontImage" />
                        </div>
                        <div class="FormRow">
                            <label for="frontImage">Change Back page image</label>
                            <input type="file" accept="image/*" name="backImage" id="editBackImage" />
                        </div>
                        <div class="FormRow">
                            <label for="editAmount">Price of the book</label>
                            <input type="number" name="amount" id="editAmount" placeholder="Price of the book" required />
                        </div>
                        <div class="FormRow">
                            <label for="editCount">Number of Copies</label>
                            <input type="number" name="count" id="editCount" placeholder="Number of Copies" required />
                        </div>


                        <div class="button">
                            <button
                                type="submit"
                                id="edit-book-submit"
                                name="submit"
                                disabled="true"
                                class="submit">
                                Update Book Info
                            </button>

                            <button
                                style="display: none;"
                                id="edit-book-submiting"
                                disabled="true"
                                class="submit"> Updating...
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Add Lender Model -->
    <div id="add-lender-model" class="model-overlay">
        <div class="model-body">
            <div onclick="handleModel('add-lender-model', false)" class="close-btn">X</div>
            <div class="model-title">
                Create Lender
            </div>
            <hr>

            <div class="model-content">
                <form id="add-lender-form" method="post" oninput="validateLenderForm()">
                    <div class="form">
                        <div class="FormRow">
                            <input type="text" name="lname" id="lname" placeholder="Lender Name" required />
                        </div>
                        <div class="FormRow">
                            <input type="text" name="phone" id="phone" placeholder="Contact Number" required />
                        </div>
                        <div class="FormRow">
                            <input type="text" name="nic" id="nic" placeholder="NIC" required />
                        </div>
                        <div class="FormRow">
                            <input type="text" name="address" id="address" placeholder="Address" required />
                        </div>


                        <div class="button">
                            <button
                                type="submit"
                                id="lender-submit"
                                name="submit"
                                disabled="true"
                                class="submit">
                                Create Lender
                            </button>

                            <button
                                style="display: none;"
                                id="lender-submiting"
                                disabled="true"
                                class="submit"> Creating...
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Edit Lender Model -->
    <div id="edit-lender-model" class="model-overlay">
        <div class="model-body">
            <div onclick="editHandleModel('edit-lender-model', false)" class="close-btn">X</div>
            <div class="model-title">
                Update Lender Info
            </div>
            <hr>

            <div class="model-content">
                <form id="edit-lender-form" method="post" oninput="validateEditLenderForm()">
                    <input type="text" name="ID" id="editLendId" hidden>
                    <div class="form">
                        <div class="FormRow">
                            <input type="text" name="lname" id="edit-lname" placeholder="Lender Name" required />
                        </div>
                        <div class="FormRow">
                            <input type="text" name="phone" id="edit-phone" placeholder="Contact Number" required />
                        </div>
                        <div class="FormRow">
                            <input type="text" name="nic" id="edit-nic" placeholder="NIC" required />
                        </div>
                        <div class="FormRow">
                            <input type="text" name="address" id="edit-address" placeholder="Address" required />
                        </div>


                        <div class="button">
                            <button
                                type="submit"
                                id="edit-lender-submit"
                                name="submit"
                                disabled="true"
                                class="submit">
                                Update Lender
                            </button>

                            <button
                                style="display: none;"
                                id="edit-lender-submiting"
                                disabled="true"
                                class="submit"> Updating...
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Add BHistory Model -->
    <div id="add-history-model" class="model-overlay">
        <div class="model-body">
            <div onclick="handleModel('add-history-model', false)" class="close-btn">X</div>
            <div class="model-title">
                Lend Book
            </div>
            <hr>

            <div class="model-content">
                <form id="add-history-form" method="post" oninput="validateHistoryForm()">
                    <div class="form">
                        <div class="FormRow">
                            <select name="book" id="book">

                            </select>
                        </div>
                        <div class="FormRow">
                            <select name="lender" id="lender">

                            </select>
                        </div>
                        <div class="FormRow">
                            <label for="startDate">Lending date</label>
                            <input type="date" name="startDate" id="startDate" required />
                        </div>
                        <div class="FormRow">
                            <label for="dueDate">Due Date</label>
                            <input type="date" name="dueDate" id="dueDate" readonly required />
                        </div>


                        <div class="button">
                            <button
                                type="submit"
                                id="history-submit"
                                name="submit"
                                disabled="true"
                                class="submit">
                                Lend Book
                            </button>

                            <button
                                style="display: none;"
                                id="history-submiting"
                                disabled="true"
                                class="submit"> ...
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Edit BHistory Model -->
    <div id="edit-history-model" class="model-overlay">
        <div class="model-body">
            <div onclick="editHandleModel('edit-history-model', false)" class="close-btn">X</div>
            <div class="model-title">
                Update Lent info
            </div>
            <hr>

            <div class="model-content">
                <form id="edit-history-form" method="post" oninput="validateEditHistoryForm()">
                    <div class="form">
                        <input type="text" name="ID" id="editHistId" hidden>
                        <div class="FormRow">
                            <select name="book" id="edit-book">

                            </select>
                        </div>
                        <div class="FormRow">
                            <select name="lender" id="edit-lender">

                            </select>
                        </div>
                        <div class="FormRow">
                            <label for="startDate">Lent date</label>
                            <input type="date" name="startDate" id="edit-startDate" required />
                        </div>
                        <div class="FormRow">
                            <label for="dueDate">Due Date</label>
                            <input type="date" name="dueDate" id="edit-dueDate" readonly required />
                        </div>
                        <div style="flex-direction: row; justify-content: flex-start; gap: 7px; align-items: center" class="FormRow">

                            <input style="height: 17px; width: 17px" type="checkbox" name="rcvd" id="rcvd">
                            <label style="margin-bottom: 0px;" for="rcvd">Received Book</label>
                        </div>
                        <div id="rcvdDiv" style="display: none;" class="FormRow">
                            <label for="dueDate">Received Date</label>
                            <input type="date" name="rcvdDate" id="rcvdDate" />
                        </div>


                        <div class="button">
                            <button
                                type="submit"
                                id="edit-history-submit"
                                name="submit"
                                disabled="true"
                                class="submit">
                                Update
                            </button>

                            <button
                                style="display: none;"
                                id="edit-history-submiting"
                                disabled="true"
                                class="submit"> ...
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Add Admin/Librarian Model -->
    <div id="add-user-model" class="model-overlay">
        <div class="model-body">
            <div onclick="handleModel('add-user-model', false)" class="close-btn">X</div>
            <div class="model-title">
                Create Librarian
            </div>
            <hr>

            <div class="model-content">
                <form id="add-user-form" method="post" oninput="validateUserForm()">
                    <div class="form">
                        <div class="FormRow">
                            <input type="text" name="username" id="username" placeholder="Username" required />
                        </div>
                        <div class="FormRow">
                            <input type="password" name="password" id="password" placeholder="Password" required />
                        </div>

                        <div class="button">
                            <button
                                type="submit"
                                id="user-submit"
                                name="submit"
                                disabled="true"
                                class="submit">
                                Create Librarian
                            </button>

                            <button
                                style="display: none;"
                                id="user-submiting"
                                disabled="true"
                                class="submit"> ...
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Edit Admin/Librarian Model -->
    <div id="edit-user-model" class="model-overlay">
        <div class="model-body">
            <div onclick="editHandleModel('edit-user-model', false)" class="close-btn">X</div>
            <div class="model-title">
                Update Librarian
            </div>
            <hr>

            <div class="model-content">
                <form id="edit-user-form" method="post" oninput="validateEditUserForm()">
                    <div class="form">
                        <input type="text" name="ID" id="editAdminId" hidden>
                        <div class="FormRow">
                            <input type="text" name="username" id="edit-username" placeholder="Username" required />
                        </div>
                        <div class="FormRow">
                            <input type="password" name="password" id="edit-password" placeholder="Password" required />
                        </div>

                        <div class="button">
                            <button
                                type="submit"
                                id="edit-user-submit"
                                name="submit"
                                disabled="true"
                                class="submit">
                                Update Librarian
                            </button>

                            <button
                                style="display: none;"
                                id="edit-user-submiting"
                                disabled="true"
                                class="submit"> ...
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

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

            </div>

        </div>
    </div>

    <!-- Book History View -->
    <div id="book-hist-view" class="model-overlay">
        <div class="model-body">
            <div onclick="getBookHistory('ID', false)" class="close-btn">X</div>
            <div class="model-title">
                <h3>Book Name</h3>
            </div>
            <hr>

            <div class="model-content">
                
            </div>

        </div>
    </div>

        <!-- Lender History View -->
    <div id="lender-hist-view" class="model-overlay">
        <div class="model-body">
            <div onclick="getLenderHistory('ID', false)" class="close-btn">X</div>
            <div class="model-title">
                <h3>Lender Name</h3>
            </div>
            <hr>

            <div class="model-content">
               

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

                <div><a onclick="handleModel('add-lender-model', true)"><span class="material-symbols-outlined">
                            person_add
                        </span>Add Lenders</a></div>
                <hr>
                <div><a onclick="handleModel('add-history-model', true)"><span class="material-symbols-outlined">
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

    <!-- Nav Bar for desktop -->
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
            <div onclick="handleModel('add-lender-model', true)"><a><span class="material-symbols-outlined">
                        person_add
                    </span>Add Lenders</a></div>
            <div onclick="handleModel('add-history-model', true)"><a><span class="material-symbols-outlined">
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
            <div style="flex-direction: row; align-items: center" class="FormRow">
                <span onclick="clearSearch()" style="display: none;" id="closeSearch" class="material-symbols-outlined">
                    close
                </span>
                <input type="text" id="search" placeholder="Search" />
                <span onclick="searchContent()" class="material-symbols-outlined">
                    frame_inspect
                </span>
            </div>

        </div>

        <div class="content">


        </div>

        <div id="pagination"></div>

</body>

<script>
    let cur = 1;

    let lendPage = 1;
    let bookPage = 1;
    let histPage = 1;
    let userPage = 1

    let key;

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

            const searchBar = document.getElementById("search");

            if(cur != page) {
                searchBar.value = "";
                key = undefined;
            }


            cur = page;
            closeSearch.style.display = 'none'
        }

        document.querySelector(".content").innerHTML = "";
        loadPage(page);
    }

    function loadPage(page, pagination) {
        const xhr = new XMLHttpRequest();

        if (page == 1) {
            if(pagination){
                bookPage = pagination;
            }
            xhr.open("GET", "/Controllers/GetBooks.php?page="+bookPage+"&key="+key, true);
        } else if (page == 2) {
            if(pagination){
                lendPage = pagination;
            }
            xhr.open("GET", "/Controllers/GetLenders.php?page="+lendPage+"&key="+key, true);
        } else if (page == 3) {
            if(pagination){
                histPage = pagination;
            }
            xhr.open("GET", "/Controllers/GetBorrowHistory.php?page="+histPage+"&key="+key, true);
        } else if (page == 4) {
            if(pagination){
                userPage = pagination;
            }
            xhr.open("GET", "/Controllers/GetUsers.php?page="+userPage, true);
        }

        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                const content = document.querySelector(".content");
                const pagination = document.querySelector("#pagination");
                content.innerHTML = response.html;
                pagination.innerHTML = response.pagination;
                const searchBar = document.getElementById("search");

                if(cur != page) {
                    searchBar.value = "";
                    key = undefined;
                }

                if (cur == 1) {
                    searchBar.setAttribute("placeholder", "Search Books");
                    // searchBar.value = "";

                } else if (cur == 2) {
                    searchBar.setAttribute("placeholder", "Search Lenders");
                    // searchBar.value = "";
                } else if (cur == 3) {
                    searchBar.setAttribute("placeholder", "Search Borrow History");
                    // searchBar.value = "";
                } else if (cur == 4) {
                    searchBar.setAttribute("placeholder", "Search is not active here");
                    // searchBar.value = "";
                }

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
        key = document.getElementById('search').value;
        if(cur != 4){
            loadPage(cur, 1);
        }
    }

    function clearSearch() {
        key = undefined;
        document.getElementById('search').value = '';
        closeSearch.style.display = 'none';
        loadPage(cur, 1)
    }

    

    function handleModel(ID, value) {
        slideBar(false);
        const model = document.getElementById(ID);

        if (value) {
            if (ID == 'add-history-model') {
                const date = new Date();
                const startDate = document.getElementById("startDate");
                const dueDate = document.getElementById("dueDate");
                startDate.value = date.toISOString().split('T')[0];
                const newDate = new Date();
                newDate.setDate(date.getDate() + 14);
                dueDate.value = newDate.toISOString().split('T')[0];

                GetLenders();
                GetBooks();
            }
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
                    navigate(1);
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

    // Edit Book
    function validateEditBookForm() {
        const bookName = document.getElementById("editBookName").value;
        const bookAuthor = document.getElementById("editBookAuthor").value;
        const bookDonor = document.getElementById("editBookDonor").value;
        const amount = document.getElementById("editAmount").value;
        const count = document.getElementById("editCount").value;

        const submit = document.getElementById("edit-book-submit");

        if (bookName.length > 0 && bookAuthor.length > 0 && bookDonor.length > 0 && amount.length > 0 && count.length > 0) {
            submit.removeAttribute("disabled");
        } else {
            submit.setAttribute("disabled", true);
        }
    }

    document.getElementById('edit-book-form').addEventListener('submit', function(e) {

        let button = document.getElementById('edit-book-submit');
        let button2 = document.getElementById('edit-book-submiting');
        button.style.display = 'none';
        button2.style.display = 'block';
        e.preventDefault();
        const form = document.getElementById('edit-book-form');


        const formData = new FormData(form);
        formData.append('edit-submit', true);

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/Controllers/PostBook.php", true);
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message)
                    handleModel('edit-book-model', false);
                    form.reset();
                    validateEditBookForm();
                    navigate(1);
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

    // Add Lender
    function validateLenderForm() {
        const lname = document.getElementById("lname").value;
        const phone = document.getElementById("phone").value;
        const nic = document.getElementById("nic").value;
        const address = document.getElementById("address").value;

        const submit = document.getElementById("lender-submit");

        if (lname.length > 0 && phone.length == 10 && (nic.length == 10 || nic.length == 12) && address.length > 5) {
            submit.removeAttribute("disabled");
        } else {
            submit.setAttribute("disabled", true);
        }
    }

    document.getElementById('add-lender-form').addEventListener('submit', function(e) {

        let button = document.getElementById('lender-submit');
        let button2 = document.getElementById('lender-submiting');
        button.style.display = 'none';
        button2.style.display = 'block';
        e.preventDefault();
        const form = document.getElementById('add-lender-form');


        const formData = new FormData(form);
        formData.append('submit', true);

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/Controllers/PostLender.php", true);
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message)
                    handleModel('add-lender-model', false);
                    form.reset();
                    validateLenderForm();

                    navigate(2);
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

    //Edit Lender

    function validateEditLenderForm() {
        const lname = document.getElementById("edit-lname").value;
        const phone = document.getElementById("edit-phone").value;
        const nic = document.getElementById("edit-nic").value;
        const address = document.getElementById("edit-address").value;

        const submit = document.getElementById("edit-lender-submit");

        if (lname.length > 0 && phone.length == 10 && (nic.length == 10 || nic.length == 12) && address.length > 5) {
            submit.removeAttribute("disabled");
        } else {
            submit.setAttribute("disabled", true);
        }
    }

    document.getElementById('edit-lender-form').addEventListener('submit', function(e) {

        let button = document.getElementById('edit-lender-submit');
        let button2 = document.getElementById('edit-lender-submiting');
        button.style.display = 'none';
        button2.style.display = 'block';
        e.preventDefault();
        const form = document.getElementById('edit-lender-form');


        const formData = new FormData(form);
        formData.append('edit-submit', true);

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/Controllers/PostLender.php", true);
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message)
                    handleModel('edit-lender-model', false);
                    form.reset();
                    validateEditLenderForm();

                    navigate(cur);
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

    // Get Lenders List
    function GetLenders() {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "/Controllers/GetLendersList.php", true);
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                // console.log(response.data);

                LoadLenders(response.data);

            } else {
                console.log("Error in XMLHttpRequest ", xhr.readyState);
            }
        }

        xhr.send();
    }

    function LoadLenders(data) {
        const select = document.getElementById("lender");
        select.innerHTML = "";
        select.innerHTML = "<option value='none' disabled selected>Select Lender</option>";
        data.forEach(element => {
            const option = document.createElement("option");
            option.value = element.ID;
            option.innerText = element.name + ' (' + element.ID + ')';
            select.appendChild(option);
        });
    }

    //Get Book List
    function GetBooks() {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "/Controllers/GetBooksList.php", true);
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                // console.log(response.data);

                LoadBooks(response.data);

            } else {
                console.log("Error in XMLHttpRequest ", xhr.readyState);
            }
        }

        xhr.send();

    }

    function LoadBooks(data) {
        const select = document.getElementById("book");
        select.innerHTML = "";
        select.innerHTML = "<option value='none' disabled selected>Select Book</option>";
        data.forEach(element => {
            const option = document.createElement("option");
            option.value = element.ID;
            option.innerText = element.name + ' (' + element.available + ')';
            select.appendChild(option);
        });
    }

    // Borrow Book
    function validateHistoryForm() {
        const book = document.getElementById("book").value;
        const lender = document.getElementById("lender").value;
        const startDate = document.getElementById("startDate").value;
        const dueDate = document.getElementById("dueDate").value;

        const submit = document.getElementById("history-submit");

        if (startDate.length > 0) {
            const date = new Date(startDate);
            const newDate = new Date(date);
            const updatedDate = newDate.setDate(newDate.getDate() + 14);
            // console.log(date + 14);
            const duedate = new Date(updatedDate)
            
            
            document.getElementById("dueDate").value = duedate.toISOString().split('T')[0];
        }

        if (book != 'none' && lender != 'none' && startDate.length > 0 && dueDate.length > 0) {
            submit.removeAttribute("disabled");
        } else {
            submit.setAttribute("disabled", true);
        }
    }

    document.getElementById('add-history-form').addEventListener('submit', function(e) {

        let button = document.getElementById('history-submit');
        let button2 = document.getElementById('history-submiting');
        button.style.display = 'none';
        button2.style.display = 'block';
        e.preventDefault();
        const form = document.getElementById('add-history-form');


        const formData = new FormData(form);
        formData.append('submit', true);

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/Controllers/PostHistory.php", true);
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message)
                    handleModel('add-history-model', false);
                    form.reset();
                    validateHistoryForm();

                    navigate(3);
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

    // Get a single Borrow Info

    function getBorrowInfo(ID){
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '/Controllers/GetSingleLentInfo.php?ID='+ID, true);

        xhr.onload = function(){
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);

                document.getElementById('editHistId').value = ID;
                document.getElementById('edit-startDate').value = response.data.lentdate;
                document.getElementById('edit-dueDate').value = response.data.deadline;
                EditGetLenders(response.data.lender_ID);
                EditGetBooks(response.data.book_ID);

                if(response.data.status == 0) {
                    document.getElementById('rcvd').checked = true;
                    document.getElementById('rcvdDate').value = response.data.receivedDate;
                } else {
                    document.getElementById('rcvd').checked = false;
                    document.getElementById('rcvdDate').value = ''
                }

                validateEditHistoryForm();
            } else {
                console.log('Error in XMLRequest ', xhr.readyState);
                
            }
        }

        xhr.send();
    }

    
    // Get Lenders List for edit
    function EditGetLenders(ID) {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "/Controllers/GetLendersList.php", true);
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                // console.log(response.data);

                EditLoadLenders(response.data, ID);

            } else {
                console.log("Error in XMLHttpRequest ", xhr.readyState);
            }
        }

        xhr.send();
    }

    function EditLoadLenders(data, ID) {
       const select = document.getElementById('edit-lender');
       select.innerHTML = '';
        data.forEach(element => {
            const option = document.createElement("option");
            option.value = element.ID;
            option.innerText = element.name + ' (' + element.ID + ')';
            if(ID == element.ID) {
                option.selected = true;
            }
            select.appendChild(option);
        });
    }

    //Get Book List for edit
    function EditGetBooks(ID) {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "/Controllers/GetBooksList.php?ID="+ID, true);
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                // console.log(response.data);

                EditLoadBooks(response.data, ID);

            } else {
                console.log("Error in XMLHttpRequest ", xhr.readyState);
            }
        }

        xhr.send();

    }

    function EditLoadBooks(data, ID) {
        const select = document.getElementById("edit-book");
        select.innerHTML = "";
       
        $selectedLoded = false;
        data.forEach(element => {
            const option = document.createElement("option");
            if(ID == element.ID && $selectedLoded == false){
                option.value = element.ID;
                option.innerText = element.name + ' (' + element.available + ')';
                
                option.selected = true;
                $selectedLoded = true;
                
                select.appendChild(option);
            }

            if(ID != element.ID){
                option.value = element.ID;
                option.innerText = element.name + ' (' + element.available + ')';                
                select.appendChild(option);
            }


        });
    }

     // Edit Borrow Book
     function validateEditHistoryForm() {
     
        
        const book = document.getElementById("edit-book").value;
        const lender = document.getElementById("edit-lender").value;
        const startDate = document.getElementById("edit-startDate").value;
        const dueDate = document.getElementById("edit-dueDate").value;
        const checkBox = document.getElementById("rcvd").checked;
        const rcvdDiv = document.getElementById("rcvdDiv");
        const rcvdDate = document.getElementById("rcvdDate").value;
        let mandCheck = true;

      

        if(checkBox) {
            rcvdDiv.style.display = 'flex';
            if(rcvdDate.length > 0){
                mandCheck = true;
            } else {
                mandCheck = false;
            }

        }else {
           
            rcvdDiv.style.display = 'none'
            mandCheck = true;
        }
        

        const submit = document.getElementById("edit-history-submit");

        if (startDate.length > 0) {
           console.log('dsad');
           
            const date = new Date(startDate);
            const newDate = new Date(date);
            const updatedDate = newDate.setDate(newDate.getDate() + 14);
            const duedate = new Date(updatedDate);
            
            document.getElementById("edit-dueDate").value = duedate.toISOString().split('T')[0];
        }

        if (book != 'none' && lender != 'none' && startDate.length > 0 && dueDate.length > 0 && mandCheck) {
            submit.removeAttribute("disabled");
        } else {
            submit.setAttribute("disabled", true);
        }
    }

    document.getElementById('edit-history-form').addEventListener('submit', function(e) {

        let button = document.getElementById('edit-history-submit');
        let button2 = document.getElementById('edit-history-submiting');
        button.style.display = 'none';
        button2.style.display = 'block';
        e.preventDefault();
        const form = document.getElementById('edit-history-form');


        const formData = new FormData(form);
        formData.append('edit-submit', true);

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/Controllers/PostHistory.php", true);
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message)
                    handleModel('edit-history-model', false);
                    form.reset();
                    validateEditHistoryForm();

                    navigate(cur);
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

       // Add Librarian / Admin
    function validateUserForm() {
        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;

        const submit = document.getElementById("user-submit");

        if (username.length > 0 && password.length > 0) {
            submit.removeAttribute("disabled");
        } else {
            submit.setAttribute("disabled", true);
        }
    }

    document.getElementById('add-user-form').addEventListener('submit', function(e) {

        let button = document.getElementById('user-submit');
        let button2 = document.getElementById('user-submiting');
        button.style.display = 'none';
        button2.style.display = 'block';
        e.preventDefault();
        const form = document.getElementById('add-user-form');


        const formData = new FormData(form);
        formData.append('submit', true);

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/Controllers/PostUser.php", true);
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message)
                    handleModel('add-user-model', false);
                    form.reset();
                    validateUserForm();

                    navigate(4);
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

       // Add Librarian / Admin
       function validateEditUserForm() {
        const username = document.getElementById("edit-username").value;
        const password = document.getElementById("edit-password").value;

        const submit = document.getElementById("edit-user-submit");

        if (username.length > 0 && password.length > 0) {
            submit.removeAttribute("disabled");
        } else {
            submit.setAttribute("disabled", true);
        }
    }

    document.getElementById('edit-user-form').addEventListener('submit', function(e) {

        let button = document.getElementById('edit-user-submit');
        let button2 = document.getElementById('edit-user-submiting');
        button.style.display = 'none';
        button2.style.display = 'block';
        e.preventDefault();
        const form = document.getElementById('edit-user-form');


        const formData = new FormData(form);
        formData.append('edit-submit', true);

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/Controllers/PostUser.php", true);
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message)
                    handleModel('edit-user-model', false);
                    form.reset();
                    validateEditUserForm();

                    navigate(cur);
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

    //Edit Handle Model

    function editHandleModel(ID, value, contentID) {

        const model = document.getElementById(ID);

        if (value) {
            if (ID == 'edit-book-model') {

                document.getElementById('editBookID').value = contentID;

                document.getElementById('editBookName').value = document.getElementById(contentID + '-name').innerText;
                let author = document.getElementById(contentID + '-author').innerText;
                author = author.split('Author : ')[1];
                document.getElementById('editBookAuthor').value = author;

                let donor = document.getElementById(contentID + '-donor').innerText;
                donor = donor.split('Donated By : ')[1];
                document.getElementById('editBookDonor').value = donor;

                let amount = document.getElementById(contentID + '-amount').innerText;
                amount = amount.split('Price : RS ')[1];
                amount = Number(amount);
                document.getElementById('editAmount').value = amount;

                let count = document.getElementById(contentID + '-count').innerText;
                count = count.split('Total : ')[1];
                count = Number(count);
                document.getElementById('editCount').value = count;

                validateEditBookForm();
            } else if (ID == 'edit-lender-model') {

                document.getElementById('editLendId').value = contentID;
                document.getElementById("edit-lname").value = document.getElementById(contentID + "-name").innerText;

                let contact = document.getElementById(contentID + "-phone").innerText;
                contact = contact.split("Phone : ")[1];
                document.getElementById("edit-phone").value = contact;

                let nic = document.getElementById(contentID + "-nic").innerText;
                nic = nic.split("NIC : ")[1];
                document.getElementById("edit-nic").value = nic;

                let address = document.getElementById(contentID + "-address").innerText;
                address = address.split("Address : ")[1];
                document.getElementById("edit-address").value = address;

                validateEditLenderForm();

            } else if (ID == 'edit-history-model') {
                document.getElementById("editHistId").value = contentID;
                getBorrowInfo(contentID);
               
            } else if (ID == 'edit-user-model'){
                const xhr = new XMLHttpRequest();

                xhr.open('GET', '/Controllers/GetSingleAdmin.php?ID='+contentID, true);
                xhr.onload = function() {
                    if(xhr.readyState == 4 && xhr.status == 200) {
                        var data = JSON.parse(xhr.responseText).data;
                        // console.log(data);
                        document.getElementById('editAdminId').value = contentID;
                        document.getElementById('edit-username').value = data.username;
                        document.getElementById('edit-password').value = data.password;
                        validateEditUserForm();

                        

                    }else {
                        console.log('Error in XMLHTTP ', xhr.readyState);
                        
                    }
                }

                xhr.send();
            }

            model.style.display = "block";
        } else {
            model.style.display = "none";
        }

    }


    //Delete MOdel

    function deleteModel(ID, value, type) {

        const model = document.getElementById('delete-model');

        if (value) {

            if (type == 'Book') {
                model.querySelector('.model-title').innerText = 'Delete Book ?';
                document.getElementById('deleteID').value = ID;
                document.getElementById('deleteType').value = 'Book';
            } else if (type == 'Lender') {
                model.querySelector('.model-title').innerText = 'Delete Lender ?';
                document.getElementById('deleteID').value = ID;
                document.getElementById('deleteType').value = 'Lender';
            } else if (type == 'History') {
                model.querySelector('.model-title').innerText = 'Delete this entry ?';
                document.getElementById('deleteID').value = ID;
                document.getElementById('deleteType').value = 'History';
            } else if (type == 'User') {
                model.querySelector('.model-title').innerText = 'Delete this Admin ?';
                document.getElementById('deleteID').value = ID;
                document.getElementById('deleteType').value = 'User';
            }
            model.style.display = "block";
        } else {
            model.style.display = "none";
        }

    }


    document.getElementById('delete-form').addEventListener('submit', function(e) {

        let button = document.getElementById('delete-submit');
        let button2 = document.getElementById('delete-submiting');
        button.style.display = 'none';
        button2.style.display = 'block';
        e.preventDefault();
        const form = document.getElementById('delete-form');


        const formData = new FormData(form);
        formData.append('submit', true);

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/Controllers/DeleteContent.php", true);
        xhr.onload = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status) {
                    alertRise(true, response.message)
                    deleteModel('delete-model', false, 'X');
                    form.reset();
                    navigate(cur);
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

    // GET Book Lend History 
    function getBookHistory(ID, val) {
        const model = document.getElementById('book-hist-view');

        if (val) {
            model.querySelector("h3").innerText = document.getElementById(ID + "-name").innerText;
            const xhr = new XMLHttpRequest();
            xhr.open('GET', '/Controllers/GetBookHistoryList.php?ID=' + ID, true)

            xhr.onload = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    const container = model.querySelector(".model-content");
                    container.innerHTML = '';
                    container.innerHTML = response.html;
                    model.style.display = 'block'

                } else {
                    console.log('Error XML request ', xhr.statusText)
                }
            }

            xhr.send();

        } else {
            model.style.display = 'none'
        }

    }

    // See Book Images

    function seeBookImages(front, back, name) {
        document.getElementById('book-image').innerText = name;

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
    }

    //Get Lender History
    function getLenderHistory(ID, val) {
        const model = document.getElementById('lender-hist-view');

        if (val) {
            model.querySelector("h3").innerText = document.getElementById(ID + "-name").innerText;
            const xhr = new XMLHttpRequest();
            xhr.open('GET', '/Controllers/GetLenderHistoryList.php?ID=' + ID, true)

            xhr.onload = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    const container = model.querySelector(".model-content");
                    container.innerHTML = '';
                    container.innerHTML = response.html;
                    model.style.display = 'block'

                } else {
                    console.log('Error XML request ', xhr.statusText)
                }
            }

            xhr.send();

        } else {
            model.style.display = 'none'
        }
    }

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