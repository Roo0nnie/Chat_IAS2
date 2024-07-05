<?php 
    session_start();
    include_once "config.php";
    $id = mysqli_real_escape_string($conn, $_POST['unique_id']);
    $otp = mysqli_real_escape_string($conn, $_POST['otp']);
    $otp_generated = mysqli_real_escape_string($conn, $_POST['otp_generated']);

    if(!empty($id) && !empty($otp) && !empty($otp_generated)) {
        if($otp === $otp_generated) {
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$id}'");
            if(mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "success";
            } else {
                echo "$otp - OTP not match!";
            }
        }
        else {
            echo "$otp - OTP not match!"; 
        }
    }
    else{
        echo "All input fields are required!";
    }
?>
