<?php
function auth(){
    session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['email'])){
        return [
            "id"=>$_SESSION['id'],
            "username"=>$_SESSION['username'],
            "email"=>$_SESSION['email'],
        ];
    }else{
        return null;
    }
}

function logOut($page="login.php"){
    session_start();
    $_SESSION=[];
    session_destroy();
    header("Location: {$page}");
    exit;
}