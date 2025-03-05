<?php SESSION_START() ?>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="Assets/Images/logo.png" />
    <title>CV Library | Login </title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=Outfit:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="/Assets/CSS/index.css">
    <link rel="stylesheet" href="/Assets/CSS/Form.css">
    <link rel="stylesheet" href="/Assets/CSS/alert.css">

</head>

<body class="loginbody">
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
   <div class="body-cover"></div>

   <div class="login">
        <img onclick="gotoHome()" src="/Assets/Images/logo.png" alt="" srcset="">
        <?php
        if (isset($_COOKIE['user'])) {
           header('Location: /dashboard');
           exit();
        } else {
        ?>
             <form class="Form" action="/login" method="post" onsubmit="return submitLoginform()">
                <div class="FormRow">
                    <input style="background-color: transparent;" type="text" name="username" placeholder="Username" required>
                </div>
                <div class="FormRow">
                    <input style="background-color: transparent;" type="password" name="password" placeholder="Password" required>
                </div>

                <div class="button">
                    <button
                        type="submit"
                        id="login-submit"
                        name="submit"
                        class="submit">
                        Login
                    </button>

                    <button
                        style="display: none;"
                        id="login-submiting"
                        disabled="true"
                        class="submit"> ...
                    </button>
                </div>
            </form>
        <?php
        }
        ?>




       
    </div>

</body>  

<script>
      function gotoHome() {
        window.location.pathname = '/'
    }
      function submitLoginform() {
        let button = document.getElementById('login-submit');
        let button2 = document.getElementById('login-submiting');
        button.style.display = 'none';
        button2.style.display = 'block';
        return true;
    }

</script>

</html>