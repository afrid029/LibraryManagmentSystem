<?php 
if(isset($_POST['submit'])){
    SESSION_START();
    $username = $_POST['username'];
    $password = $_POST['password'];


    include('DBConnectivity.php');

    $query = "SELECT * from users WHERE username = '$username'";
    $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

       
            if($row['password'] === $password) {

                $data = [
                    'ID' => $row['ID'],
                    'role' => $row['role']
                ];
    
                $iv = openssl_random_pseudo_bytes(16);  // AES block size is 16 bytes
    
                // Encrypt the email using AES-256-CBC encryption
                    $key = 'a4c1b3d9127e8d9f0767e9bb432f8d3e4c5d7f3a02928d4f1a62b931ef8e9c68';
                    $encryptedData = openssl_encrypt(serialize($data), 'aes-256-cbc', $key, 0, $iv);
                
                    // Combine the IV with the encrypted email to store both together
                    $encryptedWithWithIv = base64_encode($iv . $encryptedData);
        
                    setcookie('user', $encryptedWithWithIv, time() + 21600, '/');
        
                    $_SESSION['isLoggedIn'] = true;

                    $_SESSION['fromAction'] = true;
                    $_SESSION['message'] = 'Log in Successfull';
                    $_SESSION['status'] = true;
    
                    mysqli_close($db);
                    header('Location: /dashboard');
                    exit();
                    
             
            }else {
                $_SESSION['fromAction'] = true;
                $_SESSION['message'] = 'Entered Password is wrong';
                $_SESSION['status'] = false;
                mysqli_close($db);
                header('Location: /loginpage');
                exit();
            }
        
        


    }else {
        $_SESSION['fromAction'] = true;
        $_SESSION['message'] = 'Username not found!';
        $_SESSION['status'] = false;
        mysqli_close($db);
        header('Location: /loginpage');
        exit();
    }
}
?>