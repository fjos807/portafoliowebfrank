<?php
include 'controller.php';

$dao = new DAO();

if(isset($_POST['firstname'], $_POST['lastname1'], $_POST['lastname2'], $_POST['username'], $_POST['password'], $_POST['email'], $_POST['phone'], $_POST['birthdate'])){
    $dao->create_conection();
    $state = $dao->validate_if_exist($_POST['username']);
    if($state == false){
        $data = array($_POST['username'], $_POST['firstname'], $_POST['lastname1'], $_POST['lastname2'], $_POST['email'], $_POST['phone'], $_POST['birthdate'], $_POST['password']);
        $result = $dao->create_user($data);
        header('Location: ../index.html?signup=true');
        
    } 
    if($state) {
        header('Location: ../index.html?signup=false');
    }
}
?>