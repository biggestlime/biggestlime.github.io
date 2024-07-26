<?php

// Email ve password bilgilerini şifrelemek için daha güvenli yöntemler kullanın
$credentials = [
    'email' => 'caro',
    'password' => password_hash('caro', PASSWORD_DEFAULT)
];

if ( ! isset( $_GET['submitted'] ) )
{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

if ( $credentials['email'] !== $_GET['email'] OR ! password_verify($_GET['password'], $credentials['password']) )
{    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

// Session ID'sini rastgele ve güvenli bir şekilde oluşturun
session_start();
session_regenerate_id();

// Storing session data
$_SESSION["isLogged"] = "1";

header('Location:' . '../home.php');

exit();
