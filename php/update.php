<?php 
    session_start();
    include_once "config.php";
    $unique_id = mysqli_real_escape_string($conn, $_POST['unique_id']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cfm_password = mysqli_real_escape_string($conn, $_POST['cfm_password']);
    if(!empty($password) && !empty($unique_id) && !empty($cfm_password)){
        if($password === $cfm_password) {
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$unique_id}'");
            if(mysqli_num_rows($sql) > 0) {
                $row = mysqli_fetch_assoc($sql);
                $encrypt_pass = hash('sha512', $password);
                $sql2 = mysqli_query($conn, "UPDATE users SET password = '{$encrypt_pass}' WHERE unique_id = {$row['unique_id']}");
                echo "success";
            } else {
                echo "Something went wrong. Please try again!";
            }
            
        } else {
            echo "$cfm_password - Password not match!";
        }
    }else{
        echo "All input fields are required!";
    }
?>