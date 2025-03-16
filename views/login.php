<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <style>
        /* login.css */

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

form {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    width: 300px;
}

form div {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
<form action="" method="POST">
    <div class="ten">
    <label for="">Tên đăng nhập:</label>
    <input type="text" name="username"><br>
    </div>
    <div class="pass">
    <label for="">Mật khẩu:</label>
    <input type="password" name="pass"><br>
    </div>

    <input type="submit" value="Đăng nhập" name="login" class="dangNhap">
    <br>
    <a href="./">Go home</a>
</form>

<?php
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $name = 'Admin';
        $pass = $_POST['pass'];
        foreach($listNguoiDung as $nguoiDung){
            if($username == $nguoiDung['ten_dang_nhap'] && $pass == $nguoiDung['mat_khau']){
                session_start();
                $_SESSION['username'] = $username;
                if($nguoiDung['id_vai_tro']==1){
                    
                    header('Location: ./?act=admin');
                }
                else{
                    header('Location: ./');
                }
            }
        }

    }
?>
    
</body>
</html>