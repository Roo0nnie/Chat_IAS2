
<?php 
  // session_start();
  // if(isset($_SESSION['unique_id'])){
  //   header("location: otp.php");
  // }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form forgot">
      <header>FORGOT PASSWORD</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Forgot Password">
        </div>
        
      </form>
      <div class="link"><a href="index.php">Back to login</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/forgot.js"></script>

</body>
</html>
