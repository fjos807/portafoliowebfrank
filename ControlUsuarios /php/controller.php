<?php

class DAO {
    public function __construct() {
        $this->servername = "controlusuariosphp.mysql.database.azure.com";
        $this->username = "admincontrol";
        $this->password = "123controlBD";
        $this->dbname = "users_info";
        $this->conn = NULL;
    }

    public function create_conection(){
        $this->conn = new mysqli($this->servername, $this->username,$this->password, $this->dbname);
        if ($this->conn->connect_error != true){
            return true;
        }
    }

    public function get_conection() {
        return $this->conn;
    }

    public function get_login_data(){
        if(isset($_POST["email_login"]) and isset($_POST["password_login "])){
            return array($_POST["email_login"], $_POST["password_login "]);
        }
        else {
            return -1;
        }

    }

    public function login_user($id, $password){
        $sql = "SELECT id, password FROM users_info.all_info WHERE id = '" . $id . "'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if(password_verify($password, $row['password'])){
                return 1;
            } else {
                return 2;
            }
            
        } else {
            return 3;
        }
    }

    public function validate_if_exist($name){
        $sql = "SELECT id FROM users_info.all_info WHERE id = '" . $name . "'";
        $result = $this->conn->query($sql);
        
        if ($result->num_rows == 0) {
            return false;
        } 
        if($result->num_rows > 0) {
            return true;
        }
    }
    public function create_user($data){
       
        if(count($data) == 8){
            if ($stmt = $this->conn->prepare('INSERT INTO all_info (id, firstname, lastname1, lastname2, email, phone, birth_date, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)')) {
                
                $hash = password_hash($data[7], PASSWORD_DEFAULT);
                $stmt->bind_param('ssssssss', $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $hash);
                
                $stmt->execute();
                $stmt->close();
                return 'User created';
            }
        }
         
        
    }

    public function change_password($userid, $oldpassword, $newpassword){
        $sql = "SELECT id, password FROM users_info.all_info WHERE id = '" . $userid . "'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if(password_verify($oldpassword, $row['password'])){
                if ($stmt = $this->conn->prepare('UPDATE users_info.all_info SET password=? WHERE id=?')){
                    $hash = password_hash($newpassword, PASSWORD_DEFAULT);
                    $stmt->bind_param('ss', $hash, $userid);
                    $stmt->execute();
                    $stmt->close();
                    return "Contraseña modificada";
                }
               

            } else {
                return "La contraseña ingresada no coincide con la actual";
            }
            
        }
    }
    
    public function close_conection(){
        $this->conn->close();
    }
}
        
?>
    