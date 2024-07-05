<?php 
  session_start();
  include_once("php/config.php");
  if(!isset($_SESSION['unique_id'])){
    header("location: index.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form update">
      <?php
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
        if(mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        }
      ?>
      <header>UPDATE YOUR PASSWORD</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
        <div class="field input">
          <input type="hidden" name="unique_id" value="<?php echo $row['unique_id'] ?>" readonly>
        </div>
          <label>Password</label>
          <input type="text" name="password" placeholder="Enter your password" required>
        </div>
        <div class="field input">
          <label>Confirm Password</label>
          <input type="password" name="cfm_password" placeholder="Confirm your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Update Now">
        </div>
      </form>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/update.js"></script>

</body>
</html>

