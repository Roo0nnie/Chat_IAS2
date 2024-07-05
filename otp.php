<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: index.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form otp">
      <?php 
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }
      ?>
      <header>Verify OTP</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <input type="hidden" name="otp_generated" value="12345" readonly>
        </div>
        <div class="field input">
          <input type="hidden" name="unique_id" value="<?php echo $row['unique_id'] ?>" readonly>
        </div>
        <div class="field input">
          <label>Enter OTP sent to your Email</label>
          <input type="text" name="otp" placeholder="Enter OTP" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Confirm OTP">
        </div>
      </form>
      <div class="link"><a href="index.php">Back to login</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/otp.js"></script>

</body>
</html>
