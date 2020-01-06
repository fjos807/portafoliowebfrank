<?php
include 'controller.php';

if(isset($_POST['id_login'], $_POST['password_login'])){
    $dao = new DAO();
    $dao->create_conection();
    $result = $dao->login_user($_POST['id_login'], $_POST['password_login']);
    if($result == 1){
        session_start();
        session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
        $_SESSION['id'] = $_POST['id_login'];
        header('Location: home.php');
    }
    if($result == 2){
        header('Location: ../index.html?password=false');
    }
    if($result == 3){
        header('Location: ../index.html?id=false');
    }
}
?>