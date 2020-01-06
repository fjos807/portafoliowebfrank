<?php
include 'controller.php';

if(isset($_POST['actualpassword'], $_POST['newpassword'])){
    $dao = new DAO();
    $dao->create_conection();
    session_start();
    echo $_SESSION['id'];
    $result = $dao->change_password($_SESSION['id'], $_POST['actualpassword'], $_POST['newpassword']);
    echo $result;
}
?>